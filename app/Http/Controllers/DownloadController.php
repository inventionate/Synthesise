<?php

namespace Synthesise\Http\Controllers;

use Illuminate\Http\Request;

class DownloadController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Laden und standardisieren der angeforderten Dateien.
     *
     * @param string $type Dateityp (PDF, JPG,…).
     * @param string $file Dateiname.
     *
     * @return Response Die angeforderte Datei aus dem storage Ordner.
     */
    public function getFile(Request $request)
    {
        $path = $request->path;
        $name = $request->name;

        return response()->download($path, $name);
    }
}
