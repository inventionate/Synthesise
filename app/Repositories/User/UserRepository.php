<?php namespace Synthesise\Repositories\User;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Synthesise\Extensions\Facades\Parser;
use Synthesise\Cuepoint;

/**
 * User Repository mit Queries und Logik.
 */
class UserRepository implements UserInterface
{
  /**
   * Variable des zugrundeliegenden Eloquent Models.
   *
   */
  protected $userModel;

  /**
   * Initziiert die Klasse $faqModel mit dem injizierten Model.
   *
   * @param Model $faq
   * @return FaqRepository
   */
  public function __construct(Model $user)
  {
    $this->userModel = $user;
  }

  /**
   * Alle vorhandenen Notizen eines Benutzers ausgeben.
   *
   * @uses 			Parser::htmlMarkup um das HTML Markup zu generieren.
   *
   * @param    	int $userId
   * @param 		string $videoname
   * @return    string Gibt alle Notizen als HTML Markup zurück.
   */
  public function getAllNotes($userId, $videoname)
  {
    // Notizen des Benutzers für das Video laden
    $notes = $this->userModel->find($userId)->notes()->where('video_videoname',$videoname)->orderBy('cuepoint_id')->get();


    $title = 'Notizen zu ' . $videoname;

    $content = '';

    foreach ($notes as $note) {
      $content .= '<h2>' . Cuepoint::find($note->cuepoint_id)->content . '</h2>';
      $content .= '<p>' . Crypt::decrypt($note->note) . '</p>';
      $content .= '<h3 style="height:250px">Ergänzungen:</h3>';
    }

    $html = Parser::htmlMarkup($title, $content);

    return $html;
  }

  /**
   * Benutzernamen ausgeben. Setzt einen eingeloggten Benutzer voraus.
   *
   * @return    string Benutzervorname und Benutzernachname.
   */
  public function getUsername()
  {
    return Auth::user()->firstname . ' ' . Auth::user()->lastname;
  }

  /**
  * E-Mail eines eingeloggten Benutzers ausgeben. Setzt einen eingeloggten Benutzer voraus.
  *
  * @return    string E-Mail Adresse.
  */
  public function getEmail()
  {
    return strtolower(str_replace('ka', '', Auth::user()->username)) . '@ph-karlsruhe.de';
  }

  /**
   * Durchsucht die Datenbank nach einem übergebenen Nutzernamen
   *
   * @param 		string $username
   * @param 		array $columns
   * @return		string|null Benutzername oder null, falls kein passender Eintrag gefunden wurde.
   */
  public function findByUsername($username, $columns = array('*'))
  {
      if ( ! is_null($user = $this->userModel->whereUsername($username)->first($columns))) {
      return $user;
    }
    else
    {
      return null;
    }
  }
}
