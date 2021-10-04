<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\St;
use App\Gallery;
use App\Newsletter;
use App\Shortalert;
use App\Longalert;
use App\Mediaalert;
use App\User;
use App\Deptintroduction;
use App\Story;
use App\Storyattachment;
use App\Storyprocessing;
use DB;
use Auth;
use Session;
use Carbon\Carbon;

class StoryModeratorController extends Controller
{
   public function storymoderatorhome(Request $request)
    {
    	return view('storymoderatordashboard');
    }

    public function storyitems(Request $request, $val)
    {

    	return view('storydocument.storymoderatoritem',compact('val'));
    }

    /*Story*/

      public function moderatedstorylist(Request $request, $val)
    {
    	/*$displayval=DB::table('stories')
    	 	->join('documents','documents.id','stories.documents_id')
    	 	>join('storyprocessings','storyprocessings.stories_id','stories.id')
    		->select('stories.id','documents.documentnumstories_ber','stories.created_at','stories.entitle','stories.status')
            ->where('documenttypes_id',1)
            ->get();*/
    	if($val==1)
    	{

    		$listdata=DB::table('stories')
    	 	->join('documents','documents.id','stories.documents_id')
    	 	->join('storyprocessings','storyprocessings.stories_id','stories.id')
    		->select('stories.id','documents.documentnumber','stories.created_at','stories.entitle','stories.status','approver_status','moderator_status')
            ->where('documenttypes_id',1)
            ->where('contributor_status',1)
            ->where('moderator_status',0)
            ->orWhere('moderator_status',1)
            ->where('approver_status',0)
            ->get();
    		//$listdata = Activity::where('contributor_status',1)->where('moderator_status',0)->orWhere('moderator_status',1)->where('approve_status',0)->get();
    	}
    	else
    	{
    		$listdata=DB::table('stories')
    	 	->join('documents','documents.id','stories.documents_id')
    	 	->join('storyprocessings','storyprocessings.stories_id','stories.id')
    		->select('stories.id','documents.documentnumber','stories.created_at','stories.entitle','stories.status','approver_status','moderator_status')
            ->where('documenttypes_id',1)
            ->where('contributor_status',1)
            ->where('moderator_status',2)
            ->get();

    		//$listdata = Activity::where('contributor_status',1)->where('moderator_status',2)->get();
    	} 
    	
    	$attachment=Storyattachment::all();
    	return view('storydocument.moderatedstorylist',compact('listdata','val','attachment'));
    }

    public function moderatedstoryverify(Request $request, $id)
    {
        if($request->ajax())
        {
        	$formdata = array(
        		'moderator_status' =>  1,
        		'moderator_id' =>  Auth::user()->id,
        		'moderator_timestamp' =>  date('Y-m-d H:i:s')
        	);
            Storyprocessing::where('stories_id',$id)->update($formdata);
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }

    public function moderatedstoryupdate(Request $request)
    {
        if($request->ajax())
        {
            $statusid = $request->status_id;
            if($statusid==1){
                $formdata = array(
        		'moderator_remarks' =>  $request->moderator_remarks,
        		'moderator_status' =>  2,
        		'moderator_id' =>  Auth::user()->id,
        		'moderator_timestamp' =>  date('Y-m-d H:i:s')
        		);
            }else if($statusid==2){
                $formdata = array(
        		'moderator_remarks' =>  $request->moderator_remarks,
        		'contributor_status' => 2,
                'moderator_status' =>  0,
        		'moderator_id' =>  Auth::user()->id,
        		'moderator_timestamp' =>  date('Y-m-d H:i:s')
        		);
            }
        	
            Storyprocessing::whereId($request->hidden_id)->update($formdata);
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }
}
