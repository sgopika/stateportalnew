
@extends('layouts.basefront')
@section('content')

<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">{{ $maintitle }}</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <!-- <li><a href="index.php"><i class="lni lni-home"></i> Home</a></li>
                    <li><a href="#">About Kerala</a></li>
                    <li>State</li> -->
                      <li><a href="{{ url('/') }}"><i class="lni lni-angle-double-left"></i> Back</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>




<!--contents starts here-->
<section class="section blog-single">
    <div class="container">
        <div class="row">
            <aside class="col-lg-3 col-md-12 col-12">
                <div class="sidebar blog-grid-page">
                    <div class="widget categories-widget">
                        
                        <ul class="custom">
                            @if($related_depts)
                                @foreach($related_depts as $item)
                                <li><a href="{{url('departmentdetail',$item['deptencid']) }}"><i class="lni lni-checkmark-circle"></i> {{$item['title']}}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </aside>

            <div class="col-lg-6 col-md-12 col-12">
                <div class="single-inner">
                    <div class="post-details">
                        <div class="main-content-head">
                            <!-- <div class="post-thumbnils">
                                <img src="assets/images/img/tvpm_map.png" />
                            </div> -->

                            <div class="meta-information">
                                <h6 class="post-title">@if($main_content) {{$main_content->title}} @endif</h6>
                            </div>

                            <div class="detail-inner" id="main_content_div">
                                <p>@if($main_content){!!$main_content->about!!} @endif</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <aside class="col-lg-3 col-md-12 col-12">
                <div class="sidebar blog-grid-page">
                    <div class="widget categories-widget" id="dpt_side_menu_list">
                      
                        @if($main_content)
                            @foreach($labels as $sidemenus)
                              
                                <div class="inner deparment_side_menu" id="{{$main_content->id}}" data-type="{{$sidemenus['id']}}" style="cursor: pointer;">
                                    @if($sidemenus['id'] == 'about')
                                        <i class="fas fa-dot-circle text-primary"></i>&nbsp;&nbsp; <span class="text-primary">{{$sidemenus['name']}} </span>
                                    @else
                                        <i class="far fa-dot-circle"></i>&nbsp;&nbsp; <span>{{$sidemenus['name']}} </span>
                                    @endif
                                        
                                </div>
                            @endforeach
                        @endif

                        @if($app_sections)

                            @foreach($app_sections as $side_section)
                              
                                <div class="inner app_section_side_menu" id="{{$side_section->id}}" style="cursor: pointer;">

                                    <i class="far fa-dot-circle"></i>&nbsp;&nbsp; <span>{{$side_section->sectionname}} </span>
                                        
                                </div>
                            @endforeach

                        @endif

                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>

@endsection

@section('customscripts')
<script>

$(document).on("click", '.deparment_side_menu', function(event) { 
    var id = $(this).attr('id');
    var type = $(this).attr('data-type');
    $.ajax({
        url :"/appdepartmentcontent/"+id+'/'+type,
        dataType:"json",
        success:function(result)
        {
           $('#main_content_div').empty();

           $('#main_content_div').append('<p>'+result.content+'</p>');

           var html = '';

           $.each(result.labels, function (i) {
           
                html +=  '<div class="inner deparment_side_menu" id="'+result.id+'" data-type="'+result.labels[i].id+'" style="cursor: pointer;">';

                if(result.labels[i].id == type){
                    html += '<i class="fas fa-dot-circle text-primary"></i>&nbsp;&nbsp; <span class="text-primary">'+result.labels[i].name+' </span>';
                }
                else{
                    html += '<i class="fas fa-dot-circle"></i>&nbsp;&nbsp; <span>'+result.labels[i].name+' </span>';
                }

                html += ' </div>';
           });

           if(result.app_sections){
             $.each(result.app_sections, function (i) {

                html +=  '<div class="inner app_section_side_menu" id="'+result.app_sections[i].id+'"  style="cursor: pointer;">';

                
                html += '<i class="fas fa-dot-circle"></i>&nbsp;&nbsp; <span>'+result.app_sections[i].sectionname+' </span>';
                

                html += ' </div>';
             });
           }

            $('#dpt_side_menu_list').empty();
            $('#dpt_side_menu_list').append(html);
        }
    });
});

$(document).on("click", '.app_section_side_menu', function(event) { 
    var id = $(this).attr('id');
    
    $.ajax({
        url :"/appsectioncontent/"+id,
        dataType:"json",
        success:function(result)
        {
           $('#main_content_div').empty();

           $('#main_content_div').append('<p>'+result.content+'</p>');

           var html = '';

           $.each(result.labels, function (i) {
           
                html +=  '<div class="inner deparment_side_menu" id="'+result.id+'" data-type="'+result.labels[i].id+'" style="cursor: pointer;">';
                html += '<i class="fas fa-dot-circle"></i>&nbsp;&nbsp; <span>'+result.labels[i].name+' </span>';
                html += ' </div>';
           });

           if(result.app_sections){
             $.each(result.app_sections, function (i) {

                html +=  '<div class="inner app_section_side_menu" id="'+result.app_sections[i].id+'"  style="cursor: pointer;">';
                if(result.content_id == result.app_sections[i].id){

                    html += '<i class="fas fa-dot-circle text-primary"></i>&nbsp;&nbsp; <span class="text-primary">'+result.app_sections[i].sectionname+' </span>';

                }else{
                    
                    html += '<i class="fas fa-dot-circle"></i>&nbsp;&nbsp; <span>'+result.app_sections[i].sectionname+' </span>';
                }
                
                html += ' </div>';
             });
           }

            $('#dpt_side_menu_list').empty();
            $('#dpt_side_menu_list').append(html);
        }
    });
});

</script>    
@endsection