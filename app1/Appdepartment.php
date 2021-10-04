<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Appdepartment extends Model implements Searchable
{
    protected $fillable = [
        'deptcategories_id','departments_id','entitle','maltitle','enabout','malabout','enstructure','malstructure','encontact','malcontact','enrelatedlinks','malrelatedlinks','enservices','malservices','contributor_status','contributor_userid','contributor_timestamp','moderator_status', 'moderator_userid', 'moderator_timestamp', 'approve_status', 'approve_userid', 'approve_timestamp','users_id'	
    ];

    public function getSearchResult(): SearchResult
    {
        $url = route('deptdetailview', Crypt::encrypt($this->id));

        return new SearchResult(
            $this,
            $this->enabout,
            $url
         );
    }
}
