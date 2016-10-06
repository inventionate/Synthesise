<?php

namespace Synthesise\Repositories\Infoblock;

use Illuminate\Database\Eloquent\Model;

use Synthesise\Infoblock;
use File;

class InfoblockRepository implements InfoblockInterface
{

    /**
     * Store new infoblock.
     *
     * @param   string      $name
     * @param   string      $content
     * @param   string      $link_url
     * @param   file        $image
     * @param   file        $text
     * @param   string      $smeinar_name
     *
     * @return  collection
     */
    public function store($name, $content, $link_url, $image, $text, $seminar_name)
    {

        if ( is_null($image) )
        {
            $image_path = NULL;
        }
        else
        {
            // Save image.
            $image_saved = $image->move(storage_path('app/public/seminars/infoblocks'), md5_file($image) . '.' . $image->getClientOriginalExtension());

            $image_path = 'storage/seminars/infoblocks/' . $image_saved->getFilename();
        }

        if ( is_null($text) )
        {
            $text_path = NULL;
        }
        else
        {
            $text_saved = $text->move(storage_path('app/public/seminars/infoblocks'), md5_file($text) . '.' . $text->getClientOriginalExtension());

            $text_path = 'storage/seminars/infoblocks/' . $text_saved->getFilename();
        }

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
     * @param   file        $image
     * @param   file        $text
     * @param   string      $smeinar_name
     *
     * @return  collection
     */
    public function update($id, $name, $content, $link_url, $image, $text, $seminar_name)
    {

        // Find infoblock.
        $infoblock = Infoblock::findOrFail($id);

        // Check new image.
        if( $image !== null )
        {
            // Remove old image.
            if ( Infoblock::where('image_path', $infoblock->image_path)->count() === 1 )
            {
                // @TODO: Sobald Laravel 5.3 verwendet werden kann, alles auf Storage umstellen! Hierzu kann ein symbolischer Link erstellt werden: 'php artisan storage:link'
                File::delete( $infoblock->image_path );
            }

            // Save new image.
            $image_saved = $image->move(storage_path('app/public/seminars/infoblocks'), md5_file($image) . '.' . $image->getClientOriginalExtension());

            $image_path = 'storage/seminars/infoblocks/' . $image_saved->getFilename();

            $infoblock->image_path = $image_path;
        }

        // Check new text.
        if( $text !== null )
        {
            // Remove old image.
            if ( Infoblock::where('text_path', $infoblock->text_path)->count() === 1 )
            {
                // @TODO: Sobald Laravel 5.3 verwendet werden kann, alles auf Storage umstellen! Hierzu kann ein symbolischer Link erstellt werden: 'php artisan storage:link'
                File::delete( $infoblock->text_path );
            }

            // Save new image.
            $text_saved = $text->move(storage_path('app/public/seminars/infoblocks'), md5_file($text) . '.' . $text->getClientOriginalExtension());

            $text_path = 'storage/seminars/infoblocks/' . $text_saved->getFilename();

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
            // @TODO: Sobald Laravel 5.3 verwendet werden kann, alles auf Storage umstellen! Hierzu kann ein symbolischer Link erstellt werden: 'php artisan storage:link'
            File::delete( $infoblock->image_path );
        }

        if ( Infoblock::where('text_path', $infoblock->text_path)->count() === 1 && $infoblock->text_path !== null )
        {
            // @TODO: Sobald Laravel 5.3 verwendet werden kann, alles auf Storage umstellen! Hierzu kann ein symbolischer Link erstellt werden: 'php artisan storage:link'
            File::delete( $infoblock->text_path );
        }

        $infoblock->delete();

    }

}
