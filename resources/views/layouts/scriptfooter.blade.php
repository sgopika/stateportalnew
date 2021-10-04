<script>
    
    $( document ).ready(function() {
       $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });


     
    
    $('#livemodal').on('hidden.bs.modal', function(e) {
        
        $("#livemodal iframe").attr('src', $("#livemodal iframe").attr('src'));
         
        
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


 
 
      $.ajax({
          url :"/setvalueshomepage",
          dataType:"json",
          success:function(data)
          { 
        //alert(data.dstpgms);exit();
            $("#bilval").val(data.sessionbil);
            $("#logoimg").attr('src',"{{asset('Logo')}}/"+data.logo.file);
            $("#footerlogoimg").attr('src',"{{asset('Logo')}}/"+data.logo.file);
            $("#maintitle").html(data.title.title); 
             $("#subtitle").html(data.title.subtitle); 
             $("#sitecontrollabel").html(data.sitecontrollbl[0].title);  
             $("#shortalert").html(data.shortalert.content); 
             $("#hometitle").html(data.sitecontrollbl[1].title); 
             $("#dsttitle").html(data.sitecontrollbl[2].title);
             $("#buytitle").html(data.sitecontrollbl[3].title);
             $("#selltitle").html(data.sitecontrollbl[4].title);
             $("#relatedlinktitle").html(data.sitecontrollbl[5].title);
             $("#infmntitle").html(data.sitecontrollbl[6].title);
             $("#followustitle").html(data.sitecontrollbl[7].title);
             $("#copytitle").append(data.sitecontrollbl[8].title);
             $("#site_update_date").append(data.sitecontrollbl[10].title+' ');
             //Site updated
            if(data.siteupdated!=null){
              $("#lastviewhead").append('&nbsp;&nbsp;'+data.siteupdated.titlevalues);
            }



             /* main menu */
             html= '';
             $.each( data.mainmenu, function(i) {
              id = data.mainmenu[i].id;
              mainencid = data.mainmenu[i].mainencid;
              if(data.mainmenu[i].menulinktypes_id==6){
                  html+= '<li class="nav-link scrollto submenus'+data.mainmenu[i].id+'" id="'+data.mainmenu[i].id+'"><a class="nav-link dropdown-toggle  mainsublist" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id="'+data.mainmenu[i].id+'" title="'+data.mainmenu[i].tooltip+'">'+data.mainmenu[i].title+'</a>';
                  html += ' <div class="dropdown-menu dropdown-menu-end" aria-labelledby="about-dropdown" style=""><div class="row submenu" >';
                  if(data.mainmenu[i].sub_menus != ''){
                    sub_menu_len = data.mainmenu[i].sub_menus.length;
                    var count=0;
                   
                      $.each( data.mainmenu[i].sub_menus, function(index,subMenuValue) {
                        var encsubid = '';
                        subid = subMenuValue.id;
                        encsubid = subMenuValue.encsubid;
                     
                         if(count %5 == 0){
                          html += '<ul class="col-md-6">';
                        }
                        if(subMenuValue.maintitle=='Departments'){
                            acturl = "{{url('deptdetails') }}";       
                            html +='<li><a  href="'+ acturl +'">'+subMenuValue.title+'</a></li>';
                        } else if(subMenuValue.menulinktypes_id==4 ){
                          acturlsubdetail = "{{url('subdetail') }}" + '/' + encsubid + '/' + mainencid;
                            html +='<li><a  href="'+ acturlsubdetail +'">'+subMenuValue.title+'</a></li>';
                        } else if(subMenuValue.menulinktypes_id==2 ){
                            acturl = subMenuValue.file ;
                            html +='<li><a  target="_blank" data-toggle="tooltip" data-placement="top" title="'+data.toolmsg+'" href="'+ acturl +'">'+subMenuValue.title+'</a></li>';

                        } else if(subMenuValue.menulinktypes_id==5 ){
                            acturl = subMenuValue.file ;
                            html +='<li><a  href="{{url('')}}/'+ acturl +'">'+subMenuValue.title+'</a></li>';

                        } else if(subMenuValue.menulinktypes_id==1 ){
                            acturl =subMenuValue.file ;
                            html +='<li><a  href="'+ acturl +'">'+subMenuValue.title+'</a></li>';

                        } else if(subMenuValue.menulinktypes_id==3 ){
                            acturl ="{{url('Submenu')}}/"+subMenuValue.file ;
                            html +='<li><a  href="'+ acturl +'">'+subMenuValue.title+'</a></li>';

                        }




                        //  html += '<li><a class="dropdown-item" style="width: 110% !important;" href="#">'+subMenuValue.title+'</a></li>';
                          count ++;
                          if(count %5 == 0){
                            html += '</ul>';
                          } 
                      });
                    
                  }
                 
                  html += '</div> </div></li>';         
              } else if(data.mainmenu[i].menulinktypes_id==2){
                  html+= '<li class="nav-link scrollto" id="'+data.mainmenu[i].id+'"><a href="{{url('')}}/'+data.mainmenu[i].file+'" target="_blank" data-toggle="tooltip" data-placement="top" title="'+data.toolmsg+'" class="nav-link  py-2 px-2 " role="button" aria-haspopup="true" aria-expanded="false" id="'+data.mainmenu[i].id+'" title="'+data.mainmenu[i].tooltip+'">'+data.mainmenu[i].title+'</a></li>';
              } else if(data.mainmenu[i].menulinktypes_id==5){
                    html+= '<li class="nav-link scrollto" id="'+data.mainmenu[i].id+'"><a href="{{url('')}}/'+data.mainmenu[i].file+'" class="nav-link  py-2 px-2" role="button" aria-haspopup="true" aria-expanded="false" id="'+data.mainmenu[i].id+'" title="'+data.mainmenu[i].tooltip+'">'+data.mainmenu[i].title+'</a></li>';
              } else if(data.mainmenu[i].menulinktypes_id==4){
                //console.log("test");
                  $.ajax({
                    url :"/setvaluesencrypt/"+data.mainmenu[i].file,
                    dataType:"json",
                    success:function(datas)
                    {
                      html+= '<li class="nav-link scrollto" id="'+data.mainmenu[i].id+'"><a href="mainarticles/'+datas.encid+'" class="nav-link  py-2 px-2 " role="button" aria-haspopup="true" aria-expanded="false" id="'+data.mainmenu[i].id+'" title="'+data.mainmenu[i].tooltip+'">'+data.mainmenu[i].title+'</a></li>';
                    }
                  });
                } else if(data.mainmenu[i].menulinktypes_id==1){
                  html+= '<li class="nav-link scrollto" id="'+data.mainmenu[i].id+'"><a href="#'+data.mainmenu[i].file+'" class="nav-link  py-2 px-2 " role="button" aria-haspopup="true" aria-expanded="false" id="'+data.mainmenu[i].id+'" title="'+data.mainmenu[i].tooltip+'">'+data.mainmenu[i].title+'</a></li>';
                } else if(data.mainmenu[i].menulinktypes_id==3){
                  html+= '<li class="nav-link scrollto" id="'+data.mainmenu[i].id+'"><a href="{{asset('Mainmenu')}}/'+data.mainmenu[i].file+'" target="_blank" class="nav-link  py-2 px-2 " role="button" aria-haspopup="true" aria-expanded="false" id="'+data.mainmenu[i].id+'" title="'+data.mainmenu[i].tooltip+'">'+data.mainmenu[i].title+'</a></li>';
                }
                else {
                  html+= '<li class="nav-link scrollto"><a class="nav-link" href="#" title="'+data.mainmenu[i].tooltip+'">'+data.mainmenu[i].title+'</a></li>';
                }
            });
          //  console.log(html);
              $("#mainmenus").append(html);

              /*Servicelink div*/


           /*  $.each(data.servicelink, function (i) {
            $("#servicelinkdiv").append('<div class="col-2 portallinks py-3 text-center px-4 mx-2 animate-hang"><a target="_blank" href="'+data.servicelink[i].maplinks+'"><i class="'+data.servicelink[i].iconclass+'"></i><p class="eng_xxxs">'+data.servicelink[i].title+' </p></a></div>');
            
            });*/


             /*Banners*/

             $.each(data.banner, function (i) {
                       $("#banner1").attr('src',"{{asset('Banner')}}/"+data.banner[0].file);
                       //$("#banner2").attr('src',"{{asset('Banner')}}/"+data.banner[1].file);
                       //$("#banner3").attr('src',"{{asset('Banner')}}/"+data.banner[2].file);
                       
                });
             /*article latest*/
             $("#articletitle").html(data.articlelatest.title); 
             $("#articlebrief").html(data.articlelatest.brief); 
             $("#articleimg").attr('src',"{{asset('Article')}}/"+data.articlelatest.poster);

              $.ajax({
                url :"/setvaluesencrypt/"+data.articlelatest.id,
                dataType:"json",
                success:function(datas1)
                { 
                  var action_urlarticlelat = "{{url('articledetailid') }}" + '/' + datas1.encid;
                  $("#articlelatread").append('<a href="'+action_urlarticlelat+'"><button type="button" class="align-self-end btn btn-primary" style="margin-top: auto;">'+data.sitecontrollbl[9].title+'</button></a>');
                }
              });
              /*article list*/
              

             $.each(data.article, function (i) {
                $("#articlelistdiv").append('<div class="col-md-12 icon-box" data-aos="fade-up"><div class="py-2"><h4>'+data.article[i].title+'</h4><p> </p></div></div>');
             
             
            });
             var action_urlarticle = "{{url('articledetail') }}";
             $("#articleread").append('<a href="'+action_urlarticle+'"><button type="button" class="align-self-end btn btn-primary" style="margin-top: 0;">'+data.sitecontrollbl[9].title+'</button></a>');
             //console.log(data.dstpgms);

             $.each(data.dstpgms, function (i) {

              var updateddt = new Date(data.dstpgms[i].created_at);



                 var options = { weekday: 'short', year: 'numeric', month: 'short', day: 'numeric' };
                var today  = updateddt;
                var dtfnl = today.toLocaleDateString("en-US", options);

             //console.log(updateddt.format('dddd MMMM D Y'));

             $.ajax({
                url :"/setvaluesencrypt/"+data.dstpgms[i].id,
                dataType:"json",
                success:function(datas2)
                { 
             
              var urlfile="{{ asset('Districtpgm') }}/"+ data.dstpgms[i].poster;
              var action_urldstpgm = "{{url('dstpgmid') }}" + '/' + datas2.encid;

                $("#dstpgmdiv").append('<div class="col-lg-6"><div class="post-box"><div class="post-img"><img src="'+urlfile+'" class="img-fluid" alt=""></div><span class="post-date">'+dtfnl+'</span><h3 class="post-title">'+data.dstpgms[i].title+'</h3><a href="'+action_urldstpgm+'" class="readmore stretched-link mt-auto"><span>'+data.sitecontrollbl[9].title+'</span><i class="bi bi-arrow-right"></i></a></div></div>');
              }
            });
             
             
            });

           
            

             

              /*What is new*/

              $.each(data.whatsnew, function (i) {

              
             
              $("#whatsnewdiv").append(' <div class="col-md-12 icon-box" data-aos="fade-up"><i class="'+data.whatsnew[i].iconclass+'"></i><div><h4>'+data.whatsnew[i].title+'</h4><p>'+data.whatsnew[i].subtitle+'</p></div></div>');
             
             
            });
              var action_urlwhatsnew = "{{url('whatsnewdetail') }}"
            $("#whatsnewread").append('<a href="'+action_urlwhatsnew+'" class="btn-get-started scrollto">'+data.sitecontrollbl[9].title+'</a></div>');

               /*Servicelink*/

              $.each(data.servicelink, function (i) {

              
             
              $("#servicelinkdiv").append(' <div class="col-lg-2 col-md-6" data-aos="fade-up" data-aos-delay="200"><a target="_blank" href="'+data.servicelink[i].maplinks+'"><div class="'+data.servicelink[i].color+'"><i class="'+data.servicelink[i].iconclass+'"></i><h3>'+data.servicelink[i].title+'</h3></div></a></div>');
             
             
            });

              /*Quotation Buy*/

              $.each(data.quotationbuy, function (i) {

              var txt = data.quotationbuy[i].content;
                    var trim_content = $(txt).text();
                    var cont = trim_content.substring(0,300);
             
              $("#quotationbuydiv").append('<div class="icon-box"><div class="icon"><i class="'+data.quotationbuy[i].iconclass+'"></i></div><h4 class="title">'+data.quotationbuy[i].title+'</h4><p class="description">'+cont+'</p></div>');
             
             
            });
              /*Quotation Sell*/

              $.each(data.quotationsell, function (i) {

              var txt = data.quotationsell[i].content;
                    var trim_content = $(txt).text();
                    var cont = trim_content.substring(0,300);
             
              $("#quotationselldiv").append('<div class="icon-box"><div class="icon"><i class="'+data.quotationsell[i].iconclass+'"></i></div><h4 class="title">'+data.quotationsell[i].title+'</h4><p class="description">'+cont+'</p></div>');
             
             
            });


              /*Document type*/

              $.each(data.documenttype, function (i) {

                $.ajax({
                url :"/setvaluesencrypt/"+data.documenttype[i].id,
                dataType:"json",
                success:function(datas3)
                { 
                  var action_urldoctype = "{{url('documenttypedetail') }}" + '/' + datas3.encid;
                          
                  $("#documenttypediv").append('<div data-aos="zoom-out" data-aos-delay="200"><a href="'+action_urldoctype+'"><div class="tender-box d-flex align-items-center"><i class="'+data.documenttype[i].iconclass+'"></i><h3>'+data.documenttype[i].title+'</h3></div></a></div>');
                }
               });
             
             
            });

              /*Footer link*/
              
              $("#footerlinkdiv").html('');
              $.each(data.footerlinknew, function (i) {
//console.log(data.footerlinknew[i].url);
                          
              $("#footerlinkdiv").append('<li><i class="bi bi-chevron-right"></i> <a href="'+data.footerlinknew[i].url+'" role="link">'+data.footerlinknew[i].title+'</a></li>');
             
             
            });
              /*Footer link*/
              
              $("#footermenudiv").html('');
              //console.log(data.footermenu);
              $.each(data.footermenu, function (i) {

              $("#footermenudiv").append('<li class="modalwind" id="'+data.footermenu[i].id+'"><i class="bi bi-chevron-right"></i> <a href="javascript:void(0)" role="link">'+data.footermenu[i].title+'</a></li>');
             
             
            });

              /*Social Media*/
              
              $("#socialdiv").html('');
              //console.log(data.socialmedia);
              $.each(data.socialmedia, function (i) {

              $("#socialdiv").append('<a href="'+data.socialmedia[i].url+'" class="twitter"><i class="'+data.socialmedia[i].iconclass+'"></i></a>');
             
             
            });

              

             $.each(data.latestgo, function (i) {
              
              var url="{{ asset('Govtorder') }}/"+ data.latestgo[i].filepath;
              var updateddt = new Date(data.latestgo[i].documentdate);
             var dd = updateddt.getDate();
             var mm = updateddt.getMonth()+1; //January is 0! 
             var yyyy = updateddt.getFullYear();
             var updateddt = dd+'-'+mm+'-'+yyyy; 
             $("#whatisnew_li").append('<p>'+data.latestgo[i].deptname+'- '+data.latestgo[i].title+'  - reg. - '+data.latestgo[i].documentnumber+'  <span class="badge bg-lightGray p-1"> '+updateddt+' </span> <span class="btn-outline-success p-1"><a href="'+url+'" target="_blank"> <i class="far fa-file-pdf"></i> &nbsp;('+data.latestgo[i].size+'KB) </a></span> </p>');


             /*Go Search*/
              $('#departments_id').empty();
            $('#departments_id').append($('<option></option>').val('').html('Select'));
            $('#departments_id').append($('<option></option>').val('all').html('All'));
            $.each(data.departments, function(index, element) {
                $('#departments_id').append(
                    $('<option></option>').val(element.id).html(element.entitle)
                );
            });

             });

             var max_year=new Date().getFullYear().toString();
            // var now = new Date();
$("#fromdate").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy", "yearrange":{minyear: 1957, maxyear: max_year }});

$("#todate").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy", "yearrange":{minyear: 1957, maxyear: max_year }});

  /*Browse Document*/

    $.each(data.documenttype, function (i) {
       $.ajax({
                      url :"/setvaluesencrypt/"+data.documenttype[i].id,
                          dataType:"json",
                  success:function(datanw)
                  {


                    $("#browserdiv").append('<div class="col-2 quicklinkcontent p-3 mx-1 text-center animate-sink"><a href="documentdetailview/'+datanw.encid+'"><i class="'+data.documenttype[i].iconclass+'"></i><p class="eng_xxxs">'+data.documenttype[i].title+'</p></a></div>');
                  }
                });



  

   });



    /*Browse all category*/
            var count=0;
            var myHtml = "";
            
         $.each(data.chunkarray, function (i,value1) {
                myHtml +='<div class="col-4"><ul class="list-group list-group-flush">';
         
                  $.each(value1, function (j,element) 
                  {
                    count++;
                     

                    
                            myHtml +='<li class="list-group-item eng_ys catgeorylist animate-forward"> <a href="documentdetailview/'+element.enc_id+'">'+element.title+'</a></li>'; 
                              if(count%5==0)
                              {
                                 myHtml +='</ul></div>';
                              } 
                              
                     
                  });
                                  
  
   });
          $("#browsealldiv").append(myHtml);

                /*Footer Menu*/
                var footercount=0;
                var footerhtml='';
                  $.each( data.footermenuarray, function(i,value) {
                    footerhtml+='<div class="col-md-3" ><ul class="list-group list-group-flush" >';

                     $.each(value, function (j,element) 
                  {
                      footercount++;
                      if(footercount==1)
                        {
                            footerhtml+=' <li class="list-group-item footerlinks"><a class="text-white" href="'+data.footerlink.url+'"  target="_blank">'+data.footerlink.title+'</a></li>';
                           // footercount++;
                        }
                        
                            footerhtml+=' <li class="list-group-item footerlinks"><a class="modalwind text-white"  id="'+element.id+'">'+element.title+'</a></li>';
                                  //footerhtml+='<li class="list-group-item footerlinks"> About the portal</li>';
                             if(footercount%4==0)
                            {
                              
                               footerhtml +='</ul></div>';
                            } 

                        
                   });      
              
            });
            $("#footermenudiv").append(footerhtml);

            //---- Footer Logo
            var logocount=0;
            var logohtml='';

            $.each( data.footerlogoarray, function(i,value) {
                    logohtml+='<div class="row" >';

                     $.each(value, function (j,element) 
                  {
                       var urlfile="{{ asset('Logo') }}/"+ element.file;
                      logocount++;
              logohtml+='<div class="col-3"><a href="'+element.url+'" target="_blank"><img src="'+urlfile+'" alt="footerlogo" class="footerlogoind"></a></div>';
                              //footerhtml+='<li class="list-group-item footerlinks"> About the portal</li>';

                             
                         if(logocount%4==0)
                        {
                          
                           logohtml +='</div>';
                        } 
                   });      
              
            });
            $("#footerlogodiv").append(logohtml);


            /*Social Media Icons*/
            $("#socialmediadiv").html('');
            $.each(data.socialmedia, function (i) {

               $("#socialmediadiv").append('<a target="_blank" href="'+data.socialmedia[i].url+'"><i class="'+data.socialmedia[i].iconclass+'"></i></a>&nbsp;&nbsp;&nbsp;');

              
            });
              $("#socialmediadiv").append('<br> <small> Portal last updated on 17 May 2021. </small>'); 

              /*Footer*/

              $("#footerdiv1").html(data.footer.title);
              $("#footerdiv2").html('<small> <i class="'+data.footer.iconclass+'"></i> &nbsp;'+data.footer.subtitle+' </small>');





          }/*Success data end*/
          
      })
    
 /*Page load ajax end*/  


 $('#departments_id').on('change ', function(e) {
        var deptid = $(this).val();
        if(deptid=='all')
          {   $('#fielddepartments_id').html('');
             $('#fielddepartments_id').append($('<option></option>').val('all').html('All'));
          }
          else
          {

             $.ajax({
              method:"post",
              dataType:"json",
                data: {deptid:deptid},
                url: '{{ route('getfielddepartment') }}',
                success: function (data) 
                { 
                   
                   $('#fielddepartments_id').html('');
                   $('#fielddepartments_id').append($('<option></option>').val('').html('Select Field Department'));
                    $('#fielddepartments_id').append($('<option></option>').val('all').html('All'));
                    $.each(data, function (i,data) {
                       
                        $('#fielddepartments_id').append("<option value='" + data.id + "'>" + data.name + "</option>");

                    });
                   
                }
            });
          }
     });


 $('#ajaxmodalform').on('submit', function(event){ 
   var formData = new FormData(this);
    event.preventDefault();
   // alert(formData.get());
        action_url = "{{ route('gosearch') }}";

   

    $.ajax({
         url: action_url,
         method:"post",
          data:$(this).serialize(),
         dataType:"json",
         success:function(data)
         { 
            var html = '';
            $('#tbodyviewdet').html('');
            if(data.success==2)
            {
              $('#searchresult').css('display','block');
            html = '<tr><td colspan="4"><div class="alert alert-danger text-center">No Data Found</div></td></tr>';  
            $('#tbodyviewdet').append(html);             
            }
            else if(data.success==1)
            {

               $('#searchresult').css('display','block');
               $.each(data.latestgo, function (i) {
                 var url="{{ asset('Govtorder') }}/"+ data.latestgo[i].filepath;
              var updateddt = new Date(data.latestgo[i].documentdate);
             var dd = updateddt.getDate();
             var mm = updateddt.getMonth()+1; //January is 0! 
             var yyyy = updateddt.getFullYear();
             var updateddt = dd+'-'+mm+'-'+yyyy; 

               $('#tbodyviewdet').append('<tr><td>'+data.latestgo[i].deptname+'</td><td>'+data.latestgo[i].title+'</td><td>'+updateddt+'</td><td><a href="'+url+'" target="_blank"> <i class="far fa-file-pdf"></i> &nbsp;('+data.latestgo[i].size+'-KB) </a></td></tr>');

             });


                $('#tablegosarch').DataTable();
             
              
            }
         }
    });
  });


 


/*Validation */  

$('#gonumber').on('change ', function(e) {
  var testval = this.value;
  var tested = new RegExp('^[a-zA-Z0-9/()., \s]+$');
  if (!tested.test(testval))
  {
    $('#gonumber').val('');
    
     $('#gonumbererror').slideDown("slow");

  }
  else
  {
     $('#gonumbererror').hide();
     
  }
      
});




/*$('#gonumbermal').on('change ', function(e) {
  var testval = this.value;
 
  var pattern = new XRegExp("^[\\p{InMalayalam} _./(),]+$");
if (XRegExp.test(testval, pattern)) {
     $('#gonumbermalerror').hide();
}
else{
$('#gonumbermal').val('');
  $('#gonumbermalerror').slideDown("slow");
}
      
});*/



 $('#keywords').on('change ', function(e) {
  var testval = this.value;
  var tested = new RegExp('^[a-zA-Z0-9 \s]+$');
  if (!tested.test(testval))
  {
    $('#keywords').val('');
    
     $('#keywordserror').slideDown("slow");

  }
  else
  {
     $('#keywordserror').hide();
     
  }
      
});

     

/*Document ready */
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
   
$(document).ready(function () {

$(document).on("click", ".modalwind", function(event){
   
    var id = $(this).attr('id');  //alert(id);
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