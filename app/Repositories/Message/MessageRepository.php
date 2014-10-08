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
   * @param     Model $messahe
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

}
