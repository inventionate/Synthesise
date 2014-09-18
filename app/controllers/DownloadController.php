<?php

class DownloadController extends \BaseController {

	/**
	 * Laden und standardisieren der angeforderten Dateien.
	 * GET /download
	 *
	 * @param     string $type Dateityp (PDF, JPG,…).
	 * @param     string $file Dateiname.
	 * @return    Response Die angeforderte Datei aus dem storage Ordner.
	 */
	public function getFile($type, $file)
	{
		# @todo Parser Funktion erstellen, die den Namen normalisiert und diese dann Unit testen!
		$filename = strtolower(str_replace(array(' ','?','ä','ö','ü','ß','-','–',':',',','»','«','É','!','.','Ä','Ö','Ü'),array('_','','ae','oe','ue','ss','','und','','','','','e','','','ae','oe','ue'),urldecode($file)));
		return Response::download(storage_path().'/'.$type.'/'.$filename.'.'.$type);
	}

}
