<?php namespace Synthesise\Repositories\Message;

use Illuminate\Database\Eloquent\Model;

/**
 * Faq Repository mit Queries und Logik.
 */
class MessageRepository implements MessageInterface
{
  /**
   * Variable des zugrundeliegenden Eloquent Models.
   *
   */
  protected $messageModel;

  /**
   * Initziiert die Klasse $messageModel mit dem injizierten Model.
   *
   * @param     Model $message
   * @return    MessageRepository
   */
  public function __construct(Model $message)
  {
    $this->messageModel = $message;
  }

  /**
   * Gibt alle Messages nach ihrem Aktualisierungsdatum sortiert zurück.
   *
   * @return 		array Alle Message-Einträgen.
   */
  public function getAll()
  {
    return $this->messageModel->all()->sortBy('updated_at');
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
    $toBeUpdatedMessage = $this->messageModel->find($id);
    // Neue Werte zuweisen
    $toBeUpdatedMessage->title = $newTitle;
    $toBeUpdatedMessage->content = $newContent;
    $toBeUpdatedMessage->colour = $newcolour;
    // Aktualisierte Notiz speichern
    $toBeUpdatedMessage->save();
  }

  /**
   * Nachricht löschen
   *
   * @param     int $id
   */
  public function delete($id)
  {
    // Zu löschende Nachricht abfragen
    $toBeDeletedMessage = $this->messageModel->find($id);
    // Nachricht löschen
    $toBeDeletedMessage->delete();
  }

  /**
   * Eine neue Nachricht anlegen
   *
   * @param     int $id
   * @param     string $message
   * @param     string $type
   */
  public function store($title, $content, $colour)
  {
    // Neue Nachrichteninstanz generieren
    $newMessage = new $this->messageModel;
    // Nachricht mit Inhalt befüllen
    $newMessage->title = $title;
    $newMessage->content = $content;
    $newMessage->colour = $colour;
    // Notiz speichern
    $newMessage->save();
  }
}
