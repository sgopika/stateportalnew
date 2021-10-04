<?xml version="1.0" encoding="UTF-8"?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
   

 @foreach($stories as $res) 
    
    <url>

       <loc>{{ $res->entitle }}</loc>

       <lastmod>{{ Carbon\Carbon::parse($res->updated_at)->format('d-m-Y') }}</lastmod>
                 
     <a class="dropdown-item text-white" href="{{url('articledetailview',Crypt::encrypt($res->id)) }}"><loc>{{ $res->entitle }}</loc></a>
                         
    </url>
@endforeach

    
   
   
</urlset>