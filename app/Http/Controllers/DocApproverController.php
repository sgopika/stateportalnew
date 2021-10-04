<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocApproverController extends Controller
{
    public function documentapproverhome(Request $request)
    {
    	return view('documentmoderatordashboard');
    }
}
