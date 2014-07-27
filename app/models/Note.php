<?php

class Note extends \Eloquent {
	protected $fillable = [];
	
	public function paper()
	{
		return $this->belongsTo('Paper');
	}
	
}