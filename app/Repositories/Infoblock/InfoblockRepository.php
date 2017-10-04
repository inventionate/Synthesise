<?php

namespace Synthesise\Repositories\Infoblock;

use Illuminate\Database\Eloquent\Model;

use Synthesise\Infoblock;
use Storage;

class InfoblockRepository implements InfoblockInterface
{

    /**
     * Store new infoblock.
     *
     * @param   string      $name
     * @param   string      $content
     * @param   string      $link_url
     * @param   string      $image_path
     * @param   string      $text_path
     * @param   string      $smeinar_name
     *
     * @return  collection
     */
    public function store($name, $content, $link_url, $image_path, $text_path, $seminar_name)
    {

        if ( $link_url === '' )
        {
            $link_url = NULL;
        }

        // Save infoblock.
        $infoblock = new Infoblock();

        $infoblock->name = $name;
        $infoblock->content = $content;
        $infoblock->image_path = $image_path;
        $infoblock->text_path = $text_path;
        $infoblock->link_url = $link_url;
        $infoblock->seminar_name = $seminar_name;

        $infoblock->save();
    }

    /**
     * Update infoblock.
     *
     * @param   int         $id
     * @param   string      $name
     * @param   string      $content
     * @param   string      $link_url
     * @param   string      $image_path
     * @param   string      $text_path
     * @param   string      $smeinar_name
     *
     * @return  collection
     */
    public function update($id, $name, $content, $link_url, $image_path, $text_path, $seminar_name)
    {

        // Find infoblock.
        $infoblock = Infoblock::findOrFail($id);

        // Check new image.
        if( $image_path !== null )
        {
            // Remove old image.
            if ( Infoblock::where('image_path', $infoblock->image_path)->count() === 1 )
            {
                Storage::delete( $infoblock->image_path );
            }

            // Save new image.
            $infoblock->image_path = $image_path;
        }

        // Check new text.
        if( $text_path !== null )
        {
            // Remove old image.
            if ( Infoblock::where('text_path', $infoblock->text_path)->count() === 1 )
            {
                Storage::delete( $infoblock->text_path );
            }

            // Save new text.
            $infoblock->text_path = $text_path;
        }

        if ( $link_url === '' )
        {
            $link_url = NULL;
        }

        $infoblock->name = $name;
        $infoblock->content = $content;
        $infoblock->link_url = $link_url;
        $infoblock->seminar_name = $seminar_name;

        $infoblock->save();

    }

    /**
     * Delete infoblock.
     *
     * @param   int     $id
     *
     * @return  collection
     */
    public function delete($id)
    {

        $infoblock = Infoblock::findOrFail($id);

        if ( Infoblock::where('image_path', $infoblock->image_path)->count() === 1 && $infoblock->image_path !== null )
        {
            Storage::delete( $infoblock->image_path );
        }

        if ( Infoblock::where('text_path', $infoblock->text_path)->count() === 1 && $infoblock->text_path !== null )
        {
            Storage::delete( $infoblock->text_path );
        }

        $infoblock->delete();

    }

}
