<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Articlemalayalam extends Model implements Searchable
{
    protected $table = 'articles';


    public function getSearchResult(): SearchResult
    {
        $url = route('articledetail', Crypt::encrypt($this->id));

        return new SearchResult(
            $this,
            $this->maltitle,
            $url
         );
    }
}
