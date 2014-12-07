<?php

class Image extends BaseModel {

	public static $pathFolderImg = "assets/images/";
	public static $pathFolderJson = "assets/json/";
	public static function parseJson()
	{

	}

	/**
	 * Génére le fichier XMP d'une image
	 */
	public static function generateXMP($imageName)
	{
		$imageNameE = explode(".", $imageName);
		$imageNameW = $imageNameE[0];
		$xmp = shell_exec("exiftool -xmp -b ".self::$pathFolderImg.$imageName." > ".public_path()."/assets/xmp/".$imageNameW.".xmp");

		return $xmp;
	}

	/**
	* Modification des metadatas avec Exiftool
	*/
	public static function modifDataJson($imageName, $datas)
	{
		$jsonFile = explode(".", $imageName);
		shell_exec("echo ".$datas." > ".self::$pathFolderJson.$jsonFile[0].".json");
		shell_exec("exiftool ".self::$pathFolderImg.$imageName." -json=".self::$pathFolderJson.$jsonFile[0].".json");
	}

	/**
	* Merge data pour modif d'une image
	*/
	public static function mergeData($imageName, $newValues)
	{
		$datas = self::exploreFile($imageName);
		$datas = get_object_vars($datas);
		$data_to_modif = array("Title", "Creator", "CreatorWorkURL", "Description", "Headline", "Country", "State", "City", "Credit", "Source", "DateCreated", "Rights", "UsageTerms");

		foreach ($datas as $key => $value) {
			if(in_array($key, $data_to_modif)){
				$datas[$key] = $newValues[$key];
			}
		}
		$datas = json_encode($datas);
		self::modifDataJson($imageName, $datas);
	}

	/**
	 * Génére le JSON des données de toutes les images se trouvant dans le dossier public/assets/images
	 */
	public static function exploreFolder()
	{

		$json = shell_exec("exiftool -json ".self::$pathFolderImg."*.*");
	
		$datas = json_decode($json);

		return self::clearForList($datas);
	}

	/**
	*	Génére le JSON de toute les images
	*/
	public static function exploreFolderJSON()
	{

		$json = shell_exec("exiftool -json ".self::$pathFolderImg."*.*");
		$json = json_decode($json);
		return $json;
	}

	/**
	 * Génére le JSON des données d'une image se trouvant dans le dossier public/assets/images
	 */
	public static function exploreFile($imageName)
	{
		$search = '_';
		$replace = '.';

		$json = shell_exec("exiftool -json ".self::$pathFolderImg.$imageName);
		$datas = json_decode($json);
		return $datas[0];
	}

	/**
	 * Créé un fichier json de matadata pour une image
	 */
	public static function createJsonFile($imageName)
	{
		$jsonNameFile = explode(".", $imageName);

		$json = shell_exec("exiftool -json ".self::$pathFolderImg.$imageName." > ".
							self::$pathFolderJson.$jsonNameFile[0].".json");
		return true;
	}

	public static function clearForList($datas)
	{
		$arrayImageClear = array();
		foreach ($datas as $key => $value) {
			$arrayOneImage = array();
			foreach ($value as $k => $v) {
				if($k == 'SourceFile')
				{
					$arrayOneImage[$k] = $v;
				}else{
					if($k == 'FileName'){
						$arrayOneImage['FileName'] = $v;
					}
				}
			}
			array_push($arrayImageClear, $arrayOneImage);
		}

		return $arrayImageClear;
	}

	/**
	*	Relation Flickr
	*/
	public static function relationFlickr($subject)
	{
		//Formate tags
		$tags = "";
		foreach ($subject as $key => $value) {
			if($key == sizeof($subject) - 1)
				$tags .= $value;
			else
				$tags .= $value.", ";
		}
		$key = "9555e4e2ae28ea1c4746baf829b1fc6f";
		$url = 'https://api.flickr.com/services/rest/?method=flickr.photos.search';
		$url.= '&api_key='.$key;
		$url.= '&tags='.urlencode($tags);
		$url.= '&per_page=40';
		$url.= '&format=json';
		$url.= '&nojsoncallback=1';
		$response = json_decode(file_get_contents($url));

		$data_array = $response->photos->photo;
		$data_response = array();
		if($data_array){
			foreach ($data_array as $key => $value) {
				$data_response[$key]['title'] = $value->title;
				$data_response[$key]['imageURL'] = 'http://farm'.$value->farm.
												   '.staticflickr.com/'.$value->server.
												   '/'.$value->id.'_'.$value->secret.'_m.jpg';
			}
		}
		return array($data_response, $tags);
	}

}