<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Document extends Model  implements Searchable
{


	    protected $fillable = ['documenttypes_id','documentnumber','originaldocnumber','documentdate','filepath','departments_id','fielddepartments_id','referencedoc','referencefile','published','publishedtimestamp','incomingtimestamp','documentorigins_id','stories','entitle','maltitle','enabstract','malabstract','encontent','malcontent','enkeywords','malkeywords','documentcategories_id','poster','size','alt','quotationtype','iconclass','status'
    ];



    public function getSearchResult(): SearchResult
    {

    	$url = route('documentshow', Crypt::encrypt($this->id));
    	
            return new SearchResult(
            $this,
            $this->encontent,
            $url
         );
    }
}
