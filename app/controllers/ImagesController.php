<?php

class ImagesController extends Controller {

	/**
	 * List des images
	 */
	public function listImg()
	{
		$metaData = Image::exploreFolder();
		return View::make('list', array('images' => $metaData));
	}

	/**
	 * Affiche une image
	 */
	public function showImg($imageName)
	{
		$metaData = Image::exploreFile($imageName);
		$d = get_object_vars($metaData);
		$flickr = Image::relationFlickr($d['Subject']);
		return View::make('show',array('image' => $d,'flickr' => $flickr[0],'tags' => $flickr[1]));
	}

	/**
	 * Ajouter une image
	 */
	public function addImg()
	{
		 if (Input::hasFile('image')) {
	        $file            = Input::file('image');
	        $destinationPath = public_path()."/assets/images/";
	        $filename        = $file->getClientOriginalName();
	        $uploadSuccess   = $file->move($destinationPath, $filename);
	        if($uploadSuccess)
	        	if(Image::createJsonFile($filename))
	        		return Redirect::route('editImg',array($filename));

	        return View::make('add');
    	}
		return View::make('add');
	}

	/**
	 * Editer une image
	 */
	public function editImg($imageName)
	{
		if(Input::all()){
			$inputs = Input::all();
			Image::mergeData($imageName, $inputs);
			return Redirect::route('showImg',array($imageName));
		}

		$metaData = Image::exploreFile($imageName);
		$d = get_object_vars($metaData);
		$data_array = array("Title", "Creator", "CreatorWorkURL", "Description", "Headline", "Country", "State", "City", "Credit", "Source", "DateCreated", "Rights", "UsageTerms");
		return View::make('edit',array('imageName' => $imageName, 'image' => $d, 'data_modif' => $data_array));
	}

	/**
	 * Télécharger une image
	 */
	public function downloadImg($imageName)
	{
   		$pathFile = public_path()."/assets/images/".$imageName;
        return Response::download($pathFile, $imageName);
	}

	/**
	 * Télécharger XMP correpondant à une image
	 */
	public function downloadXMP($imageName)
	{

		$xmp = Image::generateXMP($imageName);
		$pathImage = public_path()."/assets/images/".$imageName;
		$imageName = explode(".", $imageName);
		$imageName = $imageName[0];
   		$pathFile = public_path()."/assets/xmp/".$imageName.".xmp";

        return Response::download($pathFile, $imageName.".xmp", array('content-type'=>'application/xml'));
	}

	/**
	* All metadata JSON format
	**/
	public function allDataJson(){
		$data = Image::exploreFolderJSON();

		return Response::json($data);
	}
	/**
	* Liste des images géoréférencé
	*/
	public function cartoImg(){
		return View::make('cartographie');
	}

}
