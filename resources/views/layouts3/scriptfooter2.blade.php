<style>
#longalbrief{
  display:block;
 
  text-align:justify;
}
#myBtn{
  color: #0906ce;
    border-radius: 20px;
    font-weight: 600;
  margin-top: 2px;
  padding: 6px 19px;
}
#shortalcontent{
  text-align:justify;
}
.recnt{
  margin-top:-14.5rem!important;
}
.rcntbtm{
  margin-bottom:.25rem!important;
}
.articletitles{
  border-bottom:1px solid #c7c7c7;
  font-weight:300px;
}
</style>
<script>
    
    $( document ).ready(function() {
var acturlsubdetail='';
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    
      
      $('#livemodal').on('hidden.bs.modal', function(e) {
        // alert("sdsf "+$("#livemodal video-js").attr('src'));
        
        $("#livemodal video-js").attr('src', $("#livemodal video-js").attr('src'));
         
        
      })

      

      $( "#sitemode" ).click(function() {
         var maincolor = $('#portal-color').attr('href');
         var maincolorclass = (maincolor.slice(maincolor.length - 8));
         if(maincolorclass == 'dark.css')
         {
            $( "#portal-color" ).attr("href", "assets/css/portal-light.css");
            $( "#portal-animate" ).attr("href", "assets/css/portal-animate-light.css");
         }
         else
         {
            $( "#portal-color" ).attr("href", "assets/css/portal-dark.css");
            $( "#portal-animate" ).attr("href", "assets/css/portal-animate-dark.css");
        }
      });

      $("#fontincrement").click(function() {
        $("div").children().each(function() {
          var size = parseInt($(this).css("font-size"));
          size = size + 1 + "px";
          $(this).css({
            'font-size': size
          });
        });
      });

      $("#fontdecrement").click(function() {
        $("div").children().each(function() {
          var size = parseInt($(this).css("font-size"));
          size = size - 1 + "px";
          $(this).css({
            'font-size': size
          });
        });
      });

      $("#fontreset").click(function() {
         location.reload();
      });

     
	  
	  $("#shortalertcol").hide();
	  $("#longalertcolumn").hide();
	  $("#readmorelong").hide();
    $("#readmoredeptrow").hide();
    
      //on page load
      $.ajax({
          url :"/setvalueshomepage",
          dataType:"json",
          success:function(data)
          { 
        
            $("#bilval").val(data.sessionbil);
            // console.log(data.mainmenu)

            $("#deptimg1").attr('src',"{{asset('Departmentuser')}}/"+data.deptintro.file1);
            $("#deptuser1").html(data.deptintro.user1); 
            $("#deptdesg1").html(data.deptintro.desg1);
            $("#deptimg2").attr('src',"{{asset('Departmentuser')}}/"+data.deptintro.file2); 
            $("#deptuser2").html(data.deptintro.user2); 
            $("#deptdesg2").html(data.deptintro.desg2); 
            $("#depttitle").html(data.deptintro.title); 
            $("#deptbrief").html(data.deptintro.brief);
            $.ajax({
              url :"/setvaluesencrypt/"+data.deptintro.id,
              dataType:"json",
              success:function(datas1)
              {
                $("#deptreadmore").append('<a href="deptintrodetail/'+datas1.encid+'"><button class="btn btn-sm btn-flat readmorebtn" id="readmoredept"><i class="fas fa-angle-double-right"></i>&nbsp;Read More</button></a>');
              }
            }); 

            if(data.logo!=null){
            $("#logoimg").attr('src',"{{asset('Logo')}}/"+data.logo.file);
            }
			      $("#maintitle").html(data.title.title); 
            $("#subtitle").html(data.title.subtitle); 

              html= '';
              var sub_menu_len = '';
               
            $.each( data.mainmenu, function(i) {
              id = data.mainmenu[i].id;
              mainencid = data.mainmenu[i].mainencid;
              if(data.mainmenu[i].menulinktypes_id==6){
                  html+= '<li class="nav-item dropdown pl-4 pl-md-0 ml-0 ml-md-4 active submenus'+data.mainmenu[i].id+'" id="'+data.mainmenu[i].id+'"><a class="nav-link dropdown-toggle py-2 px-2 mainsublist" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id="'+data.mainmenu[i].id+'" title="'+data.mainmenu[i].tooltip+'">'+data.mainmenu[i].title+'</a>';
                  html += ' <div class="dropdown-menu kg-ii-font" aria-labelledby="about-dropdown"><div class="row align-items-start" style="width:100%;">';
                  if(data.mainmenu[i].sub_menus != ''){
                    sub_menu_len = data.mainmenu[i].sub_menus.length;
                    var count=0;
                   
                      $.each( data.mainmenu[i].sub_menus, function(index,subMenuValue) {
                        var encsubid = '';
                        subid = subMenuValue.id;
                        encsubid = subMenuValue.encsubid;
                     
                         if(count %4 == 0){
                          html += '<div class="col-sm-6 col-md-3"><ul class="list-unstyled">';
                        }
                        if(subMenuValue.maintitle=='Departments'){
                            acturl = "{{url('deptdetails') }}";       
                            html +='<li><a class="dropdown-item " style="width: 110% !important;" href="'+ acturl +'">'+subMenuValue.title+'</a></li>';
                        } else if(subMenuValue.menulinktypes_id==4 ){
                          acturlsubdetail = "{{url('subdetail') }}" + '/' + encsubid + '/' + mainencid;
                            html +='<li><a class="dropdown-item" style="width: 110% !important;" href="'+ acturlsubdetail +'">'+subMenuValue.title+'</a></li>';
                        } else if(subMenuValue.menulinktypes_id==2 ){
                            acturl = subMenuValue.file ;
                            html +='<li><a class="dropdown-item " style="width: 110% !important;" target="_blank" data-toggle="tooltip" data-placement="top" title="'+data.toolmsg+'" href="'+ acturl +'">'+subMenuValue.title+'</a></li>';

                        } else if(subMenuValue.menulinktypes_id==5 ){
                            acturl = subMenuValue.file ;
                            html +='<li><a class="dropdown-item " style="width: 110% !important;" href="{{url('')}}/'+ acturl +'">'+subMenuValue.title+'</a></li>';

                        } else if(subMenuValue.menulinktypes_id==1 ){
                            acturl =subMenuValue.file ;
                            html +='<li><a class="dropdown-item " style="width: 110% !important;" href="'+ acturl +'">'+subMenuValue.title+'</a></li>';

                        } else if(subMenuValue.menulinktypes_id==3 ){
                            acturl ="{{url('Submenu')}}/"+subMenuValue.file ;
                            html +='<li><a class="dropdown-item " style="width: 110% !important;" href="'+ acturl +'">'+subMenuValue.title+'</a></li>';

                        }




                        //  html += '<li><a class="dropdown-item" style="width: 110% !important;" href="#">'+subMenuValue.title+'</a></li>';
                          count ++;
                          if(count %4 == 0){
                            html += '</ul></div>';
                          } 
                      });
                    
                  }
                 
                  html += '</div> </div></li>';         
              } else if(data.mainmenu[i].menulinktypes_id==2){
                  html+= '<li class="nav-item dropdown pl-4 pl-md-0 ml-0 ml-md-4 " id="'+data.mainmenu[i].id+'"><a href="{{url('')}}/'+data.mainmenu[i].file+'" target="_blank" data-toggle="tooltip" data-placement="top" title="'+data.toolmsg+'" class="nav-link  py-2 px-2 " role="button" aria-haspopup="true" aria-expanded="false" id="'+data.mainmenu[i].id+'" title="'+data.mainmenu[i].tooltip+'">'+data.mainmenu[i].title+'</a></li>';
              } else if(data.mainmenu[i].menulinktypes_id==5){
                    html+= '<li class="nav-item dropdown pl-4 pl-md-0 ml-0 ml-md-4 " id="'+data.mainmenu[i].id+'"><a href="{{url('')}}/'+data.mainmenu[i].file+'" class="nav-link  py-2 px-2" role="button" aria-haspopup="true" aria-expanded="false" id="'+data.mainmenu[i].id+'" title="'+data.mainmenu[i].tooltip+'">'+data.mainmenu[i].title+'</a></li>';
              } else if(data.mainmenu[i].menulinktypes_id==4){
                  $.ajax({
                    url :"/setvaluesencrypt/"+data.mainmenu[i].file,
                    dataType:"json",
                    success:function(datas)
                    {
                      html+= '<li class="nav-item dropdown pl-4 pl-md-0 ml-0 ml-md-4 " id="'+data.mainmenu[i].id+'"><a href="mainarticles/'+datas.encid+'" class="nav-link  py-2 px-2 " role="button" aria-haspopup="true" aria-expanded="false" id="'+data.mainmenu[i].id+'" title="'+data.mainmenu[i].tooltip+'">'+data.mainmenu[i].title+'</a></li>';
                    }
                  });
                } else if(data.mainmenu[i].menulinktypes_id==1){
                  html+= '<li class="nav-item dropdown pl-4 pl-md-0 ml-0 ml-md-4 " id="'+data.mainmenu[i].id+'"><a href="#'+data.mainmenu[i].file+'" class="nav-link  py-2 px-2 " role="button" aria-haspopup="true" aria-expanded="false" id="'+data.mainmenu[i].id+'" title="'+data.mainmenu[i].tooltip+'">'+data.mainmenu[i].title+'</a></li>';
                } else if(data.mainmenu[i].menulinktypes_id==3){
                  html+= '<li class="nav-item dropdown pl-4 pl-md-0 ml-0 ml-md-4 " id="'+data.mainmenu[i].id+'"><a href="{{asset('Mainmenu')}}/'+data.mainmenu[i].file+'" target="_blank" class="nav-link  py-2 px-2 " role="button" aria-haspopup="true" aria-expanded="false" id="'+data.mainmenu[i].id+'" title="'+data.mainmenu[i].tooltip+'">'+data.mainmenu[i].title+'</a></li>';
                }
                else {
                  html+= '<li class="nav-item dropdown pl-4 pl-md-0 ml-0 ml-md-4"><a class="nav-link" href="#" title="'+data.mainmenu[i].tooltip+'">'+data.mainmenu[i].title+'</a></li>';
                }
            });
          //  console.log(html);
              $("#mainmenus").append(html);

      			if(data.short!=null){
      				$("#shortalertcol").show();
      				$("#shortaltitle").html(data.short.title); 
      				$("#shortalcontent").html(data.short.content); 
      				
      				
      			} else {
      				$("#shortalertcol").hide();
      				
      			}
      			$.each(data.banner, function (i) {
      				   $("#banner1").attr('src',"{{asset('Banner')}}/"+data.banner[0].file);
      				   $("#banner2").attr('src',"{{asset('Banner')}}/"+data.banner[1].file);
      				   $("#banner3").attr('src',"{{asset('Banner')}}/"+data.banner[2].file);

                 $("#bannertitle1").html(data.banner[0].title);
                 $("#bannertitle2").html(data.banner[1].title);
                 $("#bannertitle3").html(data.banner[2].title);

                 $("#bannersubtitle1").html(data.banner[0].subtitle);
                 $("#bannersubtitle2").html(data.banner[1].subtitle);
                 $("#bannersubtitle3").html(data.banner[2].subtitle);
      				   
      			});
			
      			

            if(data.media!=null){
              $("#longalertcolumn").show();
              $("#longaltitle").html(data.media.title); 
              $("#longalsubtitle").html(data.media.subtitle);
              //<p class='mt-1' id='myBtn'><a onClick='readMorealert()' class='article-readmore font-mulish-normal fw-bold kg-bg-red text-white'>Read More</a></p>
              $("#longalbrief").html(data.media.brief+"<span id='dots'>&nbsp;&nbsp;</span><span id='more' style='display:none'>"+data.media.content+" "+"</span>&nbsp;<button type='button' id='myBtn' class='btn btn-warning btn-sm text-center justify-content-center kg-iii-font font-poppins-normal text-blue kg-bg-yellow' onClick='readMorealert()'>Read More</button>");
              $("#longaltitle1").html(data.media.title); 
              $("#longalsubtitle1").html(data.media.subtitle);
              $("#longalcontent").html(data.media.content);
              $("#mediaimg").attr('src',"{{asset('Mediaalert')}}/"+data.media.file);
              
            } else {
              $("#longalertcolumn").hide();
            }

            $.each( data.statelogo, function(i) {
      
              $("#statelogos").append('<div class="col col-lg-2"><a href="'+data.statelogo[i].url+'" target="_blank"><img  class="img-fluid" src="{{asset('Logo')}}/'+data.statelogo[i].file+'"></a></div>');
              
            });

            $.each( data.indialogo, function(i) {
      
              $("#indialogos").append('<div class="col col-lg-2"><a href="'+data.indialogo[i].url+'" target="_blank"><img  class="img-fluid" src="{{asset('Logo')}}/'+data.indialogo[i].file+'"></a></div>');
              
            });

             $.ajax({
                url :"/setvaluesencrypt/"+data.newsletter.id,
                dataType:"json",
                success:function(datas5)
                {
                  $("#newslettercol").append('<a href="newsletterpreview/'+datas5.encid+'"><div class="card-body contactinfo contactdiv_one"><p class="newslettertitle text-white" id="newslettertitle">'+data.newsletter.title+'</p><img  src="{{asset('Newsletter')}}/'+data.newsletter.poster+'" class="magazineposter" id="newsletterimg" alt="owner"></div></a>');
                }
              });
           

            $("#addresstitle").html(data.address.title);
            $("#addresscontent").html(data.address.content);
            $("#addressmap").append('<iframe src="'+data.address.maplinks+'"  allowfullscreen></iframe>');

            $.each(data.socialmedia, function (i) {
              $("#socialmedia").append('<a class="btn btn-floating ps-0 footer-text" href="'+data.socialmedia[i].url+'" role="button"  target="_blank"><i class="'+data.socialmedia[i].iconclass+'"></i></a>');
            });


            $.each( data.footermenus, function(i) {
      
              $("#footermenus").append('<li class="modalwind footer-text" id="'+data.footermenus[i].id+'">'+data.footermenus[i].title+'</a></li>');
              
            });

             $.each( data.footerlinks, function(i) {
            
            $("#footerlinks").append('<li><a href="'+data.footerlinks[i].url+'" class="footer-text" target="_blank"><i class="'+data.footerlinks[i].iconclass+'"></i>&nbsp;'+data.footerlinks[i].title+'</a></li>');
            
            });

          if(data.footerlogo!=null){
            $.each( data.footerlogo, function(i) {
            
            $("#footerlogo").append('<div class="col-6 col-md-4 col-lg-6 text-start"><img  src="{{asset('Logo')}}/'+data.footerlogo[i].file+'" class="footer-logo img-fluid"></div>');
            
            });
          }
           $("#footerdiv1").html(data.footer.title);
            $("#footerdiv2").html(data.footer.subtitle);
            if(data.widget!=null){
              $.each(data.widget, function (i) {
                if(data.widget[i].menulinktypes_id==2){
                  $("#widgetrow").append('<div class="col-6 col-lg-2"><a href="'+data.widget[i].fileval+'" target="_blank"><div class="img-outer"><div style="background-image: url(./Widgetlink/'+data.widget[i].file+'");" class="img-border rounded-circle cs-img"></div><div class="img-content text-center mt-3"><h4 class="kg-vi-font font-poppins-normal">'+data.widget[i].title+'</h4><p class="font-roboto-normal kg-ii-font mx-3">'+data.widget[i].subtitle+'</p></div></div></a></div>');

                } else if(data.widget[i].menulinktypes_id==5){
                  $("#widgetrow").append('<div class="col-6 col-lg-2"><a href="'+data.widget[i].fileval+'" target="_blank"><div class="img-outer"><div style="background-image: url(./Widgetlink/'+data.widget[i].file+'");" class="img-border rounded-circle cs-img"></div><div class="img-content text-center mt-3"><h4 class="kg-vi-font font-poppins-normal">'+data.widget[i].title+'</h4><p class="font-roboto-normal kg-ii-font mx-3">'+data.widget[i].subtitle+'</p></div></div></a></div>');

                } else if(data.widget[i].menulinktypes_id==4){
                   $.ajax({
                   url :"/setvaluesencrypt/"+data.widget[i].fileval,
                   dataType:"json",
                   success:function(datas)
                   {
                      $("#widgetrow").append('<div class="col-6 col-lg-2"><a href="mainarticles/'+datas.encid+'" target="_blank"><div class="img-outer"><div style="background-image: url(./Widgetlink/'+data.widget[i].file+'");" class="img-border rounded-circle cs-img"></div><div class="img-content text-center mt-3"><h4 class="kg-vi-font font-poppins-normal">'+data.widget[i].title+'</h4><p class="font-roboto-normal kg-ii-font mx-3">'+data.widget[i].subtitle+'</p></div></div></a></div>');
                   }
                   });

                } else if(data.widget[i].menulinktypes_id==1){
                  $("#widgetrow").append('<div class="col-md-2 py-2"><a href="#'+data.widget[i].fileval+'" target="_blank"><div class="img-outer"><div style="background-image: url(./Widgetlink/'+data.widget[i].file+'");" class="img-border rounded-circle cs-img"></div><div class="img-content text-center mt-3"><h4 class="kg-vi-font font-poppins-normal">'+data.widget[i].title+'</h4><p class="font-roboto-normal kg-ii-font mx-3">'+data.widget[i].subtitle+'</p></div></div></a></div>');
                } else if(data.widget[i].menulinktypes_id==3){
                  $("#widgetrow").append('<div class="col-md-2 py-2"><a href="{{asset('Mainmenu')}}/'+data.widget[i].fileval+'" target="_blank"><div class="img-outer"><div style="background-image: url(./Widgetlink/'+data.widget[i].file+'");" class="img-border rounded-circle cs-img"></div><div class="img-content text-center mt-3"><h4 class="kg-vi-font font-poppins-normal">'+data.widget[i].title+'</h4><p class="font-roboto-normal kg-ii-font mx-3">'+data.widget[i].subtitle+'</p></div></div></a></div>');
                } else {

                }

                
               
              });
            }
			    

            
           
           
            $.each(data.gallery, function (i) {
              $.ajax({
                url :"/setvaluesencrypt/"+data.gallery[i].id,
                dataType:"json",
                success:function(datas2)
                {
                  $("#galleryrow").append('<div class="col-md-3 py-2"><a href="gallerypage/'+datas2.encid+'"><div class="card"><img  src="Gallery/'+data.gallery[i].poster+'" class="card-img-top previewcard" alt="'+data.gallery[i].alt+'"><div class="card-body previewcardbody text-center"><p class="">'+data.gallery[i].title+'</p></div></div></a></div>');
                  $("#relatedgallery").append('<li class="list-group-item  relatedarticleinner">  <a href="gallerypage/'+datas2.encid+'"><i class="fas fa-caret-right fg-darkRed"></i> &nbsp; data.gallery[i].title </a></li>');
                }
              });
               
            });

            $.each(data.activity, function (i) {
              var start = new Date(data.activity[i].startdate);
              var dd = start.getDate();
              var mm = start.getMonth()+1; //January is 0! 
              var yyyy = start.getFullYear();
              if(dd<10){dd='0'+dd};
              if(mm<10){mm='0'+mm};
              var start = dd+'-'+mm+'-'+yyyy; 
              $.ajax({
                url :"/setvaluesencrypt/"+data.activity[i].id,
                dataType:"json",
                success:function(datas3)
                {
                  var action_url = "{{url('activitydetail') }}" + '/' + datas3.encid; 

                  $("#activitylist").append('<li class="list-group-item listmainitem text-left px-5"><span class="px-2 "> <i class="fas fa-caret-right fg-darkRed"></i> &nbsp;'+data.activity[i].title+' </span><span class="lisitemaction px-2  "> <i class="fas fa-calendar-alt"></i>'+start+'&nbsp;<a href="'+action_url+'"><button class="btn btn-sm ribbed-lightRed bg-lightGreen-hover  "> <i class="fas fa-hand-point-right"></i>&nbsp;View details </button></a> </span></li>');
                }
              });
               
            });

            $.each(data.whatsnew, function (i) {
              
              $.ajax({
                url :"/setvaluesencrypt/"+data.whatsnew[i].id,
                dataType:"json",
                success:function(datas3)
                {
                 

                  $("#whatsnewlist").append('<a class="" href="#"><div class="rowGroup"><div class="table-row"><div class="table-cell news-title ps-md-3"><span class="news-headline kg-ii-font">'+data.whatsnew[i].title+'</span><br><span class="news-date kg-i-font text-white">01/01/2021</span></div><div class="table-cell pe-md-3"><span class="red-arrow text-white"><i class="fa fa-chevron-right"></i></span></div></div></div></a>');
                }
              });
               
            });

            $("#articlelatestposter").attr('src',"{{asset('Article')}}/"+data.articlelatest.poster);
            $("#articlelatesttitle").html(data.articlelatest.title); 
            $("#articlelatestauthor").html(data.articlelatest.author);
            var articlelatestdate = new Date(data.articlelatest.created_at);
            var aldd = articlelatestdate.getDate();
            var almm = articlelatestdate.getMonth()+1; //January is 0! 
            var alyyyy = articlelatestdate.getFullYear();
            if(aldd<10){aldd='0'+aldd};
            if(almm<10){almm='0'+almm};
            var articlelatestdate = aldd+'/'+almm+'/'+alyyyy; 
            $("#articlelatestdate").html(articlelatestdate);
            $("#articlelatestbrief").html(data.articlelatest.brief);
             $.ajax({
                url :"/setvaluesencrypt/"+data.articlelatest.id,
                dataType:"json",
                success:function(datas8)
                {
                  var action_url8 = "{{url('articledetail') }}" + '/' + datas8.encid;
                  $("#articlelatestreadmore").append('<a href="'+action_url8+'" class="article-readmore font-mulish-normal fw-bold kg-bg-red text-white">Read More</a>');

                }
              });
            

            $.each(data.article, function (i) {
              
              $.ajax({
                url :"/setvaluesencrypt/"+data.article[i].id,
                dataType:"json",
                success:function(datas4)
                {
                  var action_url1 = "{{url('articledetail') }}" + '/' + datas4.encid;
                  
                    $("#articlerow").append('<a href="'+action_url1+'"><p class="article-title kg-x-font head-dark fw-bold font-poppins-normal ps-3 ps-lg-0">'+data.article[i].title+'</p></a>');
                  
                }
              });
               
            });

            $('#btn-cm-live').attr('title','');
            $('#titlevd').html('');
            var video = videojs("livevideostreamdiv");
            video.src(data.livestream.url);
            $('#btn-cm-live').attr('title',data.livestream.entitle);
            $('#titlevd').html(data.livestream.entitle);
          
          }//end of success
          
      })


  



   





















	  
	  $(document).on("click", "#readmore", function(event){  
      	  $("#readmorelong").show();
		  $("#readmorelong").focus();
		  $("#readlesslong").hide();
		 
		    
    });
	
	$(document).on("click", "#readless", function(event){  
      	  $("#readmorelong").hide();
		  $("#readlesslong").show();
		  $("#readlesslong").focus();
		    
    });

    $(document).on("click", "#readmoredept", function(event){  
          $("#readmoredeptrow").show();
      $("#readmoredeptrow").focus();
      $("#readlessdeptrow").hide();
     
        
    });
  
  $(document).on("click", "#readlessdept", function(event){  
          $("#readmoredeptrow").hide();
      $("#readlessdeptrow").show();
      $("#readlessdeptrow").focus();
        
    });

  $(document).on("click", ".modalwind", function(event){
   
    var id = $(this).attr('id');  
      $.ajax({
       url :"/modalpop/"+id,
       dataType:"json",
       success:function(data)
        { 
                  
          $('#contentdiv').html(data.resultdata.content);
          $('.modal-title').text(data.resultdata.title);
          $('#transactionmodal').modal('show');
        }
      })
    
  });

 
  $( ".close1" ).click(function() {
      $('#transactionmodal').modal('hide');
        
  });

  

    $(document).on('click', '#loginchecks', function(){

    var captcha = $('#captcha').val();
    var email = $('#email').val();
    var password = $('#password').val();


    $.ajax({
        url :'/checklogin/',
        dataType:"json",
        type:"post",
        data:{captcha:captcha,email:email,password:password},
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success:function(data)
        {
            //console.log(data);
            if(data.success === false)
            {

                // console.log(data.message);
                $('#validation-errors').html('<code>Please check your credentials</code>');
                $('#name').val('');
                $('#password').val('');
                // window.setTimeout(function() {
                //     window.location.href = "registration";
                // }, 2000);

            }
            else{
                  var url = '';
                 if (data.usertype == 1) {
                    url='/admin';
                 } else if (data.usertype == 2) {
                     url='/appadmin';
                 } else if (data.usertype == 3) {
                    url='/siteadmin';
                 } else if (data.usertype == 4) {
                    
                      url='/webadmin';
                } else if (data.usertype == 5) {
                     url='/editor';
                 } else if (data.usertype == 6) {
                     url='/photoeditor';
                 } else if (data.usertype == 7) {
                     url='/moderator';
                 } else if (data.usertype == 8) {
                     url='/publisher';
                 } else if (data.usertype == 9) {
                     url='/appmanager';
                 } else if (data.usertype == 10) {
                     url='/appclient';
                 } else if (data.usertype == 12) {
                     url='/livestreaming';
                 } else if (data.usertype == 14) {
                     url='/depthead';
                 } else if (data.usertype == 15) {
                     url='/deptasst';
                 } else if (data.usertype == 16) {
                     url='/deptso';
                 } else {
                     url='logout';
                 }
                  window.location.href = url;

            }

        },
        error: function (xhr) {
            $('#validation-errors').html('');
            $.each(xhr.responseJSON.errors, function(key,value) {
            $('#validation-errors').append('<div class="alert alert-danger">'+value+'</div>');
            }); 
        }

    });
}); 

    });

    $("#pop").on("click", function() {
       $('#imagepreview').attr('src', $('#imageresource1').attr('src')); 
       $('#imagemodal').modal('show'); 
    });

    $(document).on("click", "#eng", function(event){  
      $.ajax({
       url :"/setbilingualval",
       dataType:"json",
       success:function(data)
        { 
               window.location.reload();   
          
        }
      })
    
    });
  
    $(document).on("click", "#mal", function(event){    
      $.ajax({
       url :"/setbilingualvalmal",
       dataType:"json",
       success:function(data)
        { 
             window.location.reload();    
          
        }
      })
    
    });

     
   function readMorealert(){
      var dots = document.getElementById("dots");
      var moreText = document.getElementById("more");
      var btnText = document.getElementById("myBtn");

      if (dots.style.display === "none") {
        dots.style.display = "inline";
        btnText.innerHTML = "Read more";
        moreText.style.display = "none";
      } else {
        dots.style.display = "none";
        btnText.innerHTML = "Read less";
        moreText.style.display = "inline";
      }
   }

    
</script>
<script>
$("img").on("error", function () {
  $('img').attr('onerror',"this.onerror=null;this.src='assets/img/onerror.gif';");
  
});
</script>