<?php namespace Synthesise\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Synthesise\Extensions\Facades\Parser;

/**
 * @Middleware("auth")
 */
class DownloadController extends Controller {

	/**
	 * Laden und standardisieren der angeforderten Dateien.
	 *
	 * @Get("download/{type}/{file}")
   *
	 * @param     string $type Dateityp (PDF, JPG,…).
	 * @param     string $file Dateiname.
	 * @return    Response Die angeforderte Datei aus dem storage Ordner.
	 */
	public function getFile($type, $file)
	{
		$filepath = Parser::normalizeName($file);
		return Response::download(storage_path().'/app/'.$type.'/'.$filepath.'.'.$type, $file . '.' . $type);
	}

}
