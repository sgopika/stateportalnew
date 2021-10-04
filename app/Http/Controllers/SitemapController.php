<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use DB;

use App\Story;
use Carbon\Carbon;
use App\Article;
use Illuminate\Support\Facades\Crypt;

class SitemapController extends Controller
{
    
public function index()
    {
      $articles = Article::all()->first();
      $stories = DB::table('stories')->join('documents','documents.id','stories.documents_id')
                        ->join('storyprocessings','storyprocessings.stories_id','stories.id')
                        ->select('stories.id','stories.entitle','stories.updated_at')
                        ->where('documenttypes_id',1)
                        ->where('storyprocessings.approver_status',2)->get();
      
      return response()->view('sitemap.index', [
          'articles' => $articles,
          'stories' => $stories,
          
      ])->header('Content-Type', 'text/xml');
    }


}
