<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;
use DB;
use App\Mainmenu;
use App\Document;
use App\Documenttype;
use App\Story;
use Carbon\Carbon;

use App\Article;
use Illuminate\Support\Facades\Crypt;
use Spatie\Searchable\Search;
use Spatie\Searchable\ModelSearchAspect;

class PortalController extends Controller
{
    public function mainlogin(Request $request)
    {
        if(!Session::has('bilingual'))
        {
        Session::put('bilingual', 2);
        }
        $sessionbil=Session::get('bilingual');

        return view('auth.mainlogin',compact('sessionbil'));

        
    }

     public function setbilingualval(Request $request){

        if($request ->ajax())
        {
            Session::forget('bilingual');
            Session::put('bilingual', 1);

           return response()->json(['success' => 'successfully set']);
        } 

    }

    public function setbilingualvalmal(Request $request){

        if($request ->ajax())
        {
            Session::forget('bilingual');
            Session::put('bilingual', 2);

           return response()->json(['success' => 'successfully set']);
        } 

    }

     public function modalpop(Request $request,$id){

        if($request ->ajax())
        {
            $sessionbil=Session::get('bilingual');
            
            if($sessionbil==1){
                $getcontent = DB::table('footermenus')->where('id',$id)->select('id','file','alt','entitle as title','encontent as content')->first();
            } else{
                $getcontent = DB::table('footermenus')->where('id',$id)->select('id','file','alt','maltitle as title','malcontent as content')->first();
            }
            
            
            return response()->json(['resultdata' => $getcontent]);
        } 

    }


    public function setvalueshomepage(Request $request){
 
        if($request->ajax())
        {
            if(!Session::has('bilingual'))
            {
            Session::put('bilingual', 2);
            }
            $sessionbil=Session::get('bilingual');
            
            if($sessionbil==1){
               
                $logo = DB::table('logos')->where('status',1)->where('logotype', 1)->select('file')->first();
                $title = DB::table('titles')->where('status',1)->select('entitle as title','ensubtitle as subtitle')->first();
                $sitecontrollbl=DB::table('sitecontrollabels')->where('status',1)->select('entitle as title')->get();
                $shortalert=DB::table('shortalerts')->where('entitle','frontpage')->where('status',1)->select('encontent as content')->first();
                $siteupdated = DB::table('sitesettings')->where('entitle', 'Last Updated')->where('status', 1)->select(DB::raw('DATE_FORMAT(titlevalues, " %d-%b-%Y %T") as titlevalues'))->first();

                $banner = DB::table('banners')->where('status',1)->select('file','entitle as title','ensubtitle as subtitle')->limit(3)->get();

               /* changed as stories
                $article = DB::table('articles')->where('status',1)->where('approve_status',2)->select('id','poster','alt','entitle as title','ensubtitle as subtitle','enauthor as author','enbrief as brief','encontent as content','approve_timestamp')->first();
                  $relatedarticle = DB::table('articles')->where('status',1)->select('id','entitle as title','poster')->limit(5)->get();*/

                  $stories=DB::table('stories')
			    	 	->join('documents','documents.id','stories.documents_id')
			    	 	->join('storyprocessings','storyprocessings.stories_id','stories.id')
			    	 	->join('storyattachments','storyattachments.stories_id','stories.id')
			    		->select('stories.id','stories.entitle as title','stories.encontent as content','storyattachments.file','storyprocessings.approver_timestamp',)
			            ->where('documenttypes_id',1)
  						->where('storyprocessings.approver_status',2)
            			->first();

            			$relatedstory = DB::table('stories')->join('documents','documents.id','stories.documents_id')
			    	 	->join('storyprocessings','storyprocessings.stories_id','stories.id')
			    	 	->join('storyattachments','storyattachments.stories_id','stories.id')
			    		->select('stories.id','stories.entitle as title','storyattachments.file')
			            ->where('documenttypes_id',1)
  						->where('storyprocessings.approver_status',2)->limit(5)->get();

                $articlelatest = DB::table('articles')->where('status', 1)->where('approve_status', 2)->where('homepagestatus', 1)->select('id', 'poster', 'alt', 'entitle as title', 'ensubtitle as subtitle', 'enauthor as author', 'enbrief as brief', 'encontent as content', 'created_at')->orderBy('id', 'desc')->first();

                $article = DB::table('articles')->where('status', 1)->where('approve_status', 2)->where('id', '!=', $articlelatest->id)->where('homepagestatus', 1)->select('id', 'poster', 'alt', 'entitle as title', 'ensubtitle as subtitle', 'enauthor as author', 'enbrief as brief')->orderBy('id', 'desc')->limit(5)->get();
                
                $whatsnew = DB::table('componentarticles')->where('components_id',4)->where('status', 1)->select('id', 'entitle as title', 'ensubtitle as subtitle', 'encontent as content', 'iconclass')->orderBy('updated_at', 'desc')->limit(5)->get(); 


                   $servicelink=DB::table('componentarticles')->where('components_id',20)->where('status',1)->where('approve_status',2)->select('iconclass','entitle as title','maplinks','color')->limit(5)->get(); 

                   /*Latest Quotations*/
                   $quotationbuy=DB::table('documents')
                        
                        ->select('id','documentnumber','documentdate','entitle as title','encontent as content','filepath','size','iconclass')
                       ->where('documenttypes_id',7) 
                       ->where('quotationtype',1) 
                       ->limit(3) 
                        ->get();
                         $quotationsell=DB::table('documents')
                         ->select('id','documentnumber','documentdate','entitle as title','encontent as content','filepath','size','iconclass')
                       ->where('documenttypes_id',7)
                       ->where('documents.quotationtype',2) 
                     ->limit(3) 
                        ->get();

                   /*Latest GO*/
                   $latestgo=DB::table('documents')
                        ->join('departments','departments.id','documents.departments_id')
                        ->join('fielddepartments','fielddepartments.id','documents.fielddepartments_id')
                        ->select('documents.id','documentnumber','documentdate','documents.entitle as title','departments.entitle as deptname','fielddepartments.name as fieldname','filepath','size')
                       ->where('documenttypes_id',1) 
                       // ->limits(5) 
                        ->get();


                        /*Go Search*/
                         $departments     = DB::table('departments')->orderBy('id','asc')->get();

                         /*Browser Document*/
                         $documenttype=DB::table('documenttypes')->where('status',1)->select('id','name as title','iconclass')->orderBy('id','asc')->get();
                         /*Browser All category*/
                         $documenttypechunk=DB::table('documenttypes')->where('status',1)->select('id','name as title')->orderBy('documentcategories_id','asc')->get();
                        
                            $documenttypechunks=array();
                         foreach($documenttypechunk as  $res)
                         {
                          $documenttypechunks[]=array('id'=>$res->id,
                                                    'enc_id'=>Crypt::encrypt($res->id),
                                                    'title'=>$res->title);
                         }
                         //
                         // $chunkarray= $documenttypechunks->chunk(5);
                         $chunkarray=array_chunk($documenttypechunks,5);
                          //dd($chunkarray);
                          /*Footermenu*/

                         
                          $footermenu=DB::table('footermenus')->where('status',1)->select('id','alt','file','entitle as title','encontent as content')->orderBy('id','asc')->get();
                          $footermenuarray=$footermenu->chunk(4);

                           /*Footer Logo*/

                         
                          $footerlogo=DB::table('logos')->where('status',1)->where('logotype',2)->select('id','alt','file','url','entooltip as tooltip')->orderBy('id','asc')->get();
                          $footerlogoarray=$footerlogo->chunk(4);

                          /*Social Media Icons*/

                          $socialmedia=DB::table('socialmedia')->where('status',1)->select('id','url','entooltip as tooltip','iconclass')->orderBy('id','asc')->get();

                          /*Footer Link*/
                          $footerlinknew=DB::table('footerlinks')->where('status',1)->select('id','entitle as title','entooltip as tooltip','iconclass','url')->orderBy('id','asc')->get();

                           /*Footer*/
                          
                          $footer=DB::table('footers')->where('status',1)->select('id','entitle as title','ensubtitle as subtitle','iconclass')->orderBy('id','asc')->first();

                          /*Main menu */
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

                            $dstpgms = DB::table('districtpgms')->where('status', 1)->select('id', 'poster', 'alt', 'entitle as title', 'ensubtitle as subtitle', 'enbrief as brief', 'encontent as content', 'created_at')->orderBy('id', 'desc')->limit(2)->get();

            } 
            else
            {
               

                $logo = DB::table('logos')->where('status',1)->where('logotype', 1)->select('file')->first();
                $title = DB::table('titles')->where('status',1)->select('maltitle as title','malsubtitle as subtitle')->first();
                $sitecontrollbl=DB::table('sitecontrollabels')->where('status',1)->select('maltitle as title')->get();
                 $shortalert=DB::table('shortalerts')->where('entitle','frontpage')->where('status',1)->select('malcontent as content')->first();

                $servicelink=DB::table('componentarticles')->where('status',1)->where('components_id',20)->where('approve_status',2)->select('iconclass','maltitle as title','maplinks','color')->limit(5)->get();

                    $banner = DB::table('banners')->where('status',1)->select('file','maltitle as title','malsubtitle as subtitle')->limit(3)->get();
               
                    $siteupdated = DB::table('sitesettings')->where('entitle', 'Last Updated')->where('status', 1)->select(DB::raw('DATE_FORMAT(titlevalues, " %d-%b-%Y %T") as titlevalues'))->first();

                $articlelatest = DB::table('articles')->where('status', 1)->where('approve_status', 2)->where('homepagestatus', 1)->select('id', 'poster', 'alt', 'maltitle as title', 'malsubtitle as subtitle', 'malauthor as author', 'malbrief as brief', 'malcontent as content','created_at')->orderBy('id', 'desc')->first();
                $article = DB::table('articles')->where('status', 1)->where('approve_status', 2)->where('id', '!=', $articlelatest->id)->where('homepagestatus', 1)->select('id', 'poster', 'alt', 'maltitle as title', 'malsubtitle as subtitle', 'malauthor as author', 'malbrief as brief')->orderBy('id', 'desc')->get();
                


            $whatsnew = DB::table('componentarticles')->where('components_id',4)->where('status', 1)->select('id', 'maltitle as title', 'malsubtitle as subtitle', 'malcontent as content', 'iconclass')->orderBy('updated_at', 'desc')->limit(5)->get();
                  $relatedarticle = DB::table('articles')->where('status',1)->select('id','maltitle as title','poster')->limit(5)->get();

                  /*Latest Quotations*/
                   $quotationbuy=DB::table('documents')
                        ->select('id','documentnumber','documentdate','maltitle as title','malcontent as content','filepath','size','iconclass')
                       ->where('documenttypes_id',7) 
                       ->where('documents.quotationtype',1) 
                       ->limit(3) 
                        ->get();
                         $quotationsell=DB::table('documents')
                        ->select('id','documentnumber','documentdate','maltitle as title','malcontent as content','filepath','size','iconclass')
                       ->where('documenttypes_id',7) 
                       ->where('documents.quotationtype',2) 
                     ->limit(3) 
                        ->get();




                 

                 

                  /*Latest GO*/
                   $latestgo=DB::table('documents')
                        ->join('departments','departments.id','documents.departments_id')
                        ->join('fielddepartments','fielddepartments.id','documents.fielddepartments_id')
                        ->select('documents.id','documentnumber','documentdate','documents.maltitle as title','departments.entitle as deptname','fielddepartments.name as fieldname','filepath','size')
                       ->where('documenttypes_id',1)
                       // ->limits(5)   
                        ->get();

                            /*Go Search*/

                         $departments     = DB::table('departments')->orderBy('id','asc')->get();

                         /*Browser Document*/
                         $documenttype=DB::table('documenttypes')->where('status',1)->select('id','malname as title','iconclass')->orderBy('id','asc')->get();
                         
                         /*Browser all category*/
                         $documenttypechunk=DB::table('documenttypes')->where('status',1)->select('id','malname as title')->orderBy('documentcategories_id','asc')->get();
                     
                            $documenttypechunks=array();
                         foreach($documenttypechunk as  $res)
                         {
                          $documenttypechunks[]=array('id'=>$res->id,
                                                    'enc_id'=>Crypt::encrypt($res->id),
                                                    'title'=>$res->title);
                         }
                          $chunkarray=array_chunk($documenttypechunks,5);

                          /*Footermenu*/
                        
                          $footermenu=DB::table('footermenus')->where('status',1)->select('id','alt','file','maltitle as title','malcontent as content')->orderBy('id','asc')->get();
                          $footermenuarray=$footermenu->chunk(4);

                           /*Footer Logo*/

                         
                          $footerlogo=DB::table('logos')->where('status',1)->where('logotype',2)->select('id','alt','file','url','maltooltip as tooltip')->orderBy('id','asc')->get();
                          $footerlogoarray=$footerlogo->chunk(4);

                            /*Social Media Icons*/

                          $socialmedia=DB::table('socialmedia')->where('status',1)->select('id','url','maltooltip as tooltip','iconclass')->orderBy('id','asc')->get();

                          /*Footer Link*/
                          $footerlinknew=DB::table('footerlinks')->where('status',1)->select('id','maltitle as title','maltooltip as tooltip','iconclass','url')->orderBy('id','asc')->get();

                          /*Footer*/
                          
                          $footer=DB::table('footers')->where('status',1)->select('id','maltitle as title','malsubtitle as subtitle','iconclass')->orderBy('id','asc')->first();

                          /*Main Menu*/
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

                            $dstpgms = DB::table('districtpgms')->where('status', 1)->select('id', 'poster', 'alt', 'maltitle as title', 'malsubtitle as subtitle', 'malbrief as brief', 'malcontent as content', 'created_at')->orderBy('id', 'desc')->limit(2)->get();

                        

            }
            //dd($documenttype);
            return response()->json(['logo'=> $logo,'title'=>$title,'sitecontrollbl'=>$sitecontrollbl,'shortalert'=>$shortalert,'banner'=>$banner,'servicelink'=>$servicelink,'latestgo'=>$latestgo,'departments'=>$departments,'documenttype'=>$documenttype,'chunkarray'=>$chunkarray,'footermenuarray'=>$footermenuarray,'footerlogoarray'=>$footerlogoarray,'socialmedia'=>$socialmedia,'footer'=>$footer,'footerlinknew'=>$footerlinknew,'mainmenu' => $mainmenu, 'articlelatest' => $articlelatest, 'article' => $article, 'dstpgms'=>$dstpgms,'whatsnew'=>$whatsnew,'quotationbuy'=>$quotationbuy,'quotationsell'=>$quotationsell,'footermenu'=>$footermenu,'siteupdated'=>$siteupdated]);
        } 

    } 

     public function articledetailview(Request $request, $encid)
    {

  $id=Crypt::decrypt($encid);

        $sessionbil=Session::get('bilingual'); 


          if($sessionbil==1){

            $article =DB::table('stories')
			    	 	->join('documents','documents.id','stories.documents_id')
			    	 	->join('storyprocessings','storyprocessings.stories_id','stories.id')
			    	 	->join('storyattachments','storyattachments.stories_id','stories.id')
			    		->select('stories.id','stories.entitle as title','stories.encontent as content','storyattachments.file','storyprocessings.approver_timestamp')
			            ->where('documenttypes_id',1)
  						->where('storyprocessings.approver_status',2)
  						->where('stories.id',$id)
            			->first();
            
            $relatedarticles = DB::table('stories')->join('documents','documents.id','stories.documents_id')
			    	 	->join('storyprocessings','storyprocessings.stories_id','stories.id')
			    	 	->join('storyattachments','storyattachments.stories_id','stories.id')
			    		->select('stories.id','stories.entitle as title','storyattachments.file')
			            ->where('documenttypes_id',1)
  						->where('storyprocessings.approver_status',2)->limit(5)->get();
          } 

          else 
          {
           $article = DB::table('stories')
			    	 	->join('documents','documents.id','stories.documents_id')
			    	 	->join('storyprocessings','storyprocessings.stories_id','stories.id')
			    	 	->join('storyattachments','storyattachments.stories_id','stories.id')
			    		->select('stories.id','stories.maltitle as title','stories.malcontent as content','storyattachments.file','storyprocessings.approver_timestamp')
			            ->where('documenttypes_id',1)
  						->where('storyprocessings.approver_status',2)
  						->where('stories.id',$id)
            			->first();

            $relatedarticles = DB::table('stories')->join('documents','documents.id','stories.documents_id')
			    	 	->join('storyprocessings','storyprocessings.stories_id','stories.id')
			    	 	->join('storyattachments','storyattachments.stories_id','stories.id')
			    		->select('stories.id','stories.maltitle as title','storyattachments.file')
			            ->where('documenttypes_id',1)
  						->where('storyprocessings.approver_status',2)->limit(5)->get();
            
          }
          return view('articledetailview',compact('article','relatedarticles','sessionbil'));
          //dd($resultdata);
        
    }

     public function getfielddepartment(Request $request)
    {
       
        if($request->ajax()){
            request()->validate([
                'deptid'   =>  'required'
            ]);

            $deptid = $request->deptid;
             $fielddepatmentdet=DB::table('fielddepartments')->where('departments_id',$deptid)->get();
            print_r(json_encode($fielddepatmentdet));
        }


    }

public function setvaluesencrypt(Request $request,$id)
{
   if($request->ajax()){

  
  $encid=Crypt::encrypt($id);
  
return response()->json(['encid' => $encid]);

 }
}


public function gosearch(Request $request)
{
       
  if($request->ajax())
  {
          
   DB::enableQueryLog();

    $sessionbil=Session::get('bilingual'); 

    $fromdate       = $request->fromdate;
    $todate         = $request->todate;
    if($fromdate!='')
    {
       $from_date      = Carbon::createFromFormat('d/m/Y', $fromdate)->format('Y-m-d');
    }
    else
    {
        $from_date      ='0000/00/00';
    }
    if($todate!='')
    {
        $to_date        = Carbon::createFromFormat('d/m/Y', $todate)->format('Y-m-d');
    }
    else
    {
      $to_date      ='0000/00/00';
    }




          if($sessionbil==1)
        {
             $latestgo=DB::table('documents')
                        ->join('departments','departments.id','documents.departments_id')
                        ->select('documents.id','documentnumber','documentdate','documents.entitle as title','departments.entitle as deptname','filepath','size')
                       ->where('documenttypes_id',1);  
                       //dd($from_date);

              if($request->departments_id!=null && $request->departments_id!='all')
                {
                   $latestgo->where('documents.departments_id',$request->departments_id);
                }
                if($request->fielddepartments_id!='' && $request->fielddepartments_id!='all')
                {
                   $latestgo->where('documents.fielddepartments_id',$request->fielddepartments_id);
                }
                 if($from_date!='0000/00/00' && $to_date!='0000/00/00')
                {

                   $latestgo->whereDate('documents.documentdate', '>=', $from_date)->whereDate('documents.documentdate', '<=', $to_date);
                   //$latestgo->whereBetween('documents.documentdate', [$from_date, $to_date]);
                }
                 if($request->gonumber!='')
                {
                   $latestgo->where('documents.documentnumber',$request->gonumber);
                }
                 if($request->keywords!='')
                {
                   $latestgo->whereIn('enkeywords',[$request->keywords]);
                }

                $latestgo=$latestgo->get();

          }
          else
          {
              $latestgo=DB::table('documents')
                        ->join('departments','departments.id','documents.departments_id')
                        ->select('documents.id','documentnumber','documentdate','documents.maltitle as title','departments.maltitle as deptname','filepath','size')
                       ->where('documenttypes_id',1);


                if($request->departments_id!=null && $request->departments_id!='all')
                {
                   $latestgo->where('documents.departments_id',$request->departments_id);
                }
                if($request->fielddepartments_id!='' && $request->fielddepartments_id!='all')
                {
                   $latestgo->where('documents.fielddepartments_id',$request->fielddepartments_id);
                }
                 if($from_date!='0000/00/00' && $to_date!='0000/00/00')
                {

                   $latestgo->whereDate('documents.documentdate', '>=', $from_date)->whereDate('documents.documentdate', '<=', $to_date);
                   //$latestgo->whereBetween('documents.documentdate', [$from_date, $to_date]);
                }
                 if($request->gonumber!='')
                {
                   $latestgo->where('documents.documentnumber',$request->gonumber);
                }
                 if($request->keywords!='')
                {
                   $latestgo->whereIn('enkeywords',[$request->keywords]);
                }

                $latestgo=$latestgo->get();

          }
           // $query = DB::getQueryLog();

          // dd($query);
          $count=count($latestgo);               
        if($count!='')
        {
           return response()->json(['success' => 1,'latestgo'=>$latestgo]);
            
        }
        else
        {
             return response()->json(['success' => 2]);
        }
                        
           
        }


    }
/*Document Category-1*/
public function documentdetailview(Request $request, $doctypeid)
    {
      $documenttypeid=Crypt::decrypt($doctypeid);

      $catid=DB::table('documenttypes')->where('id',$documenttypeid)->where('status',1)->select('id','documentcategories_id')->first();

        $sessionbil=Session::get('bilingual'); 
          if($sessionbil==1){
                               
           $doccategory= DB::table('documenttypes')->where('id',$documenttypeid)->where('status',1)->select('id','documentcategories_id','name as title')->first();
           $formlabel= DB::table('documentcategories')->where('id',$doccategory->documentcategories_id)->where('status',1)->select('id','endeptlbl as deptlbl', 'en_fielddeptlbl as fielddeptlbl','en_fromdtlbl as fromdtlbl','en_todtlbl as todtlbl','en_gonumberlbl as golbl','enkeywordlbl as keyword',)->first();

            $relateddocuments = DB::table('documenttypes')->where('status',1)->select('id','name as title')->get();
          } 
          else
          {
          
          $doccategory= DB::table('documenttypes')->where('id',$documenttypeid)->where('status',1)->select('id','documentcategories_id','malname as title')->first();
           $formlabel= DB::table('documentcategories')->where('id',$doccategory->documentcategories_id)->where('status',1)->select('id','maldeptlbl as deptlbl','mal_fielddeptlbl as fielddeptlbl','mal_fromdtlbl as fromdtlbl','mal_todtlbl as todtlbl','mal_gonumberlbl as golbl','malkeywordlbl as keyword')->first();


            $relateddocuments = DB::table('documenttypes')->where('status',1)->select('id','malname as title')->get();
            
          }

            if($catid->documentcategories_id==1)
            {
              return view('documentform',compact('doccategory','relateddocuments','sessionbil','formlabel'));
            }
            else if($catid->documentcategories_id==2)
            {
              return view('documentformtwo',compact('doccategory','relateddocuments','sessionbil','formlabel'));
            }
            /*else if($catid->documentcategories_id==3)
            {
              return view('documentformthree',compact('doccategory','relateddocuments','sessionbil','formlabel'));
            }*/
            else if($catid->documentcategories_id==5)
            {


              if($sessionbil==1)
                    {
              
                        $latestgo=DB::table('documents')
                       ->select('documents.id','entitle as title','filepath','documenttypes_id')
                       ->where('documenttypes_id',$documenttypeid)->get();             
                    }
                else
                {
                    $latestgo=DB::table('documents')
                      ->select('documents.id','maltitle as title','filepath','documenttypes_id')
                      ->where('documenttypes_id',$documenttypeid)->get();

                }
              return view('documentformfive',compact('doccategory','relateddocuments','sessionbil','formlabel','latestgo'));
            }
            else if($catid->documentcategories_id==6)
            {
                  if($sessionbil==1)
                    {
              
                        $latestgo=DB::table('documents')
                       ->select('documents.id','entitle as title','encontent as content','enkeywords as keywords')
                       ->where('documenttypes_id',$documenttypeid)->get();             
                    }
                else
                {
                    $latestgo=DB::table('documents')
                      ->select('documents.id','maltitle as title','malcontent as content','malkeywords as keywords')
                      ->where('documenttypes_id',$documenttypeid)->get();

                }
              return view('documentformsix',compact('doccategory','relateddocuments','sessionbil','formlabel','latestgo'));
            }
            else
            {
              return view('documentform',compact('doccategory','relateddocuments','sessionbil','formlabel'));
            }
          
          //dd($resultdata);
        
    }

public function documentsearch(Request $request)
{
       
  if($request->ajax())
  {
          
     $sessionbil=Session::get('bilingual'); 

    $fromdate       = $request->fromdate;
    $todate         = $request->todate;
    if($fromdate!='')
    {
       $from_date      = Carbon::createFromFormat('d/m/Y', $fromdate)->format('Y-m-d');
    }
    else
    {
        $from_date      ='0000/00/00';
    }
    if($todate!='')
    {
        $to_date        = Carbon::createFromFormat('d/m/Y', $todate)->format('Y-m-d');
    }
    else
    {
      $to_date      ='0000/00/00';
    }

          if($sessionbil==1)
        {

            
              $request->validate([
             'departments_id'      =>'required',
             'fielddepartments_id'   =>'sometimes|nullable',
             'gonumber'   =>'sometimes|nullable|regex:/(^[-0-9A-Za-z.\/()\s ]+$)/',
             'keywords'   =>'sometimes|nullable|regex:/(^[-0-9A-Za-z.\/()\s ]+$)/'
             ]);


    
                       
            $latestgo=DB::table('documents')
                        ->join('departments','departments.id','documents.departments_id')
                        ->select('documents.id','documentnumber','documentdate','documents.entitle as title','departments.entitle as deptname','filepath','size')
                       ->where('documenttypes_id',$request->hidden_documenttypeid);   
                      

              if($request->departments_id!=null && $request->departments_id!='all')
                {
                   $latestgo->where('documents.departments_id',$request->departments_id);
                }
                if($request->fielddepartments_id!='' && $request->fielddepartments_id!='all')
                {
                   $latestgo->where('documents.fielddepartments_id',$request->fielddepartments_id);
                }
                 if($from_date!='0000/00/00' && $to_date!='0000/00/00')
                {

                   $latestgo->whereDate('documents.documentdate', '>=', $from_date)->whereDate('documents.documentdate', '<=', $to_date);
                   //$latestgo->whereBetween('documents.documentdate', [$from_date, $to_date]);
                }
                 if($request->gonumber!='')
                {
                   $latestgo->where('documents.documentnumber',$request->gonumber);
                }
                 if($request->keywords!='')
                {
                   $latestgo->whereIn('enkeywords',[$request->keywords]);
                }

                $latestgo=$latestgo->get();
                       


          }
          else
          {


              $request->validate([
             'departments_id'      =>'required',
             'fielddepartments_id'   =>'sometimes|nullable',
             'gonumber'   =>'sometimes|nullable|regex:/(^[\P{Malayalam}0-9_.,]+$)/',
             'keywords'   =>'sometimes|nullable|regex:/(^[\P{Malayalam}_.,]+$)/'
             ]);

              $latestgo=DB::table('documents')
                        ->join('departments','departments.id','documents.departments_id')
                        ->select('documents.id','documentnumber','documentdate','documents.maltitle as title','departments.maltitle as deptname','filepath','size')
                     ->where('documenttypes_id',$request->hidden_documenttypeid);   
                       


                  if($request->departments_id!=null && $request->departments_id!='all')
                {
                   $latestgo->where('documents.departments_id',$request->departments_id);
                }
                if($request->fielddepartments_id!='' && $request->fielddepartments_id!='all')
                {
                   $latestgo->where('documents.fielddepartments_id',$request->fielddepartments_id);
                }
                 if($from_date!='0000/00/00' && $to_date!='0000/00/00')
                {

                   $latestgo->whereDate('documents.documentdate', '>=', $from_date)->whereDate('documents.documentdate', '<=', $to_date);
                   //$latestgo->whereBetween('documents.documentdate', [$from_date, $to_date]);
                }
                 if($request->gonumber!='')
                {
                   $latestgo->where('documents.originaldocnumber',$request->gonumber);
                }
                 if($request->keywords!='')
                {
                   $latestgo->whereIn('malkeywords',[$request->keywords]);
                }

                $latestgo=$latestgo->get();

          }

          $count=count($latestgo);               
        if($count!='')
        {
           return response()->json(['success' => 1,'latestgo'=>$latestgo]);
            
        }
        else
        {
             return response()->json(['success' => 2]);
        }
                        
           
        }


    }


    /*Document Category-1---END*/

    /*Document Category-2*/


public function documentsearchtwo(Request $request)
{
       
  if($request->ajax())
  {
          
  

    $sessionbil=Session::get('bilingual'); 

    $fromdate       = $request->fromdate;
    $todate         = $request->todate;
    if($fromdate!='')
    {
       $from_date      = Carbon::createFromFormat('d/m/Y', $fromdate)->format('Y-m-d');
    }
    else
    {
        $from_date      ='0000/00/00';
    }
    if($todate!='')
    {
        $to_date        = Carbon::createFromFormat('d/m/Y', $todate)->format('Y-m-d');
    }
    else
    {
      $to_date      ='0000/00/00';
    }

          if($sessionbil==1)
        {
               $request->validate([
             'departments_id'      =>'required',
             'fielddepartments_id'   =>'sometimes|nullable',
             'gonumber'   =>'sometimes|nullable|regex:/(^[-0-9A-Za-z.\/()\s ]+$)/',
             'keywords'   =>'sometimes|nullable|regex:/(^[-0-9A-Za-z.\/()\s ]+$)/'
             ]);

                       
            $latestgo=DB::table('documents')
                        ->join('departments','departments.id','documents.departments_id')
                        ->select('documents.id','documentnumber','documentdate','documents.entitle as title','departments.entitle as deptname','filepath','size')
                       ->where('documenttypes_id',$request->hidden_documenttypeid);   
                      

              if($request->departments_id!=null && $request->departments_id!='all')
                {
                   $latestgo->where('documents.departments_id',$request->departments_id);
                }
               /* if($request->fielddepartments_id!='' && $request->fielddepartments_id!='all')
                {
                   $latestgo->where('documents.fielddepartments_id',$request->fielddepartments_id);
                }*/
                 if($from_date!='0000/00/00' && $to_date!='0000/00/00')
                {

                   $latestgo->whereDate('documents.documentdate', '>=', $from_date)->whereDate('documents.documentdate', '<=', $to_date);
                   //$latestgo->whereBetween('documents.documentdate', [$from_date, $to_date]);
                }
                 if($request->gonumber!='')
                {
                   $latestgo->where('documents.documentnumber',$request->gonumber);
                }
                 if($request->keywords!='')
                {
                   $latestgo->whereIn('enkeywords',[$request->keywords]);
                }

                $latestgo=$latestgo->get();
                       


          }
          else
          {

                  $request->validate([
             'departments_id'      =>'required',
             'fielddepartments_id'   =>'sometimes|nullable',
             'gonumber'   =>'sometimes|nullable|regex:/(^[\P{Malayalam}0-9_.,]+$)/',
             'keywords'   =>'sometimes|nullable|regex:/(^[\P{Malayalam}_.,]+$)/'
             ]);

              $latestgo=DB::table('documents')
                        ->join('departments','departments.id','documents.departments_id')
                        ->select('documents.id','documentnumber','documentdate','documents.maltitle as title','departments.maltitle as deptname','filepath','size')
                     ->where('documenttypes_id',$request->hidden_documenttypeid);   
                       


                  if($request->departments_id!=null && $request->departments_id!='all')
                {
                   $latestgo->where('documents.departments_id',$request->departments_id);
                }
                /*if($request->fielddepartments_id!='' && $request->fielddepartments_id!='all')
                {
                   $latestgo->where('documents.fielddepartments_id',$request->fielddepartments_id);
                }*/
                 if($from_date!='0000/00/00' && $to_date!='0000/00/00')
                {

                   $latestgo->whereDate('documents.documentdate', '>=', $from_date)->whereDate('documents.documentdate', '<=', $to_date);
                   //$latestgo->whereBetween('documents.documentdate', [$from_date, $to_date]);
                }
                 if($request->gonumber!='')
                {
                   $latestgo->where('documents.originaldocnumber',$request->gonumber);
                }
                 if($request->keywords!='')
                {
                   $latestgo->whereIn('malkeywords',[$request->keywords]);
                }

                $latestgo=$latestgo->get();

          }

          $count=count($latestgo);               
        if($count!='')
        {
           return response()->json(['success' => 1,'latestgo'=>$latestgo]);
            
        }
        else
        {
             return response()->json(['success' => 2]);
        }
                        
           
        }


    }

     /*Document Category-2---END*/

      /*Document Category-6*/


public function documentsearchsix(Request $request)
{
       
  if($request->ajax())
  {
          
   

    $sessionbil=Session::get('bilingual'); 


          if($sessionbil==1)
        {
              
            $latestgo=DB::table('documents')
                       ->select('documents.id','entitle as title','encontent as content','enkeywords as keywords')
                       ->where('documenttypes_id',$request->hidden_documenttypeid)->get();
                       


          }
          else
          {
              $latestgo=DB::table('documents')
                       ->select('documents.id','maltitle as title','malcontent as content','malkeywords as keywords')
                       ->where('documenttypes_id',$request->hidden_documenttypeid)->get();

          }

          $count=count($latestgo);               
        if($count!='')
        {
           return response()->json(['success' => 1,'latestgo'=>$latestgo]);
            
        }
        else
        {
             return response()->json(['success' => 2]);
        }
                        
           
        }


    }
public function search(Request $request)
    {

        $sessionbil=Session::get('bilingual'); 

       

        $searchResults = (new Search())
              ->registerModel(Article::class,function(ModelSearchAspect $modelSearchAspect) {
       $modelSearchAspect
          ->addSearchableAttribute('encontent') // return results for partial matches on usernames
          ->where('approve_status',2);
          
})
              ->registerModel(Story::class,function(ModelSearchAspect $modelSearchAspect) {
       $modelSearchAspect
          ->addSearchableAttribute('encontent') // return results for partial matches on usernames
          ->where('published',1);
          
})
             ->perform($request->input('searchdata')); 

            
          // dd($query);
            $searchdata=$request->searchdata;

        return view('searchdata', compact('searchResults','searchdata'));
    }



    public function storyshow(Request $request, $encid)
    {

  $id=Crypt::decrypt($encid);

        $sessionbil=Session::get('bilingual'); 


          if($sessionbil==1){

            $article =DB::table('stories')
                        ->join('documents','documents.id','stories.documents_id')
                        ->join('storyprocessings','storyprocessings.stories_id','stories.id')
                        ->select('stories.id','stories.entitle as title','stories.encontent as content','storyprocessings.approver_timestamp')
                        ->where('documenttypes_id',1)
                        ->where('storyprocessings.approver_status',2)
                        ->where('stories.id',$id)
                        ->first();
            
          } 

          else 
          {
           $article = DB::table('stories')
                        ->join('documents','documents.id','stories.documents_id')
                        ->join('storyprocessings','storyprocessings.stories_id','stories.id')
                       ->select('stories.id','stories.maltitle as title','stories.malcontent as content','storyprocessings.approver_timestamp')
                        ->where('documenttypes_id',1)
                        ->where('storyprocessings.approver_status',2)
                        ->where('stories.id',$id)
                        ->first();

          
            
          }
          return view('storyshow',compact('article','sessionbil'));
         
    }


    public function documentshow(Request $request,$encid)
{
       
   $id=Crypt::decrypt($encid);
    $sessionbil=Session::get('bilingual'); 

  

          if($sessionbil==1)
        {
              
                       
            $latestgo=DB::table('documents')
                        ->join('departments','departments.id','documents.departments_id')
                        ->select('documents.id','documentnumber','documentdate','documents.entitle as title','documents.encontent as content','departments.entitle as deptname','filepath','size','documenttypes_id')
                       ->where('documents.id',$id)->get();
                       


          }
          else
          {
              $latestgo=DB::table('documents')
                        ->join('departments','departments.id','documents.departments_id')
                        ->select('documents.id','documentnumber','documentdate','documents.maltitle as title','documents.malcontent as content','departments.maltitle as deptname','filepath','size','documenttypes_id')
                     ->where('documents.id',$id)->get();  
                       


          }
            foreach($latestgo as $res)
             {   
          if($res->documenttypes_id==1){ $path=asset('Govtorder').'/'.$res->filepath; }
        if($res->documenttypes_id==2){$path=asset('Cabinetdecision').'/'.$res->filepath;  }
        if($res->documenttypes_id==3){ $path=asset('Circulars').'/'.$res->filepath; }
        if($res->documenttypes_id==4){ $path=asset('Policy').'/'.$res->filepath; }
        if($res->documenttypes_id==5){ $path=asset('Actandrules').'/'.$res->filepath; }
            }
         
            return view('documentshow',compact('latestgo','sessionbil','path'));
        
                        
           



}


public function articledetailid(Request $request, $encid)
    {

        $id=Crypt::decrypt($encid);

        $sessionbil=Session::get('bilingual'); 


          if($sessionbil==1){

            $article =DB::table('articles')->where('status', 1)->where('approve_status', 2)->where('homepagestatus', 1)->where('id',$id)->select('id', 'poster', 'alt', 'entitle as title', 'ensubtitle as subtitle', 'enauthor as author', 'enbrief as brief', 'encontent as content', 'created_at')->first();
            
            $relatedarticles = DB::table('articles')->where('status', 1)->where('approve_status', 2)->where('homepagestatus', 1)->where('id','!=',$id)->select('id', 'poster', 'alt', 'entitle as title', 'ensubtitle as subtitle', 'enauthor as author', 'enbrief as brief', 'encontent as content', 'created_at')->get();
          } 

          else 
          {
           $article =DB::table('articles')->where('status', 1)->where('approve_status', 2)->where('homepagestatus', 1)->where('id',$id)->select('id', 'poster', 'alt', 'maltitle as title', 'malsubtitle as subtitle', 'malauthor as author', 'malbrief as brief', 'malcontent as content', 'created_at')->first();
            
            $relatedarticles = DB::table('articles')->where('status', 1)->where('approve_status', 2)->where('homepagestatus', 1)->where('id','!=',$id)->select('id', 'poster', 'alt', 'maltitle as title', 'malsubtitle as subtitle', 'malauthor as author', 'malbrief as brief', 'malcontent as content', 'created_at')->get();
            
          }
          return view('articledetail',compact('article','relatedarticles','sessionbil'));
          //dd($resultdata);
        
    }

    public function articledetail(Request $request)
    {

        

        $sessionbil=Session::get('bilingual'); 


          if($sessionbil==1){

            $article =DB::table('articles')->where('status', 1)->where('approve_status', 2)->where('homepagestatus', 1)->select('id', 'poster', 'alt', 'entitle as title', 'ensubtitle as subtitle', 'enauthor as author', 'enbrief as brief', 'encontent as content', 'created_at')->orderBy('id','desc')->first();
            
            $relatedarticles = DB::table('articles')->where('status', 1)->where('approve_status', 2)->where('homepagestatus', 1)->where('id','!=',$article->id)->select('id', 'poster', 'alt', 'entitle as title', 'ensubtitle as subtitle', 'enauthor as author', 'enbrief as brief', 'encontent as content', 'created_at')->get();
          } 

          else 
          {
           $article =DB::table('articles')->where('status', 1)->where('approve_status', 2)->where('homepagestatus', 1)->select('id', 'poster', 'alt', 'maltitle as title', 'malsubtitle as subtitle', 'malauthor as author', 'malbrief as brief', 'malcontent as content', 'created_at')->orderBy('id','desc')->first();
            
            $relatedarticles = DB::table('articles')->where('status', 1)->where('approve_status', 2)->where('homepagestatus', 1)->where('id','!=',$article->id)->select('id', 'poster', 'alt', 'maltitle as title', 'malsubtitle as subtitle', 'malauthor as author', 'malbrief as brief', 'malcontent as content', 'created_at')->get();
            
          }
          return view('articledetail',compact('article','relatedarticles','sessionbil'));
          //dd($resultdata);
        
    }

    public function whatsnewdetail(Request $request)
    {

        

        $sessionbil=Session::get('bilingual'); 


          if($sessionbil==1){
            $whatsnew = DB::table('componentarticles')->where('components_id',4)->where('status', 1)->select('id', 'entitle as title', 'ensubtitle as subtitle', 'encontent as content', 'iconclass')->orderBy('id','desc')->first();

            
            
            $relatedwhatsnew = DB::table('componentarticles')->where('components_id',4)->where('status', 1)->where('id','!=',$whatsnew->id)->select('id', 'entitle as title', 'ensubtitle as subtitle', 'encontent as content', 'iconclass')->orderBy('id','desc')->get();

          } 

          else 
          {
           $whatsnew = DB::table('componentarticles')->where('components_id',4)->where('status', 1)->select('id', 'maltitle as title', 'malsubtitle as subtitle', 'malcontent as content', 'iconclass')->orderBy('id','desc')->first();

            
            
            $relatedwhatsnew = DB::table('componentarticles')->where('components_id',4)->where('status', 1)->where('id','!=',$whatsnew->id)->select('id', 'maltitle as title', 'malsubtitle as subtitle', 'malcontent as content', 'iconclass')->orderBy('id','desc')->get();
            
          }
          return view('whatsnewdetail',compact('whatsnew','relatedwhatsnew','sessionbil'));
          //dd($resultdata);
        
    }

    public function whatsnewid(Request $request, $encid)
    {

        $id=Crypt::decrypt($encid);

        $sessionbil=Session::get('bilingual'); 


          if($sessionbil==1){
            $whatsnew = DB::table('componentarticles')->where('components_id',4)->where('status', 1)->where('id',$id)->select('id', 'entitle as title', 'ensubtitle as subtitle', 'encontent as content', 'iconclass')->orderBy('id','desc')->first();

            
            
            $relatedwhatsnew = DB::table('componentarticles')->where('components_id',4)->where('status', 1)->where('id','!=',$id)->select('id', 'entitle as title', 'ensubtitle as subtitle', 'encontent as content', 'iconclass')->orderBy('id','desc')->get();

          } 

          else 
          {
           $whatsnew = DB::table('componentarticles')->where('components_id',4)->where('status', 1)->where('id',$id)->select('id', 'maltitle as title', 'malsubtitle as subtitle', 'malcontent as content', 'iconclass')->orderBy('id','desc')->first();

            
            
            $relatedwhatsnew = DB::table('componentarticles')->where('components_id',4)->where('status', 1)->where('id','!=',$id)->select('id', 'maltitle as title', 'malsubtitle as subtitle', 'malcontent as content', 'iconclass')->orderBy('id','desc')->get();
            
          }
          return view('whatsnewdetail',compact('whatsnew','relatedwhatsnew','sessionbil'));
          //dd($resultdata);
        
    }


    public function dstpgmid(Request $request, $encid)
    {

        $id=Crypt::decrypt($encid);

        $sessionbil=Session::get('bilingual'); 


          if($sessionbil==1){

            $districts = DB::table('districts')->select('id','name')->get();

            $dstpgm = DB::table('districtpgms')->where('status', 1)->where('id', $id)->select('id', 'poster', 'alt', 'entitle as title', 'ensubtitle as subtitle', 'enbrief as brief', 'encontent as content', 'created_at','districts_id')->first();

            
            
            $relateddstpgms = DB::table('districtpgms')->where('status', 1)->where('id', '!=',$id)->where('districts_id',$dstpgm->districts_id)->select('id', 'poster', 'alt', 'entitle as title', 'ensubtitle as subtitle', 'enbrief as brief', 'encontent as content', 'created_at','districts_id')->get();

          } 

          else 
          {
            $districts = DB::table('districts')->select('id','local as name')->get();

           $dstpgm = DB::table('districtpgms')->where('status', 1)->where('id', $id)->select('id', 'poster', 'alt', 'maltitle as title', 'malsubtitle as subtitle', 'malbrief as brief', 'malcontent as content', 'created_at','districts_id')->first();

            
            
            $relateddstpgms = DB::table('districtpgms')->where('status', 1)->where('id', '!=',$id)->where('districts_id',$dstpgm->districts_id)->select('id', 'poster', 'alt', 'maltitle as title', 'malsubtitle as subtitle', 'malbrief as brief', 'malcontent as content', 'created_at','districts_id')->get();
            
          }
          return view('dstpgmdetail',compact('dstpgm','relateddstpgms','sessionbil','districts'));
         
        
    }

    public function dstpgmdstid(Request $request)
    {
        

        $sessionbil=Session::get('bilingual'); 
        $districtid = $request->district;


          if($sessionbil==1){

            $districts = DB::table('districts')->select('id','name')->get();

            $dstpgm = DB::table('districtpgms')->where('status', 1)->where('districts_id', $districtid)->select('id', 'poster', 'alt', 'entitle as title', 'ensubtitle as subtitle', 'enbrief as brief', 'encontent as content', 'created_at','districts_id')->first();

            if($dstpgm!=''){
                $relateddstpgms = DB::table('districtpgms')->where('status', 1)->where('id', '!=',$dstpgm->id)->where('districts_id',$dstpgm->districts_id)->select('id', 'poster', 'alt', 'entitle as title', 'ensubtitle as subtitle', 'enbrief as brief', 'encontent as content', 'created_at','districts_id')->get();
            } else{
                $relateddstpgms='';
            }
            
            

          } 

          else 
          {
            $districts = DB::table('districts')->select('id','local as name')->get();

           $dstpgm = DB::table('districtpgms')->where('status', 1)->where('districts_id', $districtid)->select('id', 'poster', 'alt', 'maltitle as title', 'malsubtitle as subtitle', 'malbrief as brief', 'malcontent as content', 'created_at','districts_id')->first();

            if($dstpgm!=''){
            
            $relateddstpgms = DB::table('districtpgms')->where('status', 1)->where('id', '!=',$dstpgm->id)->where('districts_id',$dstpgm->districts_id)->select('id', 'poster', 'alt', 'maltitle as title', 'malsubtitle as subtitle', 'malbrief as brief', 'malcontent as content', 'created_at','districts_id')->get();
             }else{
                $relateddstpgms='';
            }
            
            
            
          }
       
          return view('dstpgmdetail',compact('dstpgm','relateddstpgms','sessionbil','districts'));
         
        
    }

     public function documenttypedetail(Request $request, $encid)
    {

        $id=Crypt::decrypt($encid);//dd($id);

        $sessionbil=Session::get('bilingual'); 


          if($sessionbil==1){

            $documenttype=DB::table('documenttypes')->where('status',1)->select('id','name as title','iconclass')->orderBy('id','asc')->get();

            $documents = DB::table('documents')
                        ->join('departments','departments.id','documents.departments_id')
                        ->join('fielddepartments','fielddepartments.id','documents.fielddepartments_id')
                        ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                        ->select('documents.id','documentnumber','documentdate','documents.entitle as title','departments.entitle as deptname','fielddepartments.name as fieldname','filepath','size','documents.documenttypes_id','documenttypes.name as documenttype','documenttypes.foldername as folder')
                       ->where('documents.documenttypes_id',$id) 
                       ->orderBy('documents.id','desc')
                        ->first();


            $relateddocuments = DB::table('documents')
                        ->join('departments','departments.id','documents.departments_id')
                        ->join('fielddepartments','fielddepartments.id','documents.fielddepartments_id')
                        ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                        ->select('documents.id','documentnumber','documentdate','documents.entitle as title','departments.entitle as deptname','fielddepartments.name as fieldname','filepath','size','documents.documenttypes_id','documenttypes.name as documenttype','documenttypes.foldername as folder');
            if(isset($documents->id)){

                $relateddocuments=$relateddocuments->where('documents.id','!=',$documents->id); 
                
            }
            $relateddocuments=$relateddocuments->where('documents.documenttypes_id',$id)
           ->orderBy('documents.id','desc')
            ->limit(20)
            ->get();
          } else {

            $documenttype=DB::table('documenttypes')->where('status',1)->select('id','malname as title','iconclass')->orderBy('id','asc')->get();

            $documents = DB::table('documents')
                        ->join('departments','departments.id','documents.departments_id')
                        ->join('fielddepartments','fielddepartments.id','documents.fielddepartments_id')
                        ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                        ->select('documents.id','documentnumber','documentdate','documents.maltitle as title','departments.maltitle as deptname','fielddepartments.malname as fieldname','filepath','size','documents.documenttypes_id','documenttypes.name as documenttype','documenttypes.foldername as folder')
                       ->where('documents.documenttypes_id',$id) 
                       ->orderBy('documents.id','desc')
                        ->first();


            $relateddocuments = DB::table('documents')
                        ->join('departments','departments.id','documents.departments_id')
                        ->join('fielddepartments','fielddepartments.id','documents.fielddepartments_id')
                        ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                         ->select('documents.id','documentnumber','documentdate','documents.maltitle as title','departments.maltitle as deptname','fielddepartments.malname as fieldname','filepath','size','documents.documenttypes_id','documenttypes.malname as documenttype','documenttypes.foldername as folder');
            if(isset($documents->id)){

                $relateddocuments=$relateddocuments->where('documents.id','!=',$documents->id); 
                
            }
            $relateddocuments=$relateddocuments->where('documents.documenttypes_id',$id)
                       ->orderBy('documents.id','desc')
                        ->limit(20)
                        ->get();
          } 

          
          return view('documenttypedetailview',compact('documenttype','documents','relateddocuments','sessionbil'));
          //dd($resultdata);
        
    }

     public function doctypewisedetail(Request $request)
    {

        $documenttypeval = $request->documenttype; 

        $sessionbil=Session::get('bilingual'); 


          if($sessionbil==1){

            $documenttype=DB::table('documenttypes')->where('status',1)->select('id','name as title','iconclass')->orderBy('id','asc')->get();

            $documents = DB::table('documents')
                        ->join('departments','departments.id','documents.departments_id')
                        ->join('fielddepartments','fielddepartments.id','documents.fielddepartments_id')
                        ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                        ->select('documents.id','documentnumber','documentdate','documents.entitle as title','departments.entitle as deptname','fielddepartments.name as fieldname','filepath','size','documents.documenttypes_id','documenttypes.name as documenttype','documenttypes.foldername as folder')
                       ->where('documents.documenttypes_id',$documenttypeval) 
                       ->orderBy('documents.id','desc')
                        ->first();


            $relateddocuments = DB::table('documents')
                        ->join('departments','departments.id','documents.departments_id')
                        ->join('fielddepartments','fielddepartments.id','documents.fielddepartments_id')
                        ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                        ->select('documents.id','documentnumber','documentdate','documents.entitle as title','departments.entitle as deptname','fielddepartments.name as fieldname','filepath','size','documents.documenttypes_id','documenttypes.name as documenttype','documenttypes.foldername as folder');
            if(isset($documents->id)){
                $relateddocuments=$relateddocuments->where('documents.id','!=',$documents->id);
            }
            
           $relateddocuments=$relateddocuments->where('documents.documenttypes_id',$documenttypeval)
           ->orderBy('documents.id','desc')
            ->limit(20)
            ->get();
          } else {

            $documenttype=DB::table('documenttypes')->where('status',1)->select('id','malname as title','iconclass')->orderBy('id','asc')->get();

            $documents = DB::table('documents')
                        ->join('departments','departments.id','documents.departments_id')
                        ->join('fielddepartments','fielddepartments.id','documents.fielddepartments_id')
                        ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                        ->select('documents.id','documentnumber','documentdate','documents.maltitle as title','departments.maltitle as deptname','fielddepartments.malname as fieldname','filepath','size','documents.documenttypes_id','documenttypes.name as documenttype','documenttypes.foldername as folder')
                       ->where('documents.documenttypes_id',$documenttypeval) 
                       ->orderBy('documents.id','desc')
                        ->first();


            $relateddocuments = DB::table('documents')
                        ->join('departments','departments.id','documents.departments_id')
                        ->join('fielddepartments','fielddepartments.id','documents.fielddepartments_id')
                        ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                         ->select('documents.id','documentnumber','documentdate','documents.maltitle as title','departments.maltitle as deptname','fielddepartments.malname as fieldname','filepath','size','documents.documenttypes_id','documenttypes.malname as documenttype','documenttypes.foldername as folder');
            if(isset($documents->id)){
                $relateddocuments=$relateddocuments->where('documents.id','!=',$documents->id);
            }
            
           $relateddocuments=$relateddocuments->where('documents.documenttypes_id',$documenttypeval)
                       ->orderBy('documents.id','desc')
                        ->limit(20)
                        ->get();
          } 

          
          return view('documenttypedetailview',compact('documenttype','documents','relateddocuments','sessionbil'));
          //dd($resultdata);
        
    }

    public function searchdocs()
   {  

        $sessionbil = Session::get('bilingual');
        if($sessionbil==1){
            $departments     = DB::table('departments')->select('id','entitle as title')->orderBy('id','asc')->get();
            $doctype     = DB::table('documenttypes')->where('status',1)->select('id','name as title','iconclass')->orderBy('id','asc')->get();
        } else {
            $departments     = DB::table('departments')->select('id','maltitle as title')->orderBy('id','asc')->get();
            $doctype     = DB::table('documenttypes')->where('status',1)->select('id','malname as title','iconclass')->orderBy('id','asc')->get();
        }

      return view('searchdocs',compact('sessionbil','departments','doctype'));
   }

    public function getfielddepartmentnew(Request $request)
    {
       $sessionbil = Session::get('bilingual');
        if($request->ajax()){
            request()->validate([
                'deptid'   =>  'required'
            ]);

            $deptid = $request->deptid;
            if($sessionbil==1){
             $fielddepatmentdet=DB::table('fielddepartments')->select('id','name')->where('departments_id',$deptid)->get();
             } else {
            $fielddepatmentdet=DB::table('fielddepartments')->select('id','malname as name')->where('departments_id',$deptid)->get();
            }
             //dd($fielddepatmentdet);
            return response()->json(['fielddepatmentdet' => $fielddepatmentdet,'sessionbil'=>$sessionbil]);

        }


    }

    public function advancesearch(Request $request)
    {
        $sessionbil = Session::get('bilingual');
        if($request->ajax()){

            request()->validate([
                'date_from'   =>  'required',
                'date_to'   =>  'required'
            ]);
            $deptid = $request->dept_id;
            $field_dept_id = $request->field_dept_id;
            $doc_type = $request->doc_type;
            $date_from = $request->date_from;
            $date_to = $request->date_to;
            $doc_keyword = $request->doc_keyword;

            
            //DB::enableQueryLog();
            if($sessionbil==1){
                $qry = DB::table('documents')
                            ->join('departments','departments.id','documents.departments_id')
                            ->join('fielddepartments','fielddepartments.id','documents.fielddepartments_id')
                            ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                            ->select('documents.id','documentnumber','documentdate','documents.entitle as title','departments.entitle as deptname','fielddepartments.name as fieldname','filepath','size','documents.documenttypes_id','documenttypes.name as documenttype','documenttypes.foldername as folder','documents.created_at as uplddt');
                if($deptid!=''){
                    if($deptid!=999){
                        $qry = $qry->where('documents.departments_id',$deptid);
                    }
                    
                }   

                if($field_dept_id!=''){
                    if($field_dept_id!=999){
                        $qry = $qry->where('documents.fielddepartments_id',$field_dept_id);
                    }
                    
                } 

                if($doc_type!=''){
                    if($doc_type!=999){
                        $qry = $qry->where('documents.documenttypes_id',$doc_type);
                    }
                    
                } 

                if($date_from!='0000/00/00' && $date_to!='0000/00/00')
                {

                   $qry = $qry->whereDate('documents.documentdate', '>=', $date_from)->whereDate('documents.documentdate', '<=', $date_to);
                   
                }  
                if($doc_keyword!=''){
                    foreach($doc_keyword as $key => $word){
                        if($key == 0){
                            $qry = $qry->where('documents.entitle', 'LIKE', '%'.$word.'%');
                        }else{
                            $qry = $qry->orWhere('documents.entitle', 'LIKE', '%'.$word.'%');
                        }
                        
                        
                    }
                    // $qry = $qry->where('documents.entitle', 'LIKE', $doc_keyword);

                }

               // dd($doc_keyword);
                // if($doc_keyword!=''){

                //     $keyval1="'".$doc_keyword[0]."'";
                //         $qry = $qry->where('documents.entitle', 'LIKE', $keyval1);

                //     for($i=1;$i<$key_cnt;$i++){
                //         $keyval="'".$doc_keyword[$i]."'";
                //         $qry = $qry->orWhere('documents.entitle', 'LIKE', $keyval);
                //     }

                   
                // }    
                

                $qry = $qry->orderBy('documents.id','desc')->get();

            } else {

                $qry = DB::table('documents')
                            ->join('departments','departments.id','documents.departments_id')
                            ->join('fielddepartments','fielddepartments.id','documents.fielddepartments_id')
                            ->join('documenttypes','documenttypes.id','documents.documenttypes_id')
                            ->select('documents.id','documentnumber','documentdate','documents.maltitle as title','departments.maltitle as deptname','fielddepartments.malname as fieldname','filepath','size','documents.documenttypes_id','documenttypes.malname as documenttype','documenttypes.foldername as folder','documents.created_at as uplddt');
               if($deptid!=''){
                    if($deptid!=999){
                        $qry = $qry->where('documents.departments_id',$deptid);
                    }
                    
                }   

                if($field_dept_id!=''){
                    if($field_dept_id!=999){
                        $qry = $qry->where('documents.fielddepartments_id',$field_dept_id);
                    }
                    
                } 

                if($doc_type!=''){
                    if($doc_type!=999){
                        $qry = $qry->where('documents.documenttypes_id',$doc_type);
                    }
                    
                } 

                if($date_from!='0000/00/00' && $date_to!='0000/00/00')
                {

                   $qry = $qry->whereDate('documents.documentdate', '>=', $date_from)->whereDate('documents.documentdate', '<=', $date_to);
                   
                }  

                 if($doc_keyword!=''){
                   foreach($doc_keyword as $key => $word){
                        if($key == 0){
                            $qry = $qry->where('documents.entitle', 'LIKE', '%'.$word.'%');
                        }else{
                            $qry = $qry->orWhere('documents.entitle', 'LIKE', '%'.$word.'%');
                        }
                        
                        
                    }

                }
                //dd($doc_keyword);
                // if($doc_keyword!=''){
                //     $keyval1="'".$doc_keyword[0]."'";
                //         $qry = $qry->where('documents.entitle', 'LIKE', $keyval1);

                //     for($i=1;$i<$key_cnt;$i++){
                //         $keyval="'".$doc_keyword[$i]."'";
                //         $qry = $qry->orWhere('documents.entitle', 'LIKE', $keyval);
                //     }

                   
                // }    
                

                $qry = $qry->orderBy('documents.id','desc')->get();
            }
            //dd(DB::getQueryLog());
//dd($qry);
            return response()->json(['result'=>$qry,'sessionbil'=>$sessionbil,'deptid'=>$deptid]);

        }
     
    }
    /*Document Category-6--END*/
    /*controller close*/
}
