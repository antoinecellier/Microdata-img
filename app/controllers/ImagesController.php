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
