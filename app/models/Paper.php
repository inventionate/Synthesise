<?php

class Paper extends \Eloquent {
	protected $fillable = [];
	
	public function notes()
	{
		return $this->hasMany('Note');
	}
	
}