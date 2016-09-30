<?php

namespace Synthesise\Http\Controllers;

use Illuminate\Http\Request;

class InfoblockController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin.teacher']);
    }

    public function update() {

    }
}
