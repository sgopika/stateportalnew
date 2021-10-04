<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class RegexvaluesglobController extends Controller
{
    public $entitlereg;
    public function __construct()
    {

        $this->middleware('auth')->except('appdepartmentstore', 'appdepartmentupdate');
    }
    public function getEntitlereg()
    {
        $entitlereg = 'required|min:3|max:500';
        return $entitlereg;
    }
    public function getMaltitlereg()
    {
        $maltitlereg = 'required|min:3|max:1000';
        return $maltitlereg;
    }
    public function getSumtitlereg()
    {
         // $str='[#$^]';
       $summernotereg = 'required|min:3|max:300000';
        //|not_regex:/' . '[#$^]' . '/'
        return $summernotereg;
    }
    public function getEnSumtitlereg()
    {
       // $str='[#$^]';
        $summernotereg = 'required|min:3|max:300000';
      //  |not_regex:/' . '[#$^]' . '/'
        return $summernotereg;
    }
    public function getMalSumtitlereg()
    {
       // $str='[#$^]';
        $summernotereg = 'required|min:3|max:300000';
      //  |not_regex:/' . '[#$^]' . '/'
        return $summernotereg;
    }
    public function getNumsizedurareg()
    {
        $sizedurareg = 'required|min:3|max:10';
        return $sizedurareg;
    }
    public function getFilenumreg()
    {
        $sizedurareg = 'required|min:3|max:10';
        return $sizedurareg;
    }
    public function getUrlreg()
    {
        $urlreg = 'sometimes|nullable|regex:/' . '^(http[s]?:\\/\\/(www\\.)?|ftp:\\/\\/(www\\.)?|www\\.){1}([0-9A-Za-z-\\.@:%_\+~#=]+)+((\\.[a-zA-Z]{2,3})+)(/(.)*)?(\\?(.)*)?' . '/';
        return $urlreg;
    }

}