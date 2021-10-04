<?xml version="1.0" encoding="UTF-8"?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($mainmenu as $res)
    @if($res->menulinktypes_id==6)
    <url>

       <loc>{{ $res->title }}</loc>

       <lastmod>{{ Carbon\Carbon::parse($res->updated_at)->format('d-m-Y') }}</lastmod>
       <url>  
            @foreach($submenu as $res2)
                @foreach($res2 as $res1)
                    @if($res->id==$res1->parentmenu)
                        @if($res1->title=='Departments')
                            <a class="dropdown-item text-white" href="{{url('deptdetails') }}"><loc>{{ $res1->title }}</loc></a>
                        @elseif($res1->menulinktypes_id==4)
                            <a class="dropdown-item text-white" href="{!! route('subdetail', [Crypt::encrypt($res->id),Crypt::encrypt($res1->id)]) !!}"><loc>{{ $res1->title }}</loc></a>
                        @elseif($res1->menulinktypes_id==2)
                            <a class="dropdown-item text-white" href="{!! $res1->file !!}"><loc>{{ $res1->title }}</loc></a>
                        @elseif($res1->menulinktypes_id==5)
                            <a class="dropdown-item text-white" href="{!! $res1->file !!}"><loc>{{ $res1->title }}</loc></a>
                        @elseif($res1->menulinktypes_id==1)
                            <a class="dropdown-item text-white" href="#{!! $res1->file !!}"><loc>{{ $res1->title }}</loc></a>
                        @elseif($res1->menulinktypes_id==3)
                            <a class="dropdown-item text-white" href="{!! url('Submenu/'.$res1->file) !!}"><loc>{{ $res1->title }}</loc></a>
                        @endif
                    
                    @endif
                @endforeach 
            @endforeach 
        </url>

    </url>
    @elseif($res->menulinktypes_id==2)
    <url>

       <a class="dropdown-item text-white" href="{!! $res->file !!}"><loc>{{ $res->title }}</loc></a>

       <lastmod>{{ Carbon\Carbon::parse($res->updated_at)->format('d-m-Y') }}</lastmod>
       
    </url>
    @elseif($res->menulinktypes_id==5)
    <url>

       <a class="dropdown-item text-white" href="{!! $res->file !!}"><loc>{{ $res->title }}</loc></a>

       <lastmod>{{ Carbon\Carbon::parse($res->updated_at)->format('d-m-Y') }}</lastmod>
       
    </url>

    @elseif($res->menulinktypes_id==4)
    <url>

       <a class="dropdown-item text-white" href="{!! route('mainarticles', [Crypt::encrypt($res->file)]) !!}"><loc>{{ $res->title }}</loc></a>

       <lastmod>{{ Carbon\Carbon::parse($res->updated_at)->format('d-m-Y') }}</lastmod>
       
    </url>

    @elseif($res->menulinktypes_id==1)
    <url>

       <a class="dropdown-item text-white" href="#{!! $res->file !!}"><loc>{{ $res->title }}</loc></a>

       <lastmod>{{ Carbon\Carbon::parse($res->updated_at)->format('d-m-Y') }}</lastmod>
       
    </url>

    @elseif($res->menulinktypes_id==3)
    <url>

       <a class="dropdown-item text-white" href="{!! asset('Mainmenu/'.$res->file) !!}" target="_blank"><loc>{{ $res->title }}</loc></a>

       <lastmod>{{ Carbon\Carbon::parse($res->updated_at)->format('d-m-Y') }}</lastmod>
       
    </url>

    @endif
    @endforeach
    @if($article!='')
    <url>
        <loc>Articles</loc>
        @foreach($article as $res3)
        
        <url>

           <a class="dropdown-item text-white" href="{!! route('articledetail', [Crypt::encrypt($res3->id)]) !!}"><loc>{{ $res3->title }}</loc></a>

           <lastmod>{{ Carbon\Carbon::parse($res3->updated_at)->format('d-m-Y') }}</lastmod>
          

        </url>
        
        @endforeach
    </url>
    @endif  
</urlset>