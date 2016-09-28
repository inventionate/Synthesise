<?php namespace Synthesise\Repositories\User;

use Illuminate\Database\Eloquent\Model;

use Synthesise\Cuepoint;
use Synthesise\User;

use Crypt;
use Auth;
use Parser;
use Excel;
use Hash;

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
   * @param 		file users
   */
  public function exportUsernamesOfFile($users)
  {

      $usernames = array_flatten(Excel::load($users, function($reader) {
          // Getting all usernames
          $reader->select(['nutzernamen']);
      })->toArray());

      return $usernames;

  }

  /**
   * Store User.
   *
   * @param 	string username
   * @param 	string role
   * @param 	string firstname
   * @param 	string lastname
   * @param 	string password
   * @param     array seminar_names
   */
  public function store($username, $role, $firstname, $lastname, $password, $seminar_names)
  {

    // Neue Nachrichteninstanz generieren
    $user = new User;

    $user->username = $username;
    $user->role = $role;

    // Diese Werte müssen nicht zwingend gesetzt werden, weil sie per LDAP eingetragen werden.
    // @TODO: Bei der Abstraktion des Benutzersystems berücksichtigen!
    if ( $firstname !== null ) {
        $user->firstname = $firstname;
    }
    if ( $lastname !== null ) {
        $user->lastname = $lastname;
    }
    if ( $password !== null ) {
        $user->password = $password;
    }

    $user->save();

    // Attach to seminar.

    foreach ( $seminar_names as $seminar_name )
    {
        $user->seminars()->attach($seminar_name);
    }

  }

  /**
   * Update User.
   *
   * @param 		string username
   * @param 		string role
   * @param 		string firstname
   * @param 		string lastname
   * @param 		string password
   */
  public function update($id, $username, $role, $firstname, $lastname, $password)
  {

    // Find user to update.
    $toBeUpdatedUser = User::find($id);

    // New Values.
    $toBeUpdatedUser->username = $username;
    $toBeUpdatedUser->role = $role;
    $toBeUpdatedUser->firstname = $firstname;
    $toBeUpdatedUser->lastname = $lastname;

    // Nur neu setzen, wenn ein anderes Passwort gewählt wurde.
    if( !Hash::check($toBeUpdatedUser->password, $password) ) {
        $toBeUpdatedUser->password = $password;
    }

    // Save User.
    $toBeUpdatedUser->save();

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
