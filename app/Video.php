<?php namespace Synthesise;

use Illuminate\Database\Eloquent\Model;
use Synthesise\Extensions\Facades\Parser;
use Illuminate\Support\Facades\DB;

class Video extends Model {

	/**
	 * Die Datenbanktabelle des Models.
	 *
	 * @var 		string
	 */
	protected $table = 'videos';

	/**
	 * Die veränderbaren Tabellenspalten.
	 *
	 * @var 		array
	 */
	protected $fillable = ['videoname','section','author','online','available_from','available_to'];

	/**
	* Hauptschlüssel festlegen um die ORM Suche zu vereinfachen.
	*
	* @var 		string
	*/
	protected $primaryKey ='videoname';

	/**
	 * Datenbankrelation Video hat viele Cuepoints.
	 *
	 */
	public function cuepoints()
	{
		return $this->hasMany('Synthesise\Cuepoint','video_videoname');
	}

	/**
	 * Datenbankrelation Video hat viele Papers.
	 *
	 */
	public function papers()
	{
		return $this->hasMany('Synthesise\Paper','video_videoname');
	}

	/**
	 * Datenbankrelation Video hat viele Notes.
	 *
	 */
	public function notes()
	{
		return $this->hasMany('Synthesise\Note','video_videoname');
	}


	/**
	 * Checkt die Verfügbarkeit eines Videos.
	 *
	 * @param 		string $videoname
	 * @return    true|false Gibt wahr oder falsch bzgl. der Verfügbarkeit zurück.
	 */
	public static function available($videoname)
	{

		if(self::unlockDate($videoname) <= date("Y-m-d")) {
			return true;
		}
		else {
			return false;
		}
	}

	/**
	 * Fragt die Sektion eines Videos ab.
	 *
	 * @param     string $videoname
	 * @return    string Aktuelle Sektion.
	 */
	public static function getSection($videoname)
	{
		return Video::find($videoname)->section;
	}
	/**
	 * Fragt ab ab welchem Datum das Video freigeschaltet ist.
	 *
	 * @param     string $videoname
	 * @return    string Datum ab wann das Video verfügbar ist.
	 */
	public static function unlockDate($videoname)
	{
		return Video::find($videoname)->available_from;
	}

	/**
	 * Fragt ab bis zu welchem Datum das Video freigeschaltet ist.
	 *
	 * @param     string $videoname
	 * @return    string Datum bis wann das Video verfügbar ist.
	 */
	public static function finalDate($videoname)
	{
		return Video::find($videoname)->available_to;
	}

	/**
	 * Onlinestatus abfragen.
	 *
	 * @param     string $videoname
	 * @return    true|false
	 */
	public static function getOnline($videoname)
	{
		return Video::find($videoname)->online;
	}

	/**
	 * Das aktuelle Video abfragen.
	 *
	 * @return    array|false Gibt entweder das aktuelle Video oder false zurück.
	 */
	public static function getCurrentVideo() {

		$video = DB::table('videos')->where('available_from','<=',date("Y-m-d"))->orderBy('available_from','desc')->first();

		if (empty($video)) {
			return false;
		}
		else
		{
			return $video;
		}
	}

	/**
	 * Gibt alle Videos zurück
	 *
	 * @return    array Alle Videos.
	 * @todo 			Verallgemeinern, da auf 11 Videos zugeschnitten. Statt ->take(11) eher ->all().
	 */
	public static function getVideos()
	{
		return Video::all()->take(11);
	}

	/**
	 * Gibt die zu einem Video zugehörigen Papers aus.
	 *
	 * @param     string $videoname
	 * @return    array
	 */
	public static function getPapers($videoname)
	{
		return Video::findOrFail($videoname)->papers;
	}

	/**
	 * Gibt die zu einem Video zugehörigen Fähncheninhalte aus.
	 *
	 * @param     string $videoname
	 * @return    array
	 */
	public static function getFlagnames($videoname)
	{
		return Video::findOrFail($videoname)->cuepoints->lists('content');
	}

	/**
	 * Gibt die zu einem Video zugehörigen Cuepoints (Zeitpunkte) aus.
	 *
	 * @param     string $videoname
	 * @return    array
	 */
	public static function getCuepoints($videoname)
	{
		return Video::findOrFail($videoname)->cuepoints;
	}

	/**
	 * Gibt die ID des ersten Cuepoints eines Videos aus.
	 *
	 * @param     string $videoname
	 * @return    int
	 */
	public static function getFirstCuepointId($videoname)
	{
		return Video::find($videoname)->cuepoints->first()->id;
	}

	/**
	 * Gibt alle Fähncheninhalte als HTML aus.
	 *
	 * @uses 			Parser::htmlMarkup um das HTML Markup zu generieren.
	 *
	 * @param     string $videoname
	 * @return    string HTML Markup aller Fähncheninhalte.
	 */
	public static function getAllFlagnamesAsHTML($videoname)
	{
		$cuepoints = Video::find($videoname)->cuepoints;

		$content = '';

		foreach ($cuepoints as $cuepoint)
		{
			$content .= '<h2 style="height:250px;">' . $cuepoint->content . '</h2>';
		}

		return Parser::htmlMarkup($videoname, $content);

	}

}
