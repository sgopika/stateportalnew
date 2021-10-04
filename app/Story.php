<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;


class Story extends Model implements Searchable
{
   protected $fillable = [
    'documents_id', 'storycategories_id','entitle', 'maltitle', 'encontent', 'malcontent','published','status','users_id'
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
