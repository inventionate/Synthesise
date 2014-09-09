<?php

class Cuepoint extends \Eloquent {

	protected $fillable = [];

	protected $table = 'cuepoints';

	// Datenbankrelationen

	public function notes()
	{
		return $this->hasMany('Note');
	}

	public function video()
	{
		return $this->belongsTo('Video','video_videoname');
	}

}
