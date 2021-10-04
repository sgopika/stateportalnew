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
use App\Document;
use App\Documenttype;
use App\Documentprocessing;
use DB;
use Auth;
use Session;
use Carbon\Carbon;

class DocModeratorController extends Controller
{
    public function documentmoderatorhome(Request $request)
    {
    	return view('documentmoderatordashboard');
    }
    public function contributeditems(Request $request, $val)
    {

    	return view('documentmoderator.contributeditems',compact('val'));
    } 
    
    public function contributedcabinetdecisionlist(Request $request, $val)
    {
    	if(Auth::user()->usertypes_id==4){
           if($val==1){
            //$listdata = Documentprocessing::where('documenttypes_id',2)->where('contributor_status',1)->where('moderator_status',0)->orWhere('moderator_status',1)->where('approve_status',0)->get();
            $listdata=DB::table('documents')
            ->join('documenttypes','documenttypes.id','=','documents.documenttypes_id')
            ->join('documentprocessings','documentprocessings.documents_id','=','documents.id')
            ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documenttypes.id','documents.created_at','documents.entitle','documents.status','approver_status','moderator_status')
            ->where('documents.documenttypes_id',2)
            ->where('contributor_status',1)
            ->where('moderator_status','<',2)
            ->orWhere('moderator_status',1)
            ->where('approver_status',0)
            ->get();
            } else{
                //$listdata = Documentprocessing::where('documenttypes_id',2)->where('contributor_status',1)->where('moderator_status',2)->get();
                $listdata=DB::table('documents')
                ->join('documenttypes','documenttypes.id','=','documents.documenttypes_id')
                ->join('documentprocessings','documentprocessings.documents_id','=','documents.id')
                ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documenttypes.id','documents.created_at','documents.entitle','documents.status','approver_status','moderator_status')
                ->where('documents.documenttypes_id',2)
                ->where('contributor_status',1)
                ->where('moderator_status',2)
                ->where('approver_status',0)
                ->get();
            } 
        }else if(Auth::user()->usertypes_id==5){
            if($val==1){
            //$listdata = Documentprocessing::where('documenttypes_id',2)->where('contributor_status',1)->where('moderator_status',0)->orWhere('moderator_status',1)->where('approve_status',0)->get();
             $listdata=DB::table('documents')
            ->join('documenttypes','documenttypes.id','=','documents.documenttypes_id')
            ->join('documentprocessings','documentprocessings.documents_id','=','documents.id')
            ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documenttypes.id','documents.created_at','documents.entitle','documents.status','approver_status','moderator_status')
            ->where('documents.documenttypes_id',2)
            ->where('contributor_status',1)
            ->where('moderator_status',2)
            ->where('approver_status','<',2)
            ->get();
            } else{
                //$listdata = Documentprocessing::where('documenttypes_id',2)->where('contributor_status',1)->where('moderator_status',2)->get();
                $listdata=DB::table('documents')
                ->join('documenttypes','documenttypes.id','=','documents.documenttypes_id')
                ->join('documentprocessings','documentprocessings.documents_id','=','documents.id')
                ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documenttypes.id','documents.created_at','documents.entitle','documents.status','approver_status','moderator_status')
                ->where('documents.documenttypes_id',2)
                ->where('contributor_status',1)
                ->where('moderator_status',2)
                ->where('approver_status',2)
                ->get();
            } 
        }
        
    	
    	$documenttype=Documenttype::all();
    	return view('documentmoderator.contributedcabinetdecisionlist',compact('listdata','val','documenttype'));
    }
    public function contributedcabinetdecisionverify(Request $request, $id)
    {
        if($request->ajax())
        {
            if(Auth::user()->usertypes_id==4){
                $formdata = array(
                'moderator_status' =>  1,
                'moderator_id' =>  Auth::user()->id,
                'moderator_timestamp' =>  date('Y-m-d H:i:s')
                );            
            } else if(Auth::user()->usertypes_id==5){
                $formdata = array(
                'approver_status' =>  1,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
                ); 
            }
            
            Documentprocessing::where('documents_id',$id)->update($formdata);
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }
    public function contributedcabinetdecisionupdate(Request $request)
    {
        if($request->ajax())
        {
            $statusid = $request->status_id;
            if(Auth::user()->usertypes_id==4){
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
            } else if(Auth::user()->usertypes_id==5){
                if($statusid==1){
                    $formdata = array(
                    'approver_remarks' =>  $request->moderator_remarks,
                    'approver_status' =>  2,
                    'approver_id' =>  Auth::user()->id,
                    'approver_timestamp' =>  date('Y-m-d H:i:s')
                    );
                }else if($statusid==2){
                    $formdata = array(
                    'approver_remarks' =>  $request->moderator_remarks,
                    'contributor_status' => 2,
                    'approver_status' =>  0,
                    'approver_id' =>  Auth::user()->id,
                    'approver_timestamp' =>  date('Y-m-d H:i:s')
                    );
                }
            }
            
            
            Documentprocessing::where('documents_id',$request->hidden_id)->update($formdata);
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function circularlist(Request $request, $val)
    {
        
        if(Auth::user()->usertypes_id==4){
              if($val==1){
                $listdata=DB::table('documents')
                ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                ->join('documentprocessings','documentprocessings.documents_id','documents.id')
                ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documenttypes.id','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
                ->where('documents.documenttypes_id',3)
                ->where('contributor_status',1)
                ->where('moderator_status','<',2)
                ->where('approver_status',0)
                ->get();
            } else{
                $listdata=DB::table('documents')
                ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                ->join('documentprocessings','documentprocessings.documents_id','documents.id')
                ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documenttypes.id','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
                ->where('documents.documenttypes_id',3)
                ->where('contributor_status',1)
                ->where('moderator_status',2)
                ->where('approver_status',0)
                ->get();
            } 
        }else if(Auth::user()->usertypes_id==5){
                if($val==1){
                $listdata=DB::table('documents')
                ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                ->join('documentprocessings','documentprocessings.documents_id','documents.id')
                ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documenttypes.id','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
                ->where('documents.documenttypes_id',3)
                ->where('contributor_status',1)
                ->where('moderator_status',2)
                ->where('approver_status','<',2)
                ->get();
            } else{
                $listdata=DB::table('documents')
                ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                ->join('documentprocessings','documentprocessings.documents_id','documents.id')
                ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documenttypes.id','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
                ->where('documents.documenttypes_id',3)
                ->where('approver_status',2)
                ->get();
            } 
        }
        $documenttype=Documenttype::all();
        return view('documentmoderator.circularlist',compact('listdata','val','documenttype'));
    }
    public function circularverify(Request $request, $id)
    {
        if($request->ajax())
        {
             if(Auth::user()->usertypes_id==4){
                $formdata = array(
                'moderator_status' =>  1,
                'moderator_id' =>  Auth::user()->id,
                'moderator_timestamp' =>  date('Y-m-d H:i:s')
            );           
            } else if(Auth::user()->usertypes_id==5){
                $formdata = array(
                'approver_status' =>  1,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
            );
            }
            
            Documentprocessing::where('documents_id',$id)->update($formdata);
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }
    public function circularupdate(Request $request)
    {
        if($request->ajax())
        {
            $statusid = $request->status_id;
            
             if(Auth::user()->usertypes_id==4){
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
            } else if(Auth::user()->usertypes_id==5){
               if($statusid==1){
                $formdata = array(
                'approver_remarks' =>  $request->moderator_remarks,
                'approver_status' =>  2,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
                );
            }else if($statusid==2){
                $formdata = array(
                'approver_remarks' =>  $request->moderator_remarks,
                'contributor_status' => 2,
                'approver_status' =>  0,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
                );
            }
            }
            Documentprocessing::where('documents_id',$request->hidden_id)->update($formdata);
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }
     ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function rtidocumentlist(Request $request, $val)
    {
         
        if(Auth::user()->usertypes_id==4){
            if($val==1){
                $listdata=DB::table('documents')
                ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                ->join('documentprocessings','documentprocessings.documents_id','documents.id')
                ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documenttypes.id','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
                ->where('documents.documenttypes_id',4)
                ->where('contributor_status',1)
                ->where('moderator_status','<',2)
                ->where('approver_status',0)
                ->get();
            } else{
                //$listdata = Documentprocessing::where('documenttypes_id',2)->where('contributor_status',1)->where('moderator_status',2)->get();
                $listdata=DB::table('documents')
                ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                ->join('documentprocessings','documentprocessings.documents_id','documents.id')
                ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documenttypes.id','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
                ->where('documents.documenttypes_id',4)
                ->where('contributor_status',1)
                ->where('moderator_status',2)
                ->where('approver_status',0)
                ->get();
            }
        }else if(Auth::user()->usertypes_id==5){
                if($val==1){
                $listdata=DB::table('documents')
                ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                ->join('documentprocessings','documentprocessings.documents_id','documents.id')
                ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documenttypes.id','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
                ->where('documents.documenttypes_id',4)
                ->where('contributor_status',1)
                ->where('moderator_status',2)
                ->where('approver_status','<',2)
                ->get();
            } else{
                //$listdata = Documentprocessing::where('documenttypes_id',2)->where('contributor_status',1)->where('moderator_status',2)->get();
                $listdata=DB::table('documents')
                ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                ->join('documentprocessings','documentprocessings.documents_id','documents.id')
                ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documenttypes.id','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
                ->where('documents.documenttypes_id',4)
                ->where('contributor_status',1)
                ->where('moderator_status',2)
                ->where('approver_status',2)
                ->get();
            }
        }
        $documenttype=Documenttype::all();
        return view('documentmoderator.rtidocumentlist',compact('listdata','val','documenttype'));
    }
    public function rtidocumentverify(Request $request, $id)
    {
        if($request->ajax())
        {
            
            if(Auth::user()->usertypes_id==4){
              $formdata = array(
                'moderator_status' =>  1,
                'moderator_id' =>  Auth::user()->id,
                'moderator_timestamp' =>  date('Y-m-d H:i:s')
            ); 
            } else if(Auth::user()->usertypes_id==5){
              $formdata = array(
                'approver_status' =>  1,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
            ); 
            }
            Documentprocessing::where('documents_id',$id)->update($formdata);
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }
    public function rtidocumentupdate(Request $request)
    {
        if($request->ajax())
        {
            $statusid = $request->status_id;
            
            if(Auth::user()->usertypes_id==4){
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
            } else if(Auth::user()->usertypes_id==5){
               if($statusid==1){
                $formdata = array(
                'approver_remarks' =>  $request->moderator_remarks,
                'approver_status' =>  2,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
                );
            }else if($statusid==2){
                $formdata = array(
                'approver_remarks' =>  $request->moderator_remarks,
                'contributor_status' => 2,
                'approver_status' =>  0,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
                );
            }
            }
            Documentprocessing::where('documents_id',$request->hidden_id)->update($formdata);
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }
    ///////////////////////////////////////////actandruleslist/////////////////////////////
    public function actandruleslist(Request $request, $val)
    {
        
        if(Auth::user()->usertypes_id==4){
            if($val==1){
                $actandrules=DB::table('documents')
                ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                ->join('documentprocessings','documentprocessings.documents_id','documents.id')
                ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documenttypes.id','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
                ->where('documents.documenttypes_id',5)
                ->where('documentprocessings.contributor_status',1)
                ->where('documentprocessings.moderator_status','<',2)
                ->where('approver_status',0)
                ->get();
            } else{
                $actandrules=DB::table('documents')
                ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                ->join('documentprocessings','documentprocessings.documents_id','documents.id')
                ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documenttypes.id','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
                ->where('documents.documenttypes_id',5)
                ->where('documentprocessings.contributor_status',1)
                ->where('documentprocessings.moderator_status',2)
                ->get();                
            } 
        }else if(Auth::user()->usertypes_id==5){
               if($val==1){
                    $actandrules=DB::table('documents')
                    ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                    ->join('documentprocessings','documentprocessings.documents_id','documents.id')
                    ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documenttypes.id','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
                    ->where('documents.documenttypes_id',5)
                    ->where('documentprocessings.contributor_status',1)
                    ->where('documentprocessings.moderator_status','<',2)
                    ->where('approver_status',0)
                    ->get();
                } else{
                    $actandrules=DB::table('documents')
                    ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                    ->join('documentprocessings','documentprocessings.documents_id','documents.id')
                    ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documenttypes.id','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
                    ->where('documents.documenttypes_id',5)
                    ->where('documentprocessings.contributor_status',1)
                    ->where('documentprocessings.moderator_status',2)
                    ->where('approver_status',2)
                    ->get();                        
                    } 
        }
        $documenttype=Documenttype::all();
        return view('documentmoderator.actandruleslist',compact('actandrules','val','documenttype'));
    }
    public function actandrulesverify(Request $request, $id)
    {
        if($request->ajax())
        {
             if(Auth::user()->usertypes_id==4){
               $formdata = array(
                'moderator_status' =>  1,
                'moderator_id' =>  Auth::user()->id,
                'moderator_timestamp' =>  date('Y-m-d H:i:s')
            );
            } else if(Auth::user()->usertypes_id==5){
               $formdata = array(
                'approver_status' =>  1,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
            );
            }
            
            Documentprocessing::where('documents_id',$id)->update($formdata);
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }
    public function actandrulesupdate(Request $request)
    {
        if($request->ajax())
        {
            $statusid = $request->status_id;
             if(Auth::user()->usertypes_id==4){
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
            } else if(Auth::user()->usertypes_id==5){
               if($statusid==1){
                $formdata = array(
                'approver_remarks' =>  $request->moderator_remarks,
                'approver_status' =>  2,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
                );
            }else if($statusid==2){
                $formdata = array(
                'approver_remarks' =>  $request->moderator_remarks,
                'contributor_status' => 2,
                'approver_status' =>  0,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
                );
            }
            }
            
            
            Documentprocessing::where('documents_id',$request->hidden_id)->update($formdata);
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }
     ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function ordinancelist(Request $request, $val)
    {
        
         if(Auth::user()->usertypes_id==4){
           if($val==1){
                $listdata=DB::table('documents')
                ->join('documenttypes','documenttypes.id','=','documents.documenttypes_id')
                ->join('documentprocessings','documentprocessings.documents_id','=','documents.id')
                ->where('documents.documenttypes_id',6)
                ->where('documentprocessings.contributor_status',1)
                ->where('documentprocessings.moderator_status','<',2)
                ->where('approver_status',0)
                ->get();
            } else{
                $listdata=DB::table('documents')
                ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                ->join('documentprocessings','documentprocessings.documents_id','documents.id')
                ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documenttypes.id','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
                ->where('documents.documenttypes_id',6)
                ->where('contributor_status',1)
                ->where('moderator_status',2)
                ->get();
            } 
        }else if(Auth::user()->usertypes_id==5){
               if($val==1){
                    $listdata=DB::table('documents')
                    ->join('documenttypes','documenttypes.id','=','documents.documenttypes_id')
                    ->join('documentprocessings','documentprocessings.documents_id','=','documents.id')
                    ->where('documents.documenttypes_id',6)
                    ->where('documentprocessings.contributor_status',1)
                    ->where('documentprocessings.moderator_status',2)
                    ->where('approver_status','<',2)
                    ->get();
                } else{
                    $listdata=DB::table('documents')
                    ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                    ->join('documentprocessings','documentprocessings.documents_id','documents.id')
                    ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documenttypes.id','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
                    ->where('documents.documenttypes_id',6)
                    ->where('contributor_status',1)
                    ->where('moderator_status',2)
                    ->where('approver_status',2)
                    ->get();
                } 
        }
        $documenttype=Documenttype::all();
        //$data=DB::table('documents')->where('id',7);

        return view('documentmoderator.ordinancelist',compact('listdata','val','documenttype'));
    }
    public function ordinanceverify(Request $request, $id)
    {
        if($request->ajax())
        {
            
             if(Auth::user()->usertypes_id==4){
               $formdata = array(
                'moderator_status' =>  1,
                'moderator_id' =>  Auth::user()->id,
                'moderator_timestamp' =>  date('Y-m-d H:i:s')
            );
            } else if(Auth::user()->usertypes_id==5){
               $formdata = array(
                'approver_status' =>  1,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
            );
            }
            Documentprocessing::where('documents_id',$id)->update($formdata);
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }
    public function ordinanceupdate(Request $request)
    {
        if($request->ajax())
        {
            $statusid = $request->status_id;
            
            if(Auth::user()->usertypes_id==4){
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
            } else if(Auth::user()->usertypes_id==5){
               if($statusid==1){
                $formdata = array(
                'approver_remarks' =>  $request->moderator_remarks,
                'approver_status' =>  2,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
                );
            }else if($statusid==2){
                $formdata = array(
                'approver_remarks' =>  $request->moderator_remarks,
                'contributor_status' => 2,
                'approver_status' =>  0,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
                );
            }
            }
            Documentprocessing::where('documents_id',$request->hidden_id)->update($formdata);
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }
     ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function notificationlist(Request $request, $val)
    {
        
        if(Auth::user()->usertypes_id==4){
           if($val==1){
            $listdata=DB::table('documents')
            ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
            ->join('documentprocessings','documentprocessings.documents_id','documents.id')
            ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
            ->where('documents.documenttypes_id',7)
            ->where('contributor_status',1)
            ->where('moderator_status','<',2)
            ->where('approver_status',0)
            ->get();
        } else{
            $listdata=DB::table('documents')
            ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
            ->join('documentprocessings','documentprocessings.documents_id','documents.id')
            ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documenttypes.id','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
            ->where('documents.documenttypes_id',7)
            ->where('contributor_status',1)
            ->where('moderator_status',2)
            ->get();
        } 
        }else if(Auth::user()->usertypes_id==5){
               if($val==1){
            $listdata=DB::table('documents')
            ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
            ->join('documentprocessings','documentprocessings.documents_id','documents.id')
            ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
            ->where('documents.documenttypes_id',7)
            ->where('contributor_status',1)
            ->where('moderator_status',2)
            ->where('approver_status','<',2)
            ->get();
        } else{
            $listdata=DB::table('documents')
            ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
            ->join('documentprocessings','documentprocessings.documents_id','documents.id')
            ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documenttypes.id','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
            ->where('documents.documenttypes_id',7)
            ->where('contributor_status',1)
            ->where('moderator_status',2)
            ->where('approver_status',2)
            ->get();
        } 
        }
        $documenttype=Documenttype::all();
        return view('documentmoderator.notificationlist',compact('listdata','val','documenttype'));
    }
    public function notificationverify(Request $request, $id)
    {
        
        if($request->ajax())
        {
            
             if(Auth::user()->usertypes_id==4){
               $formdata = array(
                'moderator_status' =>  1,
                'moderator_id' =>  Auth::user()->id,
                'moderator_timestamp' =>  date('Y-m-d H:i:s')
            );
            } else if(Auth::user()->usertypes_id==5){
               $formdata = array(
                'approver_status' =>  1,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
            );
            }
            Documentprocessing::where('documents_id',$id)->update($formdata);
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }
    public function notificationupdate(Request $request)
    {
        if($request->ajax())
        {
            $statusid = $request->status_id;
            
             if(Auth::user()->usertypes_id==4){
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
            } else if(Auth::user()->usertypes_id==5){
               if($statusid==1){
                $formdata = array(
                'approver_remarks' =>  $request->moderator_remarks,
                'approver_status' =>  2,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
                );
            }else if($statusid==2){
                $formdata = array(
                'approver_remarks' =>  $request->moderator_remarks,
                'contributor_status' => 2,
                'approver_status' =>  0,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
                );
            }
            }
            
            Documentprocessing::where('documents_id',$request->hidden_id)->update($formdata);
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function docguidelineslist(Request $request, $val)
    {
         if(Auth::user()->usertypes_id==4){
               if($val==1){
            $listdata=DB::table('documents')
            ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
            ->join('documentprocessings','documentprocessings.documents_id','documents.id')
            ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
            ->where('documents.documenttypes_id',8)
            ->where('contributor_status',1)
            ->where('moderator_status','<',2)
            ->where('approver_status',0)
            ->get();
        } else{
            $listdata=DB::table('documents')
            ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
            ->join('documentprocessings','documentprocessings.documents_id','documents.id')
            ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documenttypes.id','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
            ->where('documents.documenttypes_id',8)
            ->where('contributor_status',1)
            ->where('moderator_status',2)
            ->where('approver_status',0)
            ->get();
        } 
        } else if(Auth::user()->usertypes_id==5){
          if($val==1){
            $listdata=DB::table('documents')
            ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
            ->join('documentprocessings','documentprocessings.documents_id','documents.id')
            ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
            ->where('documents.documenttypes_id',8)
            ->where('contributor_status',1)
            ->where('moderator_status',2)
            ->where('approver_status','<',2)
            ->get();
        } else{
            $listdata=DB::table('documents')
            ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
            ->join('documentprocessings','documentprocessings.documents_id','documents.id')
            ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documenttypes.id','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
            ->where('documents.documenttypes_id',8)
            ->where('contributor_status',1)
            ->where('moderator_status',2)
            ->where('approver_status',2)
            ->get();
        }  
        }
        
        $documenttype=Documenttype::all();
        return view('documentmoderator.docguidelineslist',compact('listdata','val','documenttype'));
    }
    public function docguidelinesverify(Request $request, $id)
    {
        
        if($request->ajax())
        {
            if(Auth::user()->usertypes_id==4){
               $formdata = array(
                'moderator_status' =>  1,
                'moderator_id' =>  Auth::user()->id,
                'moderator_timestamp' =>  date('Y-m-d H:i:s')
            );
            } else if(Auth::user()->usertypes_id==5){
              $formdata = array(
                'approver_status' =>  1,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
            ); 
            }
            
            Documentprocessing::where('documents_id',$id)->update($formdata);
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }
    public function docguidelinesupdate(Request $request)
    {
        if($request->ajax())
        {
            $statusid = $request->status_id;
             if(Auth::user()->usertypes_id==4){
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
            } else if(Auth::user()->usertypes_id==5){
               if($statusid==1){
                $formdata = array(
                'approver_remarks' =>  $request->moderator_remarks,
                'approver_status' =>  2,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
                );
            }else if($statusid==2){
                $formdata = array(
                'approver_remarks' =>  $request->moderator_remarks,
                'contributor_status' => 2,
                'approver_status' =>  0,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
                );
            }
            }
            
            
            Documentprocessing::where('documents_id',$request->hidden_id)->update($formdata);
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function citizencharterlist(Request $request, $val)
    {
         if(Auth::user()->usertypes_id==4){
               if($val==1){
            $listdata=DB::table('documents')
            ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
            ->join('documentprocessings','documentprocessings.documents_id','documents.id')
            ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
            ->where('documents.documenttypes_id',9)
            ->where('contributor_status',1)
            ->where('moderator_status','<',2)
            ->where('approver_status',0)
            ->get();
        } else{
            $listdata=DB::table('documents')
            ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
            ->join('documentprocessings','documentprocessings.documents_id','documents.id')
            ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documenttypes.id','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
            ->where('documents.documenttypes_id',9)
            ->where('contributor_status',1)
            ->where('moderator_status',2)
            ->where('approver_status',0)
            ->get();
        } 
        } else if(Auth::user()->usertypes_id==5){
           if($val==1){
            $listdata=DB::table('documents')
            ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
            ->join('documentprocessings','documentprocessings.documents_id','documents.id')
            ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
            ->where('documents.documenttypes_id',9)
            ->where('contributor_status',1)
            ->where('moderator_status',2)
            ->where('approver_status','<',2)
            ->get();
        } else{
            $listdata=DB::table('documents')
            ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
            ->join('documentprocessings','documentprocessings.documents_id','documents.id')
            ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documenttypes.id','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
            ->where('documents.documenttypes_id',9)
            ->where('contributor_status',1)
            ->where('moderator_status',2)
            ->where('approver_status',2)
            ->get();
        } 
        }
        
        $documenttype=Documenttype::all();
        return view('documentmoderator.citizencharterlist',compact('listdata','val','documenttype'));
    }
    public function citizencharterverify(Request $request, $id)
    {
        
        if($request->ajax())
        {
            
            if(Auth::user()->usertypes_id==4){
               $formdata = array(
                'moderator_status' =>  1,
                'moderator_id' =>  Auth::user()->id,
                'moderator_timestamp' =>  date('Y-m-d H:i:s')
            );
            } else if(Auth::user()->usertypes_id==5){
               $formdata = array(
                'approver_status' =>  1,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
            );
            }
            Documentprocessing::where('documents_id',$id)->update($formdata);
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }
    public function citizencharterupdate(Request $request)
    {
        if($request->ajax())
        {
            $statusid = $request->status_id;
             if(Auth::user()->usertypes_id==4){
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
            } else if(Auth::user()->usertypes_id==5){
               if($statusid==1){
                $formdata = array(
                'approver_remarks' =>  $request->moderator_remarks,
                'approver_status' =>  2,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
                );
            }else if($statusid==2){
                $formdata = array(
                'approver_remarks' =>  $request->moderator_remarks,
                'contributor_status' => 2,
                'approver_status' =>  0,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
                );
            }
            }
            
            
            Documentprocessing::where('documents_id',$request->hidden_id)->update($formdata);
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }
   //////////////////////////////////////// disciplinarylist///////////////////////////////////////////////
    public function disciplinarylist(Request $request, $val)
    {
         if(Auth::user()->usertypes_id==4){
               if($val==1){
            $listdata=DB::table('documents')
            ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
            ->join('documentprocessings','documentprocessings.documents_id','documents.id')
            ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
            ->where('documents.documenttypes_id',10)
            ->where('contributor_status',1)
            ->where('moderator_status','<',2)
            ->where('approver_status',0)
            ->get();
        } else{
            $listdata=DB::table('documents')
            ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
            ->join('documentprocessings','documentprocessings.documents_id','documents.id')
            ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documenttypes.id','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
            ->where('documents.documenttypes_id',10)
            ->where('contributor_status',1)
            ->where('moderator_status',2)
            ->where('approver_status',0)
            ->get();
        } 
        } else if(Auth::user()->usertypes_id==5){
           if($val==1){
            $listdata=DB::table('documents')
            ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
            ->join('documentprocessings','documentprocessings.documents_id','documents.id')
            ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
            ->where('documents.documenttypes_id',10)
            ->where('contributor_status',1)
            ->where('moderator_status',2)
            ->where('approver_status','<',2)
            ->get();
        } else{
            $listdata=DB::table('documents')
            ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
            ->join('documentprocessings','documentprocessings.documents_id','documents.id')
            ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documenttypes.id','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
            ->where('documents.documenttypes_id',10)
            ->where('contributor_status',1)
            ->where('moderator_status',2)
            ->where('approver_status',2)
            ->get();
        } 
        }
        
        $documenttype=Documenttype::all();
        return view('documentmoderator.disciplinarylist',compact('listdata','val','documenttype'));
    }
    public function disciplinaryverify(Request $request, $id)
    {
        
        if($request->ajax())
        {
             if(Auth::user()->usertypes_id==4){
               $formdata = array(
                'moderator_status' =>  1,
                'moderator_id' =>  Auth::user()->id,
                'moderator_timestamp' =>  date('Y-m-d H:i:s')
            );
            } else if(Auth::user()->usertypes_id==5){
               $formdata = array(
                'approver_status' =>  1,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
            );
            }
            
            Documentprocessing::where('documents_id',$id)->update($formdata);
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }
    public function disciplinaryupdate(Request $request)
    {
        if($request->ajax())
        {
            $statusid = $request->status_id;
             if(Auth::user()->usertypes_id==4){
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
            } else if(Auth::user()->usertypes_id==5){
               if($statusid==1){
                $formdata = array(
                'approver_remarks' =>  $request->moderator_remarks,
                'approver_status' =>  2,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
                );
            }else if($statusid==2){
                $formdata = array(
                'approver_remarks' =>  $request->moderator_remarks,
                'contributor_status' => 2,
                'approver_status' =>  0,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
                );
            }
            }
            
            
            Documentprocessing::where('documents_id',$request->hidden_id)->update($formdata);
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }
    //////////////////////////////////////////////documentfaqlist////////////////////////////////////////////////
     public function documentfaqlist(Request $request, $val)
    {
         if(Auth::user()->usertypes_id==4){
               if($val==1){
                    $listdata=DB::table('documents')
                    ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                    ->join('documentprocessings','documentprocessings.documents_id','documents.id')
                    ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
                    ->where('documents.documenttypes_id',11)
                    ->where('contributor_status',1)
                    ->where('moderator_status','<',2)
                    ->where('approver_status',0)
                    ->get();
                } else{
                    $listdata=DB::table('documents')
                    ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                    ->join('documentprocessings','documentprocessings.documents_id','documents.id')
                    ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documenttypes.id','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
                    ->where('documents.documenttypes_id',11)
                    ->where('contributor_status',1)
                    ->where('moderator_status',2)
                    ->where('approver_status',0)
                    ->get();
                } 
            } else if(Auth::user()->usertypes_id==5){
              if($val==1){
                    $listdata=DB::table('documents')
                    ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                    ->join('documentprocessings','documentprocessings.documents_id','documents.id')
                    ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
                    ->where('documents.documenttypes_id',11)
                    ->where('contributor_status',1)
                    ->where('moderator_status',2)
                    ->where('approver_status','<',2)
                    ->get();
                } else{
                    $listdata=DB::table('documents')
                    ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                    ->join('documentprocessings','documentprocessings.documents_id','documents.id')
                    ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documenttypes.id','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
                    ->where('documents.documenttypes_id',11)
                    ->where('contributor_status',1)
                    ->where('moderator_status',2)
                    ->where('approver_status',2)
                    ->get();
                }  
            }
        
        $documenttype=Documenttype::all();
        return view('documentmoderator.documentfaqlist',compact('listdata','val','documenttype'));
    }
    public function documentfaqverify(Request $request, $id)
    {
        
        if($request->ajax())
        {
            if(Auth::user()->usertypes_id==4){
               $formdata = array(
                'moderator_status' =>  1,
                'moderator_id' =>  Auth::user()->id,
                'moderator_timestamp' =>  date('Y-m-d H:i:s')
            );
            } else if(Auth::user()->usertypes_id==5){
               $formdata = array(
                'approver_status' =>  1,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
            );
            }
            
            Documentprocessing::where('documents_id',$id)->update($formdata);
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }
    public function documentfaqupdate(Request $request)
    {
        if($request->ajax())
        {
            $statusid = $request->status_id;
             if(Auth::user()->usertypes_id==4){
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
            } else if(Auth::user()->usertypes_id==5){
               if($statusid==1){
                $formdata = array(
                'approver_remarks' =>  $request->moderator_remarks,
                'approver_status' =>  2,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
                );
            }else if($statusid==2){
                $formdata = array(
                'approver_remarks' =>  $request->moderator_remarks,
                'contributor_status' => 2,
                'approver_status' =>  0,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
                );
            }
            }
            
            
            Documentprocessing::where('documents_id',$request->hidden_id)->update($formdata);
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }
    ////////////////////////////////////////////workstudyreportlist//////////////////////////////////////////
    public function workstudyreportlist(Request $request, $val)
    {
        if(Auth::user()->usertypes_id==4){
                       if($val==1){
                    $listdata=DB::table('documents')
                    ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                    ->join('documentprocessings','documentprocessings.documents_id','documents.id')
                    ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
                    ->where('documents.documenttypes_id',12)
                    ->where('contributor_status',1)
                    ->where('moderator_status','<',2)
                    ->where('approver_status',0)
                    ->get();
                } else{
                    $listdata=DB::table('documents')
                    ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                    ->join('documentprocessings','documentprocessings.documents_id','documents.id')
                    ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documenttypes.id','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
                    ->where('documents.documenttypes_id',12)
                    ->where('contributor_status',1)
                    ->where('moderator_status',2)
                    ->where('approver_status',0)
                    ->get();
                } 
            } else if(Auth::user()->usertypes_id==5){
               if($val==1){
                    $listdata=DB::table('documents')
                    ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                    ->join('documentprocessings','documentprocessings.documents_id','documents.id')
                    ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
                    ->where('documents.documenttypes_id',12)
                    ->where('contributor_status',1)
                    ->where('moderator_status',2)
                    ->where('approver_status','<',2)
                    ->get();
                } else{
                    $listdata=DB::table('documents')
                    ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                    ->join('documentprocessings','documentprocessings.documents_id','documents.id')
                    ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documenttypes.id','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
                    ->where('documents.documenttypes_id',12)
                    ->where('contributor_status',1)
                    ->where('moderator_status',2)
                    ->where('approver_status',2)
                    ->get();
                } 
            }
        
        $documenttype=Documenttype::all();
        return view('documentmoderator.workstudyreportlist',compact('listdata','val','documenttype'));
    }
    public function workstudyreportverify(Request $request, $id)
    {
        
        if($request->ajax())
        {
            if(Auth::user()->usertypes_id==4){
              $formdata = array(
                'moderator_status' =>  1,
                'moderator_id' =>  Auth::user()->id,
                'moderator_timestamp' =>  date('Y-m-d H:i:s')
            ); 
            } else if(Auth::user()->usertypes_id==5){
               $formdata = array(
                'approver_status' =>  1,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
            );
            }
            
            Documentprocessing::where('documents_id',$id)->update($formdata);
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }
    public function workstudyreportupdate(Request $request)
    {
        if($request->ajax())
        {
            $statusid = $request->status_id;
            if(Auth::user()->usertypes_id==4){
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
            } else if(Auth::user()->usertypes_id==5){
               if($statusid==1){
                $formdata = array(
                'approver_remarks' =>  $request->moderator_remarks,
                'approver_status' =>  2,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
                );
            }else if($statusid==2){
                $formdata = array(
                'approver_remarks' =>  $request->moderator_remarks,
                'contributor_status' => 2,
                'approver_status' =>  0,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
                );
            }
            }
            
            
            Documentprocessing::where('documents_id',$request->hidden_id)->update($formdata);
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }
    /////////////////////////////////////////////generalreportlist///////////////////////////////////////////////
    public function generalreportlist(Request $request, $val)
    {
        if(Auth::user()->usertypes_id==4){
               if($val==1){
                    $listdata=DB::table('documents')
                    ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                    ->join('documentprocessings','documentprocessings.documents_id','documents.id')
                    ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
                    ->where('documents.documenttypes_id',13)
                    ->where('contributor_status',1)
                    ->where('moderator_status','<',2)
                    ->where('approver_status',0)
                    ->get();
                } else{
                    $listdata=DB::table('documents')
                    ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                    ->join('documentprocessings','documentprocessings.documents_id','documents.id')
                    ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documenttypes.id','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
                    ->where('documents.documenttypes_id',13)
                    ->where('contributor_status',1)
                    ->where('moderator_status',2)
                    ->where('approver_status',0)
                    ->get();
                } 
            } else if(Auth::user()->usertypes_id==5){
               if($val==1){
                    $listdata=DB::table('documents')
                    ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                    ->join('documentprocessings','documentprocessings.documents_id','documents.id')
                    ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
                    ->where('documents.documenttypes_id',13)
                    ->where('contributor_status',1)
                    ->where('moderator_status',2)
                    ->where('approver_status','<',2)
                    ->get();
                } else{
                    $listdata=DB::table('documents')
                    ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                    ->join('documentprocessings','documentprocessings.documents_id','documents.id')
                    ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documenttypes.id','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
                    ->where('documents.documenttypes_id',13)
                    ->where('contributor_status',1)
                    ->where('moderator_status',2)
                    ->where('approver_status',2)
                    ->get();
                } 
            }
        
        $documenttype=Documenttype::all();
        return view('documentmoderator.generalreportlist',compact('listdata','val','documenttype'));
    }
    public function generalreportverify(Request $request, $id)
    {
        
        if($request->ajax())
        {
             if(Auth::user()->usertypes_id==4){
               $formdata = array(
                'moderator_status' =>  1,
                'moderator_id' =>  Auth::user()->id,
                'moderator_timestamp' =>  date('Y-m-d H:i:s')
            );
            } else if(Auth::user()->usertypes_id==5){
               $formdata = array(
                'approver_status' =>  1,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
            );
            }
            
            Documentprocessing::where('documents_id',$id)->update($formdata);
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }
    public function generalreportupdate(Request $request)
    {
        if($request->ajax())
        {
            $statusid = $request->status_id;
            if(Auth::user()->usertypes_id==4){
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
            } else if(Auth::user()->usertypes_id==5){
               if($statusid==1){
                $formdata = array(
                'approver_remarks' =>  $request->moderator_remarks,
                'approver_status' =>  2,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
                );
            }else if($statusid==2){
                $formdata = array(
                'approver_remarks' =>  $request->moderator_remarks,
                'contributor_status' => 2,
                'approver_status' =>  0,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
                );
            }
            }
            
            
            Documentprocessing::where('documents_id',$request->hidden_id)->update($formdata);
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }
    ////////////////////////////////publicationlist/////////////////////////////////////////////
     public function publicationlist(Request $request, $val)
    {
         if(Auth::user()->usertypes_id==4){
               if($val==1){
                    $listdata=DB::table('documents')
                    ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                    ->join('documentprocessings','documentprocessings.documents_id','documents.id')
                    ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
                    ->where('documents.documenttypes_id',14)
                    ->where('contributor_status',1)
                    ->where('moderator_status','<',2)
                    ->where('approver_status',0)
                    ->get();
                } else{
                    $listdata=DB::table('documents')
                    ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                    ->join('documentprocessings','documentprocessings.documents_id','documents.id')
                    ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documenttypes.id','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
                    ->where('documents.documenttypes_id',14)
                    ->where('contributor_status',1)
                    ->where('moderator_status',2)
                    ->where('approver_status',0)
                    ->get();
                } 
            } else if(Auth::user()->usertypes_id==5){
               if($val==1){
                        $listdata=DB::table('documents')
                        ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                        ->join('documentprocessings','documentprocessings.documents_id','documents.id')
                        ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
                        ->where('documents.documenttypes_id',14)
                        ->where('contributor_status',1)
                        ->where('moderator_status',2)
                        ->where('approver_status','<',2)
                        ->get();
                    } else{
                        $listdata=DB::table('documents')
                        ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                        ->join('documentprocessings','documentprocessings.documents_id','documents.id')
                        ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documenttypes.id','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
                        ->where('documents.documenttypes_id',14)
                        ->where('contributor_status',1)
                        ->where('moderator_status',2)
                        ->where('approver_status',2)
                        ->get();
                    } 
            }
        
        $documenttype=Documenttype::all();
        return view('documentmoderator.publicationlist',compact('listdata','val','documenttype'));
    }
    public function publicationverify(Request $request, $id)
    {
        
        if($request->ajax())
        {
            if(Auth::user()->usertypes_id==4){
              $formdata = array(
                'moderator_status' =>  1,
                'moderator_id' =>  Auth::user()->id,
                'moderator_timestamp' =>  date('Y-m-d H:i:s')
            ); 
            } else if(Auth::user()->usertypes_id==5){
              $formdata = array(
                'approver_status' =>  1,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
            ); 
            }
            
            Documentprocessing::where('documents_id',$id)->update($formdata);
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }
    public function publicationupdate(Request $request)
    {
        if($request->ajax())
        {
            $statusid = $request->status_id;
             if(Auth::user()->usertypes_id==4){
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
            } else if(Auth::user()->usertypes_id==5){
               if($statusid==1){
                $formdata = array(
                'approver_remarks' =>  $request->moderator_remarks,
                'approver_status' =>  2,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
                );
            }else if($statusid==2){
                $formdata = array(
                'approver_remarks' =>  $request->moderator_remarks,
                'contributor_status' => 2,
                'approver_status' =>  0,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
                );
            }
            }
            
            
            Documentprocessing::where('documents_id',$request->hidden_id)->update($formdata);
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }
    ////////////////////////////statebudgetlist////////////////////////////////////
     public function statebudgetlist(Request $request, $val)
    {
         if(Auth::user()->usertypes_id==4){
               if($val==1){
                    $listdata=DB::table('documents')
                    ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                    ->join('documentprocessings','documentprocessings.documents_id','documents.id')
                    ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
                    ->where('documents.documenttypes_id',15)
                    ->where('contributor_status',1)
                    ->where('moderator_status','<',2)
                    ->where('approver_status',0)
                    ->get();
                } else{
                    $listdata=DB::table('documents')
                    ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                    ->join('documentprocessings','documentprocessings.documents_id','documents.id')
                    ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documenttypes.id','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
                    ->where('documents.documenttypes_id',15)
                    ->where('contributor_status',1)
                    ->where('moderator_status',2)
                    ->where('approver_status',0)
                    ->get();
                } 
            } else if(Auth::user()->usertypes_id==5){
               if($val==1){
                    $listdata=DB::table('documents')
                    ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                    ->join('documentprocessings','documentprocessings.documents_id','documents.id')
                    ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
                    ->where('documents.documenttypes_id',15)
                    ->where('contributor_status',1)
                    ->where('moderator_status',2)
                    ->where('approver_status','<',2)
                    ->get();
                } else{
                    $listdata=DB::table('documents')
                    ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                    ->join('documentprocessings','documentprocessings.documents_id','documents.id')
                    ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documenttypes.id','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
                    ->where('documents.documenttypes_id',15)
                    ->where('contributor_status',1)
                    ->where('moderator_status',2)
                    ->where('approver_status',2)
                    ->get();
                } 
            }
        
        $documenttype=Documenttype::all();
        return view('documentmoderator.statebudgetlist',compact('listdata','val','documenttype'));
    }
    public function statebudgetverify(Request $request, $id)
    {
        
        if($request->ajax())
        {
            if(Auth::user()->usertypes_id==4){
                $formdata = array(
                'moderator_status' =>  1,
                'moderator_id' =>  Auth::user()->id,
                'moderator_timestamp' =>  date('Y-m-d H:i:s')
            );
            } else if(Auth::user()->usertypes_id==5){
              $formdata = array(
                'approver_status' =>  1,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
            );
            }
            
            Documentprocessing::where('documents_id',$id)->update($formdata);
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }
    public function statebudgetupdate(Request $request)
    {
        if($request->ajax())
        {
            $statusid = $request->status_id;
            if(Auth::user()->usertypes_id==4){
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
            } else if(Auth::user()->usertypes_id==5){
                if($statusid==1){
                $formdata = array(
                'approver_remarks' =>  $request->moderator_remarks,
                'approver_status' =>  2,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
                );
            }else if($statusid==2){
                $formdata = array(
                'approver_remarks' =>  $request->moderator_remarks,
                'contributor_status' => 2,
                'approver_status' =>  0,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
                );
            }
            }
            
            
            Documentprocessing::where('documents_id',$request->hidden_id)->update($formdata);
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }
    //////////////////////////////////////economicreviewlist//////////////////////////////////
     public function economicreviewlist(Request $request, $val)
    {
        if(Auth::user()->usertypes_id==4){
            if($val==1){
            $listdata=DB::table('documents')
            ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
            ->join('documentprocessings','documentprocessings.documents_id','documents.id')
            ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
            ->where('documents.documenttypes_id',16)
            ->where('contributor_status',1)
            ->where('moderator_status','<',2)
            ->where('approver_status',0)
            ->get();
        } else{
            $listdata=DB::table('documents')
            ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
            ->join('documentprocessings','documentprocessings.documents_id','documents.id')
            ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documenttypes.id','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
            ->where('documents.documenttypes_id',16)
            ->where('contributor_status',1)
            ->where('moderator_status',2)
            ->where('approver_status',0)
            ->get();
        } 
        } else if(Auth::user()->usertypes_id==5){
                if($val==1){
            $listdata=DB::table('documents')
            ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
            ->join('documentprocessings','documentprocessings.documents_id','documents.id')
            ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
            ->where('documents.documenttypes_id',16)
            ->where('contributor_status',1)
            ->where('moderator_status',2)
            ->where('approver_status','<',2)
            ->get();
        } else{
            $listdata=DB::table('documents')
            ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
            ->join('documentprocessings','documentprocessings.documents_id','documents.id')
            ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documenttypes.id','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
            ->where('documents.documenttypes_id',16)
            ->where('contributor_status',1)
            ->where('moderator_status',2)
            ->where('approver_status',2)
            ->get();
        } 
        }
        
        $documenttype=Documenttype::all();
        return view('documentmoderator.economicreviewlist',compact('listdata','val','documenttype'));
    }
    public function economicreviewverify(Request $request, $id)
    {
        
        if($request->ajax())
        {
            if(Auth::user()->usertypes_id==4){
                     $formdata = array(
                'moderator_status' =>  1,
                'moderator_id' =>  Auth::user()->id,
                'moderator_timestamp' =>  date('Y-m-d H:i:s')
            );
            } else if(Auth::user()->usertypes_id==5){
               $formdata = array(
                'approver_status' =>  1,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
            );
            }
               
            Documentprocessing::where('documents_id',$id)->update($formdata);
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }
    public function economicreviewupdate(Request $request)
    {
        if($request->ajax())
        {
            $statusid = $request->status_id;
            if(Auth::user()->usertypes_id==4){
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
            } else if(Auth::user()->usertypes_id==5){
                if($statusid==1){
                $formdata = array(
                'approver_remarks' =>  $request->moderator_remarks,
                'approver_status' =>  2,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
                );
            }else if($statusid==2){
                $formdata = array(
                'approver_remarks' =>  $request->moderator_remarks,
                'contributor_status' => 2,
                'approver_status' =>  0,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
                );
            }
            }
            
            
            Documentprocessing::where('documents_id',$request->hidden_id)->update($formdata);
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }
    ////////////////////////////////////////fiveyearplanlist///////////////////////////////
      public function fiveyearplanlist(Request $request, $val)
    {
        if(Auth::user()->usertypes_id==4){
            if($val==1){
            $listdata=DB::table('documents')
            ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
            ->join('documentprocessings','documentprocessings.documents_id','documents.id')
            ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
            ->where('documents.documenttypes_id',17)
            ->where('contributor_status',1)
            ->where('moderator_status','<',2)
            ->where('approver_status',0)
            ->get();
        } else{
            $listdata=DB::table('documents')
            ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
            ->join('documentprocessings','documentprocessings.documents_id','documents.id')
            ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documenttypes.id','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
            ->where('documents.documenttypes_id',17)
            ->where('contributor_status',1)
            ->where('moderator_status',2)
            ->where('approver_status',0)
            ->get();
        } 
        } else if(Auth::user()->usertypes_id==5){
          if($val==1){
            $listdata=DB::table('documents')
            ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
            ->join('documentprocessings','documentprocessings.documents_id','documents.id')
            ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
            ->where('documents.documenttypes_id',17)
            ->where('contributor_status',1)
            ->where('moderator_status',2)
            ->where('approver_status','<',2)
            ->get();
        } else{
            $listdata=DB::table('documents')
            ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
            ->join('documentprocessings','documentprocessings.documents_id','documents.id')
            ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documenttypes.id','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
            ->where('documents.documenttypes_id',17)
            ->where('contributor_status',1)
            ->where('moderator_status',2)
            ->where('approver_status',2)
            ->get();
        } 
        }
        
        $documenttype=Documenttype::all();
        return view('documentmoderator.fiveyearplanlist',compact('listdata','val','documenttype'));
    }
    public function fiveyearplanverify(Request $request, $id)
    {
        
        if($request->ajax())
        {
            if(Auth::user()->usertypes_id==4){
                $formdata = array(
                'moderator_status' =>  1,
                'moderator_id' =>  Auth::user()->id,
                'moderator_timestamp' =>  date('Y-m-d H:i:s')
            );
            } else if(Auth::user()->usertypes_id==5){
                $formdata = array(
                'approver_status' =>  1,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
            ); 
            }
            
            Documentprocessing::where('documents_id',$id)->update($formdata);
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }
    public function fiveyearplanupdate(Request $request)
    {
        if($request->ajax())
        {
            $statusid = $request->status_id;
            if(Auth::user()->usertypes_id==4){
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
            } else if(Auth::user()->usertypes_id==5){
                if($statusid==1){
                $formdata = array(
                'approver_remarks' =>  $request->moderator_remarks,
                'approver_status' =>  2,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
                );
            }else if($statusid==2){
                $formdata = array(
                'approver_remarks' =>  $request->moderator_remarks,
                'contributor_status' => 2,
                'approver_status' =>  0,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
                );
            }
            }
            
            
            Documentprocessing::where('documents_id',$request->hidden_id)->update($formdata);
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }
    //////////////////////////////rtsdocumentlist////////////////////////////////////////
    public function rtsdocumentlist(Request $request, $val)
    {
        if(Auth::user()->usertypes_id==4){
            if($val==1){
            $listdata=DB::table('documents')
            ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
            ->join('documentprocessings','documentprocessings.documents_id','documents.id')
            ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
            ->where('documents.documenttypes_id',18)
            ->where('contributor_status',1)
            ->where('moderator_status','<',2)
            ->where('approver_status',0)
            ->get();
        } else{
            $listdata=DB::table('documents')
            ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
            ->join('documentprocessings','documentprocessings.documents_id','documents.id')
            ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documenttypes.id','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
            ->where('documents.documenttypes_id',18)
            ->where('contributor_status',1)
            ->where('moderator_status',2)
            ->where('approver_status',0)
            ->get();
        } 
        } else if(Auth::user()->usertypes_id==5){
            if($val==1){
            $listdata=DB::table('documents')
            ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
            ->join('documentprocessings','documentprocessings.documents_id','documents.id')
            ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
            ->where('documents.documenttypes_id',18)
            ->where('contributor_status',1)
            ->where('moderator_status',2)
            ->where('approver_status','<',2)
            ->get();
        } else{
            $listdata=DB::table('documents')
            ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
            ->join('documentprocessings','documentprocessings.documents_id','documents.id')
            ->select('documents.id','documents.documenttypes_id','documents.documentnumber','documents.filepath','documenttypes.id','documents.created_at','documents.entitle','documents.status','contributor_status','approver_status','moderator_status')
            ->where('documents.documenttypes_id',18)
            ->where('contributor_status',1)
            ->where('moderator_status',2)
            ->where('approver_status',2)
            ->get();
        } 
        }
        
        $documenttype=Documenttype::all();
        return view('documentmoderator.rtsdocumentlist',compact('listdata','val','documenttype'));
    }
    public function rtsdocumentverify(Request $request, $id)
    {
        
        if($request->ajax())
        {
            if(Auth::user()->usertypes_id==4){
                 $formdata = array(
                'moderator_status' =>  1,
                'moderator_id' =>  Auth::user()->id,
                'moderator_timestamp' =>  date('Y-m-d H:i:s')
            );
            } else if(Auth::user()->usertypes_id==5){
               $formdata = array(
                'approver_status' =>  1,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
            );
            }
           
            Documentprocessing::where('documents_id',$id)->update($formdata);
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }
    public function rtsdocumentupdate(Request $request)
    {
        if($request->ajax())
        {
            $statusid = $request->status_id;
            if(Auth::user()->usertypes_id==4){
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
            } else if(Auth::user()->usertypes_id==5){
                if($statusid==1){
                $formdata = array(
                'approver_remarks' =>  $request->moderator_remarks,
                'approver_status' =>  2,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
                );
            }else if($statusid==2){
                $formdata = array(
                'approver_remarks' =>  $request->moderator_remarks,
                'contributor_status' => 2,
                'approver_status' =>  0,
                'approver_id' =>  Auth::user()->id,
                'approver_timestamp' =>  date('Y-m-d H:i:s')
                );
            }
            }
            
            
            Documentprocessing::where('documents_id',$request->hidden_id)->update($formdata);
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }
}
