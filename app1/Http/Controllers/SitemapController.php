<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Mainmenu;

class SitemapController extends Controller
{
	public function index()
	{

	  	$posts= Mainmenu::latest()->get();

	 dd($posts);

		  return response()->view('sitemap.index', [

		      'posts' => $posts,

		  ])->header('Content-Type', 'text/xml');

	}


}