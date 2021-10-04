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
use DB;
use Auth;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DocumentController extends Controller
{

    public function contributorhome(Request $request)
    {
        return view('documentdashboard');
    }

    public function getfielddepartment(Request $request)
    {

        if ($request->ajax()) {
            request()->validate([
                'deptid'   =>  'required'
            ]);

            $deptid = $request->deptid;
            $fielddepatmentdet = DB::table('fielddepartments')->where('departments_id', $deptid)->get();
            print_r(json_encode($fielddepatmentdet));
        }
    }

    /* Guidelines */

    public function docguidelineslist(Request $request)
    {
        //$displayval=Document::all();
        $displayval = DB::table('documents')
            ->join('departments', 'departments.id', 'documents.departments_id')
            ->join('fielddepartments', 'fielddepartments.id', 'documents.fielddepartments_id')
            ->select('documents.id', 'documentnumber', 'documentdate', 'documents.entitle', 'departments.entitle as deptname', 'fielddepartments.name as fieldname', 'filepath', 'documents.status')
            ->where('documenttypes_id', 8)
            //->where('users_id', $uid)
            ->get();

        return view('contributor.docguidelineslist', compact('displayval'));
    }
    public function docguidelinescreate(Request $request)
    {
        if ($request->ajax()) {


            $departments     = DB::table('departments')->orderBy('id', 'asc')->get();

            return response()->json(['departments' => $departments]);
        }
    }

    public function docguidelinesstore(Request $request)
    {
        $request->validate([
            // 'filedate'          => 'required|date',
            'filename'      => 'required|mimes:pdf|max:1100',
            'departments_id'  => 'required',
            'fielddepartments_id'   => 'sometimes|nullable',
            'entitle'          => 'required|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enkeyword'        => 'sometimes|nullable|max:100|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'filedate'         => 'required|date|before:now|date_format:Y-m-d|after:1956-12-31',
        ]);

        if ($request->ajax()) {
            $chkrows = Document::where('entitle', $request->name)->where('documenttypes_id', 8)->exists() ? 1 : 0;
            if ($chkrows == 0) {
                $date = date('dmYH:i:s');

                /*Go*/
                $fileName = 'guidelines' . $date . '.' . $request->filename->extension();
                $request->filename->move(public_path('Docguidelines'), $fileName);
                $imageSize = $request->file('filename')->getSize();

                $filedate = Carbon::parse($request->filedate)->format('Y-m-d');
                $resultsave = new Document([
                    'documenttypes_id'          =>  8,
                    'documentdate'              =>  $filedate,
                    'filepath'                  =>  $fileName,
                    'departments_id'            =>  $request->departments_id,
                    'fielddepartments_id'       =>  $request->fielddepartments_id,
                    'published'                 =>  1,
                    'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                    'documentorigins_id'        =>  3,
                    'entitle'                   =>  $request->entitle,
                    'maltitle'                  =>  $request->maltitle,
                    'enkeywords'                =>  $request->enkeyword,
                    'malkeywords'               =>  $request->malkeyword,
                    'documentcategories_id'     =>  1,
                    'size'                      =>  $imageSize,
                    'alt'                       =>  'Guidelines'

                ]);

                $resultsave->save();
                $docid = $resultsave->id;

                $resultprocess = new Documentprocessing([
                    'documents_id'          =>  $docid,
                    'currentowner'          =>  Auth::user()->id,
                    'contributor_status'    =>  1,
                    'contributor_id'        =>  Auth::user()->id,
                    'contributor_timestamp' =>  date('Y-m-d H:i:s')
                ]);

                $resultprocess->save();
                return response()->json(['success' => 'Data Added successfully.']);
            } else {
                return response()->json(['errors' => 'Already a guidelines  exists.']);
            }
        }
    }

    public function docguidelinesedit(Request $request, $id)
    {
        if ($request->ajax()) {
            $resultdata = Document::find($id);
            $department = DB::table('departments')->get();
            $fielddepatment = DB::table('fielddepartments')->get();
            return response()->json(['resultdata' => $resultdata, 'department' => $department, 'fielddepartment' => $fielddepatment]);
        }
    }

    public function docguidelinesupdate(Request $request)
    {
        $request->validate([
            'filedate'         => 'required|date|before:now|date_format:Y-m-d|after:1956-12-31',
            'filename'      => 'sometimes|nullable|mimes:pdf|max:1100',
            'departments_id'  => 'required',
            'fielddepartments_id'   => 'sometimes|nullable',
            'entitle'          => 'required|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enkeyword'        => 'sometimes|nullable|max:100|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/'
        ]);

        if ($request->ajax()) {
            $chkrows = Document::where('entitle', $request->entitle)->where('documenttypes_id', 8)->where('id', '!=', $request->hidden_id)->exists() ? 1 : 0;
            if ($chkrows == 0) {

                $filedate = Carbon::parse($request->filedate)->format('Y-m-d');
                if (isset($request->filename)) {
                    $date = date('dmYH:i:s');
                    /*Go*/
                    $fileName = 'guidelines' . $date . '.' . $request->filename->extension();
                    $request->filename->move(public_path('Docguidelines'), $fileName);
                    $imageSize = $request->file('filename')->getSize();

                    $form_data = array(
                        'documenttypes_id'         =>  8,
                        'documentdate'              =>  $filedate,
                        'filepath'                  =>  $fileName,
                        'departments_id'            =>  $request->departments_id,
                        'fielddepartments_id'       =>  $request->fielddepartments_id,
                        'published'                 =>  1,
                        'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                        'documentorigins_id'        =>  3,
                        'entitle'                   =>  $request->entitle,
                        'maltitle'                  =>  $request->maltitle,
                        'enkeywords'                =>  $request->enkeyword,
                        'malkeywords'               =>  $request->malkeyword,
                        'documentcategories_id'     =>  1,
                        'size'                      =>  $imageSize,
                        'alt'                       =>  'Guidelines'
                    );
                } else {
                    $form_data = array(
                        'documenttypes_id'          =>  8,
                        'documentdate'              =>  $filedate,
                        'departments_id'            =>  $request->departments_id,
                        'fielddepartments_id'       =>  $request->fielddepartments_id,
                        'published'                 =>  1,
                        'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                        'documentorigins_id'        =>  3,
                        'entitle'                   =>  $request->entitle,
                        'maltitle'                  =>  $request->maltitle,
                        'enkeywords'                =>  $request->enkeyword,
                        'malkeywords'               =>  $request->malkeyword,
                        'documentcategories_id'     =>  1,
                        'alt'                       =>  'Guidelines'
                    );
                }
                Document::whereId($request->hidden_id)->update($form_data);

                return response()->json(['success' => 'Data is successfully updated']);
            } else {
                return response()->json(['errors' => 'Already a guidelines exists.']);
            }
        }
    }

    public function docguidelinesdestroy(Request $request, $id)
    {
        if ($request->ajax()) {
            Documentprocessing::where('documents_id', $id)->delete();
            Document::findOrFail($id)->delete();
        }
        return response()->json(['success' => 'Data is successfully Deleted']);
    }

    public function docguidelinesstatus(Request $request, $id)
    {
        if ($request->ajax()) {
            $getstatus = DB::table('documents')
                ->select('status')
                ->where('id', $id)
                ->first();

            $status = $getstatus->status;
            if ($status == 1) {
                $upd_status = array('status' => 2);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            } else {
                $upd_status = array('status' => 1);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            }
        }
    }
    /*Guidelines End*/


    /*Right to Information*/

    public function rtidocuments(Request $request)
    {
        //$displayval=Document::all();
        $displayval = DB::table('documents')
            ->join('departments', 'departments.id', 'documents.departments_id')
            ->join('fielddepartments', 'fielddepartments.id', 'documents.fielddepartments_id')
            ->select('documents.id', 'documentnumber', 'documentdate', 'documents.entitle', 'departments.entitle as deptname', 'fielddepartments.name as fieldname', 'filepath', 'documents.status')
            ->where('documenttypes_id', 9)
            //->where('users_id', $uid)
            ->get();

        return view('contributor.rtidocuments', compact('displayval'));
    }
    public function rticreate(Request $request)
    {
        if ($request->ajax()) {


            $departments     = DB::table('departments')->orderBy('id', 'asc')->get();

            return response()->json(['departments' => $departments]);
        }
    }




    public function rtistore(Request $request)
    {


        $request->validate([
            'filedate'         => 'required|date|before:now|date_format:Y-m-d|after:1956-12-31',
            'filename'      => 'required|mimes:pdf|max:1100',
            'departments_id'  => 'required',
            'fielddepartments_id'   => 'sometimes|nullable',
            'entitle'          => 'required|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enkeyword'        => 'sometimes|nullable|max:100|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/'



        ]);

        if ($request->ajax()) {
            $chkrows = Document::where('entitle', $request->name)->where('documenttypes_id', 9)->exists() ? 1 : 0;
            if ($chkrows == 0) {

                $date = date('dmYH:i:s');

                /*Go*/
                $fileName = 'rtidoc' . $date . '.' . $request->filename->extension();
                $request->filename->move(public_path('Policy'), $fileName);
                $imageSize = $request->file('filename')->getSize();


                $filedate = Carbon::parse($request->filedate)->format('Y-m-d');
                $resultsave = new Document([
                    'documenttypes_id'            =>  9,
                    'documentdate'                =>  $filedate,
                    'filepath'                    =>  $fileName,
                    'departments_id'            =>  $request->departments_id,
                    'fielddepartments_id'       =>  $request->fielddepartments_id,
                    'published'                    =>  1,
                    'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                    'documentorigins_id'        =>  3,
                    'entitle'                    =>  $request->entitle,
                    'maltitle'                    =>  $request->maltitle,
                    'enkeywords'                =>  $request->enkeyword,
                    'malkeywords'                =>  $request->malkeyword,
                    'documentcategories_id'     =>  1,
                    'size'                        =>  $imageSize,
                    'alt'                        =>  'RTI document'

                ]);

                $resultsave->save();
                $docid = $resultsave->id;

                $resultprocess = new Documentprocessing([
                    'documents_id'            =>  $docid,
                    'currentowner'            =>  Auth::user()->id,
                    'contributor_status'    =>  1,
                    'contributor_id'        =>  Auth::user()->id,
                    'contributor_timestamp' =>  date('Y-m-d H:i:s')
                ]);

                $resultprocess->save();
                return response()->json(['success' => 'Data Added successfully.']);
            } else {
                return response()->json(['errors' => 'Already a RTI document  exists.']);
            }
        }
    }

    public function rtiedit(Request $request, $id)
    {
        if ($request->ajax()) {
            $resultdata = Document::find($id);
            $department = DB::table('departments')->get();
            $fielddepatment = DB::table('fielddepartments')->get();
            return response()->json(['resultdata' => $resultdata, 'department' => $department, 'fielddepartment' => $fielddepatment]);
        }
    }

    public function rtiupdate(Request $request)
    {
        $request->validate([

            'filedate'         => 'required|date|before:now|date_format:Y-m-d|after:1956-12-31',
            'filename'      => 'sometimes|nullable|mimes:pdf|max:1100',
            'departments_id'  => 'required',
            'fielddepartments_id'   => 'sometimes|nullable',
            'entitle'          => 'required|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enkeyword'        => 'sometimes|nullable|max:100|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/'

        ]);

        if ($request->ajax()) {


            $chkrows = Document::where('entitle', $request->entitle)->where('documenttypes_id', 9)->where('id', '!=', $request->hidden_id)->exists() ? 1 : 0;
            if ($chkrows == 0) {

                $filedate = Carbon::parse($request->filedate)->format('Y-m-d');
                if (isset($request->filename)) {
                    $date = date('dmYH:i:s');
                    /*Go*/
                    $fileName = 'rtidoc' . $date . '.' . $request->filename->extension();
                    $request->filename->move(public_path('Policy'), $fileName);
                    
                    $imageSize = $request->file('filename')->getSize();


                    $form_data = array(
                        'documenttypes_id'            =>  9,
                        'documentdate'                =>  $filedate,
                        'filepath'                    =>  $fileName,
                        'departments_id'            =>  $request->departments_id,
                        'fielddepartments_id'       =>  $request->fielddepartments_id,
                        'published'                    =>  1,
                        'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                        'documentorigins_id'        =>  3,
                        'entitle'                    =>  $request->entitle,
                        'maltitle'                    =>  $request->maltitle,
                        'enkeywords'                =>  $request->enkeyword,
                        'malkeywords'                =>  $request->malkeyword,
                        'documentcategories_id'     =>  1,
                        'size'                        =>  $imageSize,
                        'alt'                        =>  'RTI document'
                    );
                } else {
                    $form_data = array(
                        'documenttypes_id'            =>  9,
                        'documentdate'                =>  $filedate,
                        'departments_id'            =>  $request->departments_id,
                        'fielddepartments_id'       =>  $request->fielddepartments_id,
                        'published'                    =>  1,
                        'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                        'documentorigins_id'        =>  3,
                        'entitle'                    =>  $request->entitle,
                        'maltitle'                    =>  $request->maltitle,
                        'enkeywords'                =>  $request->enkeyword,
                        'malkeywords'                =>  $request->malkeyword,
                        'documentcategories_id'     =>  1,
                        'alt'                        =>  'RTI document'
                    );
                }
                Document::whereId($request->hidden_id)->update($form_data);

                return response()->json(['success' => 'Data is successfully updated']);
            } else {
                return response()->json(['errors' => 'Already a RTI Document exists.']);
            }
        }
    }

    public function rtidestroy(Request $request, $id)
    {
        if ($request->ajax()) {

            Documentprocessing::where('documents_id', $id)->delete();
            Document::findOrFail($id)->delete();
        }
        return response()->json(['success' => 'Data is successfully Deleted']);
    }

    public function rtistatus(Request $request, $id)
    {
        if ($request->ajax()) {
            $getstatus = DB::table('documents')
                ->select('status')
                ->where('id', $id)
                ->first();

            $status = $getstatus->status;
            if ($status == 1) {
                $upd_status = array('status' => 2);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            } else {

                $upd_status = array('status' => 1);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            }
        }
    }
    /*Right to Information End*/



    /*Disciplinary Action */
    public function disciplinarylist(Request $request)
    {
        //$displayval=Document::all();
        $displayval = DB::table('documents')
            ->join('departments', 'departments.id', 'documents.departments_id')
            ->join('fielddepartments', 'fielddepartments.id', 'documents.fielddepartments_id')
            ->select('documents.id', 'documentnumber', 'documentdate', 'documents.entitle', 'departments.entitle as deptname', 'fielddepartments.name as fieldname', 'filepath', 'documents.status')
            ->where('documenttypes_id', 10)
            //->where('users_id', $uid)
            ->get();

        return view('contributor.disciplinarylist', compact('displayval'));
    }
    public function disciplinarycreate(Request $request)
    {
        if ($request->ajax()) {
            $departments     = DB::table('departments')->orderBy('id', 'asc')->get();
            return response()->json(['departments' => $departments]);
        }
    }

    public function disciplinarystore(Request $request)
    {
        $request->validate([
            'filedate'         => 'required|date|before:now|date_format:Y-m-d|after:1956-12-31',
            'filename'      => 'required|mimes:pdf|max:1100',
            'departments_id'  => 'required',
            'fielddepartments_id'   => 'sometimes|nullable',
            'entitle'          => 'required|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enkeyword'        => 'sometimes|nullable|max:100|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/'
        ]);

        if ($request->ajax()) {
            $chkrows = Document::where('entitle', $request->name)->where('documenttypes_id', 10)->exists() ? 1 : 0;
            if ($chkrows == 0) {
                $date = date('dmYH:i:s');
                /*Go*/
                $fileName = 'disciplinary' . $date . '.' . $request->filename->extension();
                $request->filename->move(public_path('Disciplinary'), $fileName);
                $imageSize = $request->file('filename')->getSize();
                $filedate = Carbon::parse($request->filedate)->format('Y-m-d');
                $resultsave = new Document([
                    'documenttypes_id'            =>  10,
                    'documentdate'                =>  $filedate,
                    'filepath'                    =>  $fileName,
                    'departments_id'            =>  $request->departments_id,
                    'fielddepartments_id'       =>  $request->fielddepartments_id,
                    'published'                    =>  1,
                    'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                    'documentorigins_id'        =>  3,
                    'entitle'                    =>  $request->entitle,
                    'maltitle'                    =>  $request->maltitle,
                    'enkeywords'                =>  $request->enkeyword,
                    'malkeywords'                =>  $request->malkeyword,
                    'documentcategories_id'     =>  1,
                    'size'                        =>  $imageSize,
                    'alt'                        =>  'Disciplinary Action'
                ]);

                $resultsave->save();
                $docid = $resultsave->id;

                $resultprocess = new Documentprocessing([
                    'documents_id'            =>  $docid,
                    'currentowner'            =>  Auth::user()->id,
                    'contributor_status'    =>  1,
                    'contributor_id'        =>  Auth::user()->id,
                    'contributor_timestamp' =>  date('Y-m-d H:i:s')
                ]);

                $resultprocess->save();
                return response()->json(['success' => 'Data Added successfully.']);
            } else {
                return response()->json(['errors' => 'Already a disciplinary action  exists.']);
            }
        }
    }

    public function disciplinaryedit(Request $request, $id)
    {
        if ($request->ajax()) {
            $resultdata = Document::find($id);
            $department = DB::table('departments')->get();
            $fielddepatment = DB::table('fielddepartments')->get();
            return response()->json(['resultdata' => $resultdata, 'department' => $department, 'fielddepartment' => $fielddepatment]);
        }
    }

    public function disciplinaryupdate(Request $request)
    {
        $request->validate([

            'filedate'         => 'required|date|before:now|date_format:Y-m-d|after:1956-12-31',
            'filename'      => 'sometimes|nullable|mimes:pdf|max:1100',
            'departments_id'  => 'required',
            'fielddepartments_id'   => 'sometimes|nullable',
            'entitle'          => 'required|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enkeyword'        => 'sometimes|nullable|max:100|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/'
        ]);

        if ($request->ajax()) {


            $chkrows = Document::where('entitle', $request->entitle)->where('documenttypes_id', 10)->where('id', '!=', $request->hidden_id)->exists() ? 1 : 0;
            if ($chkrows == 0) {

                $filedate = Carbon::parse($request->filedate)->format('Y-m-d');
                if (isset($request->filename)) {
                    $date = date('dmYH:i:s');
                    /*Go*/
                    $fileName = 'disciplinary' . $date . '.' . $request->filename->extension();
                    $request->filename->move(public_path('Disciplinary'), $fileName);
                    $imageSize = $request->file('filename')->getSize();


                    $form_data = array(
                        'documenttypes_id'            =>  10,
                        'documentdate'                =>  $filedate,
                        'filepath'                    =>  $fileName,
                        'departments_id'            =>  $request->departments_id,
                        'fielddepartments_id'       =>  $request->fielddepartments_id,
                        'published'                    =>  1,
                        'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                        'documentorigins_id'        =>  3,
                        'entitle'                    =>  $request->entitle,
                        'maltitle'                    =>  $request->maltitle,
                        'enkeywords'                =>  $request->enkeyword,
                        'malkeywords'                =>  $request->malkeyword,
                        'documentcategories_id'     =>  1,
                        'size'                        =>  $imageSize,
                        'alt'                        =>  'Disciplinary Action'
                    );
                } else {


                    $form_data = array(
                        'documenttypes_id'            =>  10,
                        'documentdate'                =>  $filedate,
                        'departments_id'            =>  $request->departments_id,
                        'fielddepartments_id'       =>  $request->fielddepartments_id,
                        'published'                    =>  1,
                        'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                        'documentorigins_id'        =>  3,
                        'entitle'                    =>  $request->entitle,
                        'maltitle'                    =>  $request->maltitle,
                        'enkeywords'                =>  $request->enkeyword,
                        'malkeywords'                =>  $request->malkeyword,
                        'documentcategories_id'     =>  1,
                        'alt'                        =>  'Disciplinary Action'
                    );
                }
                Document::whereId($request->hidden_id)->update($form_data);

                return response()->json(['success' => 'Data is successfully updated']);
            } else {
                return response()->json(['errors' => 'Already a disciplinary action exists.']);
            }
        }
    }

    public function disciplinarydestroy(Request $request, $id)
    {
        if ($request->ajax()) {

            Documentprocessing::where('documents_id', $id)->delete();
            Document::findOrFail($id)->delete();
        }
        return response()->json(['success' => 'Data is successfully Deleted']);
    }

    public function disciplinarystatus(Request $request, $id)
    {
        if ($request->ajax()) {
            $getstatus = DB::table('documents')
                ->select('status')
                ->where('id', $id)
                ->first();

            $status = $getstatus->status;
            if ($status == 1) {
                $upd_status = array('status' => 2);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            } else {

                $upd_status = array('status' => 1);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            }
        }
    }
    /*Disciplinary Action End*/

    /*Document FAQ */
    public function documentfaqlist(Request $request)
    {
        //$displayval=Document::all();
        $displayval = DB::table('documents')
            ->join('departments', 'departments.id', 'documents.departments_id')
            ->join('fielddepartments', 'fielddepartments.id', 'documents.fielddepartments_id')
            ->select('documents.id', 'documentnumber', 'documentdate', 'documents.entitle', 'departments.entitle as deptname', 'fielddepartments.name as fieldname', 'filepath', 'documents.status')
            ->where('documenttypes_id', 11)
            //->where('users_id', $uid)
            ->get();

        return view('contributor.documentfaqlist', compact('displayval'));
    }
    public function documentfaqcreate(Request $request)
    {
        if ($request->ajax()) {


            $departments     = DB::table('departments')->orderBy('id', 'asc')->get();

            return response()->json(['departments' => $departments]);
        }
    }




    public function documentfaqstore(Request $request)
    {


        $request->validate([
            'filedate'         => 'required|date|before:now|date_format:Y-m-d|after:1956-12-31',
            'filename'      => 'required|mimes:pdf|max:1100',
            'departments_id'  => 'required',
            'fielddepartments_id'   => 'sometimes|nullable',
            'entitle'          => 'required|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enkeyword'        => 'sometimes|nullable|max:100|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/'
        ]);

        if ($request->ajax()) {
            $chkrows = Document::where('entitle', $request->name)->where('documenttypes_id', 11)->exists() ? 1 : 0;
            if ($chkrows == 0) {

                $date = date('dmYH:i:s');

                /*Go*/
                $fileName = 'faq' . $date . '.' . $request->filename->extension();
                $request->filename->move(public_path('Documentfaq'), $fileName);
                $imageSize = $request->file('filename')->getSize();


                $filedate = Carbon::parse($request->filedate)->format('Y-m-d');
                $resultsave = new Document([
                    'documenttypes_id'            =>  11,
                    'documentdate'                =>  $filedate,
                    'filepath'                    =>  $fileName,
                    'departments_id'            =>  $request->departments_id,
                    'fielddepartments_id'       =>  $request->fielddepartments_id,
                    'published'                    =>  1,
                    'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                    'documentorigins_id'        =>  3,
                    'entitle'                    =>  $request->entitle,
                    'maltitle'                    =>  $request->maltitle,
                    'enkeywords'                =>  $request->enkeyword,
                    'malkeywords'                =>  $request->malkeyword,
                    'documentcategories_id'     =>  1,
                    'size'                        =>  $imageSize,
                    'alt'                        =>  'FAQ'

                ]);

                $resultsave->save();
                $docid = $resultsave->id;

                $resultprocess = new Documentprocessing([
                    'documents_id'            =>  $docid,
                    'currentowner'            =>  Auth::user()->id,
                    'contributor_status'    =>  1,
                    'contributor_id'        =>  Auth::user()->id,
                    'contributor_timestamp' =>  date('Y-m-d H:i:s')


                ]);

                $resultprocess->save();
                return response()->json(['success' => 'Data Added successfully.']);
            } else {
                return response()->json(['errors' => 'Already a guidelines  exists.']);
            }
        }
    }

    public function documentfaqedit(Request $request, $id)
    {
        if ($request->ajax()) {
            $resultdata = Document::find($id);
            $department = DB::table('departments')->get();
            $fielddepatment = DB::table('fielddepartments')->get();
            return response()->json(['resultdata' => $resultdata, 'department' => $department, 'fielddepartment' => $fielddepatment]);
        }
    }

    public function documentfaqupdate(Request $request)
    {
        $request->validate([
            'filedate'         => 'required|date|before:now|date_format:Y-m-d|after:1956-12-31',
            'filename'      => 'sometimes|nullable|mimes:pdf|max:1100',
            'departments_id'  => 'required',
            'fielddepartments_id'   => 'sometimes|nullable',
            'entitle'          => 'required|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enkeyword'        => 'sometimes|nullable|max:100|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/'
        ]);

        if ($request->ajax()) {


            $chkrows = Document::where('entitle', $request->entitle)->where('documenttypes_id', 11)->where('id', '!=', $request->hidden_id)->exists() ? 1 : 0;
            if ($chkrows == 0) {

                $filedate = Carbon::parse($request->filedate)->format('Y-m-d');
                if (isset($request->filename)) {
                    $date = date('dmYH:i:s');
                    /*Go*/
                    $fileName = 'faq' . $date . '.' . $request->filename->extension();
                    $request->filename->move(public_path('Documentfaq'), $fileName);
                    $imageSize = $request->file('filename')->getSize();


                    $form_data = array(
                        'documenttypes_id'            =>  11,
                        'documentdate'                =>  $filedate,
                        'filepath'                    =>  $fileName,
                        'departments_id'            =>  $request->departments_id,
                        'fielddepartments_id'       =>  $request->fielddepartments_id,
                        'published'                    =>  1,
                        'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                        'documentorigins_id'        =>  3,
                        'entitle'                    =>  $request->entitle,
                        'maltitle'                    =>  $request->maltitle,
                        'enkeywords'                =>  $request->enkeyword,
                        'malkeywords'                =>  $request->malkeyword,
                        'documentcategories_id'     =>  1,
                        'size'                        =>  $imageSize,
                        'alt'                        =>  'FAQ'
                    );
                } else {


                    $form_data = array(
                        'documenttypes_id'            =>  11,
                        'documentdate'                =>  $filedate,
                        'departments_id'            =>  $request->departments_id,
                        'fielddepartments_id'       =>  $request->fielddepartments_id,
                        'published'                    =>  1,
                        'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                        'documentorigins_id'        =>  3,
                        'entitle'                    =>  $request->entitle,
                        'maltitle'                    =>  $request->maltitle,
                        'enkeywords'                =>  $request->enkeyword,
                        'malkeywords'                =>  $request->malkeyword,
                        'documentcategories_id'     =>  1,
                        'alt'                        =>  'FAQ'
                    );
                }
                Document::whereId($request->hidden_id)->update($form_data);

                return response()->json(['success' => 'Data is successfully updated']);
            } else {
                return response()->json(['errors' => 'Already a guidelines exists.']);
            }
        }
    }

    public function documentfaqdestroy(Request $request, $id)
    {
        if ($request->ajax()) {

            Documentprocessing::where('documents_id', $id)->delete();
            Document::findOrFail($id)->delete();
        }
        return response()->json(['success' => 'Data is successfully Deleted']);
    }

    public function documentfaqstatus(Request $request, $id)
    {
        if ($request->ajax()) {
            $getstatus = DB::table('documents')
                ->select('status')
                ->where('id', $id)
                ->first();

            $status = $getstatus->status;
            if ($status == 1) {
                $upd_status = array('status' => 2);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            } else {

                $upd_status = array('status' => 1);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            }
        }
    }
    /*Document FAQ End*/

    /*Work Study report*/
    public function workstudyreportlist(Request $request)
    {
        //$displayval=Document::all();
        $displayval = DB::table('documents')
            ->join('departments', 'departments.id', 'documents.departments_id')
            ->join('fielddepartments', 'fielddepartments.id', 'documents.fielddepartments_id')
            ->select('documents.id', 'documentnumber', 'documentdate', 'documents.entitle', 'departments.entitle as deptname', 'fielddepartments.name as fieldname', 'filepath', 'documents.status')
            ->where('documenttypes_id', 12)
            //->where('users_id', $uid)
            ->get();

        return view('contributor.workstudylist', compact('displayval'));
    }
    public function workstudyreportcreate(Request $request)
    {
        if ($request->ajax()) {


            $departments     = DB::table('departments')->orderBy('id', 'asc')->get();

            return response()->json(['departments' => $departments]);
        }
    }




    public function workstudyreportstore(Request $request)
    {


        $request->validate([
            'filedate'         => 'required|date|before:now|date_format:Y-m-d|after:1956-12-31',
            'filename'      => 'required|mimes:pdf|max:1100',
            'departments_id'  => 'required',
            'fielddepartments_id'   => 'sometimes|nullable',
            'entitle'          => 'required|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enkeyword'        => 'sometimes|nullable|max:100|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/'
        ]);

        if ($request->ajax()) {
            $chkrows = Document::where('entitle', $request->name)->where('documenttypes_id', 12)->exists() ? 1 : 0;
            if ($chkrows == 0) {

                $date = date('dmYH:i:s');

                /*Go*/
                $fileName = 'workstudy' . $date . '.' . $request->filename->extension();
                $request->filename->move(public_path('Workstudyreport'), $fileName);
                $imageSize = $request->file('filename')->getSize();


                $filedate = Carbon::parse($request->filedate)->format('Y-m-d');
                $resultsave = new Document([
                    'documenttypes_id'            =>  12,
                    'documentdate'                =>  $filedate,
                    'filepath'                    =>  $fileName,
                    'departments_id'            =>  $request->departments_id,
                    'fielddepartments_id'       =>  $request->fielddepartments_id,
                    'published'                    =>  1,
                    'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                    'documentorigins_id'        =>  3,
                    'entitle'                    =>  $request->entitle,
                    'maltitle'                    =>  $request->maltitle,
                    'enkeywords'                =>  $request->enkeyword,
                    'malkeywords'                =>  $request->malkeyword,
                    'documentcategories_id'     =>  1,
                    'size'                        =>  $imageSize,
                    'alt'                        =>  'Work Study Report'

                ]);

                $resultsave->save();
                $docid = $resultsave->id;

                $resultprocess = new Documentprocessing([
                    'documents_id'            =>  $docid,
                    'currentowner'            =>  Auth::user()->id,
                    'contributor_status'    =>  1,
                    'contributor_id'        =>  Auth::user()->id,
                    'contributor_timestamp' =>  date('Y-m-d H:i:s')


                ]);

                $resultprocess->save();
                return response()->json(['success' => 'Data Added successfully.']);
            } else {
                return response()->json(['errors' => 'Already a Work Study Report exists.']);
            }
        }
    }

    public function workstudyreportedit(Request $request, $id)
    {
        if ($request->ajax()) {
            $resultdata = Document::find($id);
            $department = DB::table('departments')->get();
            $fielddepatment = DB::table('fielddepartments')->get();
            return response()->json(['resultdata' => $resultdata, 'department' => $department, 'fielddepartment' => $fielddepatment]);
        }
    }

    public function workstudyreportupdate(Request $request)
    {
        $request->validate([
            'filedate'         => 'required|date|before:now|date_format:Y-m-d|after:1956-12-31',
            'filename'      => 'sometimes|nullable|mimes:pdf|max:1100',
            'departments_id'  => 'required',
            'fielddepartments_id'   => 'sometimes|nullable',
            'entitle'          => 'required|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enkeyword'        => 'sometimes|nullable|max:100|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/'
        ]);

        if ($request->ajax()) {


            $chkrows = Document::where('entitle', $request->entitle)->where('documenttypes_id', 12)->where('id', '!=', $request->hidden_id)->exists() ? 1 : 0;
            if ($chkrows == 0) {

                $filedate = Carbon::parse($request->filedate)->format('Y-m-d');
                if (isset($request->filename)) {
                    $date = date('dmYH:i:s');
                    /*Go*/
                    $fileName = 'workstudy' . $date . '.' . $request->filename->extension();
                    $request->filename->move(public_path('Workstudyreport'), $fileName);
                    $imageSize = $request->file('filename')->getSize();


                    $form_data = array(
                        'documenttypes_id'            =>  12,
                        'documentdate'                =>  $filedate,
                        'filepath'                    =>  $fileName,
                        'departments_id'            =>  $request->departments_id,
                        'fielddepartments_id'       =>  $request->fielddepartments_id,
                        'published'                    =>  1,
                        'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                        'documentorigins_id'        =>  3,
                        'entitle'                    =>  $request->entitle,
                        'maltitle'                    =>  $request->maltitle,
                        'enkeywords'                =>  $request->enkeyword,
                        'malkeywords'                =>  $request->malkeyword,
                        'documentcategories_id'     =>  1,
                        'size'                        =>  $imageSize,
                        'alt'                        =>  'Work Study Report'
                    );
                } else {


                    $form_data = array(
                        'documenttypes_id'            =>  12,
                        'documentdate'                =>  $filedate,
                        'departments_id'            =>  $request->departments_id,
                        'fielddepartments_id'       =>  $request->fielddepartments_id,
                        'published'                    =>  1,
                        'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                        'documentorigins_id'        =>  3,
                        'entitle'                    =>  $request->entitle,
                        'maltitle'                    =>  $request->maltitle,
                        'enkeywords'                =>  $request->enkeyword,
                        'malkeywords'                =>  $request->malkeyword,
                        'documentcategories_id'     =>  1,
                        'alt'                        =>  'Work Study Report'
                    );
                }
                Document::whereId($request->hidden_id)->update($form_data);

                return response()->json(['success' => 'Data is successfully updated']);
            } else {
                return response()->json(['errors' => 'Already a Work Study Report exists.']);
            }
        }
    }

    public function workstudyreportdestroy(Request $request, $id)
    {
        if ($request->ajax()) {

            Documentprocessing::where('documents_id', $id)->delete();
            Document::findOrFail($id)->delete();
        }
        return response()->json(['success' => 'Data is successfully Deleted']);
    }

    public function workstudyreportstatus(Request $request, $id)
    {
        if ($request->ajax()) {
            $getstatus = DB::table('documents')
                ->select('status')
                ->where('id', $id)
                ->first();

            $status = $getstatus->status;
            if ($status == 1) {
                $upd_status = array('status' => 2);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            } else {

                $upd_status = array('status' => 1);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            }
        }
    }
    /*Work Study report End*/


    /*Publication*/
    public function publicationlist(Request $request)
    {
        //$displayval=Document::all();
        $displayval = DB::table('documents')
            ->join('departments', 'departments.id', 'documents.departments_id')
            ->join('fielddepartments', 'fielddepartments.id', 'documents.fielddepartments_id')
            ->select('documents.id', 'documentnumber', 'documentdate', 'documents.entitle', 'departments.entitle as deptname', 'fielddepartments.name as fieldname', 'filepath', 'documents.status')
            ->where('documenttypes_id', 13)
            //->where('users_id', $uid)
            ->get();

        return view('contributor.publicationlist', compact('displayval'));
    }
    public function publicationcreate(Request $request)
    {
        if ($request->ajax()) {


            $departments     = DB::table('departments')->orderBy('id', 'asc')->get();

            return response()->json(['departments' => $departments]);
        }
    }




    public function publicationstore(Request $request)
    {


        $request->validate([
            'filedate'         => 'required|date|before:now|date_format:Y-m-d|after:1956-12-31',
            'filename'      => 'required|mimes:pdf|max:1100',
            'departments_id'  => 'required',
            'fielddepartments_id'   => 'sometimes|nullable',
            'entitle'          => 'required|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enkeyword'        => 'sometimes|nullable|max:100|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'poster'             => 'sometimes|nullable|mimes:png,jpg,jpeg|max:1100',
            'alttext'             => 'sometimes|nullable|max:50|regex:/(^[-A-Za-z\s ]+$)/',
            'size'             => 'sometimes|nullable|max:50|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
        ]);

        if ($request->ajax()) {
            $chkrows = Document::where('entitle', $request->name)->where('documenttypes_id', 13)->exists() ? 1 : 0;
            if ($chkrows == 0) {

                $date = date('dmYH:i:s');

                /*file*/
                $fileName = 'file' . $date . '.' . $request->filename->extension();
                $request->filename->move(public_path('Publication'), $fileName);
                /*poster*/
                if ($request->poster != '') {
                    $poster = 'poster' . $date . '.' . $request->poster->extension();
                    $request->poster->move(public_path('Publication'), $poster);
                } else {
                    $poster = null;
                }

                if ($request->alttext != '') {
                    $alttext = $request->alttext;
                } else {
                    $alttext = null;
                }

                if ($request->size != '') {
                    $size = $request->size;
                } else {
                    $size = null;
                }

                $filedate = Carbon::parse($request->filedate)->format('Y-m-d');
                $resultsave = new Document([
                    'documenttypes_id'            =>  13,
                    'documentdate'                =>  $filedate,
                    'filepath'                    =>  $fileName,
                    'departments_id'            =>  $request->departments_id,
                    'fielddepartments_id'       =>  $request->fielddepartments_id,
                    'published'                    =>  1,
                    'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                    'documentorigins_id'        =>  3,
                    'entitle'                    =>  $request->entitle,
                    'maltitle'                    =>  $request->maltitle,
                    'enkeywords'                =>  $request->enkeyword,
                    'malkeywords'                =>  $request->malkeyword,
                    'documentcategories_id'     =>  4,
                    'poster'                    =>  $poster,
                    'size'                        =>  $size,
                    'alt'                        =>  $alttext
                ]);

                $resultsave->save();
                $docid = $resultsave->id;

                $resultprocess = new Documentprocessing([
                    'documents_id'            =>  $docid,
                    'currentowner'            =>  Auth::user()->id,
                    'contributor_status'    =>  1,
                    'contributor_id'        =>  Auth::user()->id,
                    'contributor_timestamp' =>  date('Y-m-d H:i:s')
                ]);

                $resultprocess->save();
                return response()->json(['success' => 'Data Added successfully.']);
            } else {
                return response()->json(['errors' => 'Already a Work Study Report exists.']);
            }
        }
    }

    public function publicationedit(Request $request, $id)
    {
        if ($request->ajax()) {
            $resultdata = Document::find($id);
            $department = DB::table('departments')->get();
            $fielddepatment = DB::table('fielddepartments')->get();
            return response()->json(['resultdata' => $resultdata, 'department' => $department, 'fielddepartment' => $fielddepatment]);
        }
    }

    public function publicationupdate(Request $request)
    {
        $request->validate([
            'filedate'         => 'required|date|before:now|date_format:Y-m-d|after:1956-12-31',
            'filename'      => 'sometimes|nullable||mimes:pdf|max:1100',
            'departments_id'  => 'required',
            'fielddepartments_id'   => 'sometimes|nullable',
            'entitle'          => 'required|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enkeyword'        => 'sometimes|nullable|max:100|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'poster'             => 'sometimes|nullable|mimes:png,jpg,jpeg|max:1100',
            'alttext'             => 'sometimes|nullable|max:50|regex:/(^[-A-Za-z\s ]+$)/',
            'size'             => 'sometimes|nullable|max:50|regex:/(^[-A-Za-z\s ]+$)/'
        ]);

        if ($request->ajax()) {


            $chkrows = Document::where('entitle', $request->entitle)->where('documenttypes_id', 13)->where('id', '!=', $request->hidden_id)->exists() ? 1 : 0;
            if ($chkrows == 0) {

                $filedate = Carbon::parse($request->filedate)->format('Y-m-d');

                /*poster*/
                if ($request->poster != '') {
                    $date = date('dmYH:i:s');
                    $poster = 'poster' . $date . '.' . $request->poster->extension();
                    $request->poster->move(public_path('Publication'), $poster);
                } else {
                    $poster = $request->hiddenposter;
                }

                if ($request->alttext != '') {
                    $alttext = $request->alttext;
                } else {
                    $alttext = null;
                }

                if ($request->size != '') {
                    $size = $request->size;
                } else {
                    $size = null;
                }
                if (isset($request->filename)) {
                    $date = date('dmYH:i:s');
                    /*file*/
                    $fileName = 'file' . $date . '.' . $request->filename->extension();
                    $request->filename->move(public_path('Publication'), $fileName);



                    $form_data = array(
                        'documenttypes_id'            =>  13,
                        'documentdate'                =>  $filedate,
                        'filepath'                    =>  $fileName,
                        'departments_id'            =>  $request->departments_id,
                        'fielddepartments_id'       =>  $request->fielddepartments_id,
                        'published'                    =>  1,
                        'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                        'documentorigins_id'        =>  3,
                        'entitle'                    =>  $request->entitle,
                        'maltitle'                    =>  $request->maltitle,
                        'enkeywords'                =>  $request->enkeyword,
                        'malkeywords'                =>  $request->malkeyword,
                        'documentcategories_id'     =>  4,
                        'poster'                    =>  $poster,
                        'size'                        =>  $size,
                        'alt'                        =>  $alttext
                    );
                } else {


                    $form_data = array(
                        'documenttypes_id'            =>  13,
                        'documentdate'                =>  $filedate,
                        'departments_id'            =>  $request->departments_id,
                        'fielddepartments_id'       =>  $request->fielddepartments_id,
                        'published'                    =>  1,
                        'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                        'documentorigins_id'        =>  3,
                        'entitle'                    =>  $request->entitle,
                        'maltitle'                    =>  $request->maltitle,
                        'enkeywords'                =>  $request->enkeyword,
                        'malkeywords'                =>  $request->malkeyword,
                        'documentcategories_id'     =>  4,
                        'poster'                    =>  $poster,
                        'alt'                        =>  $alttext
                    );
                }
                Document::whereId($request->hidden_id)->update($form_data);

                return response()->json(['success' => 'Data is successfully updated']);
            } else {
                return response()->json(['errors' => 'Already a Work Study Report exists.']);
            }
        }
    }

    public function publicationdestroy(Request $request, $id)
    {
        if ($request->ajax()) {

            Documentprocessing::where('documents_id', $id)->delete();
            Document::findOrFail($id)->delete();
        }
        return response()->json(['success' => 'Data is successfully Deleted']);
    }

    public function publicationstatus(Request $request, $id)
    {
        if ($request->ajax()) {
            $getstatus = DB::table('documents')
                ->select('status')
                ->where('id', $id)
                ->first();

            $status = $getstatus->status;
            if ($status == 1) {
                $upd_status = array('status' => 2);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            } else {

                $upd_status = array('status' => 1);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            }
        }
    }
    /*Publication End*/







    /* Tenders */

    public function tenders(Request $request)
    {
        //$displayval=Document::all();
        $displayval = DB::table('documents')
            ->join('departments', 'departments.id', 'documents.departments_id')
            ->join('fielddepartments', 'fielddepartments.id', 'documents.fielddepartments_id')
            ->select('documents.id', 'documentnumber', 'documentdate', 'documents.entitle', 'departments.entitle as deptname', 'fielddepartments.name as fieldname', 'filepath', 'documents.status')
            ->where('documenttypes_id', 7)
            //->where('users_id', $uid)
            ->get();

        return view('contributor.tenders', compact('displayval'));
    }
    public function tendercreate(Request $request)
    {
        if ($request->ajax()) {


            $departments     = DB::table('departments')->orderBy('id', 'asc')->get();

            return response()->json(['departments' => $departments]);
        }
    }

    public function tenderstore(Request $request)
    {
        $request->validate([
            // 'filedate'          => 'required|date',
            'filename'      => 'required|mimes:pdf|max:1100',
            'departments_id'  => 'required',
            'fielddepartments_id'   => 'sometimes|nullable',
            'entitle'          => 'required|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enkeyword'        => 'sometimes|nullable|max:100|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'filedate'         => 'required|date|before:now|date_format:Y-m-d|after:1956-12-31',
        ]);

        if ($request->ajax()) {
            $chkrows = Document::where('entitle', $request->name)->where('documenttypes_id', 7)->exists() ? 1 : 0;
            if ($chkrows == 0) {
                $date = date('dmYH:i:s');

                /*Go*/
                $fileName = 'tender' . $date . '.' . $request->filename->extension();
                $request->filename->move(public_path('Tenders'), $fileName);
                $imageSize = $request->file('filename')->getSize();

                $filedate = Carbon::parse($request->filedate)->format('Y-m-d');
                $resultsave = new Document([
                    'documenttypes_id'          =>  7,
                    'documentdate'              =>  $filedate,
                    'filepath'                  =>  $fileName,
                    'departments_id'            =>  $request->departments_id,
                    'fielddepartments_id'       =>  $request->fielddepartments_id,
                    'published'                 =>  1,
                    'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                    'documentorigins_id'        =>  3,
                    'entitle'                   =>  $request->entitle,
                    'maltitle'                  =>  $request->maltitle,
                    'enkeywords'                =>  $request->enkeyword,
                    'malkeywords'               =>  $request->malkeyword,
                    'documentcategories_id'     =>  1,
                    'size'                      =>  $imageSize,
                    'alt'                       =>  'Tender'

                ]);

                $resultsave->save();
                $docid = $resultsave->id;

                $resultprocess = new Documentprocessing([
                    'documents_id'          =>  $docid,
                    'currentowner'          =>  Auth::user()->id,
                    'contributor_status'    =>  1,
                    'contributor_id'        =>  Auth::user()->id,
                    'contributor_timestamp' =>  date('Y-m-d H:i:s')
                ]);

                $resultprocess->save();
                return response()->json(['success' => 'Data Added successfully.']);
            } else {
                return response()->json(['errors' => 'Already a tender exists.']);
            }
        }
    }

    public function tenderedit(Request $request, $id)
    {
        if ($request->ajax()) {
            $resultdata = Document::find($id);
            $department = DB::table('departments')->get();
            $fielddepatment = DB::table('fielddepartments')->get();
            return response()->json(['resultdata' => $resultdata, 'department' => $department, 'fielddepartment' => $fielddepatment]);
        }
    }

    public function tenderupdate(Request $request)
    {
        $request->validate([
            'filedate'         => 'required|date|before:now|date_format:Y-m-d|after:1956-12-31',
            'filename'      => 'sometimes|nullable|mimes:pdf|max:1100',
            'departments_id'  => 'required',
            'fielddepartments_id'   => 'sometimes|nullable',
            'entitle'          => 'required|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enkeyword'        => 'sometimes|nullable|max:100|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/'
        ]);

        if ($request->ajax()) {
            $chkrows = Document::where('entitle', $request->entitle)->where('documenttypes_id', 8)->where('id', '!=', $request->hidden_id)->exists() ? 1 : 0;
            if ($chkrows == 0) {

                $filedate = Carbon::parse($request->filedate)->format('Y-m-d');
                if (isset($request->filename)) {
                    $date = date('dmYH:i:s');
                    /*Go*/
                    $fileName = 'tender' . $date . '.' . $request->filename->extension();
                    $request->filename->move(public_path('Tenders'), $fileName);
                    $imageSize = $request->file('filename')->getSize();

                    $form_data = array(
                        'documenttypes_id'         =>  7,
                        'documentdate'              =>  $filedate,
                        'filepath'                  =>  $fileName,
                        'departments_id'            =>  $request->departments_id,
                        'fielddepartments_id'       =>  $request->fielddepartments_id,
                        'published'                 =>  1,
                        'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                        'documentorigins_id'        =>  3,
                        'entitle'                   =>  $request->entitle,
                        'maltitle'                  =>  $request->maltitle,
                        'enkeywords'                =>  $request->enkeyword,
                        'malkeywords'               =>  $request->malkeyword,
                        'documentcategories_id'     =>  1,
                        'size'                      =>  $imageSize,
                        'alt'                       =>  'Tender'
                    );
                } else {
                    $form_data = array(
                        'documenttypes_id'          =>  7,
                        'documentdate'              =>  $filedate,
                        'departments_id'            =>  $request->departments_id,
                        'fielddepartments_id'       =>  $request->fielddepartments_id,
                        'published'                 =>  1,
                        'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                        'documentorigins_id'        =>  3,
                        'entitle'                   =>  $request->entitle,
                        'maltitle'                  =>  $request->maltitle,
                        'enkeywords'                =>  $request->enkeyword,
                        'malkeywords'               =>  $request->malkeyword,
                        'documentcategories_id'     =>  1,
                        'alt'                       =>  'Tender'
                    );
                }
                Document::whereId($request->hidden_id)->update($form_data);

                return response()->json(['success' => 'Data is successfully updated']);
            } else {
                return response()->json(['errors' => 'Already a tender exists.']);
            }
        }
    }

    public function tenderdestroy(Request $request, $id)
    {
        if ($request->ajax()) {
            Documentprocessing::where('documents_id', $id)->delete();
            Document::findOrFail($id)->delete();
        }
        return response()->json(['success' => 'Data is successfully Deleted']);
    }

    public function tenderstatus(Request $request, $id)
    {
        if ($request->ajax()) {
            $getstatus = DB::table('documents')
                ->select('status')
                ->where('id', $id)
                ->first();

            $status = $getstatus->status;
            if ($status == 1) {
                $upd_status = array('status' => 2);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            } else {
                $upd_status = array('status' => 1);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            }
        }
    }
    /*Tenders End*/
    



    /* Quotation */

    public function quotation(Request $request)
    {
        //$displayval=Document::all();
        $displayval = DB::table('documents')
            ->join('departments', 'departments.id', 'documents.departments_id')
            ->join('fielddepartments', 'fielddepartments.id', 'documents.fielddepartments_id')
            ->select('documents.id', 'documentnumber', 'documentdate', 'documents.entitle', 'departments.entitle as deptname', 'fielddepartments.name as fieldname', 'filepath', 'documents.status')
            ->where('documenttypes_id', 7)
            //->where('users_id', $uid)
            ->get();

        return view('contributor.quotation', compact('displayval'));
    }
    public function quotationcreate(Request $request)
    {
        if ($request->ajax()) {


            $departments     = DB::table('departments')->orderBy('id', 'asc')->get();

            return response()->json(['departments' => $departments]);
        }
    }

    public function quotationstore(Request $request)
    {
        $request->validate([
            // 'filedate'          => 'required|date',
            'filename'      => 'required|mimes:pdf|max:1100',
            'departments_id'  => 'required',
            'quotationtype'  => 'required',
            'iconclass'  => 'required',
            'fielddepartments_id'   => 'sometimes|nullable',
            'entitle'    => app('App\Http\Controllers\RegexvaluesglobController')->getEntitlereg(),
            'maltitle'    => app('App\Http\Controllers\RegexvaluesglobController')->getMaltitlereg(),
            'enkeyword'        => 'sometimes|nullable|max:250|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:250|regex:/(^[\P{Malayalam}_.,]+$)/',
            'filedate'         => 'required|date|before:now|date_format:Y-m-d|after:1956-12-31',
        ]);

        if ($request->ajax()) {
            $chkrows = Document::where('entitle', $request->name)->where('documenttypes_id', 7)->exists() ? 1 : 0;
            if ($chkrows == 0) {
                $date = date('dmYH:i:s');

                /*Go*/
                $fileName = 'quotation' . $date . '.' . $request->filename->extension();
                $request->filename->move(public_path('Quotations'), $fileName);
                $imageSize = $request->file('filename')->getSize();

                $filedate = Carbon::parse($request->filedate)->format('Y-m-d');
                $resultsave = new Document([
                    'documenttypes_id'          =>  7,
                    'documentdate'              =>  $filedate,
                    'filepath'                  =>  $fileName,
                    'departments_id'            =>  $request->departments_id,
                    'fielddepartments_id'       =>  $request->fielddepartments_id,
                    'published'                 =>  1,
                    'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                    'documentorigins_id'        =>  3,
                    'entitle'                   =>  $request->entitle,
                    'maltitle'                  =>  $request->maltitle,
                    'enkeywords'                =>  $request->enkeyword,
                    'malkeywords'               =>  $request->malkeyword,
                    'documentcategories_id'     =>  1,
                    'size'                      =>  $imageSize,
                    'alt'                       =>  'Quotation',
                    'quotationtype'              =>  $request->quotationtype,
                    'iconclass'              =>  $request->iconclass,
                    'encontent'        =>  $request->encontent,
                    'malcontent'       =>  $request->malcontent
                ]);

                $resultsave->save();
                $docid = $resultsave->id;

                $resultprocess = new Documentprocessing([
                    'documents_id'          =>  $docid,
                    'currentowner'          =>  Auth::user()->id,
                    'contributor_status'    =>  1,
                    'contributor_id'        =>  Auth::user()->id,
                    'contributor_timestamp' =>  date('Y-m-d H:i:s')
                ]);

                $resultprocess->save();
                return response()->json(['success' => 'Data Added successfully.']);
            } else {
                return response()->json(['errors' => 'Already a quotation exists.']);
            }
        }
    }

    public function quotationedit(Request $request, $id)
    {
        if ($request->ajax()) {
            $resultdata = Document::find($id);
            $department = DB::table('departments')->get();
            $fielddepatment = DB::table('fielddepartments')->get();
            $quotationtype1=DB::table('documents')
                               ->where('id',$id) 
                               ->pluck('quotationtype');
                            //   dd($quotationtype1[0]);
            $quotationtype=$quotationtype1[0];                
         if($quotationtype==1)
         {
            $quotationtypevalue='Buy';
         }     
         else if($quotationtype==2)
         {
            $quotationtypevalue='Sell';
         }           
         else
         {
            $quotationtypevalue='';
         }
            return response()->json(['resultdata' => $resultdata, 'department' => $department, 'fielddepartment' => $fielddepatment,'quotationtypevalue'=>$quotationtypevalue]);
        }
    }

    public function quotationupdate(Request $request)
    {
     $request->validate([
            // 'filedate'          => 'required|date',
            // 'filename'      => 'required|mimes:pdf|max:1100',
            'departments_id'  => 'required',
            'quotationtype'  => 'required',
            'iconclass'  => 'required',
            'fielddepartments_id'   => 'sometimes|nullable',
            'entitle'    => app('App\Http\Controllers\RegexvaluesglobController')->getEntitlereg(),
            'maltitle'    => app('App\Http\Controllers\RegexvaluesglobController')->getMaltitlereg(),
            'enkeyword'        => 'sometimes|nullable|max:250|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:250|regex:/(^[\P{Malayalam}_.,]+$)/',
            'filedate'         => 'required|date|before:now|date_format:Y-m-d|after:1956-12-31',
        ]);
        if ($request->ajax()) {
            $chkrows = Document::where('entitle', $request->entitle)->where('documenttypes_id', 8)->where('id', '!=', $request->hidden_id)->exists() ? 1 : 0;
            if ($chkrows == 0) {

                $filedate = Carbon::parse($request->filedate)->format('Y-m-d');
                if (isset($request->filename)) {
                    $date = date('dmYH:i:s');
                    /*Go*/
                    $fileName = 'quotation' . $date . '.' . $request->filename->extension();
                    $request->filename->move(public_path('Quotations'), $fileName);
                    $imageSize = $request->file('filename')->getSize();

                    $form_data = array(
                        'documenttypes_id'         =>  7,
                        'documentdate'              =>  $filedate,
                        'filepath'                  =>  $fileName,
                        'departments_id'            =>  $request->departments_id,
                        'fielddepartments_id'       =>  $request->fielddepartments_id,
                        'published'                 =>  1,
                        'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                        'documentorigins_id'        =>  3,
                        'entitle'                   =>  $request->entitle,
                        'maltitle'                  =>  $request->maltitle,
                        'enkeywords'                =>  $request->enkeyword,
                        'malkeywords'               =>  $request->malkeyword,
                        'documentcategories_id'     =>  1,
                        'size'                      =>  $imageSize,
                        'alt'                       =>  'Quotation',
                        'quotationtype'              =>  $request->quotationtype,
                        'iconclass'              =>  $request->iconclass,
                        'encontent'        =>  $request->encontent,
                        'malcontent'       =>  $request->malcontent
                    );
                } else {
                    $form_data = array(
                        'documenttypes_id'          =>  7,
                        'documentdate'              =>  $filedate,
                        'departments_id'            =>  $request->departments_id,
                        'fielddepartments_id'       =>  $request->fielddepartments_id,
                        'published'                 =>  1,
                        'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                        'documentorigins_id'        =>  3,
                        'entitle'                   =>  $request->entitle,
                        'maltitle'                  =>  $request->maltitle,
                        'enkeywords'                =>  $request->enkeyword,
                        'malkeywords'               =>  $request->malkeyword,
                        'documentcategories_id'     =>  1,
                        'alt'                       =>  'Quotation',
                        'quotationtype'              =>  $request->quotationtype,
                        'iconclass'              =>  $request->iconclass,
                        'encontent'        =>  $request->encontent,
                        'malcontent'       =>  $request->malcontent
                    );
                }
                Document::whereId($request->hidden_id)->update($form_data);

                return response()->json(['success' => 'Data is successfully updated']);
            } else {
                return response()->json(['errors' => 'Already a quotation exists.']);
            }
        }
    }

    public function quotationdestroy(Request $request, $id)
    {
        if ($request->ajax()) {
            Documentprocessing::where('documents_id', $id)->delete();
            Document::findOrFail($id)->delete();
        }
        return response()->json(['success' => 'Data is successfully Deleted']);
    }

    public function quotationstatus(Request $request, $id)
    {
        if ($request->ajax()) {
            $getstatus = DB::table('documents')
                ->select('status')
                ->where('id', $id)
                ->first();

            $status = $getstatus->status;
            if ($status == 1) {
                $upd_status = array('status' => 2);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            } else {
                $upd_status = array('status' => 1);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            }
        }
    }
    /*Quotation End*/
























































    /*Govt Orders */
    public function govtorderlist(Request $request)
    {
        //$displayval=Document::all();
        $displayval = DB::table('documents')
            ->join('departments', 'departments.id', 'documents.departments_id')
            ->join('fielddepartments', 'fielddepartments.id', 'documents.fielddepartments_id')
            ->select('documents.id', 'documentnumber', 'documentdate', 'documents.entitle', 'departments.entitle as deptname', 'fielddepartments.name as fieldname', 'filepath', 'documents.status')
            ->where('documenttypes_id', 1)
            //->where('users_id', $uid)
            ->get();

        return view('contributor.govtorderlist', compact('displayval'));
    }
    public function govtordercreate(Request $request)
    {
        if ($request->ajax()) {


            $departments     = DB::table('departments')->orderBy('id', 'asc')->get();

            return response()->json(['departments' => $departments]);
        }
    }

    public function govtorderstore(Request $request)
    {
        $request->validate([
            'gonumberen'      => 'required|min:3|max:50|regex:/(^[-0-9A-Za-z.\/()\s ]+$)/',
            'gonumbermal'     => 'sometimes|nullable|min:3|max:50|regex:/(^[\P{Malayalam}0-9_.,]+$)/',
            'godate'          => 'required|date',
            'gofilename'      => 'required|mimes:pdf|max:1100',
            'departments_id'  => 'required',
            'fielddepartments_id'   => 'sometimes|nullable',
            'refgono'          => 'sometimes|nullable|max:50|regex:/(^[-0-9A-Za-z.\/()\s ]+$)/',
            'refgofilename'    => 'sometimes|nullable|mimes:pdf|max:1100',
            'entitle'          => 'required|max:50|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:50|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enabstract'       => 'required|max:50',
            'malabstract'      => 'sometimes|nullable|max:50',
            'enkeyword'        => 'sometimes|nullable|max:50|regex:/(^[-0-9A-Za-z.\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:50|regex:/(^[\P{Malayalam}_.,]+$)/'
        ]);

        if ($request->ajax()) {
            $chkrows = Document::where('entitle', $request->name)->where('documenttypes_id', 1)->exists() ? 1 : 0;
            if ($chkrows == 0) {

                $date = date('dmYH:i:s');

                /*Go*/
                $gofileName = 'govtorder' . $date . '.' . $request->gofilename->extension();
                $request->gofilename->move(public_path('Govtorder'), $gofileName);
                $imageSize = $request->file('gofilename')->getSize();
                /*Ref GO*/
                if ($request->refgofilename != '') {
                    $refgofileName = 'refgovtorder' . $date . '.' . $request->refgofilename->extension();
                    $request->refgofilename->move(public_path('Govtorder'), $refgofileName);
                } else {
                    $refgofileName = null;
                }

                if ($request->refgono != '') {
                    $refgono = $request->refgono;
                } else {
                    $refgono = null;
                }


                //Summernote clean   
                $enabstract = $request->hid_enabstract;
                $malabstract = $request->hid_malabstract;
                $en_abstract = clean($enabstract);
                $mal_abstract = clean($malabstract);

                $godate = Carbon::parse($request->godate)->format('Y-m-d');
                $resultsave = new Document([
                    'documenttypes_id'            =>  1,
                    'documentnumber'            =>  $request->gonumberen,
                    'originaldocnumber'            =>  $request->gonumbermal,
                    'documentdate'                =>  $godate,
                    'filepath'                    =>  $gofileName,
                    'departments_id'            =>  $request->departments_id,
                    'fielddepartments_id'       =>  $request->fielddepartments_id,
                    'referencedoc'               =>  $refgono,
                    'referencefile'                =>  $refgofileName,
                    'published'                    =>  1,
                    'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                    'documentorigins_id'        =>  3,
                    'entitle'                    =>  $request->entitle,
                    'maltitle'                    =>  $request->maltitle,
                    'enabstract'                =>  $en_abstract,
                    'malabstract'                =>  $mal_abstract,
                    'enkeywords'                =>  $request->enkeyword,
                    'malkeywords'                =>  $request->malkeyword,
                    'documentcategories_id'     =>  1,
                    'size'                        =>  $imageSize,
                    'alt'                        =>  'Government Order'
                ]);

                $resultsave->save();
                $docid = $resultsave->id;

                $resultprocess = new Documentprocessing([
                    'documents_id'            =>  $docid,
                    'currentowner'            =>  Auth::user()->id,
                    'contributor_status'    =>  1,
                    'contributor_id'        =>  Auth::user()->id,
                    'contributor_timestamp' =>  date('Y-m-d H:i:s')


                ]);

                $resultprocess->save();
                return response()->json(['success' => 'Data Added successfully.']);
            } else {
                return response()->json(['errors' => 'Already a Go  exists.']);
            }
        }
    }

    public function govtorderedit(Request $request, $id)
    {
        if ($request->ajax()) {
            $resultdata = Document::find($id);
            $department = DB::table('departments')->get();
            $fielddepatment = DB::table('fielddepartments')->get();
            return response()->json(['resultdata' => $resultdata, 'department' => $department, 'fielddepartment' => $fielddepatment]);
        }
    }

    public function govtorderupdate(Request $request)
    {
        $request->validate([
            'gonumberen'      => 'required|min:3|max:50|regex:/(^[-0-9A-Za-z.\/()\s ]+$)/',
            'gonumbermal'     => 'sometimes|nullable|min:3|max:50|regex:/(^[\P{Malayalam}0-9_.,]+$)/',
            'godate'          => 'required|date',
            'gofilename'      => 'required|mimes:pdf|max:1100',
            'departments_id'  => 'required',
            'fielddepartments_id'   => 'sometimes|nullable',
            'refgono'          => 'sometimes|nullable|max:50|regex:/(^[-0-9A-Za-z.\/()\s ]+$)/',
            'refgofilename'    => 'sometimes|nullable|mimes:pdf|max:1100',
            'entitle'          => 'required|max:50|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:50|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enabstract'       => 'required|max:50',
            'malabstract'      => 'sometimes|nullable|max:50',
            'enkeyword'        => 'sometimes|nullable|max:50|regex:/(^[-0-9A-Za-z.\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:50|regex:/(^[\P{Malayalam}_.,]+$)/'
        ]);
        if ($request->ajax()) {
            $chkrows = Document::where('entitle', $request->entitle)->where('documenttypes_id', 1)->where('id', '!=', $request->hidden_id)->exists() ? 1 : 0;
            if ($chkrows == 0) {
                if ($request->refgono != '') {
                    $refgono = $request->refgono;
                } else {
                    $refgono = null;
                }
                $godate = Carbon::parse($request->godate)->format('Y-m-d');

                //Summernote clean   
                $enabstract = $request->hid_enabstract;
                $malabstract = $request->hid_malabstract;
                $en_abstract = clean($enabstract);
                $mal_abstract = clean($malabstract);


                if (isset($request->gofilename)) {
                    $date = date('dmYH:i:s');
                    /*Go*/
                    $gofileName = 'govtorder' . $date . '.' . $request->gofilename->extension();
                    $request->gofilename->move(public_path('Govtorder'), $gofileName);
                    $imageSize = $request->file('gofilename')->getSize();

                    /*Ref GO*/
                    if ($request->refgofilename != '') {
                        $date = date('dmYH:i:s');
                        $refgofileName = 'refgovtorder' . $date . '.' . $request->refgofilename->extension();
                        $request->refgofilename->move(public_path('Govtorder'), $refgofileName);
                    } else {
                        $refgofileName = null;
                    }

                    $form_data = array(
                        'documenttypes_id'            =>  1,
                        'documentnumber'            =>  $request->gonumberen,
                        'originaldocnumber'            =>  $request->gonumbermal,
                        'documentdate'                =>  $godate,
                        'filepath'                    =>  $gofileName,
                        'departments_id'            =>  $request->departments_id,
                        'fielddepartments_id'       =>  $request->fielddepartments_id,
                        'referencedoc'               =>  $refgono,
                        'referencefile'                =>  $refgofileName,
                        'published'                    =>  1,
                        'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                        'documentorigins_id'        =>  3,
                        'entitle'                    =>  $request->entitle,
                        'maltitle'                    =>  $request->maltitle,
                        'enabstract'                =>  $en_abstract,
                        'malabstract'                =>  $mal_abstract,
                        'enkeywords'                =>  $request->enkeyword,
                        'malkeywords'                =>  $request->malkeyword,
                        'documentcategories_id'     =>  1,
                        'size'                        =>  $imageSize,
                        'alt'                        =>  'Government Order'
                    );
                } else {
                    /*Ref GO*/
                    if ($request->refgofilename != '') {
                        $date = date('dmYH:i:s');
                        $refgofileName = 'refgovtorder' . $date . '.' . $request->refgofilename->extension();
                        $request->refgofilename->move(public_path('Govtorder'), $refgofileName);
                    } else {
                        $refgofileName = null;
                    }

                    $form_data = array(
                        'documenttypes_id'            =>  1,
                        'documentnumber'            =>  $request->gonumberen,
                        'originaldocnumber'            =>  $request->gonumbermal,
                        'documentdate'                =>  $godate,
                        'departments_id'            =>  $request->departments_id,
                        'fielddepartments_id'       =>  $request->fielddepartments_id,
                        'referencedoc'               =>  $refgono,
                        'referencefile'                =>  $refgofileName,
                        'published'                    =>  1,
                        'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                        'documentorigins_id'        =>  3,
                        'entitle'                    =>  $request->entitle,
                        'maltitle'                    =>  $request->maltitle,
                        'enabstract'                =>  $request->enabstract,
                        'malabstract'                =>  $request->malabstract,
                        'enkeywords'                =>  $request->enkeyword,
                        'malkeywords'                =>  $request->malkeyword,
                        'documentcategories_id'     =>  1,
                        'alt'                        =>  'Government Order'
                    );
                }
                Document::whereId($request->hidden_id)->update($form_data);

                return response()->json(['success' => 'Data is successfully updated']);
            } else {
                return response()->json(['errors' => 'Already a Govt order exists.']);
            }
        }
    }

    public function govtorderdestroy(Request $request, $id)
    {
        if ($request->ajax()) {

            Documentprocessing::where('documents_id', $id)->delete();
            Document::findOrFail($id)->delete();
        }
        return response()->json(['success' => 'Data is successfully Deleted']);
    }

    public function govtorderstatus(Request $request, $id)
    {
        if ($request->ajax()) {
            $getstatus = DB::table('documents')
                ->select('status')
                ->where('id', $id)
                ->first();

            $status = $getstatus->status;
            if ($status == 1) {
                $upd_status = array('status' => 2);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            } else {

                $upd_status = array('status' => 1);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            }
        }
    }
    /*Govt Order End*/

    /*Cabinet Decision*/
    public function cabinetdecisionlist(Request $request)
    {
        //$displayval=Document::all();
        $displayval = DB::table('documents')
            ->join('departments', 'departments.id', 'documents.departments_id')
            ->join('fielddepartments', 'fielddepartments.id', 'documents.fielddepartments_id')
            ->select('documents.id', 'documentnumber', 'documentdate', 'documents.entitle', 'departments.entitle as deptname', 'fielddepartments.name as fieldname', 'filepath', 'documents.status')
            ->where('documenttypes_id', 2)
            //->where('users_id', $uid)
            ->get();

        return view('contributor.cabinetdecisionlist', compact('displayval'));
    }
    public function cabinetdecisioncreate(Request $request)
    {
        if ($request->ajax()) {


            $departments     = DB::table('departments')->orderBy('id', 'asc')->get();

            return response()->json(['departments' => $departments]);
        }
    }

    public function cabinetdecisionstore(Request $request)
    {


        $request->validate([
            'numberen'      => 'required|min:3|max:50|regex:/(^[-0-9A-Za-z.\/()\s ]+$)/',
            'numbermal'     => 'sometimes|nullable|min:3|max:50|regex:/(^[\P{Malayalam}0-9_.,]+$)/',
            'filedate'         => 'required|date|before:now|date_format:Y-m-d|after:1956-12-31',
            'filename'      => 'required|mimes:pdf|max:1100',
            'departments_id'  => 'required',
            'fielddepartments_id'   => 'sometimes|nullable',
            'entitle'          => 'required|min:3|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enkeyword'        => 'sometimes|nullable|max:500|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:500|regex:/(^[\P{Malayalam}_.,]+$)/'
        ]);

        if ($request->ajax()) {
            $chkrows = Document::where('entitle', $request->name)->where('documenttypes_id', 2)->exists() ? 1 : 0;
            if ($chkrows == 0) {

                $date = date('dmYH:i:s');

                /*Go*/
                $fileName = 'cabinet' . $date . '.' . $request->filename->extension();
                $request->filename->move(public_path('Cabinetdecision'), $fileName);
                $imageSize = $request->file('filename')->getSize();


                $filedate = Carbon::parse($request->filedate)->format('Y-m-d');
                $resultsave = new Document([
                    'documenttypes_id'            =>  2,
                    'documentnumber'            =>  $request->numberen,
                    'originaldocnumber'            =>  $request->numbermal,
                    'documentdate'                =>  $filedate,
                    'filepath'                    =>  $fileName,
                    'departments_id'            =>  $request->departments_id,
                    'fielddepartments_id'       =>  $request->fielddepartments_id,
                    'published'                    =>  1,
                    'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                    'documentorigins_id'        =>  3,
                    'entitle'                    =>  $request->entitle,
                    'maltitle'                    =>  $request->maltitle,
                    'enkeywords'                =>  $request->enkeyword,
                    'malkeywords'                =>  $request->malkeyword,
                    'documentcategories_id'     =>  1,
                    'size'                        =>  $imageSize,
                    'alt'                        =>  'Cabinet Decision'
                ]);

                $resultsave->save();
                $docid = $resultsave->id;

                $resultprocess = new Documentprocessing([
                    'documents_id'            =>  $docid,
                    'currentowner'            =>  Auth::user()->id,
                    'contributor_status'    =>  1,
                    'contributor_id'        =>  Auth::user()->id,
                    'contributor_timestamp' =>  date('Y-m-d H:i:s')
                ]);

                $resultprocess->save();
                return response()->json(['success' => 'Data Added successfully.']);
            } else {
                return response()->json(['errors' => 'Already a Cabinet decision  exists.']);
            }
        }
    }

    public function cabinetdecisionedit(Request $request, $id)
    {
        if ($request->ajax()) {
            $resultdata = Document::find($id);
            $department = DB::table('departments')->get();
            $fielddepatment = DB::table('fielddepartments')->get();
            return response()->json(['resultdata' => $resultdata, 'department' => $department, 'fielddepartment' => $fielddepatment]);
        }
    }

    public function cabinetdecisionupdate(Request $request)
    {
        $request->validate([
            'numberen'      => 'required|min:3|max:50|regex:/(^[-0-9A-Za-z.\/()\s ]+$)/',
            'numbermal'     => 'sometimes|nullable|min:3|max:50|regex:/(^[\P{Malayalam}0-9_.,]+$)/',
            'filedate'         => 'required|date|before:now|date_format:Y-m-d|after:1956-12-31',
            'filename'      => 'required|mimes:pdf|max:1100',
            'departments_id'  => 'required',
            'fielddepartments_id'   => 'sometimes|nullable',
            'entitle'          => 'required|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enkeyword'        => 'sometimes|nullable|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/'
        ]);

        if ($request->ajax()) {


            $chkrows = Document::where('entitle', $request->entitle)->where('documenttypes_id', 2)->where('id', '!=', $request->hidden_id)->exists() ? 1 : 0;
            if ($chkrows == 0) {

                $filedate = Carbon::parse($request->filedate)->format('Y-m-d');
                if (isset($request->filename)) {
                    $date = date('dmYH:i:s');
                    /*Go*/
                    $fileName = 'cabinet' . $date . '.' . $request->filename->extension();
                    $request->filename->move(public_path('Cabinetdecision'), $fileName);
                    $imageSize = $request->file('filename')->getSize();


                    $form_data = array(
                        'documenttypes_id'            =>  3,
                        'documentnumber'            =>  $request->numberen,
                        'originaldocnumber'            =>  $request->numbermal,
                        'documentdate'                =>  $filedate,
                        'filepath'                    =>  $fileName,
                        'departments_id'            =>  $request->departments_id,
                        'fielddepartments_id'       =>  $request->fielddepartments_id,
                        'published'                    =>  1,
                        'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                        'documentorigins_id'        =>  3,
                        'entitle'                    =>  $request->entitle,
                        'maltitle'                    =>  $request->maltitle,
                        'enkeywords'                =>  $request->enkeyword,
                        'malkeywords'                =>  $request->malkeyword,
                        'documentcategories_id'     =>  1,
                        'size'                        =>  $imageSize,
                        'alt'                        =>  'Cabinet Decision'
                    );
                } else {


                    $form_data = array(
                        'documenttypes_id'            =>  3,
                        'documentnumber'            =>  $request->numberen,
                        'originaldocnumber'            =>  $request->numbermal,
                        'documentdate'                =>  $filedate,
                        'departments_id'            =>  $request->departments_id,
                        'fielddepartments_id'       =>  $request->fielddepartments_id,
                        'published'                    =>  1,
                        'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                        'documentorigins_id'        =>  3,
                        'entitle'                    =>  $request->entitle,
                        'maltitle'                    =>  $request->maltitle,
                        'enkeywords'                =>  $request->enkeyword,
                        'malkeywords'                =>  $request->malkeyword,
                        'documentcategories_id'     =>  1,
                        'size'                        =>  $imageSize,
                        'alt'                        =>  'Cabinet Decision'
                    );
                }
                Document::whereId($request->hidden_id)->update($form_data);

                return response()->json(['success' => 'Data is successfully updated']);
            } else {
                return response()->json(['errors' => 'Already a Govt order exists.']);
            }
        }
    }

    public function cabinetdecisiondestroy(Request $request, $id)
    {
        if ($request->ajax()) {

            Documentprocessing::where('documents_id', $id)->delete();
            Document::findOrFail($id)->delete();
        }
        return response()->json(['success' => 'Data is successfully Deleted']);
    }

    public function cabinetdecisionstatus(Request $request, $id)
    {
        if ($request->ajax()) {
            $getstatus = DB::table('documents')
                ->select('status')
                ->where('id', $id)
                ->first();

            $status = $getstatus->status;
            if ($status == 1) {
                $upd_status = array('status' => 2);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            } else {

                $upd_status = array('status' => 1);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            }
        }
    }
    /*Cabinet Decision End*/
    /*Circulars*/
    public function circularlist(Request $request)
    {
        //$displayval=Document::all();
        $displayval = DB::table('documents')
            ->join('departments', 'departments.id', 'documents.departments_id')
            ->join('fielddepartments', 'fielddepartments.id', 'documents.fielddepartments_id')
            ->select('documents.id', 'documentnumber', 'documentdate', 'documents.entitle', 'departments.entitle as deptname', 'fielddepartments.name as fieldname', 'filepath', 'documents.status')
            ->where('documenttypes_id', 3)
            //->where('users_id', $uid)
            ->get();

        return view('contributor.circularlist', compact('displayval'));
    }
    public function circularcreate(Request $request)
    {
        if ($request->ajax()) {


            $departments     = DB::table('departments')->orderBy('id', 'asc')->get();

            return response()->json(['departments' => $departments]);
        }
    }




    public function circularstore(Request $request)
    {


        $request->validate([
            'numberen'      => 'required|min:3|max:50|regex:/(^[-0-9A-Za-z.\/()\s ]+$)/',
            'numbermal'     => 'sometimes|nullable|min:3|max:50|regex:/(^[\P{Malayalam}0-9_.,]+$)/',
            'filedate'         => 'required|date|before:now|date_format:Y-m-d|after:1956-12-31',
            'filename'      => 'required|mimes:pdf|max:1100',
            'departments_id'  => 'required',
            'fielddepartments_id'   => 'sometimes|nullable',
            'entitle'          => 'required|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enkeyword'        => 'sometimes|nullable|max:100|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/'
        ]);

        if ($request->ajax()) {
            $chkrows = Document::where('entitle', $request->name)->where('documenttypes_id', 3)->exists() ? 1 : 0;
            if ($chkrows == 0) {

                $date = date('dmYH:i:s');

                /*Go*/
                $fileName = 'circular' . $date . '.' . $request->filename->extension();
                $request->filename->move(public_path('Circulars'), $fileName);
                $imageSize = $request->file('filename')->getSize();


                $filedate = Carbon::parse($request->filedate)->format('Y-m-d');
                $resultsave = new Document([
                    'documenttypes_id'            =>  3,
                    'documentnumber'            =>  $request->numberen,
                    'originaldocnumber'            =>  $request->numbermal,
                    'documentdate'                =>  $filedate,
                    'filepath'                    =>  $fileName,
                    'departments_id'            =>  $request->departments_id,
                    'fielddepartments_id'       =>  $request->fielddepartments_id,
                    'published'                    =>  1,
                    'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                    'documentorigins_id'        =>  3,
                    'entitle'                    =>  $request->entitle,
                    'maltitle'                    =>  $request->maltitle,
                    'enkeywords'                =>  $request->enkeyword,
                    'malkeywords'                =>  $request->malkeyword,
                    'documentcategories_id'     =>  1,
                    'size'                        =>  $imageSize,
                    'alt'                        =>  'Circulars'

                ]);

                $resultsave->save();
                $docid = $resultsave->id;

                $resultprocess = new Documentprocessing([
                    'documents_id'            =>  $docid,
                    'currentowner'            =>  Auth::user()->id,
                    'contributor_status'    =>  1,
                    'contributor_id'        =>  Auth::user()->id,
                    'contributor_timestamp' =>  date('Y-m-d H:i:s')


                ]);

                $resultprocess->save();
                return response()->json(['success' => 'Data Added successfully.']);
            } else {
                return response()->json(['errors' => 'Already a Cabinet decision  exists.']);
            }
        }
    }

    public function circularedit(Request $request, $id)
    {
        if ($request->ajax()) {
            $resultdata = Document::find($id);
            $department = DB::table('departments')->get();
            $fielddepatment = DB::table('fielddepartments')->get();
            return response()->json(['resultdata' => $resultdata, 'department' => $department, 'fielddepartment' => $fielddepatment]);
        }
    }

    public function circularupdate(Request $request)
    {
        $request->validate([
            'numberen'      => 'required|min:3|max:50|regex:/(^[-0-9A-Za-z.\/()\s ]+$)/',
            'numbermal'     => 'sometimes|nullable|min:3|max:50|regex:/(^[\P{Malayalam}0-9_.,]+$)/',
            'filedate'         => 'required|date|before:now|date_format:Y-m-d|after:1956-12-31',
            'filename'      => 'required|mimes:pdf|max:1100',
            'departments_id'  => 'required',
            'fielddepartments_id'   => 'sometimes|nullable',
            'entitle'          => 'required|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enkeyword'        => 'sometimes|nullable|max:100|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/'
        ]);

        if ($request->ajax()) {


            $chkrows = Document::where('entitle', $request->entitle)->where('documenttypes_id', 3)->where('id', '!=', $request->hidden_id)->exists() ? 1 : 0;
            if ($chkrows == 0) {

                $filedate = Carbon::parse($request->filedate)->format('Y-m-d');
                if (isset($request->filename)) {
                    $date = date('dmYH:i:s');
                    /*Go*/
                    $fileName = 'circular' . $date . '.' . $request->filename->extension();
                    $request->filename->move(public_path('Circulars'), $fileName);
                    $imageSize = $request->file('filename')->getSize();


                    $form_data = array(
                        'documenttypes_id'            =>  3,
                        'documentnumber'            =>  $request->numberen,
                        'originaldocnumber'            =>  $request->numbermal,
                        'documentdate'                =>  $filedate,
                        'filepath'                    =>  $fileName,
                        'departments_id'            =>  $request->departments_id,
                        'fielddepartments_id'       =>  $request->fielddepartments_id,
                        'published'                    =>  1,
                        'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                        'documentorigins_id'        =>  3,
                        'entitle'                    =>  $request->entitle,
                        'maltitle'                    =>  $request->maltitle,
                        'enkeywords'                =>  $request->enkeyword,
                        'malkeywords'                =>  $request->malkeyword,
                        'documentcategories_id'     =>  1,
                        'size'                        =>  $imageSize,
                        'alt'                        =>  'Circulars'
                    );
                } else {


                    $form_data = array(
                        'documenttypes_id'            =>  3,
                        'documentnumber'            =>  $request->numberen,
                        'originaldocnumber'            =>  $request->numbermal,
                        'documentdate'                =>  $filedate,
                        'departments_id'            =>  $request->departments_id,
                        'fielddepartments_id'       =>  $request->fielddepartments_id,
                        'published'                    =>  1,
                        'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                        'documentorigins_id'        =>  3,
                        'entitle'                    =>  $request->entitle,
                        'maltitle'                    =>  $request->maltitle,
                        'enkeywords'                =>  $request->enkeyword,
                        'malkeywords'                =>  $request->malkeyword,
                        'documentcategories_id'     =>  1,
                        'size'                        =>  $imageSize,
                        'alt'                        =>  'Circulars'
                    );
                }
                Document::whereId($request->hidden_id)->update($form_data);

                return response()->json(['success' => 'Data is successfully updated']);
            } else {
                return response()->json(['errors' => 'Already a Circulars exists.']);
            }
        }
    }

    public function circulardestroy(Request $request, $id)
    {
        if ($request->ajax()) {

            Documentprocessing::where('documents_id', $id)->delete();
            Document::findOrFail($id)->delete();
        }
        return response()->json(['success' => 'Data is successfully Deleted']);
    }

    public function circularstatus(Request $request, $id)
    {
        if ($request->ajax()) {
            $getstatus = DB::table('documents')
                ->select('status')
                ->where('id', $id)
                ->first();

            $status = $getstatus->status;
            if ($status == 1) {
                $upd_status = array('status' => 2);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            } else {

                $upd_status = array('status' => 1);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            }
        }
    }
    /*Circulars End*/




    /* Acts and Rules */

    public function actandruleslist(Request $request)
    {
        //$displayval=Document::all();
        $displayval = DB::table('documents')
            ->join('departments', 'departments.id', 'documents.departments_id')
            ->join('fielddepartments', 'fielddepartments.id', 'documents.fielddepartments_id')
            ->select('documents.id', 'documentnumber', 'documentdate', 'documents.entitle', 'departments.entitle as deptname', 'fielddepartments.name as fieldname', 'filepath', 'documents.status')
            ->where('documenttypes_id', 5)
            //->where('users_id', $uid)
            ->get();

        return view('contributor.actandruleslist', compact('displayval'));
    }
    public function actandrulescreate(Request $request)
    {
        if ($request->ajax()) {


            $departments     = DB::table('departments')->orderBy('id', 'asc')->get();

            return response()->json(['departments' => $departments]);
        }
    }




    public function actandrulesstore(Request $request)
    {


        $request->validate([
            'filedate'         => 'required|date|before:now|date_format:Y-m-d|after:1956-12-31',
            'filename'      => 'required|mimes:pdf|max:1100',
            'departments_id'  => 'required',
            'fielddepartments_id'   => 'sometimes|nullable',
            'entitle'          => 'required|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enkeyword'        => 'sometimes|nullable|max:100|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/'
        ]);

        if ($request->ajax()) {
            $chkrows = Document::where('entitle', $request->name)->where('documenttypes_id', 5)->exists() ? 1 : 0;
            if ($chkrows == 0) {

                $date = date('dmYH:i:s');

                /*Go*/
                $fileName = 'actrules' . $date . '.' . $request->filename->extension();
                $request->filename->move(public_path('Actandrules'), $fileName);
                $imageSize = $request->file('filename')->getSize();


                $filedate = Carbon::parse($request->filedate)->format('Y-m-d');
                $resultsave = new Document([
                    'documenttypes_id'            =>  5,
                    'documentdate'                =>  $filedate,
                    'filepath'                    =>  $fileName,
                    'departments_id'            =>  $request->departments_id,
                    'fielddepartments_id'       =>  $request->fielddepartments_id,
                    'published'                    =>  1,
                    'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                    'documentorigins_id'        =>  3,
                    'entitle'                    =>  $request->entitle,
                    'maltitle'                    =>  $request->maltitle,
                    'enkeywords'                =>  $request->enkeyword,
                    'malkeywords'                =>  $request->malkeyword,
                    'documentcategories_id'     =>  1,
                    'size'                        =>  $imageSize,
                    'alt'                        =>  'RTI document'
                ]);

                $resultsave->save();
                $docid = $resultsave->id;

                $resultprocess = new Documentprocessing([
                    'documents_id'            =>  $docid,
                    'currentowner'            =>  Auth::user()->id,
                    'contributor_status'    =>  1,
                    'contributor_id'        =>  Auth::user()->id,
                    'contributor_timestamp' =>  date('Y-m-d H:i:s')
                ]);

                $resultprocess->save();
                return response()->json(['success' => 'Data Added successfully.']);
            } else {
                return response()->json(['errors' => 'Already a Acts and rules  exists.']);
            }
        }
    }

    public function actandrulesedit(Request $request, $id)
    {
        if ($request->ajax()) {
            $resultdata = Document::find($id);
            $department = DB::table('departments')->get();
            $fielddepatment = DB::table('fielddepartments')->get();
            return response()->json(['resultdata' => $resultdata, 'department' => $department, 'fielddepartment' => $fielddepatment]);
        }
    }

    public function actandrulesupdate(Request $request)
    {
        $request->validate([

            'filedate'         => 'required|date|before:now|date_format:Y-m-d|after:1956-12-31',
            'filename'      => 'required|mimes:pdf|max:1100',
            'departments_id'  => 'required',
            'fielddepartments_id'   => 'sometimes|nullable',
            'entitle'          => 'required|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enkeyword'        => 'sometimes|nullable|max:100|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/'
        ]);

        if ($request->ajax()) {


            $chkrows = Document::where('entitle', $request->entitle)->where('documenttypes_id', 5)->where('id', '!=', $request->hidden_id)->exists() ? 1 : 0;
            if ($chkrows == 0) {

                $filedate = Carbon::parse($request->filedate)->format('Y-m-d');
                if (isset($request->filename)) {
                    $date = date('dmYH:i:s');
                    /*Go*/
                    $fileName = 'actrules' . $date . '.' . $request->filename->extension();
                    $request->filename->move(public_path('Actandrules'), $fileName);
                    $imageSize = $request->file('filename')->getSize();


                    $form_data = array(
                        'documenttypes_id'            =>  5,
                        'documentdate'                =>  $filedate,
                        'filepath'                    =>  $fileName,
                        'departments_id'            =>  $request->departments_id,
                        'fielddepartments_id'       =>  $request->fielddepartments_id,
                        'published'                    =>  1,
                        'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                        'documentorigins_id'        =>  3,
                        'entitle'                    =>  $request->entitle,
                        'maltitle'                    =>  $request->maltitle,
                        'enkeywords'                =>  $request->enkeyword,
                        'malkeywords'                =>  $request->malkeyword,
                        'documentcategories_id'     =>  1,
                        'size'                        =>  $imageSize,
                        'alt'                        =>  'Acts and Rules'
                    );
                } else {


                    $form_data = array(
                        'documenttypes_id'            =>  5,
                        'documentdate'                =>  $filedate,
                        'departments_id'            =>  $request->departments_id,
                        'fielddepartments_id'       =>  $request->fielddepartments_id,
                        'published'                    =>  1,
                        'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                        'documentorigins_id'        =>  3,
                        'entitle'                    =>  $request->entitle,
                        'maltitle'                    =>  $request->maltitle,
                        'enkeywords'                =>  $request->enkeyword,
                        'malkeywords'                =>  $request->malkeyword,
                        'documentcategories_id'     =>  1,
                        'size'                        =>  $imageSize,
                        'alt'                        =>  'Acts and Rules'
                    );
                }
                Document::whereId($request->hidden_id)->update($form_data);

                return response()->json(['success' => 'Data is successfully updated']);
            } else {
                return response()->json(['errors' => 'Already a Acts and Rules exists.']);
            }
        }
    }

    public function actandrulesdestroy(Request $request, $id)
    {
        if ($request->ajax()) {

            Documentprocessing::where('documents_id', $id)->delete();
            Document::findOrFail($id)->delete();
        }
        return response()->json(['success' => 'Data is successfully Deleted']);
    }

    public function actandrulesstatus(Request $request, $id)
    {
        if ($request->ajax()) {
            $getstatus = DB::table('documents')
                ->select('status')
                ->where('id', $id)
                ->first();

            $status = $getstatus->status;
            if ($status == 1) {
                $upd_status = array('status' => 2);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            } else {

                $upd_status = array('status' => 1);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            }
        }
    }
    /*Acts and Rules End*/

    /* Ordinance */

    public function ordinancelist(Request $request)
    {
        //$displayval=Document::all();
        $displayval = DB::table('documents')
            ->join('departments', 'departments.id', 'documents.departments_id')
            ->join('fielddepartments', 'fielddepartments.id', 'documents.fielddepartments_id')
            ->select('documents.id', 'documentnumber', 'documentdate', 'documents.entitle', 'departments.entitle as deptname', 'fielddepartments.name as fieldname', 'filepath', 'documents.status')
            ->where('documenttypes_id', 6)
            //->where('users_id', $uid)
            ->get();

        return view('contributor.ordinancelist', compact('displayval'));
    }
    public function ordinancecreate(Request $request)
    {
        if ($request->ajax()) {


            $departments     = DB::table('departments')->orderBy('id', 'asc')->get();

            return response()->json(['departments' => $departments]);
        }
    }




    public function ordinancestore(Request $request)
    {


        $request->validate([
            'filedate'         => 'required|date|before:now|date_format:Y-m-d|after:1956-12-31',
            'filename'      => 'required|mimes:pdf|max:1100',
            'departments_id'  => 'required',
            'fielddepartments_id'   => 'sometimes|nullable',
            'entitle'          => 'required|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enkeyword'        => 'sometimes|nullable|max:100|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/'
        ]);

        if ($request->ajax()) {
            $chkrows = Document::where('entitle', $request->name)->where('documenttypes_id', 6)->exists() ? 1 : 0;
            if ($chkrows == 0) {

                $date = date('dmYH:i:s');

                /*Go*/
                $fileName = 'ordinance' . $date . '.' . $request->filename->extension();
                $request->filename->move(public_path('Ordinance'), $fileName);
                $imageSize = $request->file('filename')->getSize();


                $filedate = Carbon::parse($request->filedate)->format('Y-m-d');
                $resultsave = new Document([
                    'documenttypes_id'            =>  6,
                    'documentdate'                =>  $filedate,
                    'filepath'                    =>  $fileName,
                    'departments_id'            =>  $request->departments_id,
                    'fielddepartments_id'       =>  $request->fielddepartments_id,
                    'published'                    =>  1,
                    'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                    'documentorigins_id'        =>  3,
                    'entitle'                    =>  $request->entitle,
                    'maltitle'                    =>  $request->maltitle,
                    'enkeywords'                =>  $request->enkeyword,
                    'malkeywords'                =>  $request->malkeyword,
                    'documentcategories_id'     =>  1,
                    'size'                        =>  $imageSize,
                    'alt'                        =>  'Ordinance'
                ]);

                $resultsave->save();
                $docid = $resultsave->id;

                $resultprocess = new Documentprocessing([
                    'documents_id'            =>  $docid,
                    'currentowner'            =>  Auth::user()->id,
                    'contributor_status'    =>  1,
                    'contributor_id'        =>  Auth::user()->id,
                    'contributor_timestamp' =>  date('Y-m-d H:i:s')
                ]);

                $resultprocess->save();
                return response()->json(['success' => 'Data Added successfully.']);
            } else {
                return response()->json(['errors' => 'Already a Ordinance  exists.']);
            }
        }
    }

    public function ordinanceedit(Request $request, $id)
    {
        if ($request->ajax()) {
            $resultdata = Document::find($id);
            $department = DB::table('departments')->get();
            $fielddepatment = DB::table('fielddepartments')->get();
            return response()->json(['resultdata' => $resultdata, 'department' => $department, 'fielddepartment' => $fielddepatment]);
        }
    }

    public function ordinanceupdate(Request $request)
    {
        $request->validate([
            'filedate'         => 'required|date|before:now|date_format:Y-m-d|after:1956-12-31',
            'filename'      => 'required|mimes:pdf|max:1100',
            'departments_id'  => 'required',
            'fielddepartments_id'   => 'sometimes|nullable',
            'entitle'          => 'required|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enkeyword'        => 'sometimes|nullable|max:100|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/'
        ]);

        if ($request->ajax()) {


            $chkrows = Document::where('entitle', $request->entitle)->where('documenttypes_id', 6)->where('id', '!=', $request->hidden_id)->exists() ? 1 : 0;
            if ($chkrows == 0) {

                $filedate = Carbon::parse($request->filedate)->format('Y-m-d');
                if (isset($request->filename)) {
                    $date = date('dmYH:i:s');
                    /*Go*/
                    $fileName = 'ordinance' . $date . '.' . $request->filename->extension();
                    $request->filename->move(public_path('Ordinance'), $fileName);
                    $imageSize = $request->file('filename')->getSize();


                    $form_data = array(
                        'documenttypes_id'            =>  6,
                        'documentdate'                =>  $filedate,
                        'filepath'                    =>  $fileName,
                        'departments_id'            =>  $request->departments_id,
                        'fielddepartments_id'       =>  $request->fielddepartments_id,
                        'published'                    =>  1,
                        'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                        'documentorigins_id'        =>  3,
                        'entitle'                    =>  $request->entitle,
                        'maltitle'                    =>  $request->maltitle,
                        'enkeywords'                =>  $request->enkeyword,
                        'malkeywords'                =>  $request->malkeyword,
                        'documentcategories_id'     =>  1,
                        'size'                        =>  $imageSize,
                        'alt'                        =>  'Ordinance'
                    );
                } else {


                    $form_data = array(
                        'documenttypes_id'            =>  6,
                        'documentdate'                =>  $filedate,
                        'departments_id'            =>  $request->departments_id,
                        'fielddepartments_id'       =>  $request->fielddepartments_id,
                        'published'                    =>  1,
                        'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                        'documentorigins_id'        =>  3,
                        'entitle'                    =>  $request->entitle,
                        'maltitle'                    =>  $request->maltitle,
                        'enkeywords'                =>  $request->enkeyword,
                        'malkeywords'                =>  $request->malkeyword,
                        'documentcategories_id'     =>  1,
                        'size'                        =>  $imageSize,
                        'alt'                        =>  'Ordinance'
                    );
                }
                Document::whereId($request->hidden_id)->update($form_data);

                return response()->json(['success' => 'Data is successfully updated']);
            } else {
                return response()->json(['errors' => 'Already a Ordinance exists.']);
            }
        }
    }

    public function ordinancedestroy(Request $request, $id)
    {
        if ($request->ajax()) {

            Documentprocessing::where('documents_id', $id)->delete();
            Document::findOrFail($id)->delete();
        }
        return response()->json(['success' => 'Data is successfully Deleted']);
    }

    public function ordinancestatus(Request $request, $id)
    {
        if ($request->ajax()) {
            $getstatus = DB::table('documents')
                ->select('status')
                ->where('id', $id)
                ->first();

            $status = $getstatus->status;
            if ($status == 1) {
                $upd_status = array('status' => 2);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            } else {

                $upd_status = array('status' => 1);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            }
        }
    }
    /*Ordinance End*/

    /* Notification */

    public function notificationlist(Request $request)
    {
        //$displayval=Document::all();
        $displayval = DB::table('documents')
            ->join('departments', 'departments.id', 'documents.departments_id')
            ->join('fielddepartments', 'fielddepartments.id', 'documents.fielddepartments_id')
            ->select('documents.id', 'documentnumber', 'documentdate', 'documents.entitle', 'departments.entitle as deptname', 'fielddepartments.name as fieldname', 'filepath', 'documents.status')
            ->where('documenttypes_id', 7)
            //->where('users_id', $uid)
            ->get();

        return view('contributor.notificationlist', compact('displayval'));
    }
    public function notificationcreate(Request $request)
    {
        if ($request->ajax()) {


            $departments     = DB::table('departments')->orderBy('id', 'asc')->get();

            return response()->json(['departments' => $departments]);
        }
    }


    public function notificationstore(Request $request)
    {


        $request->validate([
            'filedate'         => 'required|date|before:now|date_format:Y-m-d|after:1956-12-31',
            'filename'      => 'required|mimes:pdf|max:1100',
            'departments_id'  => 'required',
            'fielddepartments_id'   => 'sometimes|nullable',
            'entitle'          => 'required|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enkeyword'        => 'sometimes|nullable|max:100|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/'
        ]);

        if ($request->ajax()) {
            $chkrows = Document::where('entitle', $request->name)->where('documenttypes_id', 7)->exists() ? 1 : 0;
            if ($chkrows == 0) {

                $date = date('dmYH:i:s');

                /*Go*/
                $fileName = 'notification' . $date . '.' . $request->filename->extension();
                $request->filename->move(public_path('Notification'), $fileName);
                $imageSize = $request->file('filename')->getSize();


                $filedate = Carbon::parse($request->filedate)->format('Y-m-d');
                $resultsave = new Document([
                    'documenttypes_id'            =>  7,
                    'documentdate'                =>  $filedate,
                    'filepath'                    =>  $fileName,
                    'departments_id'            =>  $request->departments_id,
                    'fielddepartments_id'       =>  $request->fielddepartments_id,
                    'published'                    =>  1,
                    'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                    'documentorigins_id'        =>  3,
                    'entitle'                    =>  $request->entitle,
                    'maltitle'                    =>  $request->maltitle,
                    'enkeywords'                =>  $request->enkeyword,
                    'malkeywords'                =>  $request->malkeyword,
                    'documentcategories_id'     =>  1,
                    'size'                        =>  $imageSize,
                    'alt'                        =>  'Notification'

                ]);

                $resultsave->save();
                $docid = $resultsave->id;

                $resultprocess = new Documentprocessing([
                    'documents_id'            =>  $docid,
                    'currentowner'            =>  Auth::user()->id,
                    'contributor_status'    =>  1,
                    'contributor_id'        =>  Auth::user()->id,
                    'contributor_timestamp' =>  date('Y-m-d H:i:s')
                ]);

                $resultprocess->save();
                return response()->json(['success' => 'Data Added successfully.']);
            } else {
                return response()->json(['errors' => 'Already a notification  exists.']);
            }
        }
    }

    public function notificationedit(Request $request, $id)
    {
        if ($request->ajax()) {
            $resultdata = Document::find($id);
            $department = DB::table('departments')->get();
            $fielddepatment = DB::table('fielddepartments')->get();
            return response()->json(['resultdata' => $resultdata, 'department' => $department, 'fielddepartment' => $fielddepatment]);
        }
    }

    public function notificationupdate(Request $request)
    {
        $request->validate([

            'filedate'         => 'required|date|before:now|date_format:Y-m-d|after:1956-12-31',
            'filename'      => 'required|mimes:pdf|max:1100',
            'departments_id'  => 'required',
            'fielddepartments_id'   => 'sometimes|nullable',
            'entitle'          => 'required|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enkeyword'        => 'sometimes|nullable|max:100|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/'

        ]);

        if ($request->ajax()) {


            $chkrows = Document::where('entitle', $request->entitle)->where('documenttypes_id', 7)->where('id', '!=', $request->hidden_id)->exists() ? 1 : 0;
            if ($chkrows == 0) {

                $filedate = Carbon::parse($request->filedate)->format('Y-m-d');
                if (isset($request->filename)) {
                    $date = date('dmYH:i:s');
                    /*Go*/
                    $fileName = 'notification' . $date . '.' . $request->filename->extension();
                    $request->filename->move(public_path('Notification'), $fileName);
                    $imageSize = $request->file('filename')->getSize();


                    $form_data = array(
                        'documenttypes_id'            =>  7,
                        'documentdate'                =>  $filedate,
                        'filepath'                    =>  $fileName,
                        'departments_id'            =>  $request->departments_id,
                        'fielddepartments_id'       =>  $request->fielddepartments_id,
                        'published'                    =>  1,
                        'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                        'documentorigins_id'        =>  3,
                        'entitle'                    =>  $request->entitle,
                        'maltitle'                    =>  $request->maltitle,
                        'enkeywords'                =>  $request->enkeyword,
                        'malkeywords'                =>  $request->malkeyword,
                        'documentcategories_id'     =>  1,
                        'size'                        =>  $imageSize,
                        'alt'                        =>  'Notification'
                    );
                } else {


                    $form_data = array(
                        'documenttypes_id'            =>  7,
                        'documentdate'                =>  $filedate,
                        'departments_id'            =>  $request->departments_id,
                        'fielddepartments_id'       =>  $request->fielddepartments_id,
                        'published'                    =>  1,
                        'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                        'documentorigins_id'        =>  3,
                        'entitle'                    =>  $request->entitle,
                        'maltitle'                    =>  $request->maltitle,
                        'enkeywords'                =>  $request->enkeyword,
                        'malkeywords'                =>  $request->malkeyword,
                        'documentcategories_id'     =>  1,
                        'size'                        =>  $imageSize,
                        'alt'                        =>  'Notification'
                    );
                }
                Document::whereId($request->hidden_id)->update($form_data);

                return response()->json(['success' => 'Data is successfully updated']);
            } else {
                return response()->json(['errors' => 'Already a notification exists.']);
            }
        }
    }

    public function notificationdestroy(Request $request, $id)
    {
        if ($request->ajax()) {

            Documentprocessing::where('documents_id', $id)->delete();
            Document::findOrFail($id)->delete();
        }
        return response()->json(['success' => 'Data is successfully Deleted']);
    }

    public function notificationstatus(Request $request, $id)
    {
        if ($request->ajax()) {
            $getstatus = DB::table('documents')
                ->select('status')
                ->where('id', $id)
                ->first();

            $status = $getstatus->status;
            if ($status == 1) {
                $upd_status = array('status' => 2);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            } else {

                $upd_status = array('status' => 1);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            }
        }
    }
    /*Notification End*/





    /* Citizen Charter */

    public function citizencharterlist(Request $request)
    {
        //$displayval=Document::all();
        $displayval = DB::table('documents')
            ->join('departments', 'departments.id', 'documents.departments_id')
            ->join('fielddepartments', 'fielddepartments.id', 'documents.fielddepartments_id')
            ->select('documents.id', 'documentnumber', 'documentdate', 'documents.entitle', 'departments.entitle as deptname', 'fielddepartments.name as fieldname', 'filepath', 'documents.status')
            ->where('documenttypes_id', 9)
            //->where('users_id', $uid)
            ->get();

        return view('contributor.citizencharterlist', compact('displayval'));
    }
    public function citizenchartercreate(Request $request)
    {
        if ($request->ajax()) {


            $departments     = DB::table('departments')->orderBy('id', 'asc')->get();

            return response()->json(['departments' => $departments]);
        }
    }




    public function citizencharterstore(Request $request)
    {


        $request->validate([
            'filedate'         => 'required|date|before:now|date_format:Y-m-d|after:1956-12-31',
            'filename'      => 'required|mimes:pdf|max:1100',
            'departments_id'  => 'required',
            'fielddepartments_id'   => 'sometimes|nullable',
            'entitle'          => 'required|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enkeyword'        => 'sometimes|nullable|max:100|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/'
        ]);

        if ($request->ajax()) {
            $chkrows = Document::where('entitle', $request->name)->where('documenttypes_id', 9)->exists() ? 1 : 0;
            if ($chkrows == 0) {

                $date = date('dmYH:i:s');

                /*Go*/
                $fileName = 'citizen' . $date . '.' . $request->filename->extension();
                $request->filename->move(public_path('Citizencharter'), $fileName);
                $imageSize = $request->file('filename')->getSize();


                $filedate = Carbon::parse($request->filedate)->format('Y-m-d');
                $resultsave = new Document([
                    'documenttypes_id'            =>  9,
                    'documentdate'                =>  $filedate,
                    'filepath'                    =>  $fileName,
                    'departments_id'            =>  $request->departments_id,
                    'fielddepartments_id'       =>  $request->fielddepartments_id,
                    'published'                    =>  1,
                    'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                    'documentorigins_id'        =>  3,
                    'entitle'                    =>  $request->entitle,
                    'maltitle'                    =>  $request->maltitle,
                    'enkeywords'                =>  $request->enkeyword,
                    'malkeywords'                =>  $request->malkeyword,
                    'documentcategories_id'     =>  1,
                    'size'                        =>  $imageSize,
                    'alt'                        =>  'Guidelines'

                ]);

                $resultsave->save();
                $docid = $resultsave->id;

                $resultprocess = new Documentprocessing([
                    'documents_id'            =>  $docid,
                    'currentowner'            =>  Auth::user()->id,
                    'contributor_status'    =>  1,
                    'contributor_id'        =>  Auth::user()->id,
                    'contributor_timestamp' =>  date('Y-m-d H:i:s')
                ]);

                $resultprocess->save();
                return response()->json(['success' => 'Data Added successfully.']);
            } else {
                return response()->json(['errors' => 'Already a guidelines  exists.']);
            }
        }
    }

    public function citizencharteredit(Request $request, $id)
    {
        if ($request->ajax()) {
            $resultdata = Document::find($id);
            $department = DB::table('departments')->get();
            $fielddepatment = DB::table('fielddepartments')->get();
            return response()->json(['resultdata' => $resultdata, 'department' => $department, 'fielddepartment' => $fielddepatment]);
        }
    }

    public function citizencharterupdate(Request $request)
    {
        $request->validate([

            'filedate'         => 'required|date|before:now|date_format:Y-m-d|after:1956-12-31',
            'filename'      => 'required|mimes:pdf|max:1100',
            'departments_id'  => 'required',
            'fielddepartments_id'   => 'sometimes|nullable',
            'entitle'          => 'required|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enkeyword'        => 'sometimes|nullable|max:100|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/'
        ]);

        if ($request->ajax()) {


            $chkrows = Document::where('entitle', $request->entitle)->where('documenttypes_id', 9)->where('id', '!=', $request->hidden_id)->exists() ? 1 : 0;
            if ($chkrows == 0) {

                $filedate = Carbon::parse($request->filedate)->format('Y-m-d');
                if (isset($request->filename)) {
                    $date = date('dmYH:i:s');
                    /*Go*/
                    $fileName = 'citizen' . $date . '.' . $request->filename->extension();
                    $request->filename->move(public_path('Citizencharter'), $fileName);
                    $imageSize = $request->file('filename')->getSize();


                    $form_data = array(
                        'documenttypes_id'            =>  9,
                        'documentdate'                =>  $filedate,
                        'filepath'                    =>  $fileName,
                        'departments_id'            =>  $request->departments_id,
                        'fielddepartments_id'       =>  $request->fielddepartments_id,
                        'published'                    =>  1,
                        'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                        'documentorigins_id'        =>  3,
                        'entitle'                    =>  $request->entitle,
                        'maltitle'                    =>  $request->maltitle,
                        'enkeywords'                =>  $request->enkeyword,
                        'malkeywords'                =>  $request->malkeyword,
                        'documentcategories_id'     =>  1,
                        'size'                        =>  $imageSize,
                        'alt'                        =>  'Guidelines'
                    );
                } else {


                    $form_data = array(
                        'documenttypes_id'            =>  9,
                        'documentdate'                =>  $filedate,
                        'departments_id'            =>  $request->departments_id,
                        'fielddepartments_id'       =>  $request->fielddepartments_id,
                        'published'                    =>  1,
                        'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                        'documentorigins_id'        =>  3,
                        'entitle'                    =>  $request->entitle,
                        'maltitle'                    =>  $request->maltitle,
                        'enkeywords'                =>  $request->enkeyword,
                        'malkeywords'                =>  $request->malkeyword,
                        'documentcategories_id'     =>  1,
                        'size'                        =>  $imageSize,
                        'alt'                        =>  'Guidelines'
                    );
                }
                Document::whereId($request->hidden_id)->update($form_data);

                return response()->json(['success' => 'Data is successfully updated']);
            } else {
                return response()->json(['errors' => 'Already a guidelines exists.']);
            }
        }
    }

    public function citizencharterdestroy(Request $request, $id)
    {
        if ($request->ajax()) {

            Documentprocessing::where('documents_id', $id)->delete();
            Document::findOrFail($id)->delete();
        }
        return response()->json(['success' => 'Data is successfully Deleted']);
    }

    public function citizencharterstatus(Request $request, $id)
    {
        if ($request->ajax()) {
            $getstatus = DB::table('documents')
                ->select('status')
                ->where('id', $id)
                ->first();

            $status = $getstatus->status;
            if ($status == 1) {
                $upd_status = array('status' => 2);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            } else {

                $upd_status = array('status' => 1);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            }
        }
    }
    /*Citizen Charter End*/



    /* General report */
    public function generalreportlist(Request $request)
    {
        //$displayval=Document::all();
        $displayval = DB::table('documents')
            ->join('departments', 'departments.id', 'documents.departments_id')
            ->join('fielddepartments', 'fielddepartments.id', 'documents.fielddepartments_id')
            ->select('documents.id', 'documentnumber', 'documentdate', 'documents.entitle', 'departments.entitle as deptname', 'fielddepartments.name as fieldname', 'filepath', 'documents.status')
            ->where('documenttypes_id', 13)
            //->where('users_id', $uid)
            ->get();

        return view('contributor.generalreportlist', compact('displayval'));
    }
    public function generalreportcreate(Request $request)
    {
        if ($request->ajax()) {


            $departments     = DB::table('departments')->orderBy('id', 'asc')->get();

            return response()->json(['departments' => $departments]);
        }
    }




    public function generalreportstore(Request $request)
    {


        $request->validate([
            'filedate'         => 'required|date|before:now|date_format:Y-m-d|after:1956-12-31',
            'filename'      => 'required|mimes:pdf|max:1100',
            'departments_id'  => 'required',
            'fielddepartments_id'   => 'sometimes|nullable',
            'entitle'          => 'required|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enkeyword'        => 'sometimes|nullable|max:100|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/'


        ]);

        if ($request->ajax()) {
            $chkrows = Document::where('entitle', $request->name)->where('documenttypes_id', 13)->exists() ? 1 : 0;
            if ($chkrows == 0) {

                $date = date('dmYH:i:s');

                /*Go*/
                $fileName = 'general' . $date . '.' . $request->filename->extension();
                $request->filename->move(public_path('Generalreport'), $fileName);
                $imageSize = $request->file('filename')->getSize();


                $filedate = Carbon::parse($request->filedate)->format('Y-m-d');
                $resultsave = new Document([
                    'documenttypes_id'            =>  13,
                    'documentdate'                =>  $filedate,
                    'filepath'                    =>  $fileName,
                    'departments_id'            =>  $request->departments_id,
                    'fielddepartments_id'       =>  $request->fielddepartments_id,
                    'published'                    =>  1,
                    'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                    'documentorigins_id'        =>  3,
                    'entitle'                    =>  $request->entitle,
                    'maltitle'                    =>  $request->maltitle,
                    'enkeywords'                =>  $request->enkeyword,
                    'malkeywords'                =>  $request->malkeyword,
                    'documentcategories_id'     =>  3,
                    'size'                        =>  $imageSize,
                    'alt'                        =>  'General Report'

                ]);

                $resultsave->save();
                $docid = $resultsave->id;

                $resultprocess = new Documentprocessing([
                    'documents_id'            =>  $docid,
                    'currentowner'            =>  Auth::user()->id,
                    'contributor_status'    =>  1,
                    'contributor_id'        =>  Auth::user()->id,
                    'contributor_timestamp' =>  date('Y-m-d H:i:s')


                ]);

                $resultprocess->save();
                return response()->json(['success' => 'Data Added successfully.']);
            } else {
                return response()->json(['errors' => 'Already a Work Study Report exists.']);
            }
        }
    }

    public function generalreportedit(Request $request, $id)
    {
        if ($request->ajax()) {
            $resultdata = Document::find($id);
            $department = DB::table('departments')->get();
            $fielddepatment = DB::table('fielddepartments')->get();
            return response()->json(['resultdata' => $resultdata, 'department' => $department, 'fielddepartment' => $fielddepatment]);
        }
    }

    public function generalreportupdate(Request $request)
    {
        $request->validate([

            'filedate'         => 'required|date|before:now|date_format:Y-m-d|after:1956-12-31',
            'filename'      => 'required|mimes:pdf|max:1100',
            'departments_id'  => 'required',
            'fielddepartments_id'   => 'sometimes|nullable',
            'entitle'          => 'required|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enkeyword'        => 'sometimes|nullable|max:100|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/'

        ]);

        if ($request->ajax()) {


            $chkrows = Document::where('entitle', $request->entitle)->where('documenttypes_id', 13)->where('id', '!=', $request->hidden_id)->exists() ? 1 : 0;
            if ($chkrows == 0) {

                $filedate = Carbon::parse($request->filedate)->format('Y-m-d');
                if (isset($request->filename)) {
                    $date = date('dmYH:i:s');
                    /*Go*/
                    $fileName = 'general' . $date . '.' . $request->filename->extension();
                    $request->filename->move(public_path('Generalreport'), $fileName);
                    $imageSize = $request->file('filename')->getSize();


                    $form_data = array(
                        'documenttypes_id'            =>  13,
                        'documentdate'                =>  $filedate,
                        'filepath'                    =>  $fileName,
                        'departments_id'            =>  $request->departments_id,
                        'fielddepartments_id'       =>  $request->fielddepartments_id,
                        'published'                    =>  1,
                        'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                        'documentorigins_id'        =>  3,
                        'entitle'                    =>  $request->entitle,
                        'maltitle'                    =>  $request->maltitle,
                        'enkeywords'                =>  $request->enkeyword,
                        'malkeywords'                =>  $request->malkeyword,
                        'documentcategories_id'     =>  3,
                        'size'                        =>  $imageSize,
                        'alt'                        =>  'General Report'
                    );
                } else {


                    $form_data = array(
                        'documenttypes_id'            =>  13,
                        'documentdate'                =>  $filedate,
                        'departments_id'            =>  $request->departments_id,
                        'fielddepartments_id'       =>  $request->fielddepartments_id,
                        'published'                    =>  1,
                        'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                        'documentorigins_id'        =>  3,
                        'entitle'                    =>  $request->entitle,
                        'maltitle'                    =>  $request->maltitle,
                        'enkeywords'                =>  $request->enkeyword,
                        'malkeywords'                =>  $request->malkeyword,
                        'documentcategories_id'     =>  3,
                        'size'                        =>  $imageSize,
                        'alt'                        =>  'General Report'
                    );
                }
                Document::whereId($request->hidden_id)->update($form_data);

                return response()->json(['success' => 'Data is successfully updated']);
            } else {
                return response()->json(['errors' => 'Already a General Report exists.']);
            }
        }
    }

    public function generalreportdestroy(Request $request, $id)
    {
        if ($request->ajax()) {

            Documentprocessing::where('documents_id', $id)->delete();
            Document::findOrFail($id)->delete();
        }
        return response()->json(['success' => 'Data is successfully Deleted']);
    }

    public function generalreportstatus(Request $request, $id)
    {
        if ($request->ajax()) {
            $getstatus = DB::table('documents')
                ->select('status')
                ->where('id', $id)
                ->first();

            $status = $getstatus->status;
            if ($status == 1) {
                $upd_status = array('status' => 2);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            } else {

                $upd_status = array('status' => 1);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            }
        }
    }
    /*General report End*/



    /*state budget*/

    public function statebudgetlist(Request $request)
    {
        //$displayval=Document::all();
        $displayval = DB::table('documents')
            //->join('departments','departments.id','documents.departments_id')
            //->join('fielddepartments','fielddepartments.id','documents.fielddepartments_id')
            ->select('documents.id', 'documentnumber', 'documentdate', 'documents.entitle', 'filepath', 'documents.status')
            ->where('documenttypes_id', 15)
            //->where('users_id', $uid)
            ->get();

        return view('contributor.statebudgetlist', compact('displayval'));
    }
    public function statebudgetcreate(Request $request)
    {
        if ($request->ajax()) {


            $departments     = DB::table('departments')->orderBy('id', 'asc')->get();

            return response()->json(['departments' => $departments]);
        }
    }




    public function statebudgetstore(Request $request)
    {


        $request->validate([

            'filename'      => 'required|mimes:pdf|max:1100',
            'entitle'          => 'required|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enkeyword'        => 'sometimes|nullable|max:100|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/'


        ]);

        if ($request->ajax()) {
            $chkrows = Document::where('entitle', $request->name)->where('documenttypes_id', 15)->exists() ? 1 : 0;
            if ($chkrows == 0) {

                $date = date('dmYH:i:s');

                /*Go*/
                $fileName = 'budget' . $date . '.' . $request->filename->extension();
                $request->filename->move(public_path('Statebudget'), $fileName);
                $imageSize = $request->file('filename')->getSize();


                // $filedate=Carbon::createFromFormat('d/m/Y', $request->filedate)->format('Y-m-d');	
                $resultsave = new Document([
                    'documenttypes_id'            =>  15,
                    'filepath'                    =>  $fileName,
                    'published'                    =>  1,
                    'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                    'documentorigins_id'        =>  3,
                    'entitle'                    =>  $request->entitle,
                    'maltitle'                    =>  $request->maltitle,
                    'enkeywords'                =>  $request->enkeyword,
                    'malkeywords'                =>  $request->malkeyword,
                    'documentcategories_id'     =>  5,
                    'size'                        =>  $imageSize,
                    'alt'                        =>  'State Budget'

                ]);

                $resultsave->save();
                $docid = $resultsave->id;

                $resultprocess = new Documentprocessing([
                    'documents_id'            =>  $docid,
                    'currentowner'            =>  Auth::user()->id,
                    'contributor_status'    =>  1,
                    'contributor_id'        =>  Auth::user()->id,
                    'contributor_timestamp' =>  date('Y-m-d H:i:s')


                ]);

                $resultprocess->save();
                return response()->json(['success' => 'Data Added successfully.']);
            } else {
                return response()->json(['errors' => 'Already a State budget exists.']);
            }
        }
    }

    public function statebudgetedit(Request $request, $id)
    {
        if ($request->ajax()) {
            $resultdata = Document::find($id);
            $department = DB::table('departments')->get();
            $fielddepatment = DB::table('fielddepartments')->get();
            return response()->json(['resultdata' => $resultdata, 'department' => $department, 'fielddepartment' => $fielddepatment]);
        }
    }

    public function statebudgetupdate(Request $request)
    {
        $request->validate([


            'filename'      => 'sometimes|nullable|mimes:pdf|max:1100',
            'entitle'          => 'required|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enkeyword'        => 'sometimes|nullable|max:100|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/'
        ]);

        if ($request->ajax()) {


            $chkrows = Document::where('entitle', $request->entitle)->where('documenttypes_id', 15)->where('id', '!=', $request->hidden_id)->exists() ? 1 : 0;
            if ($chkrows == 0) {

                // $filedate=Carbon::createFromFormat('d/m/Y', $request->filedate)->format('Y-m-d');	
                if (isset($request->filename)) {
                    $date = date('dmYH:i:s');
                    /*Go*/
                    $fileName = 'budget' . $date . '.' . $request->filename->extension();
                    $request->filename->move(public_path('Statebudget'), $fileName);
                    $imageSize = $request->file('filename')->getSize();


                    $form_data = array(
                        'documenttypes_id'            =>  15,
                        'filepath'                    =>  $fileName,
                        'published'                    =>  1,
                        'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                        'documentorigins_id'        =>  3,
                        'entitle'                    =>  $request->entitle,
                        'maltitle'                    =>  $request->maltitle,
                        'enkeywords'                =>  $request->enkeyword,
                        'malkeywords'                =>  $request->malkeyword,
                        'documentcategories_id'     =>  5,
                        'size'                        =>  $imageSize,
                        'alt'                        =>  'State Budget'
                    );
                } else {


                    $form_data = array(
                        'documenttypes_id'            =>  15,
                        'published'                    =>  1,
                        'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                        'documentorigins_id'        =>  3,
                        'entitle'                    =>  $request->entitle,
                        'maltitle'                    =>  $request->maltitle,
                        'enkeywords'                =>  $request->enkeyword,
                        'malkeywords'                =>  $request->malkeyword,
                        'documentcategories_id'     =>  5,
                        'size'                        =>  $imageSize,
                        'alt'                        =>  'State Budget'
                    );
                }
                Document::whereId($request->hidden_id)->update($form_data);

                return response()->json(['success' => 'Data is successfully updated']);
            } else {
                return response()->json(['errors' => 'Already a Work Study Report exists.']);
            }
        }
    }

    public function statebudgetdestroy(Request $request, $id)
    {
        if ($request->ajax()) {

            Documentprocessing::where('documents_id', $id)->delete();
            Document::findOrFail($id)->delete();
        }
        return response()->json(['success' => 'Data is successfully Deleted']);
    }

    public function statebudgetstatus(Request $request, $id)
    {
        if ($request->ajax()) {
            $getstatus = DB::table('documents')
                ->select('status')
                ->where('id', $id)
                ->first();

            $status = $getstatus->status;
            if ($status == 1) {
                $upd_status = array('status' => 2);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            } else {

                $upd_status = array('status' => 1);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            }
        }
    }
    /*state budget End*/


    /*Economic Review*/
    public function economicreviewlist(Request $request)
    {
        //$displayval=Document::all();
        $displayval = DB::table('documents')
            //->join('departments','departments.id','documents.departments_id')
            //->join('fielddepartments','fielddepartments.id','documents.fielddepartments_id')
            ->select('documents.id', 'documentnumber', 'documentdate', 'documents.entitle', 'filepath', 'documents.status')
            ->where('documenttypes_id', 16)
            //->where('users_id', $uid)
            ->get();

        return view('contributor.economicreviewlist', compact('displayval'));
    }
    public function economicreviewcreate(Request $request)
    {
        if ($request->ajax()) {


            $departments     = DB::table('departments')->orderBy('id', 'asc')->get();

            return response()->json(['departments' => $departments]);
        }
    }




    public function economicreviewstore(Request $request)
    {


        $request->validate([

            'filename'      => 'required|mimes:pdf|max:1100',
            'entitle'          => 'required|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enkeyword'        => 'sometimes|nullable|max:100|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/'


        ]);

        if ($request->ajax()) {
            $chkrows = Document::where('entitle', $request->name)->where('documenttypes_id', 16)->exists() ? 1 : 0;
            if ($chkrows == 0) {

                $date = date('dmYH:i:s');

                /*Go*/
                $fileName = 'economic' . $date . '.' . $request->filename->extension();
                $request->filename->move(public_path('Economicreview'), $fileName);
                $imageSize = $request->file('filename')->getSize();


                // $filedate=Carbon::createFromFormat('d/m/Y', $request->filedate)->format('Y-m-d');	
                $resultsave = new Document([
                    'documenttypes_id'            =>  16,
                    'filepath'                    =>  $fileName,
                    'published'                    =>  1,
                    'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                    'documentorigins_id'        =>  3,
                    'entitle'                    =>  $request->entitle,
                    'maltitle'                    =>  $request->maltitle,
                    'enkeywords'                =>  $request->enkeyword,
                    'malkeywords'                =>  $request->malkeyword,
                    'documentcategories_id'     =>  5,
                    'size'                        =>  $imageSize,
                    'alt'                        =>  'Economic Review'

                ]);

                $resultsave->save();
                $docid = $resultsave->id;

                $resultprocess = new Documentprocessing([
                    'documents_id'            =>  $docid,
                    'currentowner'            =>  Auth::user()->id,
                    'contributor_status'    =>  1,
                    'contributor_id'        =>  Auth::user()->id,
                    'contributor_timestamp' =>  date('Y-m-d H:i:s')


                ]);

                $resultprocess->save();
                return response()->json(['success' => 'Data Added successfully.']);
            } else {
                return response()->json(['errors' => 'Already a Economic Review exists.']);
            }
        }
    }

    public function economicreviewedit(Request $request, $id)
    {
        if ($request->ajax()) {
            $resultdata = Document::find($id);
            $department = DB::table('departments')->get();
            $fielddepatment = DB::table('fielddepartments')->get();
            return response()->json(['resultdata' => $resultdata, 'department' => $department, 'fielddepartment' => $fielddepatment]);
        }
    }

    public function economicreviewupdate(Request $request)
    {
        $request->validate([


            'filename'      => 'sometimes|nullable|mimes:pdf|max:1100',
            'entitle'          => 'required|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enkeyword'        => 'sometimes|nullable|max:100|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/'

        ]);

        if ($request->ajax()) {


            $chkrows = Document::where('entitle', $request->entitle)->where('documenttypes_id', 16)->where('id', '!=', $request->hidden_id)->exists() ? 1 : 0;
            if ($chkrows == 0) {

                // $filedate=Carbon::createFromFormat('d/m/Y', $request->filedate)->format('Y-m-d');	
                if (isset($request->filename)) {
                    $date = date('dmYH:i:s');
                    /*Go*/
                    $fileName = 'economic' . $date . '.' . $request->filename->extension();
                    $request->filename->move(public_path('Economicreview'), $fileName);
                    $imageSize = $request->file('filename')->getSize();


                    $form_data = array(
                        'documenttypes_id'            =>  16,
                        'filepath'                    =>  $fileName,
                        'published'                    =>  1,
                        'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                        'documentorigins_id'        =>  3,
                        'entitle'                    =>  $request->entitle,
                        'maltitle'                    =>  $request->maltitle,
                        'enkeywords'                =>  $request->enkeyword,
                        'malkeywords'                =>  $request->malkeyword,
                        'documentcategories_id'     =>  5,
                        'size'                        =>  $imageSize,
                        'alt'                        =>  'Economic Review'
                    );
                } else {


                    $form_data = array(
                        'documenttypes_id'            =>  16,
                        'published'                    =>  1,
                        'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                        'documentorigins_id'        =>  3,
                        'entitle'                    =>  $request->entitle,
                        'maltitle'                    =>  $request->maltitle,
                        'enkeywords'                =>  $request->enkeyword,
                        'malkeywords'                =>  $request->malkeyword,
                        'documentcategories_id'     =>  5,
                        'size'                        =>  $imageSize,
                        'alt'                        =>  'Economic Review'
                    );
                }
                Document::whereId($request->hidden_id)->update($form_data);

                return response()->json(['success' => 'Data is successfully updated']);
            } else {
                return response()->json(['errors' => 'Already a Economic Review exists.']);
            }
        }
    }

    public function economicreviewdestroy(Request $request, $id)
    {
        if ($request->ajax()) {

            Documentprocessing::where('documents_id', $id)->delete();
            Document::findOrFail($id)->delete();
        }
        return response()->json(['success' => 'Data is successfully Deleted']);
    }

    public function economicreviewstatus(Request $request, $id)
    {
        if ($request->ajax()) {
            $getstatus = DB::table('documents')
                ->select('status')
                ->where('id', $id)
                ->first();

            $status = $getstatus->status;
            if ($status == 1) {
                $upd_status = array('status' => 2);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            } else {

                $upd_status = array('status' => 1);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            }
        }
    }
    /*Economic Review End*/


    /*Five Year Plan*/
    public function fiveyearplanlist(Request $request)
    {
        //$displayval=Document::all();
        $displayval = DB::table('documents')
            //->join('departments','departments.id','documents.departments_id')
            //->join('fielddepartments','fielddepartments.id','documents.fielddepartments_id')
            ->select('documents.id', 'documentnumber', 'documentdate', 'documents.entitle', 'filepath', 'documents.status')
            ->where('documenttypes_id', 17)
            //->where('users_id', $uid)
            ->get();

        return view('contributor.fiveyearplanlist', compact('displayval'));
    }
    public function fiveyearplancreate(Request $request)
    {
        if ($request->ajax()) {


            $departments     = DB::table('departments')->orderBy('id', 'asc')->get();

            return response()->json(['departments' => $departments]);
        }
    }




    public function fiveyearplanstore(Request $request)
    {


        $request->validate([

            'filename'      => 'required|mimes:pdf|max:1100',
            'entitle'          => 'required|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enkeyword'        => 'sometimes|nullable|max:100|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/'



        ]);

        if ($request->ajax()) {
            $chkrows = Document::where('entitle', $request->name)->where('documenttypes_id', 17)->exists() ? 1 : 0;
            if ($chkrows == 0) {

                $date = date('dmYH:i:s');

                /*Go*/
                $fileName = 'yearplan' . $date . '.' . $request->filename->extension();
                $request->filename->move(public_path('Fiveyearplan'), $fileName);
                $imageSize = $request->file('filename')->getSize();


                // $filedate=Carbon::createFromFormat('d/m/Y', $request->filedate)->format('Y-m-d');	
                $resultsave = new Document([
                    'documenttypes_id'            =>  17,
                    'filepath'                    =>  $fileName,
                    'published'                    =>  1,
                    'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                    'documentorigins_id'        =>  3,
                    'entitle'                    =>  $request->entitle,
                    'maltitle'                    =>  $request->maltitle,
                    'enkeywords'                =>  $request->enkeyword,
                    'malkeywords'                =>  $request->malkeyword,
                    'documentcategories_id'     =>  5,
                    'size'                        =>  $imageSize,
                    'alt'                        =>  'Five Year Plan'

                ]);

                $resultsave->save();
                $docid = $resultsave->id;

                $resultprocess = new Documentprocessing([
                    'documents_id'            =>  $docid,
                    'currentowner'            =>  Auth::user()->id,
                    'contributor_status'    =>  1,
                    'contributor_id'        =>  Auth::user()->id,
                    'contributor_timestamp' =>  date('Y-m-d H:i:s')


                ]);

                $resultprocess->save();
                return response()->json(['success' => 'Data Added successfully.']);
            } else {
                return response()->json(['errors' => 'Already a Five Year Plan exists.']);
            }
        }
    }

    public function fiveyearplanedit(Request $request, $id)
    {
        if ($request->ajax()) {
            $resultdata = Document::find($id);
            $department = DB::table('departments')->get();
            $fielddepatment = DB::table('fielddepartments')->get();
            return response()->json(['resultdata' => $resultdata, 'department' => $department, 'fielddepartment' => $fielddepatment]);
        }
    }

    public function fiveyearplanupdate(Request $request)
    {
        $request->validate([


            'filename'      => 'sometimes|nullable|mimes:pdf|max:1100',
            'entitle'          => 'required|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enkeyword'        => 'sometimes|nullable|max:100|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/'
        ]);

        if ($request->ajax()) {


            $chkrows = Document::where('entitle', $request->entitle)->where('documenttypes_id', 17)->where('id', '!=', $request->hidden_id)->exists() ? 1 : 0;
            if ($chkrows == 0) {

                // $filedate=Carbon::createFromFormat('d/m/Y', $request->filedate)->format('Y-m-d');	
                if (isset($request->filename)) {
                    $date = date('dmYH:i:s');
                    /*Go*/
                    $fileName = 'yearplan' . $date . '.' . $request->filename->extension();
                    $request->filename->move(public_path('Fiveyearplan'), $fileName);
                    $imageSize = $request->file('filename')->getSize();


                    $form_data = array(
                        'documenttypes_id'            =>  17,
                        'filepath'                    =>  $fileName,
                        'published'                    =>  1,
                        'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                        'documentorigins_id'        =>  3,
                        'entitle'                    =>  $request->entitle,
                        'maltitle'                    =>  $request->maltitle,
                        'enkeywords'                =>  $request->enkeyword,
                        'malkeywords'                =>  $request->malkeyword,
                        'documentcategories_id'     =>  5,
                        'size'                        =>  $imageSize,
                        'alt'                        =>  'Five Year Plan'
                    );
                } else {


                    $form_data = array(
                        'documenttypes_id'            =>  17,
                        'published'                    =>  1,
                        'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                        'documentorigins_id'        =>  3,
                        'entitle'                    =>  $request->entitle,
                        'maltitle'                    =>  $request->maltitle,
                        'enkeywords'                =>  $request->enkeyword,
                        'malkeywords'                =>  $request->malkeyword,
                        'documentcategories_id'     =>  5,
                        'size'                        =>  $imageSize,
                        'alt'                        =>  'Five Year Plan'
                    );
                }
                Document::whereId($request->hidden_id)->update($form_data);

                return response()->json(['success' => 'Data is successfully updated']);
            } else {
                return response()->json(['errors' => 'Already a Five Year Plan exists.']);
            }
        }
    }

    public function fiveyearplandestroy(Request $request, $id)
    {
        if ($request->ajax()) {

            Documentprocessing::where('documents_id', $id)->delete();
            Document::findOrFail($id)->delete();
        }
        return response()->json(['success' => 'Data is successfully Deleted']);
    }

    public function fiveyearplanstatus(Request $request, $id)
    {
        if ($request->ajax()) {
            $getstatus = DB::table('documents')
                ->select('status')
                ->where('id', $id)
                ->first();

            $status = $getstatus->status;
            if ($status == 1) {
                $upd_status = array('status' => 2);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            } else {

                $upd_status = array('status' => 1);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            }
        }
    }
    /*Five Year Plan End*/

    /*Right to Service*/

    public function rtsdocumentlist(Request $request)
    {
        //$displayval=Document::all();
        $displayval = DB::table('documents')
            //->join('departments','departments.id','documents.departments_id')
            //->join('fielddepartments','fielddepartments.id','documents.fielddepartments_id')
            ->select('documents.id', 'documents.entitle', 'documents.status')
            ->where('documenttypes_id', 18)
            //->where('users_id', $uid)
            ->get();

        return view('contributor.rtsdocumentlist', compact('displayval'));
    }
    public function rtsdocumentcreate(Request $request)
    {
        if ($request->ajax()) {


            $departments     = DB::table('departments')->orderBy('id', 'asc')->get();

            return response()->json(['departments' => $departments]);
        }
    }




    public function rtsdocumentstore(Request $request)
    {


        $request->validate([


            'entitle'          => 'required|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'encontent'        => 'required|max:1000',
            'malcontent'       => 'sometimes|nullable|max:1000',
            'enkeyword'        => 'sometimes|nullable|max:100|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/'


        ]);

        if ($request->ajax()) {
            $chkrows = Document::where('entitle', $request->name)->where('documenttypes_id', 17)->exists() ? 1 : 0;
            if ($chkrows == 0) {

                $en_content = $request->hid_encontent;
                $mal_content = $request->hid_malcontent;
                $encontent = clean($en_content);
                $malcontent = clean($mal_content);


                $resultsave = new Document([
                    'documenttypes_id'            =>  18,
                    'published'                    =>  1,
                    'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                    'documentorigins_id'        =>  3,
                    'entitle'                    =>  $request->entitle,
                    'maltitle'                    =>  $request->maltitle,
                    'encontent'                    =>  $encontent,
                    'malcontent'                =>  $malcontent,
                    'enkeywords'                =>  $request->enkeyword,
                    'malkeywords'                =>  $request->malkeyword,
                    'documentcategories_id'     =>  6

                ]);

                $resultsave->save();
                $docid = $resultsave->id;

                $resultprocess = new Documentprocessing([
                    'documents_id'            =>  $docid,
                    'currentowner'            =>  Auth::user()->id,
                    'contributor_status'    =>  1,
                    'contributor_id'        =>  Auth::user()->id,
                    'contributor_timestamp' =>  date('Y-m-d H:i:s')


                ]);

                $resultprocess->save();
                return response()->json(['success' => 'Data Added successfully.']);
            } else {
                return response()->json(['errors' => 'Already a Five Year Plan exists.']);
            }
        }
    }

    public function rtsdocumentedit(Request $request, $id)
    {
        if ($request->ajax()) {
            $resultdata = Document::find($id);
            $department = DB::table('departments')->get();
            $fielddepatment = DB::table('fielddepartments')->get();
            return response()->json(['resultdata' => $resultdata, 'department' => $department, 'fielddepartment' => $fielddepatment]);
        }
    }

    public function rtsdocumentupdate(Request $request)
    {
        $request->validate([



            'entitle'          => 'required|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'encontent'        => 'required|max:1000',
            'malcontent'       => 'sometimes|nullable|max:1000',
            'entitle'          => 'required|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enkeyword'        => 'sometimes|nullable|max:100|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/'

        ]);

        if ($request->ajax()) {


            $chkrows = Document::where('entitle', $request->entitle)->where('documenttypes_id', 18)->where('id', '!=', $request->hidden_id)->exists() ? 1 : 0;
            if ($chkrows == 0) {

                // $filedate=Carbon::createFromFormat('d/m/Y', $request->filedate)->format('Y-m-d');	

                $en_content = $request->hid_encontent;
                $mal_content = $request->hid_malcontent;
                $encontent = clean($en_content);
                $malcontent = clean($mal_content);

                $form_data = array(
                    'documenttypes_id'            =>  18,
                    'published'                    =>  1,
                    'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                    'documentorigins_id'        =>  3,
                    'entitle'                    =>  $request->entitle,
                    'maltitle'                    =>  $request->maltitle,
                    'encontent'                    =>  $encontent,
                    'malcontent'                =>  $malcontent,
                    'enkeywords'                =>  $request->enkeyword,
                    'malkeywords'                =>  $request->malkeyword,
                    'documentcategories_id'     =>  6

                );


                Document::whereId($request->hidden_id)->update($form_data);

                return response()->json(['success' => 'Data is successfully updated']);
            } else {
                return response()->json(['errors' => 'Already a Five Year Plan exists.']);
            }
        }
    }

    public function rtsdocumentdestroy(Request $request, $id)
    {
        if ($request->ajax()) {

            Documentprocessing::where('documents_id', $id)->delete();
            Document::findOrFail($id)->delete();
        }
        return response()->json(['success' => 'Data is successfully Deleted']);
    }

    public function rtsdocumentstatus(Request $request, $id)
    {
        if ($request->ajax()) {
            $getstatus = DB::table('documents')
                ->select('status')
                ->where('id', $id)
                ->first();

            $status = $getstatus->status;
            if ($status == 1) {
                $upd_status = array('status' => 2);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            } else {

                $upd_status = array('status' => 1);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            }
        }
    }
    /*Right to Service End*/


    // Written By: Meeramol ES
    // Start Date : 30/07/2021



    /* Advertisement */

    public function advertisementlist(Request $request)
    {
        //$displayval=Document::all();
        $displayval = DB::table('documents')
            ->join('departments', 'departments.id', 'documents.departments_id')
            ->join('fielddepartments', 'fielddepartments.id', 'documents.fielddepartments_id')
            ->select('documents.id', 'documentnumber', 'documentdate', 'documents.entitle', 'departments.entitle as deptname', 'fielddepartments.name as fieldname', 'filepath', 'documents.status')
            ->where('documenttypes_id', 2)
            //->where('users_id', $uid)
            ->get();

        return view('contributor.advertisementlist', compact('displayval'));
    }
    public function advertisementcreate(Request $request)
    {
        if ($request->ajax()) {


            $departments     = DB::table('departments')->orderBy('id', 'asc')->get();

            return response()->json(['departments' => $departments]);
        }
    }

    public function advertisementstore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'filedate'         => 'required|date|before:now|date_format:Y-m-d|after:1956-12-31',
            'filename'      => 'required|mimes:pdf|max:1100',
            'departments_id'  => 'required',
            'fielddepartments_id'   => 'sometimes|nullable',
            'entitle'          => 'required|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enkeyword'        => 'sometimes|nullable|max:100|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->first()]);
        } else {
            if ($request->ajax()) {
                $chkrows = Document::where('entitle', $request->name)->where('documenttypes_id', 2)->exists() ? 1 : 0;
                if ($chkrows == 0) {
                    $date = date('dmYH:i:s');

                    /*Go*/
                    $fileName = 'advertisement' . $date . '.' . $request->filename->extension();
                    $request->filename->move(public_path('Advertisement'), $fileName);
                    $imageSize = $request->file('filename')->getSize();

                    $filedate = Carbon::parse($request->filedate)->format('Y-m-d');
                    $resultsave = new Document([
                        'documenttypes_id'          =>  2,
                        'documentdate'              =>  $filedate,
                        'filepath'                  =>  $fileName,
                        'departments_id'            =>  $request->departments_id,
                        'fielddepartments_id'       =>  $request->fielddepartments_id,
                        'published'                 =>  1,
                        'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                        'documentorigins_id'        =>  3,
                        'entitle'                   =>  $request->entitle,
                        'maltitle'                  =>  $request->maltitle,
                        'enkeywords'                =>  $request->enkeyword,
                        'malkeywords'               =>  $request->malkeyword,
                        'documentcategories_id'     =>  1,
                        'size'                      =>  $imageSize,
                        'alt'                       =>  'Advertisement'

                    ]);

                    $resultsave->save();
                    $docid = $resultsave->id;

                    $resultprocess = new Documentprocessing([
                        'documents_id'          =>  $docid,
                        'currentowner'          =>  Auth::user()->id,
                        'contributor_status'    =>  1,
                        'contributor_id'        =>  Auth::user()->id,
                        'contributor_timestamp' =>  date('Y-m-d H:i:s')
                    ]);

                    $resultprocess->save();
                    return response()->json(['success' => 'Data Added successfully.']);
                } else {
                    return response()->json(['errors' => 'Already a advertisement  exists.']);
                }
            }
        }
    }

    public function advertisementedit(Request $request, $id)
    {
        if ($request->ajax()) {
            $resultdata = Document::find($id);
            $department = DB::table('departments')->get();
            $fielddepatment = DB::table('fielddepartments')->get();
            return response()->json(['resultdata' => $resultdata, 'department' => $department, 'fielddepartment' => $fielddepatment]);
        }
    }

    public function advertisementupdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'filedate'         => 'required|date|before:now|date_format:Y-m-d|after:1956-12-31',
            'filename'      => 'sometimes|nullable|mimes:pdf|max:1100',
            'departments_id'  => 'required',
            'fielddepartments_id'   => 'sometimes|nullable',
            'entitle'          => 'required|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enkeyword'        => 'sometimes|nullable|max:100|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->first()]);
        } else {
            if ($request->ajax()) {
                $chkrows = Document::where('entitle', $request->entitle)->where('documenttypes_id', 2)->where('id', '!=', $request->hidden_id)->exists() ? 1 : 0;
                if ($chkrows == 0) {

                    $filedate = Carbon::parse($request->filedate)->format('Y-m-d');
                    if (isset($request->filename)) {
                        $date = date('dmYH:i:s');
                        /*Go*/
                        $fileName = 'advertisement' . $date . '.' . $request->filename->extension();
                        $request->filename->move(public_path('Advertisement'), $fileName);
                        $imageSize = $request->file('filename')->getSize();

                        $form_data = array(
                            'documenttypes_id'         =>  2,
                            'documentdate'              =>  $filedate,
                            'filepath'                  =>  $fileName,
                            'departments_id'            =>  $request->departments_id,
                            'fielddepartments_id'       =>  $request->fielddepartments_id,
                            'published'                 =>  1,
                            'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                            'documentorigins_id'        =>  3,
                            'entitle'                   =>  $request->entitle,
                            'maltitle'                  =>  $request->maltitle,
                            'enkeywords'                =>  $request->enkeyword,
                            'malkeywords'               =>  $request->malkeyword,
                            'documentcategories_id'     =>  1,
                            'size'                      =>  $imageSize,
                            'alt'                       =>  'Guidelines'
                        );
                    } else {
                        $form_data = array(
                            'documenttypes_id'          =>  2,
                            'documentdate'              =>  $filedate,
                            'departments_id'            =>  $request->departments_id,
                            'fielddepartments_id'       =>  $request->fielddepartments_id,
                            'published'                 =>  1,
                            'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                            'documentorigins_id'        =>  3,
                            'entitle'                   =>  $request->entitle,
                            'maltitle'                  =>  $request->maltitle,
                            'enkeywords'                =>  $request->enkeyword,
                            'malkeywords'               =>  $request->malkeyword,
                            'documentcategories_id'     =>  1,
                            'alt'                       =>  'Advertisement'
                        );
                    }
                    Document::whereId($request->hidden_id)->update($form_data);

                    return response()->json(['success' => 'Data is successfully updated']);
                } else {
                    return response()->json(['errors' => 'Already a advertisement exists.']);
                }
            }
        }
    }

    public function advertisementdestroy(Request $request, $id)
    {
        if ($request->ajax()) {
            Documentprocessing::where('documents_id', $id)->delete();
            Document::findOrFail($id)->delete();
        }
        return response()->json(['success' => 'Data is successfully Deleted']);
    }

    public function advertisementstatus(Request $request, $id)
    {
        if ($request->ajax()) {
            $getstatus = DB::table('documents')
                ->select('status')
                ->where('id', $id)
                ->first();

            $status = $getstatus->status;
            if ($status == 1) {
                $upd_status = array('status' => 2);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            } else {
                $upd_status = array('status' => 1);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            }
        }
    }
    /*Advertisement End*/


    /* Announcement */

    public function announcementlist(Request $request)
    {
        //$displayval=Document::all();
        $displayval = DB::table('documents')
            ->join('departments', 'departments.id', 'documents.departments_id')
            ->join('fielddepartments', 'fielddepartments.id', 'documents.fielddepartments_id')
            ->select('documents.id', 'documentnumber', 'documentdate', 'documents.entitle', 'departments.entitle as deptname', 'fielddepartments.name as fieldname', 'filepath', 'documents.status')
            ->where('documenttypes_id', 1)
            //->where('users_id', $uid)
            ->get();

        return view('contributor.announcementlist', compact('displayval'));
    }
    public function announcementcreate(Request $request)
    {
        if ($request->ajax()) {


            $departments     = DB::table('departments')->orderBy('id', 'asc')->get();

            return response()->json(['departments' => $departments]);
        }
    }

    public function announcementstore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'filedate'         => 'required|date|before:now|date_format:Y-m-d|after:1956-12-31',
            'filename'      => 'required|mimes:pdf|max:1100',
            'departments_id'  => 'required',
            'fielddepartments_id'   => 'sometimes|nullable',
            'entitle'          => 'required|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enkeyword'        => 'sometimes|nullable|max:100|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->first()]);
        } else {
            if ($request->ajax()) {
                $chkrows = Document::where('entitle', $request->name)->where('documenttypes_id', 1)->exists() ? 1 : 0;
                if ($chkrows == 0) {
                    $date = date('dmYH:i:s');

                    /*Go*/
                    $fileName = 'announcement' . $date . '.' . $request->filename->extension();
                    $request->filename->move(public_path('Announcement'), $fileName);
                    $imageSize = $request->file('filename')->getSize();

                    $filedate = Carbon::parse($request->filedate)->format('Y-m-d');
                    $resultsave = new Document([
                        'documenttypes_id'          =>  1,
                        'documentdate'              =>  $filedate,
                        'filepath'                  =>  $fileName,
                        'departments_id'            =>  $request->departments_id,
                        'fielddepartments_id'       =>  $request->fielddepartments_id,
                        'published'                 =>  1,
                        'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                        'documentorigins_id'        =>  3,
                        'entitle'                   =>  $request->entitle,
                        'maltitle'                  =>  $request->maltitle,
                        'enkeywords'                =>  $request->enkeyword,
                        'malkeywords'               =>  $request->malkeyword,
                        'documentcategories_id'     =>  1,
                        'size'                      =>  $imageSize,
                        'alt'                       =>  'Announcement'

                    ]);

                    $resultsave->save();
                    $docid = $resultsave->id;

                    $resultprocess = new Documentprocessing([
                        'documents_id'          =>  $docid,
                        'currentowner'          =>  Auth::user()->id,
                        'contributor_status'    =>  1,
                        'contributor_id'        =>  Auth::user()->id,
                        'contributor_timestamp' =>  date('Y-m-d H:i:s')
                    ]);

                    $resultprocess->save();
                    return response()->json(['success' => 'Data Added successfully.']);
                } else {
                    return response()->json(['errors' => 'Already a announcement  exists.']);
                }
            }
        }
    }

    public function announcementedit(Request $request, $id)
    {
        if ($request->ajax()) {
            $resultdata = Document::find($id);
            $department = DB::table('departments')->get();
            $fielddepatment = DB::table('fielddepartments')->get();
            return response()->json(['resultdata' => $resultdata, 'department' => $department, 'fielddepartment' => $fielddepatment]);
        }
    }

    public function announcementupdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'filedate'         => 'required|date|before:now|date_format:Y-m-d|after:1956-12-31',
            'filename'      => 'sometimes|nullable|mimes:pdf|max:1100',
            'departments_id'  => 'required',
            'fielddepartments_id'   => 'sometimes|nullable',
            'entitle'          => 'required|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enkeyword'        => 'sometimes|nullable|max:100|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->first()]);
        } else {
            if ($request->ajax()) {
                $chkrows = Document::where('entitle', $request->entitle)->where('documenttypes_id', 1)->where('id', '!=', $request->hidden_id)->exists() ? 1 : 0;
                if ($chkrows == 0) {

                    $filedate = Carbon::parse($request->filedate)->format('Y-m-d');
                    if (isset($request->filename)) {
                        $date = date('dmYH:i:s');
                        /*Go*/
                        $fileName = 'announcement' . $date . '.' . $request->filename->extension();
                        $request->filename->move(public_path('Announcement'), $fileName);
                        $imageSize = $request->file('filename')->getSize();

                        $form_data = array(
                            'documenttypes_id'         =>  1,
                            'documentdate'              =>  $filedate,
                            'filepath'                  =>  $fileName,
                            'departments_id'            =>  $request->departments_id,
                            'fielddepartments_id'       =>  $request->fielddepartments_id,
                            'published'                 =>  1,
                            'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                            'documentorigins_id'        =>  3,
                            'entitle'                   =>  $request->entitle,
                            'maltitle'                  =>  $request->maltitle,
                            'enkeywords'                =>  $request->enkeyword,
                            'malkeywords'               =>  $request->malkeyword,
                            'documentcategories_id'     =>  1,
                            'size'                      =>  $imageSize,
                            'alt'                       =>  'Announcement'
                        );
                    } else {
                        $form_data = array(
                            'documenttypes_id'          =>  1,
                            'documentdate'              =>  $filedate,
                            'departments_id'            =>  $request->departments_id,
                            'fielddepartments_id'       =>  $request->fielddepartments_id,
                            'published'                 =>  1,
                            'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                            'documentorigins_id'        =>  3,
                            'entitle'                   =>  $request->entitle,
                            'maltitle'                  =>  $request->maltitle,
                            'enkeywords'                =>  $request->enkeyword,
                            'malkeywords'               =>  $request->malkeyword,
                            'documentcategories_id'     =>  1,
                            'alt'                       =>  'Announcement'
                        );
                    }
                    Document::whereId($request->hidden_id)->update($form_data);

                    return response()->json(['success' => 'Data is successfully updated']);
                } else {
                    return response()->json(['errors' => 'Already a announcement exists.']);
                }
            }
        }
    }

    public function announcementdestroy(Request $request, $id)
    {
        if ($request->ajax()) {
            Documentprocessing::where('documents_id', $id)->delete();
            Document::findOrFail($id)->delete();
        }
        return response()->json(['success' => 'Data is successfully Deleted']);
    }

    public function announcementstatus(Request $request, $id)
    {
        if ($request->ajax()) {
            $getstatus = DB::table('documents')
                ->select('status')
                ->where('id', $id)
                ->first();

            $status = $getstatus->status;
            if ($status == 1) {
                $upd_status = array('status' => 2);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            } else {
                $upd_status = array('status' => 1);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            }
        }
    }
    /*Announcement End*/


    /* Press Release */

    public function pressreleaselist(Request $request)
    {
        //$displayval=Document::all();
        $displayval = DB::table('documents')
            ->join('departments', 'departments.id', 'documents.departments_id')
            ->join('fielddepartments', 'fielddepartments.id', 'documents.fielddepartments_id')
            ->select('documents.id', 'documentnumber', 'documentdate', 'documents.entitle', 'departments.entitle as deptname', 'fielddepartments.name as fieldname', 'filepath', 'documents.status')
            ->where('documenttypes_id', 4)
            //->where('users_id', $uid)
            ->get();

        return view('contributor.pressreleaselist', compact('displayval'));
    }
    public function pressreleasecreate(Request $request)
    {
        if ($request->ajax()) {


            $departments     = DB::table('departments')->orderBy('id', 'asc')->get();

            return response()->json(['departments' => $departments]);
        }
    }

    public function pressreleasestore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'filedate'         => 'required|date|before:now|date_format:Y-m-d|after:1956-12-31',
            'filename'      => 'required|mimes:pdf|max:1100',
            'departments_id'  => 'required',
            'fielddepartments_id'   => 'sometimes|nullable',
            'entitle'          => 'required|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enkeyword'        => 'sometimes|nullable|max:100|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enabstract'       => 'required|max:5000',
            'malabstract'      => 'sometimes|nullable|max:10000',
            'encontent'       => 'required|max:5000',
            'malcontent'      => 'sometimes|nullable|max:10000',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->first()]);
        } else {
            if ($request->ajax()) {
                $chkrows = Document::where('entitle', $request->name)->where('documenttypes_id', 4)->exists() ? 1 : 0;
                if ($chkrows == 0) {
                    $date = date('dmYH:i:s');

                    /*Go*/
                    $fileName = 'pressrelease' . $date . '.' . $request->filename->extension();
                    $request->filename->move(public_path('Pressrelease'), $fileName);
                    $imageSize = $request->file('filename')->getSize();

                    $filedate = Carbon::parse($request->filedate)->format('Y-m-d');
                    $resultsave = new Document([
                        'documenttypes_id'          =>  4,
                        'documentdate'              =>  $filedate,
                        'filepath'                  =>  $fileName,
                        'departments_id'            =>  $request->departments_id,
                        'fielddepartments_id'       =>  $request->fielddepartments_id,
                        'published'                 =>  1,
                        'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                        'documentorigins_id'        =>  3,
                        'entitle'                   =>  $request->entitle,
                        'maltitle'                  =>  $request->maltitle,
                        'enabstract'                =>  $request->enabstract,
                        'malabstract'               =>  $request->malabstract,
                        'encontent'                 =>  $request->encontent,
                        'malcontent'                =>  $request->malcontent,
                        'enkeywords'                =>  $request->enkeyword,
                        'malkeywords'               =>  $request->malkeyword,
                        'documentcategories_id'     =>  1,
                        'size'                      =>  $imageSize,
                        'alt'                       =>  'Press Release'

                    ]);

                    $resultsave->save();
                    $docid = $resultsave->id;

                    $resultprocess = new Documentprocessing([
                        'documents_id'          =>  $docid,
                        'currentowner'          =>  Auth::user()->id,
                        'contributor_status'    =>  1,
                        'contributor_id'        =>  Auth::user()->id,
                        'contributor_timestamp' =>  date('Y-m-d H:i:s')
                    ]);

                    $resultprocess->save();
                    return response()->json(['success' => 'Data Added successfully.']);
                } else {
                    return response()->json(['errors' => 'Already a press release  exists.']);
                }
            }
        }
    }

    public function pressreleaseedit(Request $request, $id)
    {
        if ($request->ajax()) {
            $resultdata = Document::find($id);
            $department = DB::table('departments')->get();
            $fielddepatment = DB::table('fielddepartments')->get();
            return response()->json(['resultdata' => $resultdata, 'department' => $department, 'fielddepartment' => $fielddepatment]);
        }
    }

    public function pressreleaseupdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'filedate'         => 'required|date|before:now|date_format:Y-m-d|after:1956-12-31',
            'filename'      => 'sometimes|nullable|mimes:pdf|max:1100',
            'departments_id'  => 'required',
            'fielddepartments_id'   => 'sometimes|nullable',
            'entitle'          => 'required|max:100|regex:/(^[-0-9A-Za-z.\s ]+$)/',
            'maltitle'         => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enkeyword'        => 'sometimes|nullable|max:100|regex:/(^[-0-9A-Za-z.,\/()\s ]+$)/',
            'malkeyword'       => 'sometimes|nullable|max:100|regex:/(^[\P{Malayalam}_.,]+$)/',
            'enabstract'       => 'required|max:5000',
            'malabstract'      => 'sometimes|nullable|max:10000',
            'encontent'       => 'required|max:5000',
            'malcontent'      => 'sometimes|nullable|max:10000',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->first()]);
        } else {
            if ($request->ajax()) {
                $chkrows = Document::where('entitle', $request->entitle)->where('documenttypes_id', 4)->where('id', '!=', $request->hidden_id)->exists() ? 1 : 0;
                if ($chkrows == 0) {

                    $filedate = Carbon::parse($request->filedate)->format('Y-m-d');
                    if (isset($request->filename)) {
                        $date = date('dmYH:i:s');
                        /*Go*/
                        $fileName = 'pressrelease' . $date . '.' . $request->filename->extension();
                        $request->filename->move(public_path('Pressrelease'), $fileName);
                        $imageSize = $request->file('filename')->getSize();

                        $form_data = array(
                            'documenttypes_id'         =>  4,
                            'documentdate'              =>  $filedate,
                            'filepath'                  =>  $fileName,
                            'departments_id'            =>  $request->departments_id,
                            'fielddepartments_id'       =>  $request->fielddepartments_id,
                            'published'                 =>  1,
                            'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                            'documentorigins_id'        =>  3,
                            'entitle'                   =>  $request->entitle,
                            'maltitle'                  =>  $request->maltitle,
                            'enabstract'                =>  $request->enabstract,
                            'malabstract'               =>  $request->malabstract,
                            'encontent'                 =>  $request->encontent,
                            'malcontent'                =>  $request->malcontent,
                            'enkeywords'                =>  $request->enkeyword,
                            'malkeywords'               =>  $request->malkeyword,
                            'documentcategories_id'     =>  1,
                            'size'                      =>  $imageSize,
                            'alt'                       =>  'Press Release'
                        );
                    } else {
                        $form_data = array(
                            'documenttypes_id'          =>  4,
                            'documentdate'              =>  $filedate,
                            'departments_id'            =>  $request->departments_id,
                            'fielddepartments_id'       =>  $request->fielddepartments_id,
                            'published'                 =>  1,
                            'publishedtimestamp'        =>  date('Y-m-d H:i:s'),
                            'documentorigins_id'        =>  3,
                            'entitle'                   =>  $request->entitle,
                            'maltitle'                  =>  $request->maltitle,
                            'enabstract'                =>  $request->enabstract,
                            'malabstract'               =>  $request->malabstract,
                            'encontent'                 =>  $request->encontent,
                            'malcontent'                =>  $request->malcontent,
                            'enkeywords'                =>  $request->enkeyword,
                            'malkeywords'               =>  $request->malkeyword,
                            'documentcategories_id'     =>  1,
                            'alt'                       =>  'Press Release'
                        );
                    }
                    Document::whereId($request->hidden_id)->update($form_data);

                    return response()->json(['success' => 'Data is successfully updated']);
                } else {
                    return response()->json(['errors' => 'Already a press release exists.']);
                }
            }
        }
    }

    public function pressreleasedestroy(Request $request, $id)
    {
        if ($request->ajax()) {
            Documentprocessing::where('documents_id', $id)->delete();
            Document::findOrFail($id)->delete();
        }
        return response()->json(['success' => 'Data is successfully Deleted']);
    }

    public function pressreleasestatus(Request $request, $id)
    {
        if ($request->ajax()) {
            $getstatus = DB::table('documents')
                ->select('status')
                ->where('id', $id)
                ->first();

            $status = $getstatus->status;
            if ($status == 1) {
                $upd_status = array('status' => 2);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            } else {
                $upd_status = array('status' => 1);
                DB::table('documents')->where('id', $id)->update($upd_status);
                return response()->json(['success' => 'Data Updated successfully.']);
            }
        }
    }
    /*Press Release End*/
















    /*Controller end*/
}
