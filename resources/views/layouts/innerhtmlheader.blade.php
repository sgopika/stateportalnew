<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Official Web Portal of Government of Kerala." />
	<meta name="keywords" content="Kerala, Government, keralagov, C-DIT" />
	<meta name="author" content="C-DIT" />
	<meta name="copyright" content="C-DIT" />
	<meta name="robots" content="follow" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="Kerala-Gov-Portal" content="Kerala Gov Portal">
	<title> Noticeboard Portal </title>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fonts.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/metro-colors.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/fontawesome/all.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/buttons.dataTables.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/summernote/summernote-bs4.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dropzone.min.css') }}">
	<style>
		.hasError {
			color: red;
		}

		#loader {
			position: fixed;
			left: 50%;
			top: 5%;
			/* width: 100%;
        height: 100%; */
			z-index: 9999;
			opacity: .8;
		}

		.loader {
			border: 16px solid #fbfbfb;
			border-radius: 50%;
			border-top: 16px solid #ff0f0f;
			width: 120px;
			height: 120px;
			-webkit-animation: spin 2s linear infinite;
			/* Safari */
			animation: spin 2s linear infinite;
		}

		/* Safari */
		@-webkit-keyframes spin {
			0% {
				-webkit-transform: rotate(0deg);
			}

			100% {
				-webkit-transform: rotate(360deg);
			}
		}

		@keyframes spin {
			0% {
				transform: rotate(0deg);
			}

			100% {
				transform: rotate(360deg);
			}
		}
	</style>

	@include('layouts.jsfooter')
</head>
<script type="text/javascript">
$('.sabstab tr').each(function () {
            $(this).on('click',function () {
                var selected = $(this).hasClass('highlited');
                $('.sabstab tr').removeClass('highlited');
                if (!selected) $(this).addClass('highlited');
            });
        });
$(document).ready(function() {
    
    $('.summernote').summernote({
        tdClassName:'tbbr',
        tableClassName: function() {
        this.className = 'table table-bordered sabstab';
        this.style.cssText = '';
        
    },popover: {
      table: [
        ['add', ['mergeRow','addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
        ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
        ['custom', ['tableStyles']]
      ],
    },
                    height: 400,
                    callbacks: {
            onPaste: function (e) {
                if (document.queryCommandSupported("insertText")) {
                    var text = $(e.currentTarget).html();
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');

                    setTimeout(function () {
                        document.execCommand('insertText', false, bufferText);
                    }, 10);
                    e.preventDefault();
                } else {
                    var text = window.clipboardData.getData("text")
                    if (trap) {
                        trap = false;
                    } else {
                        trap = true;
                        setTimeout(function () {
                            document.execCommand('paste', false, text);
                        }, 10);
                        e.preventDefault();
                    }
                }
             
            }
        }
                });
    $('img').attr('onerror', "this.onerror=null;this.src='assets/img/onerror.gif';");

});
// $('img').attr('onerror', "this.onerror=null;this.src='assets/img/onerror.gif';");

$("img").on("error", function() {
    // $('img').attr('src','assets/img/onerror.gif');
    $('img').attr('onerror', "this.onerror=null;this.src='assets/img/onerror.gif';");

});

// function summernoteval(id){
//     $('#'+id).summernote({
//     callbacks: {
//             onPaste: function (e) {
//                 if (document.queryCommandSupported("insertText")) {
//                     var text = $(e.currentTarget).html();
//                     var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');

//                     setTimeout(function () {
//                         document.execCommand('insertText', false, bufferText);
//                     }, 10);
//                     e.preventDefault();
//                 } else {
//                     var text = window.clipboardData.getData("text")
//                     if (trap) {
//                         trap = false;
//                     } else {
//                         trap = true;
//                         setTimeout(function () {
//                             document.execCommand('paste', false, text);
//                         }, 10);
//                         e.preventDefault();
//                     }
//                 }
             
//             }
//         }
//     });
// }

function summernoteval(id) {
    var charRegExp = /[#$^]/;
    var textareaValue1 = $('#' + id).summernote('code').replace(/(<([^>]+)>)/ig, "");
    if (charRegExp.test(textareaValue1)) {
        // $('#enbrief').summernote('undo');
        return false;
    } else {
        var str1 = textareaValue1;
        var str2 = "&lt;";
        var str3 = "&gt;";
        if (str1.indexOf(str2) != -1) {
            // $('#enbrief').summernote('undo');
            return flase;

        } else {
            // $("#"+id).children("table").
            // $('#'+id)
            return true;
        }
    }
}

//Alternative Text English

function entitleregex(testval) {
    var tested = new RegExp('^[a-zA-Z0-9 ???\\:\\&\\`,\\(\\)\\.\\_\\-\\"\\\'\/\s]+$');
    if (!tested.test(testval)) {
        return false;

    } else {
        return true;
    }
}

function fileNumeregex(testval) {
    var tested = new RegExp('^[a-zA-Z0-9().,\-\/\\s]+$');
      if (!tested.test(testval)) {
        return false;

      } else {
        return true;

      }
}

//Alternative Text Malayalam
function maltitleregex(testval) {
    var specialChars = "+%!*#@~\[\]\^"
    var check = function(string) {
        for (i = 0; i < specialChars.length; i++) {
            if (string.indexOf(specialChars[i]) > -1) {
                return 'true1'
            }
        }
        return 'false1';
    }
    if (check(testval) == 'false1') {
        return true;
    } else {
        return false;
    }
}

function numonly(testval) {
    var tested = new RegExp('^[0-9. \s]+$');
    if (!tested.test(testval)) {
        return false;
    } else {
        return true;
    }
}

function urlreg(testval) {
    var regex = new RegExp(
        "^(http[s]?:\\/\\/(www\\.)?|ftp:\\/\\/(www\\.)?|www\\.){1}([0-9A-Za-z-\\.@:%_\+~#=]+)+((\\.[a-zA-Z]{2,3})+)(/(.)*)?(\\?(.)*)?"
    );

    if (regex.test(testval)) {
        return true;
    } else {
        return false;
    }

}
</script>
<body>