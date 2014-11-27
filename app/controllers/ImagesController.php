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
		return View::make('show',array('image' => $d));
	}

	/**
	 * Ajouter une image
	 */
	public function addImg()
	{
		return View::make('add');
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
	* Edite une image
	*/
	public function editImg($id)
	{
		return View::make('index');
	}

	/**
	 * Ajoute une image
	 */
	public function addImg()
	{
		return View::make('index');		
	}
}
