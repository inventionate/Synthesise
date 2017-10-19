<?php

namespace Synthesise\Repositories\Message;

use Illuminate\Database\Eloquent\Model;

use Synthesise\Message;
use Storage;

/**
 * Faq Repository mit Queries und Logik.
 */
class MessageRepository implements MessageInterface
{

    /**
     * Eine neue Nachricht anlegen.
     *
     * @param     string    $seminar_name
     * @param     string    $title
     * @param     string    $content
     * @param     string    $colour
     * @param     string    $file_path
     */
      public function store($seminar_name, $title, $content, $colour, $file_path)
      {

        $message = new Message;

        $message->seminar_name = $seminar_name;

        $message->title = $title;

        $message->content = $content;

        $message->colour = $colour;

        $message->file_path = $file_path;

        $message->save();

      }

  /**
   * Eine Nachricht aktualisieren (Inhalt und Typ).
   *
   * @param     string    $title
   * @param     string    $content
   * @param     string    $colour
   * @param     string    $file_path
   */
  public function update($id, $title, $content, $colour, $file_path)
  {
    // Zu aktualiserende Nachricht abfragen
    $message = Message::findOrFail($id);

    // Neue Werte zuweisen
    $message->title = $title;
    $message->content = $content;
    $message->colour = $colour;

    if( $file_path !== null )
    {
        // Remove old image.
        if ( Message::where('file_path', $message->file_path)->count() === 1 )
        {
            Storage::delete( $message->file_path );
        }

        // Save new image.
        $message->file_path = $file_path;
    }

    // Aktualisierte Notiz speichern
    $message->save();
  }

  /**
   * Nachricht löschen.
   *
   * @param     int $id
   */
  public function delete($id)
  {
    // Zu löschende Nachricht abfragen
    $message = Message::findOrFail($id);

    if (Message::where('file_path', $message->file_path)->count() === 1 && $message->file_path !== null)
    {

        Storage::delete( $message->file_path );

    }
    // Nachricht löschen
    $message->delete();
  }

}
