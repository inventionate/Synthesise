<?php

class LectionController extends \BaseController {

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
	 * GET /online-lektionen/{videoname}
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
		$videopath = asset('video/'.strtolower(str_replace(array(' ','?','ä','ö','ü','ß','-','–',':',',','»','«','É','!','.','Ä','Ö','Ü'),array('_','','ae','oe','ue','ss','_','und','','','','','e','','','ae','oe','ue'),$videoname)));

		// Standardausgabe VIEW -----------------------------------------
		return View::make('lection')
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
	 * GET /online-lektionen/{videoname}/getnotespdf
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
	 * GET /online-lektionen/{videoname}/getflagnames
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
	 * GET /online-lektionen/{videoname}/getflags
	 *
	 * @param     string $videoname
	 * @return    array
	 * @todo 			Überprüfen ob via JSON übertragen wird und ggf. umstellen.
	 */
	public function getFlags($videoname)
	{
    $videoname = urldecode($videoname);
		// Fähnchen der Cuepoints abfragen
		$flagnames = Video::getFlagnames($videoname);

		if(Request::ajax())
		{
			return $flagnames;
			// @TODO Überprüfen ob return "success" benötigt wird.
			// return "success";
		}
	}

	/**
	 * Die Notizen für die Lektion ausgeben.
	 * GET /online-lektionen/{videoname}/getnotes
	 *
	 * @param     string $videoname
	 * @return    string Die Notiz zu dem jeweiligen Fähnchen.
	 */
	public function getNotes($videoname)
	{
        $videoname = urldecode($videoname);
		// Ajax Request verarbeiten
		if(Request::ajax())
		{
			// Cupoint ID Start bestimmen, indem die erste Zeile mit dem Videonamen ausgelesen wird
			$cuepointId = $this->currentCuepoint($videoname, Input::get('cuepointNumber'));
			// Inhalte abfragen
			$cuepointnotes = Note::getContent(Auth::user()->id,$cuepointId);
			// Notizen zurückmelden
			return $cuepointnotes;
		}
	}

	/**
	 * Eine neue Notiz zu dem Fähnchen einer Lektion speichern.
	 * POST /online-lektionen/{videoname}/postnotes
	 *
	 * @param 		string $videoname
	 * @return    string "success"
	 */
	public function postNotes($videoname)
	{
        $videoname = urldecode($videoname);
		if(Request::ajax())
		{
			// Cupoint ID Start bestimmen, indem die erste Zeile mit dem Videonamen ausgelesen wird
			$cuepointId = $this->currentCuepoint($videoname, Input::get('cuepointNumber'));
			// Geänderter oder neuer Inhalt abfragen
			$noteupdate = Input::get('note');
			// Note updaten
			Note::updateContent($noteupdate,Auth::user()->id,$cuepointId,$videoname);
			// Erfolg zurückmelden
			return "success";
		}
	}

}
