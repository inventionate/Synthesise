<?php

class Video extends Eloquent {

	protected $table = 'videos';

	// Primary Key definieren
	protected $primaryKey ='videoname';

	// Datenbankrelationen
	public function cuepoints()
	{
		return $this->hasMany('Cuepoint','video_videoname');
	}

	public function papers()
	{
		return $this->hasMany('Paper','video_videoname');
	}

	public function notes()
	{
		return $this->hasMany('Note','video_videoname');
	}

	// QUERIES

	public static function available($videoname) 
	{

		if(self::unlockDate($videoname) <= date("Y-m-d")) {
			return true;
		}
		else {
			return false;			
		}
	}

	public static function getSection($videoname) 
	{
		return Video::find($videoname)->section;
	}

	public static function unlockDate($videoname) 
	{
		return Video::find($videoname)->available_from;
	}

	public static function finalDate($videoname) 
	{
		return Video::find($videoname)->available_to;
	}


	public static function getOnline($videoname) 
	{
		return Video::find($videoname)->online;
	}

	public static function getCurrentVideo() {

		$videodates = DB::table('videos')->where('available_from','<=',date("Y-m-d"))->orderBy('available_from','desc')->first();

		if (empty($videodates)) {
			return false;
		}
		else 
		{
			return $videodates;
		}
	}


	// RELATIONALE QUERIES

	public static function getVideos() 
	{	
		return Video::all()->take(11);
	}	

	public static function getPapers($videoname) 
	{	
		return Video::findOrFail($videoname)->papers;
	}

	public static function getFlagnames($videoname)
	{
		return Video::findOrFail($videoname)->cuepoints->lists('content');
	}


	public static function getCuepoints($videoname)
	{		
		return Video::findOrFail($videoname)->cuepoints;
	}


	public static function getFirstCuepointId($videoname) 
	{
		return Video::find($videoname)->cuepoints->first()->id;		
	}


	public static function getAllFlagnames($videoname)
	{
		$cuepoints = Video::find($videoname)->cuepoints;


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
		$title = 'Fähnchen zu ' . $videoname;
		$html = $meta .'<h1>' . $title . '</h1>';
		$html .= '<div id="header"><p>Erziehungswissenschaftliche Grundfragen pädagogischen Denkens und Handelns – WS 2013/2014 – PH Karlsruhe</p></div>';
		$html .= '<div id="footer"><p>Seite <span class="pagenum"></span></p></div>';
		foreach ($cuepoints as $cuepoint) {
			$html .= '<h2 style="height:250px;">' . $cuepoint->content . '</h2>';
		}
		$html .= '</body></html>';

		return $html;
	}

}
