<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Official Web Portal of Government of Kerala."/>
	<meta name="keywords" content="Kerala, Government, keralagov, KSITM, CDIT, PRD, Kerala government, Kerala CM,online services,offical webportal,kerala portal"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="author" content="Government of Kerala" />
	<meta name="copyright" content="Government of Kerala" />
	<meta name="robots" content="follow"/>
    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="expires" content="0"/>
    <meta name="Kerala-Gov-State-Portal" content="Kerala Gov State Portal">

<script type="text/javascript">
	  var _paq = window._paq = window._paq || [];
	  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
	  _paq.push(['trackPageView']);
	  _paq.push(['enableLinkTracking']);
	  (function() {
	    var u="//product.cdit.org/matomo/";
	    _paq.push(['setTrackerUrl', u+'matomo.php']);
	    _paq.push(['setSiteId', '1']);
	    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
	    g.type='text/javascript'; g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
	  })();
	</script>
	<meta name="Kerala-Gov-Portal" content="Kerala Gov Portal">
	<title> Kerala State Portal </title>
	<link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/x-icon">  

	<link rel="stylesheet" type="text/css" href="{{ asset('assets/webplugins/css/bootstrap.min.css') }}">
	
	<link rel="stylesheet" href="{{ asset('assets/webplugins/css/style.css') }}">
    <link rel="shortcut icon" type="image/jpg" href="{{ asset('assets/webplugins/img/favicon-white.png') }}"/>
   
    <link rel="stylesheet" href="{{ asset('assets/webplugins/glightbox/dist/css/glightbox.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/video-js.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/videojscity.css') }}" />
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/djc7ruy.css">
    <!-- <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"> </script> -->
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"> </script>
	<!-- Matomo -->
	<script type="text/javascript">
		// $('img').attr('onerror',"this.onerror=null;this.src='assets/img/onerror.gif';");
		// window.onload = function(){ 
		// $('img').attr('onerror',"this.onerror=null;this.src='assets/img/onerror.gif';");
		// var srclen=$('img').attr('src');
		// // alert(srclen.length);
		// if (srclen.length > 0) {
		// 	$('img').attr('onerror',"this.onerror=null;this.src='assets/img/onerror.gif';");
		// 	}else{
		// 		$('img').attr('onerror',"this.onerror=null;this.src='assets/img/onerror.gif';");
		// 	}
		// 		}
		// $(document).ready(function(){
		// //   alert('..');
		// var srclen=$('img').attr('src');
		// // alert(srclen.length);
		// if (srclen.length > 0) {
		// 	$('img').attr('onerror',"this.onerror=null;this.src='assets/img/onerror.gif';");
		// 	}else{
		// 		$('img').attr('onerror',"this.onerror=null;this.src='assets/img/onerror.gif';");
		// 	}
		// });
		// 		$("img").error(function () {
		//         $('img').attr('onerror',"this.onerror=null;this.src='assets/img/onerror.gif';");
		// // alert($(this).attr('src'));
		// });
		var _paq = window._paq = window._paq || [];
		/* tracker methods like "setCustomDimension" should be called before "trackPageView" */
		_paq.push(['trackPageView']);
		_paq.push(['enableLinkTracking']);
		(function() {
			var u="//product.cdit.org/matomo/";
			_paq.push(['setTrackerUrl', u+'matomo.php']);
			_paq.push(['setSiteId', '1']);
			var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
			g.type='text/javascript'; g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
		})();
	</script>
	<!-- End Matomo Code -->

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Gayathri:wght@100;400;700&display=swap" rel="stylesheet">
	@php
	if(Session::get('bilingual')==2)
	{
		@endphp
		<style>
		#mainmenus{
				font-family: 'Gayathri', sans-serif !important;
				font-weight: 700 !important;
			}
		#maintitle{
			font-family: 'Gayathri', sans-serif !important;
			font-weight: 700 !important;
			font-size: 30px;
		}
		body{
			font-family: 'Gayathri', sans-serif !important;
		}
		.mal-content
		{
			font-family: 'Gayathri', sans-serif !important;	
		}
		#main-content
		{
			font-family: 'Gayathri', sans-serif !important;	
			font-size: 20px;
		}
		.kg-ix-font{
			font-family: 'Gayathri', sans-serif !important;	
		}
		.kg-ii-font
		{
			font-family: 'Gayathri', sans-serif !important;	
		}
		.font-roboto-normal
		{
			font-family: 'Gayathri', sans-serif !important;
		}
		.kg-iv-font{
			font-family: 'Gayathri', sans-serif !important;
		}
		.font-poppins-normal
		{
			font-family: 'Gayathri', sans-serif !important;
		}
		.font-merriweather-normal
		{
			font-family: 'Gayathri', sans-serif !important;
		}
		</style>
		@php
	}
	@endphp

	<style>
		.modalwind
		{
			cursor: pointer;
		}
	</style>
</head>
<body >
	<div class="mal-content">