<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Districtpgm extends Model implements Searchable
{
    protected $fillable = [
        'file','poster','alt','entitle','maltitle','ensubtitle','malsubtitle','enbrief','malbrief','encontent','malcontent','homepagestatus','users_id','districts_id'	
    ];


     public function getSearchResult(): SearchResult
    {
        $url = route('articledetailview', Crypt::encrypt($this->id));

        return new SearchResult(
            $this,
            $this->encontent,
            $url
         );
    }
}
