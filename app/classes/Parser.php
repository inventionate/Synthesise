<?php

class Parser 
{
	
	/**
	* Normalisiert die übergebenen URL
	*
	**/
	public static function normalizeURL($url) 
	{
		return urlencode($url);
	}
	
}