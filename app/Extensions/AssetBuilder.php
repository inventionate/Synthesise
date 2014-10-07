<?php namespace Synthesise\Extensions;

use Illuminate\Support\Facades\HTML;

class AssetBuilder {

  /**
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
      return $manifest[$filename];
    }

    return $filename;

  }

}
