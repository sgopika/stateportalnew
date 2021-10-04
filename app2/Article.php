<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Article extends Model implements Searchable
{
    protected $fillable = [
        'poster','alt','entooltip','maltooltip','entitle','maltitle','ensubtitle','malsubtitle','enauthor','malauthor','enbrief','malbrief','encontent','malcontent','components_id','homepagestatus','extras','articlecategories_id','contributor_status','contributor_userid','contributor_timestamp','moderator_remarks','moderator_status','moderator_userid','moderator_timestamp','lock_status','approve_status','approve_userid','approve_timestamp','users_id'	
    ];

    public function getSearchResult(): SearchResult
    {
        $url = route('articledetail', Crypt::encrypt($this->id));

        return new SearchResult(
            $this,
            $this->entitle,
            $url
         );
    }
}
