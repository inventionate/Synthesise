<?php

class BaseController extends Controller {

	/**
	 * Global Variables
	 *
	 * @var mobile
	 * @var tablet
	 */
	
	public function __construct() 
	{
		// Mobile detection
	
		View::share('mobile', Agent::isMobile() );
		View::share('tablet', Agent::isTablet() );
		
	}


	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}