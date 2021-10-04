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

class StoryApproverController extends Controller
{
     public function storyapproverhome(Request $request)
    {
    	return view('storyapproverdashboard');
    }

    public function storyitems(Request $request, $val)
    {

    	return view('storydocument.storyapproveritem',compact('val'));
    }

    /*Story*/

      public function approvedstorylist(Request $request, $val)
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
    		->select('stories.id','documents.documentnumber','stories.created_at','stories.entitle','stories.status','approver_status','moderator_status','approver_remarks')
            ->where('documenttypes_id',1)
            ->where('contributor_status',1)
            ->where('moderator_status',2)
            ->where('approver_status',0)
            ->orWhere('approver_status',1)
            ->get();
    		
    	}
    	else
    	{
    		$listdata=DB::table('stories')
    	 	->join('documents','documents.id','stories.documents_id')
    	 	->join('storyprocessings','storyprocessings.stories_id','stories.id')
    		->select('stories.id','documents.documentnumber','stories.created_at','stories.entitle','stories.status','approver_status','moderator_status','approver_remarks')
            ->where('documenttypes_id',1)
            ->where('contributor_status',1)
            ->where('moderator_status',2)
            ->where('approver_status',2)
            ->get();

    		
    	} 
    	
    	$attachment=Storyattachment::all();
    	return view('storydocument.approvedstorylist',compact('listdata','val','attachment'));
    }

    public function approvedstoryapprove(Request $request, $id)
    {
        if($request->ajax())
        {
        	   $formdata = array(
                'approver_status' =>  1,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
            );
            Storyprocessing::where('stories_id',$id)->update($formdata);
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }

    public function approvedstoryupdate(Request $request)
    {
        if($request->ajax())
        {
            $statusid = $request->status_id;
            if($statusid==1){
                $formdata = array(
                'approver_remarks' =>  $request->approve_remarks,
                'approver_status' =>  2,
				'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
        		);
            }else if($statusid==2){
                $formdata = array(
                'approver_remarks' =>  $request->approve_remarks,
				'contributor_status' => 2,
                'approver_status' =>  0,
				'moderator_status' =>  0,
                'approver_id' =>  Auth::user()->id,
                'approve_timestamp' =>  date('Y-m-d H:i:s')
        		);
            }
        	
            Storyprocessing::whereId($request->hidden_id)->update($formdata);
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }
}
