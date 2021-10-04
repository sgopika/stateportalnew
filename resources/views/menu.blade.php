<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
<style type="text/css">
    /* General */
.text-grey{
    color: #b4b4b4;
}
body{
    color: #434343;
}
a:link{
    text-decoration: none;
}
.font-mulish-normal{
    font-family: Mulish;
    font-style: normal;
}
.kg-h-font{
    font-size: 2.5rem;
}
.kg-p-font{
    font-size: 1.4rem;
}
.kg-s-font{
    font-size: 1.2rem;
}
.kg-t-font{
    font-size: 1rem;
}
.kg-f-font{
    font-size: 0.875rem;
}
.kg-ff-font{
    font-size: 0.75rem;
}
.kg-primary-color{
    color: #2E2D7F;
}
.kg-p-spacing{
    margin-left: 30px;
    margin-right: 30px;
}

/* Dynamic Font Size not applicable to this elements */
.font-size-btn li a{
    font-size: 1rem;
}
.fa-sun,.fa-moon{
    font-size: 16px;
}

/* Dark Mode */
body.dark{
    background-color: #233348;
    color: white;
}
header.dark{
    box-shadow: 0px 2px 30px -10px rgba(0, 0, 0, 0.5);
}
.lang-btn.dark{
    color: #D6E3ED;
}
.font-size-btn li a.dark,.main-nav-menu a.nav-link.dark{
    color: #8EACD3;
}
.img-outer.dark:hover,.search.dark,.footer-top.dark{
    background: #37485F;
}
.img-border.dark{
    box-shadow: 0px 11px 16px -6px #000D1F;
}
.label.dark{
    background-color: #EA7A6D;
}
.light-img.dark{
    display: none !important;
}
.dark-img.dark{
    display: block !important;
}
.main-title h1.dark,.main-title h4.dark,.main-nav-menu a.nav-link.active.dark,.main-nav-menu a.nav-link.dark:hover,.section-articles .article-author.dark, .head-dark.dark,.section-what-new #col-new-updates .table-cell.dark,.footer-text.dark,.search_input.dark{
    color: white;
}
.main-nav-menu .dropdown-menu a.dropdown-item.dark{
    color: #B7D6FF;
}
.main-nav-menu .dropdown-menu.dark{
    background: #233348;
}
.main-nav-menu .dropdown-menu .dropdown-item.dark:hover{
    background: #82B0FF;
    color: #233348;
}
.kg-alert.dark{
    background: #E1E9FF;
    color: #434343;
}
#youtube-toast .toast-body.dark{
    color: #434343;
}
.section-what-new #col-gov-cm.dark{
    background: #406089;
}
.section-what-new #col-new-updates.dark{
    background: #102035;
}
.section-what-new #col-new-updates .table-cell.dark{
    border-bottom: 1px solid #546B8A;
}
.footer-bottom.dark{
    background: #13263F;
}



/* Header */
header{
    box-shadow: 0px 2px 30px -10px rgba(193, 193, 193, 0.5);
    padding: 16px 0 25px 0;
}
/* Top Bar */
.top-bar{
    font-weight: bold;
    line-height: 20px;
    font-style: normal;
}
.nav>li.nav-item{
    border-right: 1px solid #E7E7E7;
}
.nav>li.nav-item:last-child{
    border: none;
}
.lang-btn,.font-size-btn li a{
    border: 0.5px solid #B2B2B2;
    box-sizing: border-box;
}
.top-bar .skip-btn,.top-bar form{
    margin-top: 1px;
}
.lang-btn{
    font-family: FML-Mohini-Bold;
    font-weight: bold;
    line-height: 8px;
    color: #162646;
    width: auto;
    margin-top: 10px;
}
.font-size-btn li a{
    color: #434343;
    font-weight: bold;
    height: 32px;
    width: 32px;
    padding: 2px;
}
.list-group{
    padding-left: 0;
    padding-right: 0;
}
.list-group-item{
    padding: 0px;
    border: none !important;
    background-color: #0000;
}
.font-size-btn li a.active{
    background: linear-gradient(138.68deg, #63E7FC 3.88%, #68B5FD 98.23%);
    border-radius: 20px;
    color: white;
    border: none;
}
.nav-item form{
    padding-right: 0;
    padding-left: 4px;
}
.checkbox {
    opacity: 0;
    position: absolute;
}
.label {
    background-color: #162646;
    border-radius: 16px;
    border: 1px solid #EBEBEB;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 10px;
    position: relative;
    height: 30px;
    width: 70px;
}
.label .ball {
    background-color: #fff;
    border-radius: 50%;
    border: 1px solid #EDEDED;
    position: absolute;
    top: 4px;
    left: 6px;
    height: 20px;
    width: 20px;
    transform: translateX(0px);
    transition: transform 0.2s linear;
}
.checkbox:checked + .label .ball {
    transform: translateX(32px);
}
.fa-moon,.fa-sun {
    color: white;
}


/* Main Nav */
/* .main-title img{
    margin-right: 15px;
    max-width: 148px;
    width: 21%;
} */
.main-title h1{
    font-weight: 800;
    line-height: 1.5;
    text-transform: uppercase;
}
.main-title h4{
    font-weight: bold;
    line-height: 0.2;
}

.search {
    margin-bottom: auto;
    margin-top: auto;
    /* width: 36vw; */
    height: 49px;
    border-radius: 24.5px;
    background: #FFFFFF;
    border: 1px solid #979797;
}
.mobile-nav-menu .search{
    width: 78vw;
}

.search_input {
    color: black;
    border: 0;
    outline: 0;
    background: none;
    width: 85%;
    line-height: 46px;
    padding-left: 30px;
    transition: width 0.4s linear
}
.search_input::placeholder,.search_input::-ms-input-placeholder {
    color: #d7d7d7;
    font-size: 1rem;
}
.search_icon {
    margin-top: 6px;
    margin-right: 10px;
    padding: 17px;
    color: white;
    font-size: 18px;
    font-weight: 600;
    height: 30px;
    width: 30px;
    float: right;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    background-color: #EA7A6D;
}
.double-header .auth-btn{
    border-radius: 22px;
    font-weight: 600;
    line-height: 20px;
    color: white;
    width: 92px;
    height: 32px;
    padding: 0;
    margin-right: 6px;
}
.sign_in-btn{
    background: #6DA4EA;
    margin-left: 13px;
}
.register-btn{
    background: #EA7A6D;
}
.social-btn{
    border-left: 1px solid #E7E7E7;
    padding-left: 7px;
}
.social-btn i{
    margin: 0.15em;
    font-size: 16px;
}
.social-btn button{
    border-radius: 50%;
}

.fb-btn{
    background: #3B5998;
    color: #FFFFFF;
    padding: 0.05em 0.3em;
}
.twitter-btn{
    color: white;
    background: #4099FF;
    padding: 0.05em 0.07em;
    margin-left: 7px;
}
.main-nav-menu a{
    font-weight: 700;
    line-height: 20px;
    color: #434343;
    padding: 5px 10px;
}
.main-nav-menu li.nav-item:last-child{
    margin-right: 0;
}
.main-nav-menu .nav-link:hover,.main-nav-menu .nav-link.active {
    background: linear-gradient(138.68deg,#63E7FC 3.88%, #68B5FD 98.23%);
    border-radius: 20px;
    color: white;
}
.main-nav-menu .dropdown-toggle::after{
    content: none;
}

.main-nav-menu .dropdown-menu{
    filter: drop-shadow(0px 5px 10px rgba(133, 162, 193, 0.271607));
    border-radius: 14px;
    border: none;
    min-width: 500px;
}
.main-nav-menu .dropdown-menu .dropdown-item{
    font-weight: 400;
    /* font-size: 0.7rem; */
}
.main-nav-menu .dropdown-menu .dropdown-item:hover{
    background: #E1E9FF;
    border-radius: 10px;
}


/* Mobile Nav Menu */
.mobile-nav-menu .navbar-toggler:focus{
    box-shadow: none;
}

/* Alert Section */
.kg-alert{
    background: #FFFFFF;
    box-shadow: 0px 5px 19px -9px rgba(77, 128, 220, 0.5);
    border-radius: 34.5px;
}

/* Banner */
.carousel-indicators{
    margin-bottom: 0;
}
.carousel-indicators [data-bs-target]{
    border-radius: 50%;
    width: 7px;
    height: 7px;
    border-top: 5px solid transparent;
    border-bottom: 5px solid transparent;
}
.carousel-control-next,.carousel-control-prev{
    height: 45px;
    width: 40px;
    opacity: 1;
    font-size: 1.5rem;
    top: auto;
    z-index: 3;
}
.carousel-control-next{
    background: #EA7A6D;
    right: 225px;
}
.carousel-control-prev{
    background: #6DA4EA;
    right: 270px;
    left: auto;
}

/* Services */
.kg-services{
    margin-top: 80px;
}
.kg-services div[class*='col']{
    margin-bottom: 30px;
}
.img-outer:hover{
    background: #F6F8FF;
}
.img-outer{
    border-radius: 48px;
    padding: 25px 0px;
}
.img-border{
    background: #FFFFFF;
    border: 1px solid #FBFBFB;
    box-sizing: border-box;
    box-shadow: 0px 11px 16px -6px rgba(69, 95, 193, 0.5);
}

/* Alert Boxes */
.third-alert{
    margin-bottom: 6rem;
}

/* News Article */
.section-articles .image-container img{
    object-fit: cover;
}


/* Saranya Code */

.head-light-grey{color: #ababab; line-height: 23px;}
.govt-websites, .section-articles, .section-what-new{margin:130px 0px;}
/* .govt-websites img{width: 100px;} */

.section-articles img{border-radius: 15px;}
.section-articles .article-date, .section-articles .article-readmore, .section-articles .fa-angle-double-right,#news-update-feed center a{color:#6DA4EA;}
.section-articles .article-author, .head-dark{color: #434343}
.section-articles .article-current-title{ margin-bottom: 0px;}
.section-articles .article-title{
    position: relative;
    z-index: 1;
    /* padding-bottom: 1rem; */
    margin-bottom: 0;
  }
  .section-articles #article-recent a .article-title{
    border-bottom:1px solid #dee2e6;
    width: fit-content;
  }
  .section-articles #article-recent a:last-child .article-title{
      border: none;
  }



  .section-what-new #col-gov-cm
  {
    background: #FFFBF3;
    border-radius: 15px;
    padding: 100px 0px 100px 70px;
    /* vertical-align: middle; */
    margin-top: 50px;
    margin-bottom: 50px;
    border-bottom-right-radius: 0;
    border-top-right-radius: 0;
  }
  .right-sec-news{
      padding-left: 0;
  }
  .section-what-new .image-gov-cm, .image-gov-cm + .col-lg-6{text-align: center;}
  .section-what-new .image-gov-cm img
  {
    width:160px;
    height:160px;
    border-radius: 50%;
    object-fit: cover;
  }
  .section-what-new #gov-details
  {
    margin-bottom: 20px;
  }

  .section-what-new #col-new-updates
  {
    background: #F3FAFF;
    border-radius: 15px;
    padding: 15px 25px;
  }
  .section-what-new #col-new-updates .blue-head {background: #6DA4EA !important; border-radius: 20px;     margin: auto 25%;}

  .section-what-new #col-new-updates .table-row {
    display:table-row;
}
.section-what-new #col-new-updates .rowGroup {
    display:table-row-group;
}
.section-what-new #col-new-updates .table-cell {
    display: table-cell;
    /* font-size: 10px; */
    border-bottom: 1px solid #dee2e6;
    color: black;
    vertical-align: middle;
}

.section-what-new .news-date
{
  background: #EA7A6D;
    padding: 2px 4px;
    border-radius: 15px;
  }
  .section-what-new .red-arrow
  {
    background: #EA7A6D;
    padding: 3px 9px;
    border-radius: 50%;
    font-size: 20px;
  }
/* .govt-websites .col{
    height: 90px;
    position: relative;
} */
.govt-websites .col img{
    max-height: 100%;
    /* max-width: 100%; */
    /* position: absolute; */
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
    height: 100%;
    width: 100%;
    object-fit: scale-down;
}
  
/*Footer css*/

footer
{
    background: #E5F0FF;
}
.footer-top
{
    background: #E5F0FF;
    padding-top:30px;
    padding-bottom:30px; 
}

.footer-text
{
    color: #3464A0;
    /* font-size: 16px; */
    line-height: 37px;
}
.footer-logo
{
    /* height: 50px;
    width: 100px; */
    margin: 5px;
    border-radius: 10px;
}
/* .footer-logo.csm-logo,.footer-logo.stqc-logo
{
    width:50px;
    height: 50px;
} */
footer .fa{
    font-size: 2.25rem;
}
.footer-top .fa
{
    color: #5D91D2 !important;
    width:18px;
    height:36px;
    /* font-size: 2.25rem; */
}
.footer-bottom
{
    background: #5D91D2;
    line-height: 20px !important;
    padding-top:15px;
    padding-bottom: 15px;
}
.footer-bottom .row{
    margin: 0 25%;
}
.footer-bottom .footer-text{line-height: 20px;}

.footer-top div[class*='col']{
    border-left:1px solid #6DA4EA;
    /* padding: 0 35px; */
    padding-left: 35px;
}
.footer-top div[class*='col']:first-child{
    border:none;
    padding-left: 0;
}
footer .fixed-icons{position: fixed;right:15px; bottom:20px;}
footer .fixed-icons .fa-youtube{color:#ff0000;}
footer .fixed-icons .btn
{
background-color: #fff;
border-radius: 50px;
padding: 8px 6px;
margin: 10px 0;
border-radius: 50px !important;
display: none;
}
.tooltip-inner{
    background-color: #fff;
    color: #444;
}
.tooltip-arrow {display: none !important;}
#youtube-toast{
    background: #FFFFFF;
    bottom: 160px;
    right: 15px;
    border: 1px solid #FBFBFB;
    box-sizing: border-box;
    box-shadow: 0px 11px 16px -6px rgba(69, 95, 193, 0.5);
    border-radius: 13px;
}
#youtube-toast .toast-body{
    padding: 0.3rem;
}


@media (max-width:767px){
    .footer-top div[class*='col']
    {
    border: none;
    padding: 10px 20px;
    width: 50%;
    } 
    .col-sitemap
    {
    order:2 !important;
    }
    .col-footerlogo
    {
    order:4 !important;
    }
    .section-articles .article-title:before
    { 
    width:100% !important;
    }
    .right-sec-news {
        padding: 0 35px;
    }    
    .section-what-new #col-new-updates{
        padding: 15px 15px;
    }
}

@media (max-width: 576px){
  #article-current, #article-current .article-schema{
    text-align: center !important;
  }
}

@media (max-width: 992px){
  .section-articles .article-title:before
    { 
      width:100% !important;
    } 
}
@media (min-width: 992px){
  .section-articles .article-title:before
{ 
  width:75% !important;
} 
/* .section-what-new .image-gov-cm{text-align: right !important;} */
.image-gov-cm + .col-lg-6{text-align: left !important;}
}


/* Max Media Queries */
@media (max-width:1440px){
    /* .img-border{
        padding: 30px;
        margin: 0 43px;
    } */
}
@media (max-width:1399px){
    .section-articles .article-title{
        padding-bottom: 0.5rem;
    }
    .kg-h-font{
        font-size: 1.875rem;
    }
}
@media (max-width: 1366px){
    .kg-t-font {
        font-size: 0.875rem;
    }
    .main-nav-menu li.nav-item{
        margin-right: 9px;
    }
}
@media (max-width:1200px) {
    .img-outer{
        padding: 13px !important;
    }
    .main-nav-menu li.nav-item{
        margin-right: 3px;
    }
    .kg-t-font{
        font-size: 0.8rem;
    }
    .search{
        width: 32vw;
    }
    .footer-logo{
        width: 80px;
        height: 50px;
    }
    .footer-top div[class*='col']{
        padding-left: 15px;
    }
}
@media (max-width:1023px) {
    .kg-p-spacing{
        margin-left: 18px;
        margin-right: 18px;
    }
    .top-bar [class*='col']{
        padding: 0;
    }
    /* .top-bar .nav-link{
        padding: 2px;
    } */
    .font-size-btn li a{
        margin-top: 2px !important;
    }
    .top-bar .nav-item form{
        padding-left: 4px;
    }
    .main-nav-menu li.nav-item {
        margin-right: 0px;
    }
    .desk-nav{
        display: none;
    }
    .kg-p-font {
        font-size: 1.1rem;
    }
    .kg-s-font {
        font-size: 1.1rem;
    }
    /* .main-title img {
        margin-right: 9px !important;
    } */
    /* .sign_in-btn{
        margin-left: 0 !important;
    } */
    .mobile-nav-menu li{
        margin-right: 0 !important;
    }
    .mobile-nav-menu a{
        padding-left: 10px !important;
    }
    .mobile-nav-menu .dropdown-menu{
        min-width: auto !important;
    }
    .main-nav-menu .dropdown-menu div[class*='col']{
        border-right: 1px solid #F0F0F0;
        margin: 0 !important;
        color: black;
        padding-left: 40px !important;
    }
    .main-nav-menu .dropdown-menu div[class*='col']:last-child{
        border:none;
    }
    footer .col-md.col-footerlogo .list-unstyled
    {
    display: flex !important;
    }
    .col-about-portal, .col-sitemap
    {
    border-right: 1px solid #5D91D2 !important;
    }
    .section-articles .article-title:before
    { 
    width:60% !important;
    }
    .section-what-new #col-new-updates{
        padding: 15px 40px;
    }
    /* .section-articles .image-container
    {
        margin-bottom: 25px;
    } */
}
@media (max-width: 991px){
    .img-border{
        margin: 0 115px;
        padding: 15px;
    }
    .right-sec-news {
        padding: 0 60px;
    }
    .section-what-new #col-gov-cm {
        margin-bottom: -50px;
    }
}
@media (max-width:767px){
    .main-nav-menu .dropdown-menu div[class*='col']:first-child{
        border-right: 1px solid #F0F0F0;
    }
    .main-nav-menu .dropdown-menu div[class*='col']{
        border-right: none;
    }
    .img-border{
        margin: 0 72px;
        padding: 15px;
    }
}
@media (max-width:591px){
    .search{
        width: 75vw !important;
    }
    .search_input{
        width: 79% !important;
    }
    .main-title h1{
        padding-top: 0;
    }
    .img-border{
        margin: 0 45px;
        padding: 15px;
    }
}
@media (max-width:575px){
    .main-nav-menu .dropdown-menu div[class*='col']{
        border-right: none !important;
    }
    /* .main-title img{
        width: 72px !important;
        height: 48px !important;
    } */
}
@media (max-width:375px){
    .img-border{
        margin: 0 35px;
        padding: 15px;
    }
    .section-what-new #col-gov-cm{
        padding: 100px 0px 100px 30px !important;
    }
    .right-sec-news{
        padding: 0 25px !important;
    }
    .section-what-new #col-new-updates{
        padding: 15px 10px !important;
    }
    .section-what-new #col-new-updates .blue-head{
        margin: auto 15% !important;
    }
}
@media (max-width:374px){
    .img-border{
        margin: 0 20px;
        padding: 15px;
    }
}
@media (max-width: 350px){
    .social-btn{
        padding-left: 0 !important;
    }
    .twitter-btn{
        margin-left: 0 !important;
    }
}



/* Min and Max Media Quries */
@media (min-width: 320px) and (max-width: 450px){
    /* .main-title img{
        margin-left: 20px;
    } */
    .kg-p-font{
        font-size: 0.8rem;
    }
    .kg-s-font{
        font-size: 0.8rem;
    }
    /* .main-nav div.col-8,.main-nav div.col-4{
        width: 50%;
    } */
    .main-title h1{
        float: left;
    }
    .main-title h4{
        float: left;
    }
    .search{
        width: 63vw !important;
    }
    .search_input{
        width: 79% !important;
    } 
}
@media (min-width:1024px) and (max-width:1336px){
    .kg-p-font{
        font-size: 0.9em;
    }
    .kg-s-font{
        font-size: 0.8em;
    }
    .main-nav-menu li.nav-item:last-child {
        margin-right: 0 !important;
    }
}
@media (max-width:769px) and (min-width: 767px){
    .main-title h1{
        padding-top: 10px;
    }
}



/* Min Media Queries */
@media (min-width: 992px){
    .kg-services div[class*='col']{
        width: 20%;
    }
    .section-what-new #col-new-updates .table-cell.news-title{
        padding: 5px 0;
    }
    .img-border{
        padding: 30px;
        margin: 0 20px;
    }
    #fth-col-img{
        padding-top: 28px;
    }
}
@media (min-width:1024px){
    .main-nav-menu .nav-item:hover .dropdown-menu{ display: block; }
    .main-nav-menu .dropdown-menu div[class*='col']{
        border-right: 1px solid #F0F0F0;
        margin-left: 14px;
        color: black;
    }
    .main-nav-menu .dropdown-menu div[class*='col']:last-child{
        border:none;
        margin-right: 22px;
    }
}
@media (min-width: 1200px){
    .search{
        width: 36vw;
    }
    .img-border{
        padding: 30px;
        margin: 0 38px;
    }
    .section-what-new #col-new-updates .table-cell.news-title{
        padding: 15px 0;
    }
}
@media (min-width:1201px) and (max-width:1399px){
    .img-border {
        padding: 30px;
        margin: 0 51px;
    }
}
@media (min-width: 1367px){
    .main-nav-menu li.nav-item{
        margin-right: 25px;
        width: auto;
    }
}
@media (min-width:1400px){
    .img-border{
        padding: 30px;
        margin: 0 69px;
    }
    .third-alert{
        padding: 0 175px;
    }
    .section-articles .article-title{
        padding-bottom: 1rem;
    }
}
</style>
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>
</head>
<body>
 <div class="row d-lg-block d-sm-none float-end mt-2">
          <nav class="navbar main-nav-menu navbar-expand-lg">
              <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 kg-t-font">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle py-2 px-2" href="#" id="about-dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      About Kerala
                    </a>
                    <div class="dropdown-menu kg-f-font" aria-labelledby="about-dropdown">
                      <div class="row align-items-start" id="submenu">
                        <div class="col">
                          <ul class="list-unstyled">
                            <li><a class="dropdown-item" href="#">State</a></li>
                            <li><a class="dropdown-item" href="#">District</a></li>
                            <li><a class="dropdown-item" href="#">History</a></li>
                            <li><a class="dropdown-item" href="#">Economy</a></li>
                          </ul>
                        </div>
                        <div class="col">
                          <ul class="list-unstyled">
                            <li><a class="dropdown-item" href="#">Elections</a></li>
                            <li><a class="dropdown-item" href="#">Judiciary</a></li>
                            <li><a class="dropdown-item" href="#">Census 2011</a></li>
                            <li><a class="dropdown-item" href="#">Literature</a></li>
                          </ul>
                        </div>
                        <div class="col">
                          <ul class="list-unstyled">
                            <li><a class="dropdown-item" href="#">Tourism</a></li>
                            <li><a class="dropdown-item" href="#">Festivals</a></li>
                            <li><a class="dropdown-item" href="#">Lifestyle</a></li>
                            <li><a class="dropdown-item" href="#">Recreation</a></li>
                          </ul>
                        </div>
                      </div>                      
                    </div>                    
                  </li>
                  <li class="nav-item">
                    <a class="nav-link py-2 px-2" href="#">Government</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link py-2 px-2" href="#">Services</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link py-2 px-2" href="#">Flagship Projects</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link py-2 px-2" href="#">Documents</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link py-2 px-2" href="#">Media</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link py-2 px-2" href="#">Contact Us</a>
                  </li>
                </ul>
              </div>
          </nav>
        </div>
      </div>
</div>


  
  <strong><label>Original String:</label></strong>
  <span id="demo0"></span>

  <br>
  <br>
  
  <strong><label>Encrypted:</label></strong>
  <span id="demo1"></span>
<input type="text" name="demoa" value="{{ $encccc }}" id="demoa">

  <br>
  <br>
  
  <strong><label>Decrypted:</label></strong>
  <span id="demo2"></span>

  <br> 
  <br>

  <strong><label>String after Decryption:</label></strong>
  <span id="demo3"></span>

  
  <br />
  <br />
 
</body>

<script>
    
    $( document ).ready(function() {
        alert("sdsdfsdf");
      // var key = 'L2jMKOxaC4SbLJotN/sazxfKPPnjLf4ciGKH7g9TOQc='; // this is laravel key in .env file
        //var eeee='hello world';
       // INIT
//var myString   = $('#demoa').val();
var myPassword = "L2jMKOxaC4SbLJotN/sazxfKPPnjLf4ciGKH7g9TOQc=";

// PROCESS
//var encrypted = CryptoJS.AES.encrypt(myString, myPassword);
var encrypted = $('#demoa').val();
var decrypted = CryptoJS.AES.decrypt(encrypted, myPassword);
document.getElementById("demo0").innerHTML = myString;
document.getElementById("demo1").innerHTML = encrypted;
document.getElementById("demo2").innerHTML = decrypted;
document.getElementById("demo3").innerHTML = decrypted.toString(CryptoJS.enc.Utf8);

        });
    </script>
</html>
