<?php namespace Synthesise\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Synthesise\Http\Requests\NoteRequest;
use Synthesise\Http\Requests\NoteUpdateRequest;
use Synthesise\Repositories\Facades\User;
use Synthesise\Repositories\Facades\Video;
use Synthesise\Repositories\Facades\Note;
use Synthesise\Extensions\Facades\Parser;
use Thujohn\Pdf\PdfFacade as PDF;

class LectionController extends Controller {

	/**
	 * Aktuellen Cuepoint zurückgeben.
	 *
	 * @param     string $videoname
	 * @return    string $cuepointNumber
	 */
	private function currentCuepoint($videoname, $cuepointNumber)
	{
        $videoname = urldecode($videoname);
		// Cupoint ID Start bestimmen, indem die erste Zeile mit dem Videonamen ausgelesen wird
		return Video::getFirstCuepointId($videoname) + preg_replace( '/[^0-9]/', '', $cuepointNumber );
	}

	/**
	 * Online-Lektion anzeigen.
	 *
	 * @param 		string $videoname
	 * @return    View
	 */
	public function index($videoname)
	{
      // @TODO Parameter Hotfix optimitzation
      $videoname = urldecode($videoname);

		// CUEPOINT ANZEIGE ---------------------------------------------

		// Position der Cuepoints abfragen
		$cuepoints = Video::getCuepoints($videoname);

		// Gruppenzugehörigkeit des Videos abfragen
		$section = Video::getSection($videoname);

		// Angehängte Texte abfragen
		$papers = Video::getPapers($videoname);

		// Alle Videos abfragen
		$videos = Video::getVideos();

		// Verfügbarkeit des Videos abfragen
		$available = Video::available($videoname);

		// Rolle des Benutzers abfragen
		$role = Auth::user()->role;

		// Onlinestatus des Videos abfragen
		$online = Video::getOnline($videoname);

		// Videopfad generieren
		$videopath = asset('video/' . Parser::normalizeName($videoname));

		// Standardausgabe VIEW -----------------------------------------
		return view('lection')
							->with('available', $available)
							->with('role', $role)
							->with('cuepoints', $cuepoints)
							->with('online', $online)
							->with('section',$section)
							->with('videos',$videos)
							->with('papers',$papers)
							->with('videoname', $videoname)
							->with('videopath', $videopath);

	}

	/**
	 * Notizen für die Lektion als PDF anzeigen.
	 *
	 * @param     string $videoname
	 * @return    PDF
	 */
	public function getNotesPDF($videoname)
	{
    $videoname = urldecode($videoname);
		$allnotes = User::getAllNotes(Auth::user()->id, $videoname);
		return PDF::load($allnotes, 'A4', 'portrait')->download('Meine Notizen für ' . $videoname);
	}

	/**
	 * Flagnames (Fähnchen) für die Lektion als PDF anzeigen.
	 *
	 * @param     string $videoname
	 * @return    PDF
	 */
	public function getFlagnamesPDF($videoname)
	{
	  $videoname = urldecode($videoname);
    $allflagnames = Video::getAllFlagnames($videoname);
		return PDF::load($allflagnames, 'A4', 'portrait')->download('Die Fähnchen für ' . $videoname);
	}

	/**
	 * Die Fähcnhen für die Lektion ausgeben.
	 *
	 * @param     string $videoname
	 * @return    array
	 * @todo 			Überprüfen ob via JSON übertragen wird und ggf. umstellen.
	 */
	public function getFlags($videoname, Request $request)
	{
    $videoname = urldecode($videoname);
		// Fähnchen der Cuepoints abfragen
		$flagnames = Video::getFlagnames($videoname);

		if ( $request->ajax() )
		{
			return $flagnames;
		}
	}

	/**
	 * Die Notizen für die Lektion ausgeben.
	 *
	 * @param     string $videoname
	 * @return    string Die Notiz zu dem jeweiligen Fähnchen.
	 */
	public function getNotes($videoname, NoteRequest $request)
	{
    $videoname = urldecode($videoname);

		// Ajax Request verarbeiten
		if ( $request->ajax() )
		{
			// Cupoint ID Start bestimmen, indem die erste Zeile mit dem Videonamen ausgelesen wird
			$cuepointId = $this->currentCuepoint($videoname, $request->cuepointNumber);
			// Inhalte abfragen
			$cuepointnotes = Note::getContent(Auth::user()->id,$cuepointId);
			// Notizen zurückmelden
			return $cuepointnotes;
		}
	}

	/**
	 * Eine neue Notiz zu dem Fähnchen einer Lektion speichern.
	 *
	 * @param 		string $videoname
	 * @return    string "success"
	 */
	public function postNotes($videoname, NoteUpdateRequest $request)
	{
    $videoname = urldecode($videoname);

		if ( $request->ajax() )
		{
			// Cupoint ID Start bestimmen, indem die erste Zeile mit dem Videonamen ausgelesen wird
			$cuepointId = $this->currentCuepoint($videoname, $request->cuepointNumber);
			// Geänderter oder neuer Inhalt abfragen
			$noteupdate = $request->note;
			// Note updaten
			Note::updateContent($noteupdate,Auth::user()->id,$cuepointId,$videoname);
			// Erfolg zurückmelden
			return "success";
		}
	}

}
