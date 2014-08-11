<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	
	// Datenbankrelationen definieren
	public function notes()
	{
		return $this->hasMany('Note');
	}

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	
	// Gesamte Notizen ausgeben
	public static function getAllNotes($userId,$videoname) 
	{	
		// Notizen des Benutzers für das Video laden
		$notes = User::find($userId)->notes()->where('video_videoname',$videoname)->orderBy('cuepoint_id')->get();
	
		$meta = '<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /></head>
				<style>
					h1,h2,h3 {
						font-family: Helvetica;
					}
					p {
						font-family: CharisSIL;
					}
					#header {
					  position: fixed;
					  top: -25px;
					  left: 0px;
					  right: 0px;
					  text-align: right;
					  font-size: 12px;
					}
					#footer {
					  position: fixed;
					  bottom: 0px;
					  left: 0px;
					  right: 0px;
					  height: 40px;
					  text-align: right;
					  font-size: 14px;
					}
					.pagenum:before {
					  content: counter(page);
					}
				</style><body>';
		$title = 'Notizen zu ' . $videoname;
		$html = $meta .'<h1>' . $title . '</h1>';
		$html .= '<div id="header"><p>Erziehungswissenschaftliche Grundfragen pädagogischen Denkens und Handelns – WS 2013/2014 – PH Karlsruhe</p></div>';
		$html .= '<div id="footer"><p>Seite <span class="pagenum"></span></p></div>';
		foreach ($notes as $note) {
			$html .= '<h2>' . Cuepoint::find($note->cuepoint_id)->content . '</h2>';
			$html .= '<p>' . Crypt::decrypt($note->note) . '</p>';
			$html .= '<h3 style="height:250px">Ergänzungen:</h3>';
		}
		$html .= '</body></html>';
	
		return $html;
	}
	
	public static function getUsername() {
		return Auth::user()->firstname . ' ' . Auth::user()->lastname;
	}
	
	public static function getEmail() {
		return strtolower(str_replace('ka', '', Auth::user()->username)) . '@ph-karlsruhe.de';
	}

	
	/**
	 * Durchsucht die Datenbank nach einem übergebenen Nutzernamen
	 *
	 * @author Fabian Mundt <f.mundt@ph-karlsruhe.de>
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