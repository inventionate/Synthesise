<?php
class TestCommons
{
	public static function prepareLaravel()
	{
		Artisan::call('migrate');
		Mail::pretend(true);
	}	
	
}