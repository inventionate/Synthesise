<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * Die Datenbanktabelle des Models.
	 *
	 * @var 		string
	 */
	protected $table = 'users';

	/**
	* Die veränderbaren Tabellenspalten.
	*
	* @var 		array
	*/
	protected $fillable = ['username','password','firstname','lastname','role','permissions'];

	/**
	 * Datenbankrelation User hat viele Notes.
	 *
	 */
	public function notes()
	{
		return $this->hasMany('Note');
	}

	/**
	 * Attribute die von der JSON Form des Models ausgeschlossen werden.
	 *
	 * @var 		array
	 */
	protected $hidden = array('password', 'remember_token');

	/**
	 * Alle vorhandenen Notizen eines Benutzers ausgeben.
	 *
	 * @param    	int $userId
	 * @param 		string $videoname
	 * @return    string Gibt alle Notizen als HTML Markup zurück.
	 */
	public static function getAllNotes($userId, $videoname)
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
	public static function getUsername() {
		return Auth::user()->firstname . ' ' . Auth::user()->lastname;
	}

	/**
	* E-Mail eines eingeloggten Benutzers ausgeben. Setzt einen eingeloggten Benutzer voraus.
	*
	* @return    string E-Mail Adresse.
	*/
	public static function getEmail() {
		return strtolower(str_replace('ka', '', Auth::user()->username)) . '@ph-karlsruhe.de';
	}

	/**
	 * Durchsucht die Datenbank nach einem übergebenen Nutzernamen
	 *
	 * @param 		string $username
	 * @param 		array $columns
	 * @return		string|null Benutzername oder null, falls kein passender Eintrag gefunden wurde.
	 */
	public static function findByUsername($username, $columns = array('*'))
	{
		if ( ! is_null($user = static::whereUsername($username)->first($columns))) {
			return $user;
		}
		else
		{
			return null;
		}
	}



}
