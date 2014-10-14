<?php namespace Synthesise\Extensions;

use Illuminate\Support\Facades\URL;

class AssetBuilder {

  /**
   * Liest die Asset Datei inkl. Revisionstag aus der "manifest" Datei.
   *
   * @param  string  $filename
   * @return string
   */
  public function rev($filename)
  {

    $manifest_path = base_path() . '/resources/assets/rev-manifest.json';

    if (file_exists($manifest_path)) {
      $manifest = json_decode(file_get_contents($manifest_path), TRUE);
    }
    else
    {
      $manifest = [];
    }

    if (array_key_exists($filename, $manifest))
    {
      return URL::asset($manifest[$filename]);
    }

    throw new InvalidArgumentException("File {$filename} not defined in asset manifest.");
  }

}
