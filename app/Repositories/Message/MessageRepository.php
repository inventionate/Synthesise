<?php

namespace Synthesise\Repositories\Message;

use Illuminate\Database\Eloquent\Model;

use Synthesise\Message;

/**
 * Faq Repository mit Queries und Logik.
 */
class MessageRepository implements MessageInterface
{

    /**
     * Eine neue Nachricht anlegen.
     *
     * @param     int $id
     * @param     string $message
     * @param     string $type
     */
      public function store($seminar_name, $title, $content, $colour)
      {

        $message = new Message;

        $message->seminar_name = $seminar_name;

        $message->title = $title;

        $message->content = $content;

        $message->colour = $colour;

        $message->save();

      }

  /**
   * Eine Nachricht aktualisieren (Inhalt und Typ).
   *
   * @param     int $id
   * @param     string $message
   * @param     string $type
   */
  public function update($id, $newTitle, $newContent, $newColour)
  {
    // Zu aktualiserende Nachricht abfragen
    $toBeUpdatedMessage = Message::find($id);
    // Neue Werte zuweisen
    $toBeUpdatedMessage->title = $newTitle;
    $toBeUpdatedMessage->content = $newContent;
    $toBeUpdatedMessage->colour = $newColour;
    // Aktualisierte Notiz speichern
    $toBeUpdatedMessage->save();
  }

  /**
   * Nachricht löschen.
   *
   * @param     int $id
   */
  public function delete($id)
  {
    // Zu löschende Nachricht abfragen
    $toBeDeletedMessage = Message::find($id);
    // Nachricht löschen
    $toBeDeletedMessage->delete();
  }

}
