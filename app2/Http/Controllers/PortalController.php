<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;


use Auth;
use Session;
use DB;
use App\Mainmenu;
use App\Article;
use App\Appdepartment;
use Spatie\Searchable\Search;
use Spatie\Searchable\ModelSearchAspect;
use App\Articlemalayalam;
use App\Appdepartmentmalayalam;


class PortalController extends Controller
{
    public function index()
    {
        if (!Session::has('bilingual')) {
            Session::put('bilingual', 2);
        }
        $sessionbil = Session::get('bilingual');
        $submenu = array();

        if ($sessionbil == 1) {
            $mainmenu = DB::table('mainmenus')->where('status', 1)->select('id', 'file', 'entitle as title', 'menulinktypes_id', 'updated_at')->orderBy('orderno','asc')->get();
            foreach ($mainmenu as $mainmenus) {
                $submenu[] = DB::table('submenus')->where('parentmenu', $mainmenus->id)->select('id', 'file', 'entitle as title', 'menulinktypes_id', 'parentmenu', 'updated_at')->get();
            }

            $article = DB::table('articles')->where('status', 1)->where('approve_status', 2)->select('id', 'poster', 'alt', 'entitle as title', 'ensubtitle as subtitle', 'enauthor as author', 'enbrief as brief', 'updated_at')->get();
        } else {
            $mainmenu = DB::table('mainmenus')->where('status', 1)->select('id', 'file', 'entitle as title', 'menulinktypes_id', 'updated_at')->orderBy('orderno','asc')->get();
            foreach ($mainmenu as $mainmenus) {
                $submenu[] = DB::table('submenus')->where('parentmenu', $mainmenus->id)->select('id', 'file', 'maltitle as title', 'menulinktypes_id', 'parentmenu', 'updated_at')->get();
            }

            $article = DB::table('articles')->where('status', 1)->where('approve_status', 2)->select('id', 'poster', 'alt', 'maltitle as title', 'malsubtitle as subtitle', 'malauthor as author', 'malbrief as brief', 'updated_at')->get();
        }




        return response()->view('sitemap.index', [

            'mainmenu' => $mainmenu,
            'submenu'  => $submenu,
            'article'  => $article

        ])->header('Content-Type', 'text/xml');
    }
    public function mainlogin(Request $request)
    {
        if (!Session::has('bilingual')) {
            Session::put('bilingual', 2);
        }
        $sessionbil = Session::get('bilingual');

        return view('auth.mainlogin', compact('sessionbil'));
    }
    public function mainlogin2(Request $request)
    {
        if (!Session::has('bilingual')) {
            Session::put('bilingual', 1);
        }
        $sessionbil = Session::get('bilingual');

        return view('auth.mainlogin2', compact('sessionbil'));
    }

    public function setbilingualval(Request $request)
    {

        if ($request->ajax()) {
            Session::forget('bilingual');
            Session::put('bilingual', 1);

            return response()->json(['success' => 'successfully set']);
        }
    }

    public function setbilingualvalmal(Request $request)
    {

        if ($request->ajax()) {
            Session::forget('bilingual');
            Session::put('bilingual', 2);

            return response()->json(['success' => 'successfully set']);
        }
    }


    public function setvalueshomepage(Request $request)
    {
        if ($request->ajax()) {
            if (!Session::has('bilingual')) {
                Session::put('bilingual', 2);
            }
            $sessionbil = Session::get('bilingual');
            $siteupdated = DB::table('sitesettings')->where('entitle', 'Last Updated')->where('status', 1)->select(DB::raw('DATE_FORMAT(titlevalues, " %d-%b-%Y %T") as titlevalues'))->first();

            if ($sessionbil == 1) {

                $logo = DB::table('logos')->where('status', 1)->where('logotype', 1)->select('file')->first();
                $title = DB::table('titles')->where('status', 1)->select('entitle as title', 'ensubtitle as subtitle')->first();
                $short = DB::table('shortalerts')->where('status', 1)->select('entitle as title', 'encontent as content')->orderby('id','desc')->first();
                $long = DB::table('longalerts')->where('status', 1)->select('entitle as title', 'ensubtitle as subtitle', 'encontent as content', 'enbrief as brief')->first();
                $media = DB::table('mediaalerts')->where('status', 1)->select('entitle as title', 'ensubtitle as subtitle', 'encontent as content', 'enbrief as brief', 'file')->first();
                $banner = DB::table('banners')->where('status', 1)->select('file', 'entitle as title', 'ensubtitle as subtitle')->limit(5)->get();
                $widget = DB::table('widgetlinks')->where('status', 1)->select('fileval', 'file', 'alt', 'entooltip as tooltip', 'entitle as title', 'ensubtitle as subtitle', 'encontent as content', 'menulinktypes_id','icon')->limit(6)->get();
                $deptintro = DB::table('deptintroductions')->where('status', 1)->select('id', 'file1', 'alt1', 'enuser1 as user1', 'endesg1 as desg1', 'file2', 'alt2', 'enuser2 as user2', 'endesg2 as desg2', 'entooltip as tooltip', 'entitle as title', 'ensubtitle as subtitle', 'enbrief as brief', 'encontent as content')->first();
                $gallery = DB::table('galleries')->where('status', 1)->where('approve_status', 2)->select('id', 'poster', 'alt', 'entitle as title', 'entooltip as tooltip')->get();
                $activity = DB::table('activities')->where('status', 1)->where('approve_status', 2)->select('id', 'entitle as title', 'startdate')->get();
                $articlelatest = DB::table('articles')->where('status', 1)->where('approve_status', 2)->where('homepagestatus', 1)->select('id', 'poster', 'alt', 'entitle as title', 'ensubtitle as subtitle', 'enauthor as author', 'enbrief as brief', 'encontent as content', 'created_at')->orderBy('id', 'desc')->first();

                $article = DB::table('articles')->where('status', 1)->where('approve_status', 2)->where('id', '!=', $articlelatest->id)->select('id', 'poster', 'alt', 'entitle as title', 'ensubtitle as subtitle', 'enauthor as author', 'enbrief as brief')->get();
                $newsletter = DB::table('newsletters')->where('status', 1)->select('id', 'poster', 'alt', 'entitle as title', 'entooltip as tooltip')->orderBy('id', 'desc')->first();
                $address = DB::table('componentarticles')->where('status', 1)->where('components_id', 12)->select('encontent as content', 'entitle as title', 'maplinks')->first();
                $socialmedia = DB::table('socialmedia')->where('status', 1)->select('url', 'iconclass', 'entitle as title', 'entooltip as tooltip')->get();
                $footermenus = DB::table('footermenus')->where('status', 1)->select('id', 'file', 'alt', 'entitle as title', 'encontent as content')->get();
                $footerlinks = DB::table('footerlinks')->where('status', 1)->select('id', 'url', 'entitle as title', 'entooltip as tooltip', 'iconclass')->get();
                $articlerecent = DB::table('articles')->where('status', 1)->where('approve_status', 2)->where('components_id', 22)->where('homepagestatus', 1)->where('id', '!=', $articlelatest->id)->select('id', 'poster', 'alt', 'entitle as title', 'ensubtitle as subtitle', 'enauthor as author', 'enbrief as brief', 'encontent as content','created_at', 'homepagestatus')->orderBy('id', 'desc')->limit(3)->get();

                // $mainmenu = DB::table('mainmenus')->where('status', 1)->select('id', 'file', 'entitle as title', 'menulinktypes_id', 'entooltip as tooltip')->get();
                // $mainmenu1 = Mainmenu::with('submenus:id,entitle as title,parentmenu,menulinktypes_id,file,entitle as maintitle')->where('status', 1)->select('id', 'file', 'entitle as title', 'menulinktypes_id', 'entooltip as tooltip')->orderBy('orderno','asc')->get();

                $mainmenu1 = Mainmenu::with(['submenus' => function($q){
                    $q->where('status',1)
                    ->select('id','entitle as title','parentmenu','menulinktypes_id','file','entitle as maintitle');
                }])->where('status', 1)->select('id', 'file', 'entitle as title', 'menulinktypes_id', 'entooltip as tooltip')->orderBy('orderno','asc')->get();
         

                foreach ($mainmenu1 as $key => $result) {

                    $subMenus = array();
                    if ($result->submenus) {
                        foreach ($result->submenus as $key1 => $subResult) {
                            $subMenus[$key1] = [
                                'id' => $subResult->id,
                                'file' => $subResult->file,
                                'title' => $subResult->title,
                                'menulinktypes_id' => $subResult->menulinktypes_id,
                                'tooltip' => $subResult->tooltip,
                                'encsubid' => Crypt::encrypt($subResult->id),
                                'enfile' => Crypt::encrypt($subResult->file),
                            ];
                        }
                    }

                    $mainmenu[$key] = [
                        'id' => $result->id,
                        'file' => $result->file,
                        'title' => $result->title,
                        'menulinktypes_id' => $result->menulinktypes_id,
                        'tooltip' => $result->tooltip,
                        'sub_menus' => $subMenus,
                        'mainencid' => Crypt::encrypt($result->id),
                    ];
                }

                $livestream = DB::table('livestreamings')->where('status', 1)->select('id', 'url', 'entitle as title')->first();
                $footer = DB::table('footers')->where('status', 1)->select('id', 'entitle as title', 'ensubtitle as subtitle', 'iconclass')->orderBy('id', 'asc')->first();
                $whatsnew = DB::table('componentarticles')->where('components_id',3)->where('status', 1)->select('id', 'entitle as title', 'ensubtitle as subtitle', 'encontent as content', 'iconclass')->orderBy('updated_at', 'desc')->limit(8)->get();
                $statelogo =  DB::table('logos')->where('status', 1)->where('logotype', 3)->select('file', 'url', 'entooltip as tooltip')->get();
                $indialogo =  DB::table('logos')->where('status', 1)->where('logotype', 4)->select('file', 'url', 'entooltip as tooltip')->get();
                $footerlogo =  DB::table('logos')->where('status', 1)->where('logotype', 2)->select('file', 'url', 'entooltip as tooltip')->get();
                $toolmsg = "This will open an external website";
                $sitecontrollabels = DB::table('sitecontrollabels')->where('status', 1)->select('entitle as title')->orderBy('id', 'asc')->get();
            } else {


                $logo = DB::table('logos')->where('status', 1)->where('logotype', 1)->skip('1')->select('file')->first();
                $title = DB::table('titles')->where('status', 1)->select('maltitle as title', 'malsubtitle as subtitle')->first();
                $short = DB::table('shortalerts')->where('status', 1)->select('maltitle as title', 'malcontent as content')->orderby('id','desc')->first();
                $long = DB::table('longalerts')->where('status', 1)->select('maltitle as title', 'malsubtitle as subtitle', 'malcontent as content', 'malbrief as brief')->first();
                $media = DB::table('mediaalerts')->where('status', 1)->select('maltitle as title', 'malsubtitle as subtitle', 'malcontent as content', 'malbrief as brief', 'file')->first();
                $banner = DB::table('banners')->where('status', 1)->select('file', 'maltitle as title', 'malsubtitle as subtitle')->limit(5)->get();
                $widget =  DB::table('widgetlinks')->where('status', 1)->select('fileval', 'file', 'alt', 'maltooltip as tooltip', 'maltitle as title', 'malsubtitle as subtitle', 'malcontent as content', 'menulinktypes_id','icon')->limit(6)->get();
                $deptintro = DB::table('deptintroductions')->where('status', 1)->select('id', 'file1', 'alt1', 'maluser1 as user1', 'maldesg1 as desg1', 'file2', 'alt2', 'maluser2 as user2', 'maldesg2 as desg2', 'maltooltip as tooltip', 'maltitle as title', 'malsubtitle as subtitle', 'malbrief as brief', 'malcontent as content')->first();
                $gallery = DB::table('galleries')->where('status', 1)->where('approve_status', 2)->select('id', 'poster', 'alt', 'maltitle as title', 'maltooltip as tooltip')->get();
                $activity = DB::table('activities')->where('status', 1)->where('approve_status', 2)->select('id', 'maltitle as title', 'startdate')->get();
                $articlelatest = DB::table('articles')->where('status', 1)->where('approve_status', 2)->where('homepagestatus', 1)->select('id', 'poster', 'alt', 'maltitle as title', 'malsubtitle as subtitle', 'malauthor as author', 'malbrief as brief', 'malcontent as content','created_at')->orderBy('id', 'desc')->first();
                $article = DB::table('articles')->where('status', 1)->where('approve_status', 2)->where('id', '!=', $articlelatest->id)->select('id', 'poster', 'alt', 'maltitle as title', 'malsubtitle as subtitle', 'malauthor as author', 'malbrief as brief')->get();
                $newsletter = DB::table('newsletters')->where('status', 1)->select('id', 'poster', 'alt', 'maltitle as title', 'maltooltip as tooltip')->orderBy('id', 'desc')->first();
                $address = DB::table('componentarticles')->where('status', 1)->where('components_id', 12)->select('malcontent as content', 'maltitle as title', 'maplinks')->first();
                $socialmedia = DB::table('socialmedia')->where('status', 1)->select('url', 'iconclass', 'maltitle as title', 'maltooltip as tooltip')->get();
                $footermenus = DB::table('footermenus')->where('status', 1)->select('id', 'file', 'alt', 'maltitle as title', 'malcontent as content')->get();
                $footerlinks = DB::table('footerlinks')->where('status', 1)->select('id', 'url', 'maltitle as title', 'maltooltip as tooltip', 'iconclass')->get();
                $articlerecent = DB::table('articles')->where('status', 1)->where('approve_status', 2)->where('components_id', 22)->where('homepagestatus', 1)->where('id', '!=', $articlelatest->id)->select('id', 'poster', 'alt', 'maltitle as title', 'malsubtitle as subtitle', 'malauthor as author', 'malbrief as brief', 'malcontent as content', 'created_at', 'homepagestatus')->orderBy('id', 'desc')->limit(3)->get();
                // $mainmenu = DB::table('mainmenus')->where('status', 1)->select('id', 'file', 'maltitle as title', 'menulinktypes_id', 'maltooltip as tooltip')->get();

                // $mainmenu1 = Mainmenu::with('submenus:id,maltitle as title,parentmenu,menulinktypes_id,file,entitle as maintitle')->where('status', 1)->select('id', 'file', 'maltitle as title', 'menulinktypes_id', 'entooltip as tooltip')->orderBy('orderno','asc')->get();

                $mainmenu1 = Mainmenu::with(['submenus' => function($q){
                    $q->where('status',1)
                    ->select('id','maltitle as title','parentmenu','menulinktypes_id','file','maltitle as maintitle');
                }])->where('status', 1)->select('id', 'file', 'maltitle as title', 'menulinktypes_id', 'maltooltip as tooltip')->orderBy('orderno','asc')->get();

                foreach ($mainmenu1 as $key => $result) {

                    $subMenus = array();
                    if ($result->submenus) {
                        foreach ($result->submenus as $key1 => $subResult) {
                            $subMenus[$key1] = [
                                'id' => $subResult->id,
                                'file' => $subResult->file,
                                'title' => $subResult->title,
                                'menulinktypes_id' => $subResult->menulinktypes_id,
                                'tooltip' => $subResult->tooltip,
                                'encsubid' => Crypt::encrypt($subResult->id),
                                'enfile' => Crypt::encrypt($subResult->file),
                            ];
                        }
                    }

                    $mainmenu[$key] = [
                        'id' => $result->id,
                        'file' => $result->file,
                        'title' => $result->title,
                        'menulinktypes_id' => $result->menulinktypes_id,
                        'tooltip' => $result->tooltip,
                        'sub_menus' => $subMenus,
                        'mainencid' => Crypt::encrypt($result->id),
                    ];
                }

                $livestream = DB::table('livestreamings')->where('status', 1)->select('id', 'url', 'maltitle as title')->first();
                $footer = DB::table('footers')->where('status', 1)->select('id', 'maltitle as title', 'malsubtitle as subtitle', 'iconclass')->orderBy('id', 'asc')->first();
                $whatsnew = DB::table('componentarticles')->where('components_id',3)->where('status', 1)->select('id', 'maltitle as title', 'malsubtitle as subtitle', 'malcontent as content', 'iconclass')->orderBy('updated_at', 'desc')->limit(8)->get();
                $statelogo =  DB::table('logos')->where('status', 1)->where('logotype', 3)->select('file', 'url', 'maltooltip as tooltip')->get();
                $indialogo =  DB::table('logos')->where('status', 1)->where('logotype', 4)->select('file', 'url', 'maltooltip as tooltip')->get();
                $footerlogo =  DB::table('logos')->where('status', 1)->where('logotype', 2)->select('file', 'url', 'maltooltip as tooltip')->get();
                $toolmsg = "ഇത് ഒരു പുതിയ വെബ്‌സൈറ്റ്  തുറക്കുന്നതാണ്";
                 $sitecontrollabels = DB::table('sitecontrollabels')->where('status', 1)->select('maltitle as title')->orderBy('id', 'asc')->get();
            }

            
            return response()->json(['logo' => $logo, 'title' => $title, 'short' => $short, 'long' => $long, 'media' => $media, 'banner' => $banner, 'widget' => $widget, 'deptintro' => $deptintro, 'gallery' => $gallery, 'activity' => $activity, 'articlelatest' => $articlelatest, 'article' => $article, 'newsletter' => $newsletter, 'address' => $address, 'socialmedia' => $socialmedia, 'footermenus' => $footermenus, 'footerlinks' => $footerlinks, 'mainmenu' => $mainmenu, 'livestream' => $livestream, 'statelogo' => $statelogo, 'indialogo' => $indialogo, 'footer' => $footer, 'footerlogo' => $footerlogo, 'whatsnew' => $whatsnew, 'toolmsg' => $toolmsg, 'sessionbil' => $sessionbil, 'articlerecent' => $articlerecent,'siteupdated'=>$siteupdated,'sitecontrollabels'=>$sitecontrollabels]);
        }
    }

    public function setvalueshomepage2(Request $request)
    {
        //setvalueshomepage backup
        if ($request->ajax()) {
            if (!Session::has('bilingual')) {
                Session::put('bilingual', 2);
            }
            $sessionbil = Session::get('bilingual');

            if ($sessionbil == 1) {

                $logo = DB::table('logos')->where('status', 1)->where('logotype', 1)->select('file')->first();
                $title = DB::table('titles')->where('status', 1)->select('entitle as title', 'ensubtitle as subtitle')->first();
                $short = DB::table('shortalerts')->where('status', 1)->select('entitle as title', 'encontent as content')->first();
                $long = DB::table('longalerts')->where('status', 1)->select('entitle as title', 'ensubtitle as subtitle', 'encontent as content', 'enbrief as brief')->first();
                $media = DB::table('mediaalerts')->where('status', 1)->select('entitle as title', 'ensubtitle as subtitle', 'encontent as content', 'enbrief as brief', 'file')->first();
                $banner = DB::table('banners')->where('status', 1)->select('file', 'entitle as title', 'ensubtitle as subtitle')->limit(3)->get();
                $widget = DB::table('widgetlinks')->where('status', 1)->select('fileval', 'file', 'alt', 'entooltip as tooltip', 'entitle as title', 'ensubtitle as subtitle', 'encontent as content', 'menulinktypes_id')->limit(6)->get();
                $deptintro = DB::table('deptintroductions')->where('status', 1)->select('id', 'file1', 'alt1', 'enuser1 as user1', 'endesg1 as desg1', 'file2', 'alt2', 'enuser2 as user2', 'endesg2 as desg2', 'entooltip as tooltip', 'entitle as title', 'ensubtitle as subtitle', 'enbrief as brief', 'encontent as content')->first();
                $gallery = DB::table('galleries')->where('status', 1)->where('approve_status', 2)->select('id', 'poster', 'alt', 'entitle as title', 'entooltip as tooltip')->get();
                $activity = DB::table('activities')->where('status', 1)->where('approve_status', 2)->select('id', 'entitle as title', 'startdate')->get();
                $articlelatest = DB::table('articles')->where('status', 1)->where('approve_status', 2)->where('components_id', 22)->select('id', 'poster', 'alt', 'entitle as title', 'ensubtitle as subtitle', 'enauthor as author', 'enbrief as brief', 'created_at')->orderBy('id', 'desc')->first();
                $article = DB::table('articles')->where('status', 1)->where('approve_status', 2)->where('id', '!=', $articlelatest->id)->select('id', 'poster', 'alt', 'entitle as title', 'ensubtitle as subtitle', 'enauthor as author', 'enbrief as brief')->get();
                $newsletter = DB::table('newsletters')->where('status', 1)->select('id', 'poster', 'alt', 'entitle as title', 'entooltip as tooltip')->orderBy('id', 'desc')->first();
                $address = DB::table('componentarticles')->where('status', 1)->where('components_id', 12)->select('encontent as content', 'entitle as title', 'maplinks')->first();
                $socialmedia = DB::table('socialmedia')->where('status', 1)->select('url', 'iconclass', 'entitle as title', 'entooltip as tooltip')->get();
                $footermenus = DB::table('footermenus')->where('status', 1)->select('id', 'file', 'alt', 'entitle as title', 'encontent as content')->get();
                $footerlinks = DB::table('footerlinks')->where('status', 1)->select('id', 'url', 'entitle as title', 'entooltip as tooltip', 'iconclass')->get();
                $mainmenu = DB::table('mainmenus')->where('status', 1)->select('id', 'file', 'entitle as title', 'menulinktypes_id', 'entooltip as tooltip')->get();
                $livestream = DB::table('livestreamings')->where('status', 1)->select('id', 'url', 'entitle as title')->first();
                $footer = DB::table('footers')->where('status', 1)->select('id', 'entitle as title', 'ensubtitle as subtitle', 'iconclass')->orderBy('id', 'asc')->first();
                $whatsnew = DB::table('componentarticles')->where('components_id',3)->where('status', 1)->select('id', 'entitle as title', 'ensubtitle as subtitle', 'encontent as content', 'iconclass')->orderBy('updated_at', 'desc')->limit(4)->get();
                $statelogo =  DB::table('logos')->where('status', 1)->where('logotype', 3)->select('file', 'url', 'entooltip as tooltip')->get();
                $indialogo =  DB::table('logos')->where('status', 1)->where('logotype', 4)->select('file', 'url', 'entooltip as tooltip')->get();
                $footerlogo =  DB::table('logos')->where('status', 1)->where('logotype', 2)->select('file', 'url', 'entooltip as tooltip')->get();
                $toolmsg = "This will open an external website";
            } else {


                $logo = DB::table('logos')->where('status', 1)->where('logotype', 1)->select('file')->first();
                $title = DB::table('titles')->where('status', 1)->select('maltitle as title', 'malsubtitle as subtitle')->first();
                $short = DB::table('shortalerts')->where('status', 1)->select('maltitle as title', 'malcontent as content')->first();
                $long = DB::table('longalerts')->where('status', 1)->select('maltitle as title', 'malsubtitle as subtitle', 'malcontent as content', 'malbrief as brief')->first();
                $media = DB::table('mediaalerts')->where('status', 1)->select('maltitle as title', 'malsubtitle as subtitle', 'malcontent as content', 'malbrief as brief', 'file')->first();
                $banner = DB::table('banners')->where('status', 1)->select('file', 'maltitle as title', 'malsubtitle as subtitle')->limit(3)->get();
                $widget =  DB::table('widgetlinks')->where('status', 1)->select('fileval', 'file', 'alt', 'maltooltip as tooltip', 'maltitle as title', 'malsubtitle as subtitle', 'malcontent as content', 'menulinktypes_id')->limit(6)->get();
                $deptintro = DB::table('deptintroductions')->where('status', 1)->select('id', 'file1', 'alt1', 'maluser1 as user1', 'maldesg1 as desg1', 'file2', 'alt2', 'maluser2 as user2', 'maldesg2 as desg2', 'maltooltip as tooltip', 'maltitle as title', 'malsubtitle as subtitle', 'malbrief as brief', 'malcontent as content')->first();
                $gallery = DB::table('galleries')->where('status', 1)->where('approve_status', 2)->select('id', 'poster', 'alt', 'maltitle as title', 'maltooltip as tooltip')->get();
                $activity = DB::table('activities')->where('status', 1)->where('approve_status', 2)->select('id', 'maltitle as title', 'startdate')->get();
                $articlelatest = DB::table('articles')->where('status', 1)->where('approve_status', 2)->where('components_id', 22)->select('id', 'poster', 'alt', 'maltitle as title', 'malsubtitle as subtitle', 'malauthor as author', 'malbrief as brief', 'created_at')->orderBy('id', 'desc')->first();
                $article = DB::table('articles')->where('status', 1)->where('approve_status', 2)->where('id', '!=', $articlelatest->id)->select('id', 'poster', 'alt', 'maltitle as title', 'malsubtitle as subtitle', 'malauthor as author', 'malbrief as brief')->get();
                $newsletter = DB::table('newsletters')->where('status', 1)->select('id', 'poster', 'alt', 'maltitle as title', 'maltooltip as tooltip')->orderBy('id', 'desc')->first();
                $address = DB::table('componentarticles')->where('status', 1)->where('components_id', 12)->select('malcontent as content', 'maltitle as title', 'maplinks')->first();
                $socialmedia = DB::table('socialmedia')->where('status', 1)->select('url', 'iconclass', 'maltitle as title', 'maltooltip as tooltip')->get();
                $footermenus = DB::table('footermenus')->where('status', 1)->select('id', 'file', 'alt', 'maltitle as title', 'malcontent as content')->get();
                $footerlinks = DB::table('footerlinks')->where('status', 1)->select('id', 'url', 'maltitle as title', 'maltooltip as tooltip', 'iconclass')->get();
                $mainmenu = DB::table('mainmenus')->where('status', 1)->select('id', 'file', 'maltitle as title', 'menulinktypes_id', 'maltooltip as tooltip')->get();
                $livestream = DB::table('livestreamings')->where('status', 1)->select('id', 'url', 'maltitle as title')->first();
                $footer = DB::table('footers')->where('status', 1)->select('id', 'maltitle as title', 'malsubtitle as subtitle', 'iconclass')->orderBy('id', 'asc')->first();
                $whatsnew = DB::table('componentarticles')->where('components_id',3)->where('status', 1)->select('id', 'maltitle as title', 'malsubtitle as subtitle', 'malcontent as content', 'iconclass')->orderBy('updated_at', 'desc')->limit(4)->get();
                $statelogo =  DB::table('logos')->where('status', 1)->where('logotype', 3)->select('file', 'url', 'maltooltip as tooltip')->get();
                $indialogo =  DB::table('logos')->where('status', 1)->where('logotype', 4)->select('file', 'url', 'maltooltip as tooltip')->get();
                $footerlogo =  DB::table('logos')->where('status', 1)->where('logotype', 2)->select('file', 'url', 'maltooltip as tooltip')->get();
                $toolmsg = "ഇത് ഒരു പുതിയ വെബ്‌സൈറ്റ്  തുറക്കുന്നതാണ്";
            }
            //dd($deptintro);
            return response()->json(['logo' => $logo, 'title' => $title, 'short' => $short, 'long' => $long, 'media' => $media, 'banner' => $banner, 'widget' => $widget, 'deptintro' => $deptintro, 'gallery' => $gallery, 'activity' => $activity, 'articlelatest' => $articlelatest, 'article' => $article, 'newsletter' => $newsletter, 'address' => $address, 'socialmedia' => $socialmedia, 'footermenus' => $footermenus, 'footerlinks' => $footerlinks, 'mainmenu' => $mainmenu, 'livestream' => $livestream, 'statelogo' => $statelogo, 'indialogo' => $indialogo, 'footer' => $footer, 'footerlogo' => $footerlogo, 'whatsnew' => $whatsnew, 'toolmsg' => $toolmsg, 'sessionbil' => $sessionbil]);
        }
    }

    /*public function submenuslist(Request $request,$id){

        if($request ->ajax())
        {
            $sessionbil=Session::get('bilingual');
            //$decid=Crypt::decrypt($id);dd($decid);
            if($sessionbil==1){
                $getsubmenus = DB::table('submenus')->where('parentmenu',$id)->select('id','file','entitle as title','menulinktypes_id','parentmenu')->get();
                $max_iteration = count($getsubmenus);
                $toolmsg= "This will open an external website";   
            } else{
                $getsubmenus = DB::table('submenus')->where('parentmenu',$id)->select('id','file','maltitle as title','menulinktypes_id','parentmenu')->get();
                $max_iteration = count($getsubmenus);
                $toolmsg= "ഇത് ഒരു പുതിയ വെബ്‌സൈറ്റ്  തുറക്കുന്നതാണ്";
            }
            //dd($getsubmenus);
            
            return response()->json(['resultdata1' => $getsubmenus,'max_iteration' =>$max_iteration, 'toolmsg' =>$toolmsg]);
        } 

    }*/

    public function submenuslist(Request $request, $id)
    {

        if ($request->ajax()) {
            $sessionbil = Session::get('bilingual');
            //$decid=Crypt::decrypt($id);dd($decid);
            if ($sessionbil == 1) {
                $getsubmenus = DB::table('submenus')->where('parentmenu', $id)->select('id', 'file', 'entitle as title', 'menulinktypes_id', 'parentmenu')->get();
                foreach ($getsubmenus as $res) {
                    $encsubid = Crypt::encrypt($res->id);
                    $submenu[] = array('id' => $res->id, 'encsubid' => $encsubid, 'file' => $res->file, 'title' => $res->title, 'menulinktypes_id' => $res->menulinktypes_id, 'parentmenu' => $res->parentmenu);
                }
                $max_iteration = count($getsubmenus);
                $toolmsg = "This will open an external website";
            } else {
                $getsubmenus = DB::table('submenus')->where('parentmenu', $id)->select('id', 'file', 'maltitle as title', 'menulinktypes_id', 'parentmenu')->get();
                foreach ($getsubmenus as $res) {
                    $encsubid = Crypt::encrypt($res->id);
                    $submenu[] = array('id' => $res->id, 'encsubid' => $encsubid, 'file' => $res->file, 'title' => $res->title, 'menulinktypes_id' => $res->menulinktypes_id, 'parentmenu' => $res->parentmenu);
                }
                $max_iteration = count($getsubmenus);
                $toolmsg = "ഇത് ഒരു പുതിയ വെബ്‌സൈറ്റ്  തുറക്കുന്നതാണ്";
            }
            //dd($getsubmenus);

            return response()->json(['resultdata1' => $submenu, 'max_iteration' => $max_iteration, 'toolmsg' => $toolmsg]);
        }
    }

    public function feedback(Request $request)
    {
        $sessionbil = Session::get('bilingual');
        return view('feedback', compact('sessionbil'));
    }

    public function mainarticles(Request $request, $encid)
    {
        $sessionbil = Session::get('bilingual');
        $id = Crypt::decrypt($encid);
        if ($sessionbil == 1) {
            $mainarticles = DB::table('articles')->where('status', 1)->where('id', $id)->select('entitle as title', 'ensubtitle as subtitle', 'enauthor as author', 'enbrief as brief', 'encontent as content')->first();
        } else {
            $mainarticles = DB::table('articles')->where('status', 1)->where('id', $id)->select('maltitle as title', 'malsubtitle as subtitle', 'malauthor as author', 'malbrief as brief', 'malcontent as content')->first();
        }

        return view('mainarticles', compact('mainarticles', 'sessionbil'));
    }

    /*public function subdetail(Request $request, $encid, $encpid)
    {
        $id=Crypt::decrypt($encid);   
        $pid=Crypt::decrypt($encpid);   
        $sessionbil=Session::get('bilingual'); 
        
        
          if($sessionbil==1){
          	$subs = DB::table('submenus')->where('id',$id)->select('id','entitle as menutitle','menulinktypes_id','file')->first();
	        $menulinktype = $subs->menulinktypes_id;
	        $file = $subs->file;
            
          	if($menulinktype==4){
        		$article = DB::table('articles')->where('id',$file)->select('entitle as title','ensubtitle as subtitle','enauthor as author','enbrief as brief','encontent as content')->first();
        		$relsubmenus = DB::table('submenus')->where('parentmenu',$pid)->select('id','entitle as relmenutitle','menulinktypes_id','file','parentmenu')->get();
        	} 
            
            
          } else {
          	$subs = DB::table('submenus')->where('id',$id)->select('id','maltitle as menutitle','menulinktypes_id','file')->first();
	        $menulinktype = $subs->menulinktypes_id;

	        $file = $subs->file;
          	if($menulinktype==4){
        		$article = DB::table('articles')->where('id',$file)->select('maltitle as title','malsubtitle as subtitle','malauthor as author','malbrief as brief','malcontent as content')->first();
        		$relsubmenus = DB::table('submenus')->where('parentmenu',$pid)->select('id','maltitle as relmenutitle','menulinktypes_id','file','parentmenu')->get();
        	}
            
          }
          return view('subdetail',compact('subs','article','relsubmenus','sessionbil'));
          //dd($resultdata);
        
    }*/
    public function subdetail(Request $request, $encid, $encpid)
    {
        $id = Crypt::decrypt($encid);
        $pid = Crypt::decrypt($encpid);
        $sessionbil = Session::get('bilingual');


        if ($sessionbil == 1) {
            $subs = DB::table('submenus')->where('id', $id)->select('id', 'entitle as menutitle', 'menulinktypes_id', 'file')->first();
            $menulinktype = $subs->menulinktypes_id;
            $file = $subs->file;

            $subsubmenuscnt = DB::table('subsubmenus')->where('submenu', $id)->count();
            if ($subsubmenuscnt == 0) {
                if ($menulinktype == 4) {
                    $article = DB::table('articles')->where('id', $file)->select('poster', 'entitle as title', 'ensubtitle as subtitle', 'enauthor as author', 'enbrief as brief', 'encontent as content')->first();
                    $relsubmenus = DB::table('submenus')->where('parentmenu', $pid)->select('id', 'entitle as relmenutitle', 'menulinktypes_id', 'file', 'parentmenu as menu')->get();
                }
            } else {
                if ($menulinktype == 4) {
                    $article = DB::table('articles')->where('id', $file)->select('poster', 'entitle as title', 'ensubtitle as subtitle', 'enauthor as author', 'enbrief as brief', 'encontent as content')->first();
                    $subsubmenusrws = DB::table('subsubmenus')->where('submenu', $id)->select('id', 'entitle as relmenutitle', 'menulinktypes_id', 'file', 'submenu')->get();
                    $subsubmenu = array();
                    foreach ($subsubmenusrws as $res) {
                        $relsubmenus[] = array('id' => $res->id, 'file' => $res->file, 'relmenutitle' => $res->relmenutitle, 'menulinktypes_id' => $res->menulinktypes_id, 'menu' => $res->submenu);
                    }
                }
            }
        } else {


            $subs = DB::table('submenus')->where('id', $id)->select('id', 'maltitle as menutitle', 'menulinktypes_id', 'file')->first();
            $menulinktype = $subs->menulinktypes_id;
            $file = $subs->file;

            $subsubmenuscnt = DB::table('subsubmenus')->where('submenu', $id)->count();
            if ($subsubmenuscnt == 0) {
                if ($menulinktype == 4) {
                    $article = DB::table('articles')->where('id', $file)->select('poster', 'maltitle as title', 'malsubtitle as subtitle', 'malauthor as author', 'malbrief as brief', 'malcontent as content')->first();
                    $relsubmenus = DB::table('submenus')->where('parentmenu', $pid)->select('id', 'maltitle as relmenutitle', 'menulinktypes_id', 'file', 'parentmenu as menu')->get();
                }
            } else {
                if ($menulinktype == 4) {
                    $article = DB::table('articles')->where('id', $file)->select('poster', 'maltitle as title', 'malsubtitle as subtitle', 'malauthor as author', 'malbrief as brief', 'malcontent as content')->first();
                    $subsubmenusrws = DB::table('subsubmenus')->where('submenu', $id)->select('id', 'maltitle as relmenutitle', 'menulinktypes_id', 'file', 'submenu')->get();

                    foreach ($subsubmenusrws as $res) {
                        $relsubmenus[] = array('id' => $res->id, 'file' => $res->file, 'relmenutitle' => $res->relmenutitle, 'menulinktypes_id' => $res->menulinktypes_id, 'menu' => $res->submenu);
                    }
                }
            }
        }
        return view('subdetail', compact('subs', 'article', 'relsubmenus', 'sessionbil', 'subsubmenuscnt'));
        //dd($resultdata);

    }
    public function appdepartmentdetail(Request $request,$catid)
    {
        $sessionbil = Session::get('bilingual');
        $related_dept = array();
        $app_sections = array();
        $catid = Crypt::decrypt($catid);

        if ($sessionbil == 1) {
          
            $labels = array();
            $deptcat = DB::table('deptcategories')->where('id',$catid)->select('entitle as title')->first();
            $maintitle = $deptcat->title;
            $main_content = DB::table('appdepartments')->where('status', 1)->where('deptcategories_id',$catid)->select('id', 'entitle as title','enabout as about','enstructure as structure','encontact as contact','enrelatedlinks as relatedlinks','enservices as services')->orderby('entitle','asc')->first();
           
            if($main_content->about){
                $data = [
                    'id' => 'about',
                    'name' => 'About' 
                ];
                array_push($labels,$data);
            }

            if($main_content->structure){
                $data = [
                    'id' => 'structure',
                    'name' => 'Structure'
                ];
                array_push($labels,$data);
            }

            if($main_content->services){
                $data = [
                    'id' => 'services',
                    'name' => 'Services'
                ];
                array_push($labels,$data);
            }

            if($main_content->contact){
                $data = [
                    'id' => 'contact',
                    'name' => 'Contact Us'
                ];
                array_push($labels,$data);
            }

            if($main_content->relatedlinks){
                $data = [
                    'id' => 'related_link',
                    'name' => 'Related Links'
                ];
                array_push($labels,$data);
            }
            

             if($main_content){
                 $related_dept = DB::table('appdepartments')->where('status', 1)->where('deptcategories_id',$catid)->where('id','!=',$main_content->id)->select('id', 'entitle as title')->orderby('entitle','asc')->get();
             }
             if($main_content){
                $app_sections = DB::table('appsections')->where('status', 1)->where('approve_status',2)->where('appdepartments_id',$main_content->id)->select('id','ensectionname as sectionname')->get();
             }
            
            
        } else {

            $labels = array();
            $deptcat = DB::table('deptcategories')->where('id',$catid)->select('maltitle as title')->first();
            $maintitle = $deptcat->title;
            $main_content = DB::table('appdepartments')->where('status', 1)->where('deptcategories_id',$catid)->select('id', 'maltitle as title','malabout as about','malstructure as structure','malcontact as contact','malrelatedlinks as relatedlinks','malservices as services')->orderby('maltitle','asc')->first();
            
            if($main_content->about){
                $data = [
                    'id' => 'about',
                    'name' => 'ആമുഖം' 
                ];
                array_push($labels,$data);
            }

            if($main_content->structure){
                $data = [
                    'id' => 'structure',
                    'name' => 'ഘടന'
                ];
                array_push($labels,$data);
            }

            if($main_content->services){
                $data = [
                    'id' => 'services',
                    'name' => 'സേവനങ്ങൾ'
                ];
                array_push($labels,$data);
            }

            if($main_content->contact){
                $data = [
                    'id' => 'contact',
                    'name' => 'ബന്ധപ്പെടുക'
                ];
                array_push($labels,$data);
            }

            if($main_content->relatedlinks){
                $data = [
                    'id' => 'related_link',
                    'name' => 'ബന്ധപ്പെട്ട ലിങ്കുകൾ'
                ];
                array_push($labels,$data);
            }

            if($main_content){
                $related_dept = DB::table('appdepartments')->where('status', 1)->where('deptcategories_id',$catid)->where('id','!=',$main_content->id)->select('id', 'maltitle as title')->orderby('maltitle','asc')->get();
            }
            if($main_content){
                $app_sections = DB::table('appsections')->where('status', 1)->where('approve_status',2)->where('appdepartments_id',$main_content->id)->select('id','malsectionname as sectionname')->get();
             }

            
           
        }
        $related_depts = array();
        foreach ($related_dept as $key => $result) {

            $related_depts[$key] = [
                'id' => $result->id,
                'title' => $result->title,
                'deptencid' => Crypt::encrypt($result->id),
            ];
        }


        return view('appdepartmentdetail', compact('labels','maintitle','sessionbil','main_content','related_depts','app_sections'));
    

    }
    public function appsectioncontent(Request $request,$id)
    {
        $sessionbil = Session::get('bilingual');
        $app_sections = array();
        
        if ($sessionbil == 1) {

            $labels = array();

            $main_content = DB::table('appsections')->where('id', $id)->select('id','ensectiondetails as details','appdepartments_id')->first();

            $dept_content = DB::table('appdepartments')->where('status', 1)->where('id',$main_content->appdepartments_id)->select('id', 'entitle as title','enabout as about','enstructure as structure','encontact as contact','enrelatedlinks as relatedlinks','enservices as services')->first();

            if($dept_content->about){
                $data = [
                    'id' => 'about',
                    'name' => 'About' 
                ];
                array_push($labels,$data);
            }

            if($dept_content->structure){
                $data = [
                    'id' => 'structure',
                    'name' => 'Structure'
                ];
                array_push($labels,$data);
            }

            if($dept_content->services){
                $data = [
                    'id' => 'services',
                    'name' => 'Services'
                ];
                array_push($labels,$data);
            }

            if($dept_content->contact){
                $data = [
                    'id' => 'contact',
                    'name' => 'Contact Us'
                ];
                array_push($labels,$data);
            }

            if($dept_content->relatedlinks){
                $data = [
                    'id' => 'related_link',
                    'name' => 'Related Links'
                ];
                array_push($labels,$data);
            }

            if($main_content){
                $app_sections = DB::table('appsections')->where('status', 1)->where('approve_status',2)->where('appdepartments_id',$main_content->appdepartments_id)->select('id','ensectionname as sectionname')->get();
            }
        }else{

            $labels = array();
            $main_content = DB::table('appsections')->where('id', $id)->select('id','malsectiondetails as details','appdepartments_id')->first();

            $dept_content = DB::table('appdepartments')->where('status', 1)->where('id',$main_content->appdepartments_id)->select('id', 'maltitle as title','malabout as about','malstructure as structure','malcontact as contact','malrelatedlinks as relatedlinks','malservices as services')->first();

            if($dept_content->about){
                $data = [
                    'id' => 'about',
                    'name' => 'ആമുഖം' 
                ];
                array_push($labels,$data);
            }

            if($dept_content->structure){
                $data = [
                    'id' => 'structure',
                    'name' => 'ഘടന'
                ];
                array_push($labels,$data);
            }

            if($dept_content->services){
                $data = [
                    'id' => 'services',
                    'name' => 'സേവനങ്ങൾ'
                ];
                array_push($labels,$data);
            }

            if($dept_content->contact){
                $data = [
                    'id' => 'contact',
                    'name' => 'ബന്ധപ്പെടുക'
                ];
                array_push($labels,$data);
            }

            if($dept_content->relatedlinks){
                $data = [
                    'id' => 'related_link',
                    'name' => 'ബന്ധപ്പെട്ട ലിങ്കുകൾ'
                ];
                array_push($labels,$data);
            }

            if($main_content){
                $app_sections = DB::table('appsections')->where('status', 1)->where('approve_status',2)->where('appdepartments_id',$main_content->appdepartments_id)->select('id','malsectionname as sectionname')->get();
            }
        }

     
        return response()->json(['content' => $main_content->details,'type' => '','id' => $main_content->appdepartments_id,'labels' => $labels,'app_sections' => $app_sections,'content_id' => $main_content->id]);
       
    }

    public function appdepartmentcontent(Request $request,$id,$type)
    {
        $sessionbil = Session::get('bilingual');
        $app_sections = array();

        if ($sessionbil == 1) {

            $labels = array();

            if($type ==='about'){
               $main_content = DB::table('appdepartments')->where('id', $id)->select('enabout as content','id')->first();
            }
            else if($type ==='structure'){
                $main_content = DB::table('appdepartments')->where('id', $id)->select('enstructure as content','id')->first();
            }
            else if($type ==='services'){
                $main_content = DB::table('appdepartments')->where('id', $id)->select('enservices as content','id')->first();
            }
            else if($type ==='contact'){
               $main_content = DB::table('appdepartments')->where('id', $id)->select('encontact as content','id')->first();
            }
            else if($type ==='related_link'){
                $main_content = DB::table('appdepartments')->where('id', $id)->select('enrelatedlinks as content','id')->first();
            }else{
               $main_content = DB::table('appdepartments')->where('id', $id)->select('enabout as content','id')->first();
           }

           $dept_content = DB::table('appdepartments')->where('status', 1)->where('id',$id)->select('id', 'entitle as title','enabout as about','enstructure as structure','encontact as contact','enrelatedlinks as relatedlinks','enservices as services')->first();

            if($dept_content->about){
                $data = [
                    'id' => 'about',
                    'name' => 'About' 
                ];
                array_push($labels,$data);
            }

            if($dept_content->structure){
                $data = [
                    'id' => 'structure',
                    'name' => 'Structure'
                ];
                array_push($labels,$data);
            }

            if($dept_content->services){
                $data = [
                    'id' => 'services',
                    'name' => 'Services'
                ];
                array_push($labels,$data);
            }

            if($dept_content->contact){
                $data = [
                    'id' => 'contact',
                    'name' => 'Contact Us'
                ];
                array_push($labels,$data);
            }

            if($dept_content->relatedlinks){
                $data = [
                    'id' => 'related_link',
                    'name' => 'Related Links'
                ];
                array_push($labels,$data);
            }
          
           if($main_content){
                $app_sections = DB::table('appsections')->where('status', 1)->where('approve_status',2)->where('appdepartments_id',$main_content->id)->select('id','ensectionname as sectionname')->get();
            }

        }else{

            $labels = array ();

           if($type ==='about'){
               $main_content = DB::table('appdepartments')->where('id', $id)->select('malabout as content','id')->first();
            }
            else if($type ==='structure'){
                $main_content = DB::table('appdepartments')->where('id', $id)->select('malstructure as content','id')->first();
            }
            else if($type ==='services'){
                $main_content = DB::table('appdepartments')->where('id', $id)->select('malservices as content','id')->first();
            }
            else if($type ==='contact'){
               $main_content = DB::table('appdepartments')->where('id', $id)->select('malcontact as content','id')->first();
            }
            else if($type ==='related_link'){
                $main_content = DB::table('appdepartments')->where('id', $id)->select('malrelatedlinks as content','id')->first();
            }else{
               $main_content = DB::table('appdepartments')->where('id', $id)->select('malabout as content','id')->first();
           }

           $dept_content = DB::table('appdepartments')->where('status', 1)->where('id',$id)->select('id', 'maltitle as title','malabout as about','malstructure as structure','malcontact as contact','malrelatedlinks as relatedlinks','malservices as services')->first();

            if($dept_content->about){
                $data = [
                    'id' => 'about',
                    'name' => 'ആമുഖം' 
                ];
                array_push($labels,$data);
            }

            if($dept_content->structure){
                $data = [
                    'id' => 'structure',
                    'name' => 'ഘടന'
                ];
                array_push($labels,$data);
            }

            if($dept_content->services){
                $data = [
                    'id' => 'services',
                    'name' => 'സേവനങ്ങൾ'
                ];
                array_push($labels,$data);
            }

            if($dept_content->contact){
                $data = [
                    'id' => 'contact',
                    'name' => 'ബന്ധപ്പെടുക'
                ];
                array_push($labels,$data);
            }

            if($dept_content->relatedlinks){
                $data = [
                    'id' => 'related_link',
                    'name' => 'ബന്ധപ്പെട്ട ലിങ്കുകൾ'
                ];
                array_push($labels,$data);
            }

           if($main_content){
                $app_sections = DB::table('appsections')->where('status', 1)->where('approve_status',2)->where('appdepartments_id',$main_content->id)->select('id','malsectionname as sectionname')->get();
            }
        }
        
        return response()->json(['content' => $main_content->content,'type' => $type,'id' => $id,'labels' => $labels,'app_sections' => $app_sections]);
       
    }

    public function departmentdetail(Request $request,$encid)
    {
        $sessionbil = Session::get('bilingual');
         $app_sections = array();

        $id = Crypt::decrypt($encid);

        if ($sessionbil == 1) {
          
            $labels = array();
            $main_content = DB::table('appdepartments')->where('id', $id)->select('id', 'entitle as title','enabout as about','enstructure as structure','encontact as contact','enrelatedlinks as relatedlinks','enservices as services','deptcategories_id')->first();

            $deptcat = DB::table('deptcategories')->where('id',$main_content->deptcategories_id)->select('entitle as title')->first();
            $maintitle = $deptcat->title;

            $related_dept = DB::table('appdepartments')->where('status', 1)->where('deptcategories_id',$main_content->deptcategories_id)->where('id','!=',$main_content->id)->select('id', 'entitle as title')->orderby('entitle','asc')->get();

            if($main_content->about){
                $data = [
                    'id' => 'about',
                    'name' => 'About' 
                ];
                array_push($labels,$data);
            }

            if($main_content->structure){
                $data = [
                    'id' => 'structure',
                    'name' => 'Structure'
                ];
                array_push($labels,$data);
            }

            if($main_content->services){
                $data = [
                    'id' => 'services',
                    'name' => 'Services'
                ];
                array_push($labels,$data);
            }

            if($main_content->contact){
                $data = [
                    'id' => 'contact',
                    'name' => 'Contact Us'
                ];
                array_push($labels,$data);
            }

            if($main_content->relatedlinks){
                $data = [
                    'id' => 'related_link',
                    'name' => 'Related Links'
                ];
                array_push($labels,$data);
            }

            if($main_content){
                $app_sections = DB::table('appsections')->where('status', 1)->where('approve_status',2)->where('appdepartments_id',$main_content->id)->select('id','ensectionname as sectionname')->get();
             }
            
        } else {

            $labels = array();
            $main_content = DB::table('appdepartments')->where('id', $id)->select('id', 'maltitle as title','malabout as about','malstructure as structure','malcontact as contact','malrelatedlinks as relatedlinks','malservices as services','deptcategories_id')->orderby('maltitle','asc')->first();

            $deptcat = DB::table('deptcategories')->where('id',$main_content->deptcategories_id)->select('maltitle as title')->first();
            $maintitle = $deptcat->title;
            
            $related_dept = DB::table('appdepartments')->where('status', 1)->where('deptcategories_id',$main_content->deptcategories_id)->where('id','!=',$main_content->id)->select('id', 'maltitle as title')->orderby('maltitle','asc')->get();
             if($main_content->about){
                $data = [
                    'id' => 'about',
                    'name' => 'ആമുഖം' 
                ];
                array_push($labels,$data);
            }

            if($main_content->structure){
                $data = [
                    'id' => 'structure',
                    'name' => 'ഘടന'
                ];
                array_push($labels,$data);
            }

            if($main_content->services){
                $data = [
                    'id' => 'services',
                    'name' => 'സേവനങ്ങൾ'
                ];
                array_push($labels,$data);
            }

            if($main_content->contact){
                $data = [
                    'id' => 'contact',
                    'name' => 'ബന്ധപ്പെടുക'
                ];
                array_push($labels,$data);
            }

            if($main_content->relatedlinks){
                $data = [
                    'id' => 'related_link',
                    'name' => 'ബന്ധപ്പെട്ട ലിങ്കുകൾ'
                ];
                array_push($labels,$data);
            }

            if($main_content){
                $app_sections = DB::table('appsections')->where('status', 1)->where('approve_status',2)->where('appdepartments_id',$main_content->id)->select('id','malsectionname as sectionname')->get();
             }
           
        }
        $related_depts = array();
        foreach ($related_dept as $key => $result) {

            $related_depts[$key] = [
                'id' => $result->id,
                'title' => $result->title,
                'deptencid' => Crypt::encrypt($result->id),
            ];
        }


        return view('appdepartmentdetail', compact('labels','maintitle','sessionbil','main_content','related_depts','app_sections'));
    

    }

    public function subsubdetail(Request $request, $encid, $encpid)
    {
        $id = Crypt::decrypt($encid);
        $pid = Crypt::decrypt($encpid);
        $sessionbil = Session::get('bilingual');


        if ($sessionbil == 1) {
            $subs = DB::table('subsubmenus')->where('id', $id)->select('id', 'entitle as menutitle', 'menulinktypes_id', 'file')->first();
            $menulinktype = $subs->menulinktypes_id;
            $file = $subs->file;
            $subsubmenuscnt = DB::table('subsubmenus')->where('submenu', $pid)->count();

            if ($menulinktype == 4) {
                $article = DB::table('articles')->where('id', $file)->select('poster', 'entitle as title', 'ensubtitle as subtitle', 'enauthor as author', 'enbrief as brief', 'encontent as content')->first();
                $relsubmenus1 = DB::table('subsubmenus')->where('submenu', $pid)->select('id', 'entitle as relmenutitle', 'menulinktypes_id', 'file', 'submenu')->get();
                foreach ($relsubmenus1 as $res) {
                    $relsubmenus[] = array('id' => $res->id, 'file' => $res->file, 'relmenutitle' => $res->relmenutitle, 'menulinktypes_id' => $res->menulinktypes_id, 'menu' => $res->submenu);
                }
            }
        } else {


            $subs = DB::table('subsubmenus')->where('id', $id)->select('id', 'maltitle as menutitle', 'menulinktypes_id', 'file')->first();
            $menulinktype = $subs->menulinktypes_id;
            $file = $subs->file;
            $subsubmenuscnt = DB::table('subsubmenus')->where('submenu', $pid)->count();


            if ($menulinktype == 4) {
                $article = DB::table('articles')->where('id', $file)->select('poster', 'maltitle as title', 'malsubtitle as subtitle', 'malauthor as author', 'malbrief as brief', 'malcontent as content')->first();
                $relsubmenus1 = DB::table('subsubmenus')->where('submenu', $pid)->select('id', 'maltitle as relmenutitle', 'menulinktypes_id', 'file', 'submenu')->get();
                foreach ($relsubmenus1 as $res) {
                    $relsubmenus[] = array('id' => $res->id, 'file' => $res->file, 'relmenutitle' => $res->relmenutitle, 'menulinktypes_id' => $res->menulinktypes_id, 'menu' => $res->submenu);
                }
            }
        }
        return view('subdetail', compact('subs', 'article', 'relsubmenus', 'sessionbil', 'subsubmenuscnt'));
        //dd($resultdata);

    }

    public function modalpop(Request $request, $id)
    {

        if ($request->ajax()) {
            $sessionbil = Session::get('bilingual');

            if ($sessionbil == 1) {
                $getcontent = DB::table('footermenus')->where('id', $id)->select('id', 'file', 'alt', 'entitle as title', 'encontent as content')->first();
            } else {
                $getcontent = DB::table('footermenus')->where('id', $id)->select('id', 'file', 'alt', 'maltitle as title', 'malcontent as content')->first();
            }


            return response()->json(['resultdata' => $getcontent]);
        }
    }


    public function activitydetail(Request $request, $encid)
    {
        $id = Crypt::decrypt($encid);
        $sessionbil = Session::get('bilingual');
        if ($sessionbil == 1) {
            $activity = DB::table('activities')->where('status', 1)->where('id', $id)->select('id', 'poster', 'alt', 'entooltip as tooltip', 'ensubtitle as subtitle', 'enauthor as author', 'enbrief as brief', 'encontent as content', 'entitle as title', 'startdate', 'enddate')->orderBy('id', 'desc')->first();
            foreach ($activity as $actres) {
                $actupload = DB::table('activityuploads')->where('activities_id', $id)->select('activities_id as actid', 'file', 'alt as actalt', 'entitle as actupload')->get();
            }
            $relatedactivity = DB::table('activities')->where('status', 1)->select('id', 'entitle as title')->limit(3)->get();
        } else {
            $activity = DB::table('activities')->where('status', 1)->where('id', $id)->select('id', 'poster', 'alt', 'maltooltip as tooltip', 'malsubtitle as subtitle', 'malauthor as author', 'malbrief as brief', 'malcontent as content', 'maltitle as title', 'startdate', 'enddate')->orderBy('id', 'desc')->first();
            foreach ($activity as $actres) {
                $actupload = DB::table('activityuploads')->where('activities_id', $id)->select('activities_id as actid', 'file', 'alt as actalt', 'maltitle as actupload')->get();
            }
            $relatedactivity = DB::table('activities')->where('status', 1)->select('id', 'maltitle as title')->limit(3)->get();
        }
        return view('activitydetail', compact('activity', 'actupload', 'relatedactivity', 'sessionbil'));
        //dd($resultdata);

    }

    public function deptdetails(Request $request)
    {

        $sessionbil = Session::get('bilingual');
        if ($sessionbil == 1) {
            $depts = DB::table('appdepartments')->where('status', 1)->select('id', 'entitle as title', 'enabout as about', 'enstructure as structure', 'encontact as contact', 'enrelatedlinks as relatedlinks', 'enservices as services')->orderBy('title', 'asc')->first();
            $deptid = $depts->id;

            $relateddepts = DB::table('appdepartments')->where('status', 1)->select('id', 'entitle as title', 'enabout as about', 'enstructure as structure', 'encontact as contact', 'enrelatedlinks as relatedlinks', 'enservices as services')->get();
        } else {
            $depts = DB::table('appdepartments')->where('status', 1)->select('id', 'maltitle as title', 'malabout as about', 'malstructure as structure', 'malcontact as contact', 'malrelatedlinks as relatedlinks', 'malservices as services')->orderBy('title', 'asc')->first();
            $deptid = $depts->id;
            $relateddepts = DB::table('appdepartments')->where('status', 1)->select('id', 'maltitle as title', 'malabout as about', 'malstructure as structure', 'malcontact as contact', 'malrelatedlinks as relatedlinks', 'malservices as services')->get();
        }
        return view('deptdetails', compact('depts', 'relateddepts', 'sessionbil'));
        //dd($resultdata);

    }

    public function deptdetailview(Request $request, $encid)
    {
        $id = Crypt::decrypt($encid);
        $sessionbil = Session::get('bilingual');
        if ($sessionbil == 1) {
            $depts = DB::table('appdepartments')->where('id', $id)->select('id', 'entitle as title', 'enabout as about', 'enstructure as structure', 'encontact as contact', 'enrelatedlinks as relatedlinks', 'enservices as services')->first();
            $deptid = $depts->id;

            $relateddepts = DB::table('appdepartments')->where('status', 1)->select('id', 'entitle as title', 'enabout as about', 'enstructure as structure', 'encontact as contact', 'enrelatedlinks as relatedlinks', 'enservices as services')->get();
        } else {
            $depts = DB::table('appdepartments')->where('id', $id)->select('id', 'maltitle as title', 'malabout as about', 'malstructure as structure', 'malcontact as contact', 'malrelatedlinks as relatedlinks', 'malservices as services')->orderBy('title', 'asc')->first();
            $deptid = $depts->id;
            $relateddepts = DB::table('appdepartments')->where('status', 1)->select('id', 'maltitle as title', 'malabout as about', 'malstructure as structure', 'malcontact as contact', 'malrelatedlinks as relatedlinks', 'malservices as services')->get();
        }
        return view('deptdetails', compact('depts', 'relateddepts', 'sessionbil'));
        //dd($resultdata);

    }



    public function articledetail(Request $request, $encid)
    {
        $id = Crypt::decrypt($encid);
        $sessionbil = Session::get('bilingual');
        if ($sessionbil == 1) {
            $article = DB::table('articles')->where('status', 1)->where('id', $id)->select('id', 'poster', 'alt', 'entooltip as tooltip', 'ensubtitle as subtitle', 'enauthor as author', 'enbrief as brief', 'encontent as content', 'entitle as title', 'created_at')->orderBy('id', 'desc')->first();
            foreach ($article as $artres) {
                $artupload = DB::table('articleuploads')->where('articles_id', $id)->select('articles_id as artid', 'file', 'alt as artalt', 'entitle as artupload')->get();
            }
            $relatedarticles = DB::table('articles')->where('status', 1)->where('components_id', 22)->select('id', 'entitle as title', 'poster')->orderBy('id', 'desc')->limit(20)->get();
        } else {
            $article = DB::table('articles')->where('status', 1)->where('id', $id)->select('id', 'poster', 'alt', 'maltooltip as tooltip', 'malsubtitle as subtitle', 'malauthor as author', 'malbrief as brief', 'malcontent as content', 'maltitle as title', 'created_at')->orderBy('id', 'desc')->first();
            foreach ($article as $artres) {
                $artupload = DB::table('articleuploads')->where('articles_id', $id)->select('articles_id as artid', 'file', 'alt as artalt', 'maltitle as artupload')->get();
            }
            $relatedarticles = DB::table('articles')->where('status', 1)->where('components_id', 22)->select('id', 'maltitle as title', 'poster')->orderBy('id', 'desc')->limit(20)->get();
        }
        return view('articledetail', compact('article', 'artupload', 'relatedarticles', 'sessionbil'));
        //dd($resultdata);

    }

    public function deptintrodetail(Request $request, $encid)
    {
        $id = Crypt::decrypt($encid);
        $sessionbil = Session::get('bilingual');
        if ($sessionbil == 1) {
            $deptintro = DB::table('deptintroductions')->where('id', $id)->select('id', 'file1', 'alt1', 'enuser1 as user1', 'endesg1 as desg1', 'file2', 'alt2', 'enuser2 as user2', 'endesg2 as desg2', 'entooltip as tooltip', 'entitle as title', 'ensubtitle as subtitle', 'enbrief as brief', 'encontent as content')->first();
        } else {
            $deptintro = DB::table('deptintroductions')->where('id', $id)->select('id', 'file1', 'alt1', 'maluser1 as user1', 'maldesg1 as desg1', 'file2', 'alt2', 'maluser2 as user2', 'maldesg2 as desg2', 'maltooltip as tooltip', 'maltitle as title', 'malsubtitle as subtitle', 'malbrief as brief', 'malcontent as content')->first();
        }
        return view('deptintrodetail', compact('deptintro', 'sessionbil'));
        //dd($resultdata);

    }

    public function newsletterpreview(Request $request, $encid)
    {
        $id = Crypt::decrypt($encid);
        $sessionbil = Session::get('bilingual');
        if ($sessionbil == 1) {
            $newsvolumes = DB::table('newslettervolumes')
                ->where('status', 1)
                ->where('newsletters_id', $id)
                ->select('id', 'poster', 'alt', 'entitle as title', 'entooltip as tooltip', 'releasedate')
                ->get();
        } else {
            $newsvolumes = DB::table('newslettervolumes')
                ->where('status', 1)
                ->where('newsletters_id', $id)
                ->select('id', 'poster', 'alt', 'maltitle as title', 'maltooltip as tooltip', 'releasedate')
                ->get();
        }


        return view('newsletterpreview', compact('newsvolumes', 'sessionbil'));
    }


    public function gallerypreview(Request $request)
    {
        $sessionbil = Session::get('bilingual');
        if ($sessionbil == 1) {
            $gallery = DB::table('galleries')
                ->where('status', 1)
                ->select('id', 'poster', 'alt', 'entitle as title', 'entooltip as tooltip')
                ->get();
        } else {
            $gallery = DB::table('galleries')
                ->where('status', 1)
                ->select('id', 'poster', 'alt', 'maltitle as title', 'maltooltip as tooltip')
                ->get();
        }


        return view('gallerypreview', compact('gallery', 'sessionbil'));
    }
    public function gallerypage(Request $request, $encid)
    {
        $id = Crypt::decrypt($encid);
        $sessionbil = Session::get('bilingual');
        $listdata = DB::table('galleryitems')
            ->select('*')
            ->where('galleries_id', $id)
            ->where('status', 1)
            ->where('approve_status', 1)
            ->get();

        if ($sessionbil == 1) {
            $relatedgallery = DB::table('galleries')
                ->select('id', 'poster', 'alt', 'entitle as title', 'entooltip as tooltip')
                ->where('status', 1)
                ->get();
        } else {
            $relatedgallery = DB::table('galleries')
                ->select('id', 'poster', 'alt', 'maltitle as title', 'maltooltip as tooltip')
                ->where('status', 1)
                ->get();
        }

        return view('gallerypage', compact('id', 'listdata', 'relatedgallery', 'sessionbil'));
    }

    public function whatsnewdetail(Request $request)
    {
        $sessionbil = Session::get('bilingual');
        if ($sessionbil == 1) {
            $whatsnew = DB::table('componentarticles')->where('components_id',3)->where('status', 1)->select('id', 'entitle as title', 'ensubtitle as subtitle', 'encontent as content', 'iconclass')->orderBy('id', 'desc')->limit(1)->first();

            $relatedwhatsnew = DB::table('componentarticles')
                ->select('id', 'entitle as title', 'ensubtitle as subtitle', 'encontent as content', 'iconclass')
                ->where('id','!=', $whatsnew->id)
                ->where('status', 1)
                ->where('components_id',3)
                ->limit(15)
                ->get();
        } else {
            $whatsnew = DB::table('componentarticles')->where('components_id',3)->where('status', 1)->select('id', 'maltitle as title', 'malsubtitle as subtitle', 'malcontent as content', 'iconclass')->orderBy('id', 'desc')->limit(1)->first();

            $relatedwhatsnew = DB::table('componentarticles')
                ->select('id', 'maltitle as title', 'malsubtitle as subtitle', 'malcontent as content', 'iconclass')
                ->where('id','!=', $whatsnew->id)
                ->where('status', 1)
                ->where('components_id',3)
                ->limit(15)
                ->get();
        }
        return view('whatsnewdetail', compact('whatsnew', 'relatedwhatsnew', 'sessionbil'));
    }

    public function mediaalertdetail(Request $request)
    {
        $sessionbil = Session::get('bilingual');
        if ($sessionbil == 1) {
            $media = DB::table('mediaalerts')->where('status', 1)->select('entitle as title', 'ensubtitle as subtitle', 'encontent as content', 'enbrief as brief', 'file')->first();

            
        } else {
            $media = DB::table('mediaalerts')->where('status', 1)->select('maltitle as title', 'malsubtitle as subtitle', 'malcontent as content', 'malbrief as brief', 'file')->first();

            
        }
        return view('mediaalertdetail', compact('media', 'sessionbil'));
    }


    public function whatsnewdetailwise(Request $request, $encid)
    {
        $sessionbil = Session::get('bilingual');
        $id = Crypt::decrypt($encid);
        if ($sessionbil == 1) {
            $whatsnew = DB::table('componentarticles')->where('components_id',3)->where('status', 1)->where('id',$id)->select('id', 'entitle as title', 'ensubtitle as subtitle', 'encontent as content', 'iconclass')->first();

            $relatedwhatsnew = DB::table('componentarticles')
                ->select('id', 'entitle as title', 'ensubtitle as subtitle', 'encontent as content', 'iconclass')
                ->where('id','!=', $id)
                ->where('status', 1)
                ->where('components_id',3)
                ->limit(15)
                ->get();
        } else {
            $whatsnew = DB::table('componentarticles')->where('components_id',3)->where('status', 1)->where('id',$id)->select('id', 'maltitle as title', 'malsubtitle as subtitle', 'malcontent as content', 'iconclass')->first();

            $relatedwhatsnew = DB::table('componentarticles')
                ->select('id', 'maltitle as title', 'malsubtitle as subtitle', 'malcontent as content', 'iconclass')
                ->where('id','!=', $id)
                ->where('status', 1)
                ->where('components_id',3)
                ->limit(15)
                ->get();
        }
        return view('whatsnewdetail', compact('whatsnew', 'relatedwhatsnew', 'sessionbil'));
    }

    public function setvaluesencrypt(Request $request, $id)
    {
        if ($request->ajax()) {

            $encid = Crypt::encrypt($id);
            return response()->json(['encid' => $encid]);
        }
    }

    public function feedbackstore(Request $request)
    {
        $request->validate([
            'name'   => 'required|min:3|max:50|regex:/(^[-0-9A-Za-z\s ]+$)/',
            'mobile'    => 'required|digits_between:10,12',
            'email' => 'required|min:10|max:40|email',
            'subject'   => 'required|min:3|max:50|regex:/(^[-0-9A-Za-z\s ]+$)/',
            'content'    => 'required'


        ]);

        $form_data = array(
            'name'         => $request->name,
            'mobile'       => $request->mobile,
            'email'        => $request->email,
            'subject'      => $request->subject,
            'content'      => $request->content
        );
        DB::table('feedbacks')->insert($form_data);
        return redirect('feedback')->with('success', 'Feedback Sent!');
    }

    public function search(Request $request)
    {



        $sessionbil = Session::get('bilingual');

        if ($sessionbil == 1) {

            $searchResults = (new Search())
                ->registerModel(Article::class, function (ModelSearchAspect $modelSearchAspect) {
                    $modelSearchAspect
                        ->addSearchableAttribute('entitle') // return results for partial matches on usernames
                        ->where('approve_status', 2);
                })
                ->registerModel(Appdepartment::class, function (ModelSearchAspect $modelSearchAspect) {
                    $modelSearchAspect
                        ->addSearchableAttribute('entitle') // return results for partial matches on usernames
                        ->where('approve_status', 2);
                })
                ->perform($request->input('searchdata'));
        } else {
            $searchResults = (new Search())
                ->registerModel(Articlemalayalam::class, function (ModelSearchAspect $modelSearchAspect) {
                    $modelSearchAspect
                        ->addSearchableAttribute('maltitle') // return results for partial matches on usernames
                        ->where('approve_status', 2);
                })
                ->registerModel(Appdepartmentmalayalam::class, function (ModelSearchAspect $modelSearchAspect) {
                    $modelSearchAspect
                        ->addSearchableAttribute('maltitle') // return results for partial matches on usernames
                        ->where('approve_status', 2);
                })
                ->perform($request->input('searchdata'));
        }


       
        $searchdata = $request->searchdata;

        return view('searchdatanew', compact('searchResults', 'searchdata', 'sessionbil'));
    }

     public function contactus(Request $request){
        $sessionbil = Session::get('bilingual');

        if($sessionbil==1){
            $contactus = DB::table('articles')->where('status', 1)->where('components_id', 6)->select('encontent as content', 'entitle as title')->orderBy('id','desc')->first();

        } else {
            $contactus = DB::table('articles')->where('status', 1)->where('components_id', 6)->select('malcontent as content', 'maltitle as title')->orderBy('id','desc')->first();
        }
        return view('contactus',compact('sessionbil','contactus'));
    }
}
