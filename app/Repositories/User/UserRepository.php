<?php namespace Synthesise\Repositories\User;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Synthesise\Extensions\Facades\Parser;
use Synthesise\Cuepoint;
use Synthesise\User;

/**
 * User Repository mit Queries und Logik.
 */
class UserRepository implements UserInterface
{

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
    $notes = User::find($userId)->notes()->where('video_videoname',$videoname)->orderBy('cuepoint_id')->get();


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
    // @todo E-Mail in Datenbank ablegen! Da ab sofort Studierende eine andere Adresse als Dozierende haben (noch nicht alle)!
    return substr(Auth::user()->username, 0 , -2) . '@ph-karlsruhe.de';
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
      if ( ! is_null($user = User::whereUsername($username)->first($columns))) {
      return $user;
    }
    else
    {
      return null;
    }
  }

  /**
   * Get all users.
   *
   * @return    collection all users.
   */
  public function getAll()
  {
    return User::all()->sortBy('lastname');
  }

  /**
   * Get all users by role.
   *
   * @return    collection all users.
   */
  public function getAllByRole($role)
  {
    return User::where('role', $role)->get();
  }

  /**
   * Store User.
   *
   * @param 		string username
   * @param 		string role
   */
  public function store($username, $role)
  {

    // Neue Nachrichteninstanz generieren
    $user = new User;

    $user->username = $username;
    $user->role = $role;

    $user->save();

  }

  /**
   * Delete User.
   *
   * @param         int $id
   *
   */
  public function destroy($id)
  {
      // Find and delete User.
      User::find($id)->delete();
  }

  /**
   * Delete many Users.
   *
   * @param         int $ids
   *
   */
  public function destroyMany($ids)
  {
      // Find and delete Users.
      User::whereIn('id', $ids)->delete();
  }

  /**
   * Delete all User of a specific role.
   *
   * @param         int $id
   *
   */
  public function destroyAll($role, $except_ids)
  {
    // Find and delete Users.
    User::where('role', $role)->whereNotIn('id', [$except_ids])->delete();
  }

}
