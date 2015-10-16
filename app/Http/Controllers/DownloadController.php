<?php

namespace Synthesise\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Synthesise\Extensions\Facades\Parser;

class DownloadController extends Controller
{
    /**
     * Laden und standardisieren der angeforderten Dateien.
     *
     * @param string $type Dateityp (PDF, JPG,…).
     * @param string $file Dateiname.
     *
     * @return Response Die angeforderte Datei aus dem storage Ordner.
     */
    public function getFile($type, $file)
    {
        $filepath = Parser::normalizeName('app/'.$type.'/'.$file).'.'.$type;

        return Response::download(storage_path($filepath), $file.'.'.$type);
    }
}
