<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usertype;
use App\Component;
use App\Componentpermission;
use App\Menulinktype;
use App\Contenttype;
use App\Filetype;
use App\Communicationtype;
use App\Staffcategory;
use App\Office;
use App\Department;
use App\Designation;
use App\Sitesetting;
use App\Language;
use App\Sitecontrollabel;
use App\User;
use App\Document;
use App\Documentaction;
use App\Documentorigin;
use App\Documentprocessing;
use App\Documenttype;
use App\Fielddepartment;
use App\Story;
use App\Storyattachment;
use App\Storyprocessing;

use DB;
use Auth;
use Session;

use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class StoryContributorController extends Controller
{
     public function contributorhome(Request $request)
    {
    	return view('storycontributordashboard');
    }
     public function contributorstorylist(Request $request)
    {
    	//$displayval=Story::all();
    	$displayval=DB::table('stories')
    	 	->join('documents','documents.id','stories.documents_id')
    		->select('stories.id','documents.documentnumber','stories.created_at','stories.entitle','stories.status')
            ->where('documenttypes_id',1)
			//->where('users_id', $uid)
            ->get();
            $attachment=Storyattachment::all();
            
                	return view('storydocument.contributorstorylist',compact('displayval','attachment'));
    }
           
    public function storycreate(Request $request)
    {
    	if($request->ajax())
        {
              
            $category     = DB::table('storycategories')->orderBy('id','asc')->get();
            $documents     = DB::table('documents')->where('documenttypes_id',1)->orderBy('id','asc')->get();
            
            return response()->json(['category'=>$category,'documents' => $documents]);
        }
    }


public function storystore(Request $request)
 {

 	$request->validate([
            
            'documents_id'          =>'required', 
            'categories_id'          =>'required', 
            'entitle'          =>'required|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         =>'sometimes|nullable|regex:/(^[\P{Malayalam}_.,]+$)/',
            'encontent'       =>'required',
            'malcontent'      =>'sometimes|nullable',
            'filename1'      =>'sometimes|nullable|mimes:png,jpg,jpeg,pdf|max:1100',
            'filename2'      =>'sometimes|nullable|mimes:png,jpg,jpeg,pdf|max:1100',
            'filename3'      =>'sometimes|nullable|mimes:png,jpg,jpeg,pdf|max:1100',
            'status'       =>'required',
            'remark'       =>'sometimes|nullable'

        ]);
 	if($request->ajax())
        {
        	 $chkrows= Story::where('entitle',$request->entitle)->exists() ? 1 : 0;
            if($chkrows==0)
            {

            		
            		$en_content =$request->hid_encontent;
            		$mal_content =$request->hid_malcontent;
					$encontent = clean($en_content);
					$malcontent = clean($mal_content);
            		
            		
            	 		
	            $resultsave = new Story([
	                
	                'documents_id'        		=>  $request->documents_id,
	                'storycategories_id'        =>   $request->categories_id,
	                'entitle'        			=>  $request->entitle,
	                'maltitle'        			=>  $request->maltitle, 
	                'encontent'        			=>  $encontent, 
	                'malcontent'        		=>  $malcontent, 
	                'published'        			=>  0, 
	                'status'        			=>  $request->status,
	                'users_id'     				=>  Auth::user()->id
	                
	            ]); 

		            $resultsave->save();
		            $storyid=$resultsave->id;

		              if($request->filename1!='')
		            {
		            	$date = date('dmYH:i:s');

		            	 $fileName = 'story1'.$date.'.'.$request->filename1->extension();  
	                       $request->filename1->move(public_path('Story'), $fileName); 
	                      $ext = $request->file('filename1')->getClientOriginalExtension();
	 					$resultprocessa= new Storyattachment([
		                'stories_id'    =>  $storyid,
		                'file'        	=>  $fileName,
		                'filetype'    	=>  $ext,
		                'users_id' 		=>  Auth::user()->id
		                

		            	]); 
		           			$resultprocessa->save();
	            	}
	            	  if($request->filename2!='')
		            {
		            	$date = date('dmYH:i:s');

		            	 $fileName = 'story2'.$date.'.'.$request->filename2->extension();  
	                       $request->filename2->move(public_path('Story'), $fileName); 
	                      $ext = $request->file('filename2')->getClientOriginalExtension();
	 					$resultprocessb= new Storyattachment([
		                'stories_id'    =>  $storyid,
		                'file'        	=>  $fileName,
		                'filetype'    	=>  $ext,
		                'users_id' 		=>  Auth::user()->id
		                

		            	]); 
		            	$resultprocessb->save();
		           
	            	}
	            	  if($request->filename3!='')
		            {
		            	$date = date('dmYH:i:s');

		            	 $fileName = 'story3'.$date.'.'.$request->filename3->extension();  
	                       $request->filename3->move(public_path('Story'), $fileName); 
	                      $ext = $request->file('filename3')->getClientOriginalExtension();
	 					$resultprocessc= new Storyattachment([
		                'stories_id'    =>  $storyid,
		                'file'        	=>  $fileName,
		                'filetype'    	=>  $ext,
		                'users_id' 		=>  Auth::user()->id
		                

		            	]); 
		            	$resultprocessc->save();
		           
	            	}

	            	
	            	 $storyprocess = new Storyprocessing([
	                'stories_id'        	=>  $storyid,
	                'currentowner'        	=>  Auth::user()->id,
	                'contributor_status'    =>  1,
	                'contributor_id'        =>  Auth::user()->id,
	                'contributor_timestamp' =>  date('Y-m-d H:i:s'),
	                'contributor_remarks'	=> $request->remark
	                

	            ]); 

	              $storyprocess->save();

	          return response()->json(['success' => 'Data Added successfully.']);
	        } else {
	        	return response()->json(['errors' => 'Already a Go  exists.']);
	        }        

        }
 }

 
    public function storyedit(Request $request, $id)
    {
        if($request->ajax())
        {
            $resultdata = Story::find($id);
            $category     = DB::table('storycategories')->orderBy('id','asc')->get();
            $documents     = DB::table('documents')->where('documenttypes_id',1)->orderBy('id','asc')->get(); 
            $storyattachment     = DB::table('storyattachments')->where('stories_id',$id)->get();
            $processing = DB::table('storyprocessings')->where('stories_id',$id)->get();
            return response()->json(['resultdata' => $resultdata,'category'=>$category,'documents'=>$documents,'storyattachment'=>$storyattachment,'processing'=>$processing]);
        }

    }

     public function imageremove(Request $request,$id)
    {
        
        $imagedata = Storyattachment::where('id',$id)->get(); 
        foreach($imagedata as $imagedatas){
       $pathname=$imagedatas->file;
        unlink(public_path().'/Story/'.$pathname);
        }
     $deldata=  Storyattachment::where('id',$id)->delete();
     if($deldata){$message=1;}else{$message=0;}
    

          return response()->json(['msg' => $message]);       
       
    }

    public function storyupdate(Request $request)
    {
		$request->validate([
             'documents_id'          =>'required', 
            'categories_id'          =>'required', 
            'entitle'          =>'required|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         =>'sometimes|nullable|regex:/(^[\P{Malayalam}_.,]+$)/',
            'encontent'       =>'required',
            'malcontent'      =>'sometimes|nullable',
            'filename1'      =>'sometimes|nullable|mimes:png,jpg,jpeg,pdf|max:1100',
            'filename2'      =>'sometimes|nullable|mimes:png,jpg,jpeg,pdf|max:1100',
            'filename3'      =>'sometimes|nullable|mimes:png,jpg,jpeg,pdf|max:1100',
            'status'       =>'required',
            'remark'       =>'sometimes|nullable'

        ]);
        if($request->ajax())
        {


            $chkrows= Story::where('entitle',$request->entitle)->where('id','!=',$request->hidden_id)->exists() ? 1 : 0;
            if($chkrows==0){

            	$en_content =$request->hid_encontent;
            		$mal_content =$request->hid_malcontent;
					$encontent = clean($en_content);
					$malcontent = clean($mal_content);
            			
		            $form_data = array(
		             'documents_id'        		=>  $request->documents_id,
	                'storycategories_id'        =>   $request->categories_id,
	                'entitle'        			=>  $request->entitle,
	                'maltitle'        			=>  $request->maltitle, 
	                'encontent'        			=>  $encontent, 
	                'malcontent'        		=>  $malcontent, 
	                'published'        			=>  0, 
	                'status'        			=>  $request->status,
	                'users_id'     				=>  Auth::user()->id
		            );
		       
	            Story::whereId($request->hidden_id)->update($form_data);
                $storyid=$request->hidden_id;
	              if($request->filename1!='')
		            {
		            	$date = date('dmYH:i:s');

		            	 $fileName = 'story1'.$date.'.'.$request->filename1->extension();  
	                       $request->filename1->move(public_path('Story'), $fileName); 
	                      $ext = $request->file('filename1')->getClientOriginalExtension();
	 					$resultprocessa= new Storyattachment([
		                'stories_id'    =>  $storyid,
		                'file'        	=>  $fileName,
		                'filetype'    	=>  $ext,
		                'users_id' 		=>  Auth::user()->id
		                

		            	]); 
		           			$resultprocessa->save();
	            	}
	            	  if($request->filename2!='')
		            {
		            	$date = date('dmYH:i:s');

		            	 $fileName = 'story2'.$date.'.'.$request->filename2->extension();  
	                       $request->filename2->move(public_path('Story'), $fileName); 
	                      $ext = $request->file('filename2')->getClientOriginalExtension();
	 					$resultprocessb= new Storyattachment([
		                'stories_id'    =>  $storyid,
		                'file'        	=>  $fileName,
		                'filetype'    	=>  $ext,
		                'users_id' 		=>  Auth::user()->id
		                

		            	]); 
		            	$resultprocessb->save();
		           
	            	}
	            	  if($request->filename3!='')
		            {
		            	$date = date('dmYH:i:s');

		            	 $fileName = 'story3'.$date.'.'.$request->filename3->extension();  
	                       $request->filename3->move(public_path('Story'), $fileName); 
	                      $ext = $request->file('filename3')->getClientOriginalExtension();
	 					$resultprocessc= new Storyattachment([
		                'stories_id'    =>  $storyid,
		                'file'        	=>  $fileName,
		                'filetype'    	=>  $ext,
		                'users_id' 		=>  Auth::user()->id
		                

		            	]); 
		            	$resultprocessc->save();
		           
	            	}


	            return response()->json(['success' => 'Data is successfully updated']);
	        } else {
	        	return response()->json(['errors' => 'Already a Govt order exists.']);
	        }    
        }
        
    }

    public function storydestroy(Request $request, $id)
    {
        if($request->ajax())
        {
            
            Storyprocessing::where('stories_id',$id)->delete();
            Storyattachment::where('stories_id',$id)->delete();
            Story::findOrFail($id)->delete();
        }
        return response()->json(['success' => 'Data is successfully Deleted']);
    }
	
	public function storystatus(Request $request, $id)
    {
        if($request->ajax())
        {
            $getstatus = DB::table('stories')
                ->select('status')
                ->where('id',$id)
                ->first();

            $status = $getstatus->status;
            if($status==1){
                $upd_status = array('status' => 2);
                DB::table('stories')->where('id',$id)->update($upd_status);
                 return response()->json(['success' => 'Data Updated successfully.']);
            }
            else{
                
				$upd_status = array('status' => 1);
				DB::table('documents')->where('id',$id)->update($upd_status);
				return response()->json(['success' => 'Data Updated successfully.']);
				
   

            } 
        }
        
    }
/*Controller End*/
}
