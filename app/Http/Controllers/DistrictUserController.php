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
use App\Districtpgm;
use DB;
use Auth;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class DistrictUserController extends Controller
{
     public function districtusrhome(Request $request)
    {
    	return view('districtusrhomedashboard');
    }

    public function districtpgmlist(Request $request)
    {
        
        $uid = Auth::user()->id;
        $listdata = DB::table('districtpgms')
            ->select('id', 'entitle', 'maltitle', 'status')
            ->where('users_id', $uid)
            ->get();
       


        return view('districtusr.districtpgmlist', compact('listdata'));
    }

    public function newdistrictpgmlist()
    {
        
        return view('districtusr.districtpgmcreate');
    }

    public function districtpgmstore(Request $request)
    {
       

        $rules = [
            'alttext'    => app('App\Http\Controllers\RegexvaluesglobController')->getEntitlereg(),
            'entitle'    => app('App\Http\Controllers\RegexvaluesglobController')->getEntitlereg(),
            'maltitle'    => app('App\Http\Controllers\RegexvaluesglobController')->getMaltitlereg(),
            'ensubtitle'    => app('App\Http\Controllers\RegexvaluesglobController')->getEntitlereg(),
            'malsubtitle'    => app('App\Http\Controllers\RegexvaluesglobController')->getMaltitlereg(),
            'enbrief'    => app('App\Http\Controllers\RegexvaluesglobController')->getSumtitlereg(),
            'malbrief'    => app('App\Http\Controllers\RegexvaluesglobController')->getSumtitlereg(),
            'encontent'    => app('App\Http\Controllers\RegexvaluesglobController')->getSumtitlereg(),
            'malcontent'    => app('App\Http\Controllers\RegexvaluesglobController')->getSumtitlereg(),
            'image' => 'sometimes|nullable|mimes:jpg,jpeg,png',
            'upldfile' => 'sometimes|nullable|mimes:jpg,jpeg,png'
        ];
        $messages = [
           'image.dimensions' => 'Image resolution does not meet the requirement. Size of the image should be 560 x 420 (w x h). ',
        ];

        
         $validator = Validator::make($request->all(), $rules,$messages);

        if ($validator->fails()) {
            if (Auth::user()->usertypes_id == 4) {
                return response()->json(['errors' => $validator->errors()->first()]);
            } else if (Auth::user()->usertypes_id == 2) {
                return response()->json(['errors' => $validator->errors()->first()]);
            } else if (Auth::user()->usertypes_id == 5) {
                return response()->json(['errors' => $validator->errors()->first()]);
            }
            else if (Auth::user()->usertypes_id == 10) {
                return response()->json(['errors' => $validator->errors()->first()]);
            }
        }


        
        
            $chkrows = Districtpgm::where('entitle', $request->entitle)->exists() ? 1 : 0;
            if ($chkrows == 0) {
                $date = date('dmYH:i:s');
                if (isset($request->homepagestatus)) {
                    $dplystat = 1;
                } else {
                    $dplystat = 0;
                }
                if (isset($request->image)) {
                    $imageName = 'districtpgmposter' . $date . '.' . $request->image->extension();
                    $request->image->move(public_path('Districtpgm'), $imageName);

                    if(isset($request->upldfile)){
                        $imageNamee = 'districtpgm' . $date . '.' . $request->upldfile->extension();
                        $request->upldfile->move(public_path('Districtpgm'), $imageNamee);

                        $resultsave = new Districtpgm([
                            'file'           =>  $imageNamee,
                            'poster'           =>  $imageName,
                            'alt'             =>  $request->alttext,
                            'entitle'        =>  $request->entitle,
                            'maltitle'       =>  $request->maltitle,
                            'ensubtitle'        =>  $request->ensubtitle,
                            'malsubtitle'       =>  $request->malsubtitle,
                            'enbrief'        =>  $request->enbrief,
                            'malbrief'       =>  $request->malbrief,
                            'encontent'        =>  $request->encontent,
                            'malcontent'       =>  $request->malcontent,
                            'homepagestatus'  =>  $dplystat,
                            'districts_id'         => Auth::user()->districts_id,
                            'users_id'         => Auth::user()->id
                        ]);

                    } else {
                        $resultsave = new Districtpgm([
                            'poster'           =>  $imageName,
                            'alt'             =>  $request->alttext,
                            'entitle'        =>  $request->entitle,
                            'maltitle'       =>  $request->maltitle,
                            'ensubtitle'        =>  $request->ensubtitle,
                            'malsubtitle'       =>  $request->malsubtitle,
                            'enbrief'        =>  $request->enbrief,
                            'malbrief'       =>  $request->malbrief,
                            'encontent'        =>  $request->encontent,
                            'malcontent'       =>  $request->malcontent,
                            'homepagestatus'  =>  $dplystat,
                            'districts_id'         => Auth::user()->districts_id,
                            'users_id'         => Auth::user()->id
                        ]);
                    }


                    
                } else {

                    if(isset($request->upldfile)){
                        $imageNamee = 'districtpgm' . $date . '.' . $request->upldfile->extension();
                        $request->upldfile->move(public_path('Districtpgm'), $imageNamee);

                        $resultsave = new Districtpgm([
                            'file'           =>  $imageNamee,
                            'alt'             =>  $request->alttext,
                            'entitle'        =>  $request->entitle,
                            'maltitle'       =>  $request->maltitle,
                            'ensubtitle'        =>  $request->ensubtitle,
                            'malsubtitle'       =>  $request->malsubtitle,
                            'enbrief'        =>  $request->enbrief,
                            'malbrief'       =>  $request->malbrief,
                            'encontent'        =>  $request->encontent,
                            'malcontent'       =>  $request->malcontent,
                            'homepagestatus'  =>  $dplystat,
                            'districts_id'         => Auth::user()->districts_id,
                            'users_id'         => Auth::user()->id
                        ]);

                    } else {
                        $resultsave = new Districtpgm([
                            'alt'             =>  $request->alttext,
                            'entitle'        =>  $request->entitle,
                            'maltitle'       =>  $request->maltitle,
                            'ensubtitle'        =>  $request->ensubtitle,
                            'malsubtitle'       =>  $request->malsubtitle,
                            'enbrief'        =>  $request->enbrief,
                            'malbrief'       =>  $request->malbrief,
                            'encontent'        =>  $request->encontent,
                            'malcontent'       =>  $request->malcontent,
                            'homepagestatus'  =>  $dplystat,
                            'districts_id'         => Auth::user()->districts_id,
                            'users_id'         => Auth::user()->id
                        ]);
                    }

                    
                }

                $updated_data= $resultsave->save();
                if($updated_data)
                {
                    // dd(true);
                    $entitle='Last Updated';
                    $site_table_update=[
                        'titlevalues'=>date('Y-m-d H:i:s')
                    ];

                    $getstatus = DB::table('sitesettings')
                    ->where('entitle',$entitle)
                    ->update($site_table_update);
                }
                else
                {
                   // dd(false);
                }

                
                    
                     return redirect('districtusr/districtpgmlist')->with('success', 'District Programme Added!');
                
            } else {

                
                     return redirect('districtusr/districtpgmlist')->with('errors', 'Already a District Programme with same name exists.');
               
            }
        
    }

    public function districtpgmedit(Request $request, $id)
    {
        
        $resultdata = Districtpgm::find($id);
        

            return view('districtusr.districtpgmedit',compact('resultdata'));

           
    }

    public function districtpgmposterdel(Request $request,$id){
        if ($request->ajax()) {
            /*if(file_exists($request->poster_path)){
                @unlink($request->poster_path);
            }*/
            $upd_status = array('poster' => '');
            DB::table('districtpgms')->where('id', $id)->update($upd_status);
            return response()->json(['success' => 'Data Updated successfully.']);
        }
    }
    public function districtpgmfiledel(Request $request,$id){
        if ($request->ajax()) {
            /*if(file_exists($request->poster_path)){
                @unlink($request->poster_path);
            }*/
            $upd_status = array('file' => '');
            DB::table('districtpgms')->where('id', $id)->update($upd_status);
            return response()->json(['success' => 'Data Updated successfully.']);
        }
    }

     public function districtpgmupdate(Request $request)
    {
        $file = $request->get('imageedit');

        
        $rules = [
            'alttext1'    => app('App\Http\Controllers\RegexvaluesglobController')->getEntitlereg(),
            'entitle1'    => app('App\Http\Controllers\RegexvaluesglobController')->getEntitlereg(),
            'maltitle1'    => app('App\Http\Controllers\RegexvaluesglobController')->getMaltitlereg(),
            'ensubtitle1'    => app('App\Http\Controllers\RegexvaluesglobController')->getEntitlereg(),
            'malsubtitle1'    => app('App\Http\Controllers\RegexvaluesglobController')->getMaltitlereg(),
            'enbrief1'    => app('App\Http\Controllers\RegexvaluesglobController')->getSumtitlereg(),
            'malbrief1'    => app('App\Http\Controllers\RegexvaluesglobController')->getSumtitlereg(),
            'encontent1'    => app('App\Http\Controllers\RegexvaluesglobController')->getSumtitlereg(),
            'malcontent1'    => app('App\Http\Controllers\RegexvaluesglobController')->getSumtitlereg(),
            'imageedit' => 'mimes:jpg,jpeg,png',
            'upldfileedit' => 'mimes:jpg,jpeg,png'
        ];
        $messages = [
           'imageedit.dimensions' => 'Image resolution does not meet the requirement. Size of the image should be 560 x 420 (w x h). ',
        ];

        
         $validator = Validator::make($request->all(), $rules,$messages);

        if ($validator->fails()) {
            if (Auth::user()->usertypes_id == 4) {
                return response()->json(['errors' => $validator->errors()->first()]);
            } else if (Auth::user()->usertypes_id == 2) {
                return response()->json(['errors' => $validator->errors()->first()]);
            } else if (Auth::user()->usertypes_id == 5) {
                return response()->json(['errors' => $validator->errors()->first()]);
            } else if (Auth::user()->usertypes_id == 10) {
                return response()->json(['errors' => $validator->errors()->first()]);
            }
            //    return redirect('webadmin/articlelist')->with(['errors' => $validator->errors()->first()]);
        }
       
        
            $chkrows = Districtpgm::where('entitle', $request->entitle)->where('id', '!=', $request->hidden_id)->exists() ? 1 : 0;
            if ($chkrows == 0) {
                $date = date('dmYH:i:s');

                if (isset($request->imageedit)) {
                    $date = date('dmYH:i:s');

                    if (isset($request->homepagestatus1)) {
                        $dplystat1 = 1;
                    } else {
                        $dplystat1 = 0;
                    }
                    $imageName1 = 'districtpgmposter' . $date . '.' . $request->imageedit->extension();
                    $request->imageedit->move(public_path('Districtpgm'), $imageName1);

                    if (isset($request->upldfileedit)) {
                        $imageNamee1 = 'districtpgm' . $date . '.' . $request->upldfileedit->extension();
                        $request->upldfileedit->move(public_path('Districtpgm'), $imageNamee1);

                        $form_data = array(
                                'file'           =>  $imageNamee1,
                                'poster'           =>  $imageName1,
                                'alt'             =>  $request->alttext1,
                                'entitle'        =>  $request->entitle1,
                                'maltitle'       =>  $request->maltitle1,
                                'ensubtitle'        =>  $request->ensubtitle1,
                                'malsubtitle'       =>  $request->malsubtitle1,
                                'enbrief'        =>  $request->enbrief1,
                                'malbrief'       =>  $request->malbrief1,
                                'encontent'        =>  $request->encontent1,
                                'malcontent'       =>  $request->malcontent1,
                             'districts_id'         => Auth::user()->districts_id,
                                'users_id'         => Auth::user()->id
                            );
                    }else{

                        $form_data = array(
                                'poster'           =>  $imageName1,
                                'alt'             =>  $request->alttext1,
                                'entitle'        =>  $request->entitle1,
                                'maltitle'       =>  $request->maltitle1,
                                'ensubtitle'        =>  $request->ensubtitle1,
                                'malsubtitle'       =>  $request->malsubtitle1,
                                'enbrief'        =>  $request->enbrief1,
                                'malbrief'       =>  $request->malbrief1,
                                'encontent'        =>  $request->encontent1,
                                'malcontent'       =>  $request->malcontent1,
                             'districts_id'         => Auth::user()->districts_id,
                                'users_id'         => Auth::user()->id
                            );
                    }





                    
                } else {

                    if (isset($request->homepagestatus1)) {
                        $dplystat1 = 1;
                    } else {
                        $dplystat1 = 0;
                    }

                    if (isset($request->upldfileedit)) {
                        $imageNamee1 = 'districtpgm' . $date . '.' . $request->upldfileedit->extension();
                        $request->upldfileedit->move(public_path('Districtpgm'), $imageNamee1);

                        $form_data = array(
                                'file'           =>  $imageNamee1,
                                'alt'             =>  $request->alttext1,
                                'entitle'        =>  $request->entitle1,
                                'maltitle'       =>  $request->maltitle1,
                                'ensubtitle'        =>  $request->ensubtitle1,
                                'malsubtitle'       =>  $request->malsubtitle1,
                                'enbrief'        =>  $request->enbrief1,
                                'malbrief'       =>  $request->malbrief1,
                                'encontent'        =>  $request->encontent1,
                                'malcontent'       =>  $request->malcontent1,
                             'districts_id'         => Auth::user()->districts_id,
                                'users_id'         => Auth::user()->id
                            );
                    }else{
                        $form_data = array(
                                'alt'             =>  $request->alttext1,
                                'entitle'        =>  $request->entitle1,
                                'maltitle'       =>  $request->maltitle1,
                                'ensubtitle'        =>  $request->ensubtitle1,
                                'malsubtitle'       =>  $request->malsubtitle1,
                                'enbrief'        =>  $request->enbrief1,
                                'malbrief'       =>  $request->malbrief1,
                                'encontent'        =>  $request->encontent1,
                                'malcontent'       =>  $request->malcontent1,
                             'districts_id'         => Auth::user()->districts_id,
                                'users_id'         => Auth::user()->id
                            );

                    }
                   
                }

                $updated_data=Districtpgm::whereId($request->hidden_id)->update($form_data);

                if($updated_data)
                {
                    // dd(true);
                    $entitle='Last Updated';
                    $site_table_update=[
                        'titlevalues'=>date('Y-m-d H:i:s')
                    ];

                    $getstatus = DB::table('sitesettings')
                    ->where('entitle',$entitle)
                    ->update($site_table_update);
                }
                else
                {
                   // dd(false);
                }
                        
                     return redirect('districtusr/districtpgmlist')->with('success', 'District Programme Updated!');
                
            } else {

                
                     return redirect('districtusr/districtpgmlist')->with('errors', 'Already a District Programme with same name exists.');
               
            }
        
    }
    public function districtpgmdestroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $updated_data= Districtpgm::findOrFail($id)->delete();
            
        }
        if($updated_data)
        {
            // dd(true);
            $entitle='Last Updated';
            $site_table_update=[
                'titlevalues'=>date('Y-m-d H:i:s')
            ];

            $getstatus = DB::table('sitesettings')
            ->where('entitle',$entitle)
            ->update($site_table_update);
        }
        else
        {
           // dd(false);
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }

    public function districtpgmstatus(Request $request, $id)
    {
        if ($request->ajax()) {
            $getstatus = DB::table('districtpgms')
                ->select('status')
                ->where('id', $id)
                ->first();

            $status = $getstatus->status;
            if ($status == 1) {
                $upd_status = array('status' => 2);
                DB::table('districtpgms')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            } else {

                $upd_status = array('status' => 1);
                DB::table('districtpgms')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            }
        }
    }

   
}
