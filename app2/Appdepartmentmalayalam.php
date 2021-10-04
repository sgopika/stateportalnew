<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Appdepartmentmalayalam extends Model implements Searchable
{
    protected $table = 'appdepartments';

    public function getSearchResult(): SearchResult
    {
        $url = route('deptdetailview', Crypt::encrypt($this->id));

        return new SearchResult(
            $this,
            $this->maltitle,
            $url
         );
    }
}
