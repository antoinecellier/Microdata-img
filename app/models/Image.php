<?php

class Image extends BaseModel {

	public static $pathFolderImg = "assets/images/";

	public static function parseJson()
	{

	}

	/**
	 * Génére le JSON des données de toutes les images se trouvant dans le dossier public/assets/images
	 */
	public static function exploreFolder()
	{

		$json = shell_exec("exiftool -json ".self::$pathFolderImg."*.jpg");
	
		$datas = json_decode($json);

		return self::clearForList($datas);
	}

	/**
	 * Génére le JSON des données d'une image se trouvant dans le dossier public/assets/images
	 */
	public static function exploreFile($imageName)
	{
		$search = '_';
		$replace = '.';

		//Clear image name ( add extension )
		$imageName =  strrev(implode(strrev($replace), explode($search, strrev($imageName), 2)));

		$json = shell_exec("exiftool -json ".self::$pathFolderImg.$imageName);
	
		$datas = json_decode($json);

		return $datas[0];
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
						$explode = explode(".", $v);
						$type = str_replace(".", "", $explode[1]);
						$arrayOneImage['nameUrl'] = $explode[0]."_".$type;
					}
				}
			}
			array_push($arrayImageClear, $arrayOneImage);
		}

		return $arrayImageClear;
	}

}