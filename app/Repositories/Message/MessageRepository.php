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
   * Gibt alle Messages nach ihrem Aktualisierungsdatum sortiert zurück.
   *
   * @return 		array Alle Message-Einträgen.
   */
  public function getAll()
  {
      return Message::all()->sortBy('updated_at');
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

/**
 * Eine neue Nachricht anlegen.
 *
 * @param     int $id
 * @param     string $message
 * @param     string $type
 */
  //public function store($id, $title, $content, $colour)
  public function store($title, $content, $colour)
  {
    // Neue Nachrichteninstanz generieren
    $newMessage = new $this->messageModel();
    // Nachricht mit Inhalt befüllen
    //$newMessage->id = $id;
    $newMessage->title = $title;
      $newMessage->content = $content;
      $newMessage->colour = $colour;
    // Notiz speichern
    $newMessage->save();
  }
}
