<script>   
  $( document ).ready(function() {
      var acturlsubdetail='';
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      
    
      $('#livemodal').on('hidden.bs.modal', function(e) {
        
        $("#livemodal video-js").attr('src', $("#livemodal video-js").attr('src'));
         
      })
      
      $("#closelive").on("click", function () {
        videojs('livevideostreamdiv').pause();
        //$("#livemodal").modal("hide"); 

      });
    
      //on page load

      $.ajax({
          url :"/setvalueshomepage",
          dataType:"json",
          success:function(data)
          { 
            if(data.logo!=null){
              $("#logoimg").attr('src',"{{asset('Logo')}}/"+data.logo.file);
            }

             //Social Media
            $.each(data.socialmedia, function (i) {

              $("#socialmedia").append('<li><a href="'+data.socialmedia[i].url+'" data-toggle="tooltip" data-placement="top" title="'+data.socialmedia[i].tooltip+'" target="_blank" ><i class="'+data.socialmedia[i].iconclass+'"></i></a></li>');
            });

            $.each(data.socialmedia, function (i) {
              $("#footermedia1").append('<li><a href="'+data.socialmedia[i].url+'" data-toggle="tooltip" data-placement="top" title="'+data.socialmedia[i].tooltip+'" target="_blank" ><i class="'+data.socialmedia[i].iconclass+'"></i></a></li>');
            });

            if(data.footer){
              $('#footer-content').append(data.footer.title);
              $('#footer-subtitle').append(data.footer.subtitle);
            }

            //Site updated
            if(data.siteupdated!=null){
              $("#lastviewhead").append('&nbsp;&nbsp;'+data.siteupdated.titlevalues);
            }

            //Contact us 

            if(data.address){
              $('#contact_address').append(data.address.content)
              
            }
           //console.log(data.sitecontrollabels);

           $("#skipcontent").html(data.sitecontrollabels[7].title);
           $("#followus").append(data.sitecontrollabels[8].title);
           $("#dailyalertt").append(data.sitecontrollabels[9].title);
           $("#govthead").append(data.sitecontrollabels[10].title);
           $("#newshead").append(data.sitecontrollabels[11].title);
           $(".readmore").append(data.sitecontrollabels[3].title);
           $("#whatsnewhead").append(data.sitecontrollabels[6].title);
           $("#announcehead").append(data.sitecontrollabels[12].title);
           $("#sitelisthead").append(data.sitecontrollabels[13].title);
           $("#touchhead").append(data.sitecontrollabels[14].title);
           $("#mobilehead").append(data.sitecontrollabels[15].title);
           $("#aboutgovthead").append(data.sitecontrollabels[16].title);
           $("#infmnhead").append(data.sitecontrollabels[17].title);
           $("#followusfooter").append(data.sitecontrollabels[8].title);
           $("#site_update_date").append(data.sitecontrollabels[20].title+' ');
           $("#homelbl").html(data.sitecontrollabels[25].title);
           $("#searchdata").attr('placeholder',data.sitecontrollabels[26].title);    
           $("#small-title1").append(data.sitecontrollabels[21].title);  
           $("#download1").attr('title',data.sitecontrollabels[21].title+' '+data.sitecontrollabels[22].title);  
           $("#small-title2").append(data.sitecontrollabels[23].title);  
           $("#app-store").append(data.sitecontrollabels[22].title);
           $("#google-play").append(data.sitecontrollabels[24].title); 
           $("#download2").attr('title',data.sitecontrollabels[23].title+' '+data.sitecontrollabels[24].title);    
           // $("#footer-title1").append(data.sitecontrollabels[28].title);  
           //  $("#footer-title2").append(data.sitecontrollabels[29].title);  
           //   $("#footer-title3").append(data.sitecontrollabels[27].title); 
             $(".viewmore").append(data.sitecontrollabels[4].title); 

            //Menus start  

            html= '';
            var sub_menu_len = '';
            var test =0;
            $.each( data.mainmenu, function(i) {
              var sub_menu_length = data.mainmenu[i].sub_menus.length;
              
              id = data.mainmenu[i].id;
              mainencid = data.mainmenu[i].mainencid;

              if(data.mainmenu[i].menulinktypes_id==6){

                if(sub_menu_length > 6){
                   html+='<li class="nav-item">';
                    html+='<a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#submenu-1-1" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" id="'+data.mainmenu[i].id+'" title="'+data.mainmenu[i].tooltip+'">'+data.mainmenu[i].title+'</a>'; 

                      html+='<ul class="sub-menu collapse sub-menu-maxwidth" id="submenu-1-1"><li><div class="row">';

                        if(data.mainmenu[i].sub_menus != ''){
                          sub_menu_len = data.mainmenu[i].sub_menus.length;
                          var count=0;
                     
                        $.each( data.mainmenu[i].sub_menus, function(index,subMenuValue) {
                            var encsubid = '';
                            subid = subMenuValue.id;
                            encsubid = subMenuValue.encsubid;
                         
                            if(count %6 == 0){
                              html += '<div class="col-md-4"><ul>';
                            }

                            if(subMenuValue.maintitle=='Departments'){
                                acturl = "{{url('deptdetails') }}";       
                                html +='<li class="nav-item"><a href="'+ acturl +'">'+subMenuValue.title+'</a></li>';
                            } else if(subMenuValue.menulinktypes_id==4 ){
                                acturlsubdetail = "{{url('subdetail') }}" + '/' + encsubid + '/' + mainencid;
                                html +='<li class="nav-item"><a href="'+ acturlsubdetail +'">'+subMenuValue.title+'</a></li>';

                            } else if(subMenuValue.menulinktypes_id==2 ){
                                acturl = subMenuValue.file ;
                                html +='<li class="nav-item"><a target="_blank" data-toggle="tooltip" data-placement="top" title="'+data.toolmsg+'" href="'+ acturl +'">'+subMenuValue.title+'</a></li>';
                                
                            } else if(subMenuValue.menulinktypes_id==5 ){
                                acturl = subMenuValue.file ;
                                html +='<<li class="nav-item"><a  href="{{url('')}}/'+ acturl +'">'+subMenuValue.title+'</a></li>';

                            } else if(subMenuValue.menulinktypes_id==1 ){
                                acturl =subMenuValue.file ;
                                html +='<li class="nav-item">a  href="'+ acturl +'">'+subMenuValue.title+'</a></li>';

                            } else if(subMenuValue.menulinktypes_id==3 ){
                                acturl ="{{url('Submenu')}}/"+subMenuValue.file ;
                                html +='<li class="nav-item"><a  href="'+ acturl +'">'+subMenuValue.title+'</a></li>';

                            } else if(subMenuValue.menulinktypes_id==13 ){
                                acturlsubdetail = "{{url('appdepartmentdetail') }}/"+subMenuValue.enfile ;
                                html +='<li class="nav-item"><a href="'+ acturlsubdetail +'">'+subMenuValue.title+'</a></li>';

                            }

                            count ++;
                            if(count %6 == 0){
                              html += '</ul></div>';
                            } 
                        });
                      
                    }


                      html+='</div></li></ul>'; 
                  html+='</li>';
                }
                else{

                    html+='<li class="nav-item">';
                    html+='<a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#submenu-1-2" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" id="'+data.mainmenu[i].id+'" title="'+data.mainmenu[i].tooltip+'">'+data.mainmenu[i].title+'</a>'; 

                      html+='<ul class="sub-menu collapse" i id="submenu-1-2""><li>';

                        if(data.mainmenu[i].sub_menus != ''){
                          sub_menu_len = data.mainmenu[i].sub_menus.length;
                          var count=0;
                     
                        $.each( data.mainmenu[i].sub_menus, function(index,subMenuValue) {
                            var encsubid = '';
                            subid = subMenuValue.id;
                            encsubid = subMenuValue.encsubid;
                         

                            if(subMenuValue.maintitle=='Departments'){
                                acturl = "{{url('deptdetails') }}";       
                                html +='<li class="nav-item"><a href="'+ acturl +'">'+subMenuValue.title+'</a></li>';
                            } else if(subMenuValue.menulinktypes_id==4 ){
                                acturlsubdetail = "{{url('subdetail') }}" + '/' + encsubid + '/' + mainencid;
                                html +='<li class="nav-item"><a href="'+ acturlsubdetail +'">'+subMenuValue.title+'</a></li>';

                            } else if(subMenuValue.menulinktypes_id==2 ){
                                acturl = subMenuValue.file ;
                                html +='<li class="nav-item"><a target="_blank" data-toggle="tooltip" data-placement="top" title="'+data.toolmsg+'" href="'+ acturl +'">'+subMenuValue.title+'</a></li>';
                                
                            } else if(subMenuValue.menulinktypes_id==5 ){
                                acturl = subMenuValue.file ;
                                html +='<<li class="nav-item"><a  href="{{url('')}}/'+ acturl +'">'+subMenuValue.title+'</a></li>';

                            } else if(subMenuValue.menulinktypes_id==1 ){
                                acturl =subMenuValue.file ;
                                html +='<li class="nav-item">a  href="'+ acturl +'">'+subMenuValue.title+'</a></li>';

                            } else if(subMenuValue.menulinktypes_id==3 ){
                                acturl ="{{url('Submenu')}}/"+subMenuValue.file ;
                                html +='<li class="nav-item"><a  href="'+ acturl +'">'+subMenuValue.title+'</a></li>';

                            }
                            else if(subMenuValue.menulinktypes_id==13 ){
                                acturlsubdetail = "{{url('appdepartmentdetail') }}";
                                html +='<li class="nav-item"><a href="'+ acturlsubdetail +'">'+subMenuValue.title+'</a></li>';

                            }

                            
                        });
                      
                    }


                      html+='</li></ul>'; 
                  html+='</li>';
                }
                



                          
              }
               else if(data.mainmenu[i].menulinktypes_id==2){
                html +='<li class="nav-item" id="'+data.mainmenu[i].id+'"><a href="'+data.mainmenu[i].file+'" target="_blank"  aria-label="Toggle navigation title="'+data.mainmenu[i].tooltip+'">'+data.mainmenu[i].title+'</a></li>';
              } 
              else if(data.mainmenu[i].menulinktypes_id==5){
                  html +='<li class="nav-item" id="'+data.mainmenu[i].id+'"><a href="{{url('')}}/'+data.mainmenu[i].file+'" aria-label="Toggle navigation title="'+data.mainmenu[i].tooltip+'"  id="'+data.mainmenu[i].id+'" >'+data.mainmenu[i].title+'</a></li>';
              } 
              else if(data.mainmenu[i].menulinktypes_id==4){
                  $.ajax({
                    url :"/setvaluesencrypt/"+data.mainmenu[i].file,
                    dataType:"json",
                    success:function(datas)
                    {
                       html +='<li class="nav-item" id="'+data.mainmenu[i].id+'"><a href="mainarticles/'+datas.encid+'"  aria-label="Toggle navigation title="'+data.mainmenu[i].tooltip+'"  id="'+data.mainmenu[i].id+'" >'+data.mainmenu[i].title+'</a></li>';

                    }
                  });
              } 
              else if(data.mainmenu[i].menulinktypes_id==1){
                  html +='<li class="nav-item" id="'+data.mainmenu[i].id+'"><a href="#'+data.mainmenu[i].file+'"  aria-label="Toggle navigation title="'+data.mainmenu[i].tooltip+'"  id="'+data.mainmenu[i].id+'" >'+data.mainmenu[i].title+'</a></li>';
              } 
              else if(data.mainmenu[i].menulinktypes_id==3){
                html +='<li class="nav-item" id="'+data.mainmenu[i].id+'"><a  href="{{asset('Mainmenu')}}/'+data.mainmenu[i].file+'" target="_blank"  aria-label="Toggle navigation title="'+data.mainmenu[i].tooltip+'"  id="'+data.mainmenu[i].id+'" >'+data.mainmenu[i].title+'</a></li>';

                }
              else{

                   html +='<li class="nav-item" ><a  href="#" target="_blank"  aria-label="Toggle navigation title="'+data.mainmenu[i].tooltip+'" >'+data.mainmenu[i].title+'</a></li>'; 
              } 
            
            });
            $(".mainmenus").append(html);
            //Menus end 

            //Banner
            $.each(data.banner, function (i) {
              var banner1 = "{{asset('Banner')}}/"+data.banner[0].file;
                var banner2 = "{{asset('Banner')}}/"+data.banner[1].file;
                var banner3 = "{{asset('Banner')}}/"+data.banner[2].file;
                var banner4 = "{{asset('Banner')}}/"+data.banner[3].file;

              
                   

                 $("#banner1").attr('src' , banner1);
                 $("#banner2").attr('src' , banner2);
                 $("#banner3").attr('src' , banner3);
                 $("#banner4").attr('src' , banner4);

                //  $("#bannertitle1").html(data.banner[0].title);
                //  $("#bannertitle2").html(data.banner[1].title);
                //  $("#bannertitle3").html(data.banner[2].title);

                //  $("#bannersubtitle1").html(data.banner[0].subtitle);
                //  $("#bannersubtitle2").html(data.banner[1].subtitle);
                //  $("#bannersubtitle3").html(data.banner[2].subtitle);
                 
            });

            //Banner End


            //Short alert start

            if(data.short!=null){
              $("#shortalertcol").show();
              $("#shortaltitle").html(data.short.title); 
              $("#shortalcontent").html(data.short.content); 
              
              
            } else {
              $("#shortalertcol").hide();
              
            }
           
            //Short alert  end


            //Department Intro start

            $("#deptimg1").attr('src',"{{asset('Departmentuser')}}/"+data.deptintro.file1);
            $("#deptuser1").html(data.deptintro.user1); 
            $("#deptdesg1").html(data.deptintro.desg1);
            $("#deptimg2").attr('src',"{{asset('Departmentuser')}}/"+data.deptintro.file2); 
            $("#deptuser2").html(data.deptintro.user2); 
            $("#deptdesg2").html(data.deptintro.desg2); 
            $("#depttitle").html(data.deptintro.title); 
            $("#deptbrief").html(data.deptintro.brief);

            //Department Intro end


            //What is new start
            $.each(data.whatsnew, function (i) {
              
              $.ajax({
                url :"/setvaluesencrypt/"+data.whatsnew[i].id,
                dataType:"json",
                success:function(datas3)
                { 
                  var action_urlwhats = "{{url('whatsnewdetailwise') }}" + '/' + datas3.encid;
                  $("#whatsnewlist").append('<div class="single-list"><div class="fancy-icon"><a href="'+action_urlwhats+'"><i class="lni lni-popup"></i></a></div><div class="list-info"><h3><a href="'+action_urlwhats+'">'+data.whatsnew[i].title+'</a></h3></div></div>');
                }
              });
               
            });
            //What is new end


            //Recent article  start
            if(data.articlelatest!=null){

                $('#newstitle').append(data.articlelatest.title);
                $('#newsimg').attr('src',"{{asset('Article')}}/"+data.articlelatest.poster); 
                var txt = data.articlelatest.content;
                  var cont = txt.substring(0,600);
                $('#newscontent').append(cont);
                
                $.ajax({
                  url :"/setvaluesencrypt/"+data.articlelatest.id,
                  dataType:"json",
                  success:function(datas4)
                  {
                    var action_url1 = "{{url('articledetail') }}" + '/' + datas4.encid;
                    $('#newsurl').attr('href',action_url1);
                    
                  }
                });
                
            }

            $.each(data.articlerecent, function (i) {
              $.ajax({
                  url :"/setvaluesencrypt/"+data.articlerecent[i].id,
                  dataType:"json",
                  success:function(datas4)
                  {
                    var action_url1 = "{{url('articledetail') }}" + '/' + datas4.encid;
                    var txt = data.articlerecent[i].content;
                    var trim_content = $(txt).text();
                    var cont = trim_content.substring(0,300);
                    var img = "{{asset('Article')}}/"+data.articlerecent[i].poster
                    $("#articlelist").append('<div class="col-lg-4 col-md-4 col-12 "><div class="single-blog  h-100"><div class="blog-img"><a href="'+action_url1+'"> <img src="'+img+'" height="300" alt=""> </a></div><div class="blog-content text-justify-break-all"> <h6><span>'+data.articlerecent[i].title+'</span></h6> <p class="shortintro">'+cont+'</p><br>  <div class="col-lg-12 col-md-12 col-12"> <div class="wish-button"><a href="'+action_url1+'"><button class="btn  btn-sm btn-flat"><i class="lni lni-menu"></i>'+data.sitecontrollabels[3].title+'</button></a></div></div></div></div></div>');
                    
                  }
                });
               
            });



            //Recent article end


            //Services start

            if(data.widget!=null){
              $.each(data.widget, function (i) {
                if(data.widget[i].menulinktypes_id==2){
                    $("#widgetrow").append('<li class="servicerow"><div class="media-icon"><i class="'+data.widget[i].icon+'"></i></div><div class="media-body"><h5><a href="'+data.widget[i].fileval+'" target="_blank" data-toggle="tooltip" data-placement="top"  title="'+data.widget[i].tooltip+'" >'+data.widget[i].title+'</a></h5></div></li>');
                }
                else if(data.widget[i].menulinktypes_id==5){
                  $("#widgetrow").append('<li class="servicerow"><div class="media-icon"><i class="'+data.widget[i].icon+'"></i></div><div class="media-body"><h5><a href="'+data.widget[i].fileval+'" target="_blank" ata-toggle="tooltip" data-placement="top"  title="'+data.widget[i].tooltip+'" ><div style="background-image: url(./Widgetlink/'+data.widget[i].file+'");" class="img-border rounded-circle cs-img"></div>'+data.widget[i].title+'</a></h5></div></li>');
                }
                else if(data.widget[i].menulinktypes_id==4){
                   $.ajax({
                      url :"/setvaluesencrypt/"+data.widget[i].fileval,
                      dataType:"json",
                      success:function(datas)
                      {
                          $("#widgetrow").append('<li class="servicerow"><div class="media-icon"><i class="'+data.widget[i].icon+'"></i></div><div class="media-body"><h5><a href="mainarticles/'+datas.encid+'" target="_blank" ata-toggle="tooltip" data-placement="top"  title="'+data.widget[i].tooltip+'" ><div style="background-image: url(./Widgetlink/'+data.widget[i].file+'");" class="img-border rounded-circle cs-img"></div>'+data.widget[i].title+'</a></h5></div></li>');
                      }
                   });
                }
                else if(data.widget[i].menulinktypes_id==1){
                    $("#widgetrow").append('<li class="servicerow"><div class="media-icon"><i class="'+data.widget[i].icon+'"></i></div><div class="media-body"><h5><a href="'+data.widget[i].fileval+'" target="_blank" ata-toggle="tooltip" data-placement="top"  title="'+data.widget[i].tooltip+'" ><div style="background-image: url(./Widgetlink/'+data.widget[i].file+'");" class="img-border rounded-circle cs-img"></div>'+data.widget[i].title+'</a></h5></div></li>');
                }
                else if(data.widget[i].menulinktypes_id==3){
                    $("#widgetrow").append('<li class="servicerow"><div class="media-icon"><i class="'+data.widget[i].icon+'"></i></div><div class="media-body"><h5><a  href="{{asset('Mainmenu')}}/'+data.widget[i].fileval+'" target="_blank" ata-toggle="tooltip" data-placement="top"  title="'+data.widget[i].tooltip+'" ><div style="background-image: url(./Widgetlink/'+data.widget[i].file+'");" class="img-border rounded-circle cs-img"></div>'+data.widget[i].title+'</a></h5></div></li>');
                }
                else {

                }

                
               
              });
            }

            //Services end


            //Website listing start  

            $.each( data.indialogo, function(i) {

              $("#weblogos").append(' <div class="col align-middle"><a href="'+data.indialogo[i].url+'" target="_blank" data-toggle="tooltip" data-placement="top"  title="'+data.indialogo[i].tooltip+'" ><img src="{{asset('Logo')}}/'+data.indialogo[i].file+'"></a> </div> ');
           
            });
            $.each( data.statelogo, function(i) {

              $("#weblogos").append(' <div class="col align-middle"><a href="'+data.statelogo[i].url+'" target="_blank" data-toggle="tooltip" data-placement="top"  title="'+data.statelogo[i].tooltip+'"><img src="{{asset('Logo')}}/'+data.statelogo[i].file+'"></a> </div> ');
           
            });

            //Website listing end


            //Footer menus start 

            $.each( data.footermenus, function(i) {
                $("#footermenus").append('<li class="modalwind" id="'+data.footermenus[i].id+'"><a href="javascript:void(0)">'+data.footermenus[i].title+'</a></li>');
              
            });


            //Footer Link

            $.each( data.footerlinks, function(i) {
              $("#footerlinks").append(' <li><a href="'+data.footerlinks[i].url+'" data-toggle="tooltip" data-placement="top"  title="'+data.footerlinks[i].tooltip+'" target="_blank">'+data.footerlinks[i].title+'</a></li>');
            });

            //Media
          
            if(data.media!=null){
              $("#longalertcolumn").show();
              $("#longaltitle").html(data.media.title); 
              $("#longalbrief").html(data.media.brief);
              $("#longalcontent").append(data.media.content);
              
              // $("#mediaimg").attr('src',"{{asset('Mediaalert')}}/"+data.media.file);
              var video = videojs("mediaalertdiv");
              video.src("{{asset('Mediaalert')}}/"+data.media.file);
              // $(".video_click").attr('href',"{{asset('Mediaalert')}}/"+data.media.file);
              
            } else {
              $("#longalertcolumn").hide();
            }

           

            //Livestream video 

            $('#btn-cm-live').attr('title','');
            $('#titlevd').html('');
            var video = videojs("livevideostreamdiv");
            video.src(data.livestream.url);
            $('#btn-cm-live').attr('title',data.livestream.entitle);
            $('#titlevd').html(data.livestream.entitle);

          }

      }); 

  });

$(document).on("change", ".lang", function(event){  

   if($(this).val() == 0){
      $.ajax({
       url :"/setbilingualval",
       dataType:"json",
       success:function(data)
        { 
               window.location.reload();   
          
        }
      })
   }else{
      $.ajax({
       url :"/setbilingualvalmal",
       dataType:"json",
       success:function(data)
        { 
             window.location.reload();    
          
        }
      })
   }
    
  
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



  $(document).ready(function () {
      $("#longalcontent").hide();
      $("#readless").hide();
      /*$(".show_hide").on("click", function () {
          var txt = $("#longalcontent").is(':visible') ? 'Read More' : 'Read Less';
          if($("#longalcontent").is(':visible')){
            $("#longalcontent").hide();
            $("#longalbrief").show();
            $(".show_hide").empty();
            $(".show_hide").append('<i class="lni lni-menu"></i>Read Less');
          }else{
             $("#longalcontent").show();
             $("#longalbrief").hide();
             $(".show_hide").empty();
             $(".show_hide").append('<i class="lni lni-menu"></i>Read More');
          }
         
          // $(".show_hide").append('<i class="lni lni-menu"></i> '+txt+')';
          $(this).next('#longalcontent').slideToggle(200);
      });*/

      $("#readmore").on("click", function () {
        $("#longalcontent").show();
        $("#longalbrief").hide();
        $("#readless").show();
        $("#readmore").hide();
      });

      $("#readless").on("click", function () {
        $("#longalcontent").hide();
        $("#longalbrief").show();
        $("#readless").hide();
        $("#readmore").show();
      });

  });


$(document).ready(function () {

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
});

  
</script>

