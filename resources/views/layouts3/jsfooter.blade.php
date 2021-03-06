<!-- <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"> </script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<!-- <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script> -->
<script src="{{ asset('assets/js/popper.min.js') }}"> </script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"> </script>
<script src="{{ asset('assets/fontawesome/all.min.js') }}"> </script>
<script src="{{ asset('assets/js/baguetteBox.min.js') }}"> </script>
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/js/select2.full.min.js') }}" ></script>
<script src="{{ asset('assets/js/inputmask.js') }}" ></script>
<script src="{{ asset('assets/js/inputmask.js') }}" ></script>
<!-- <script src="{{ asset('assets/summernote_new/dist/bundle.js') }}"></script> -->
<!-- working -->
<!-- <script src="{{ asset('assets/summernote/summernote-bs4.js') }}"></script> -->


<script src="{{ asset('assets/sumernotewithmerge/script/summernote/summernote-lite.min.js') }}"></script>
<script src="{{ asset('assets/sumernotewithmerge/script/summernote/plugin/table/summernote-ext-table.js') }}"></script>
<script>
        $(document).ready(function () {
            $('.summernote').summernote({
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                    ['fontname', ['fontname', 'fontsize', 'color']],
                    ['para', ['ul', 'ol', 'paragraph', 'height']],
                    ['insert', ['hr', 'jTable', 'link', 'picture']],
                    ['misc', ['undo', 'redo', 'fullscreen','codeview','help']],
                ],
                popover: {
                    table: [
                        ['merge', ['jMerge']],
                        ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
                        ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
                        ['style', ['jBackcolor', 'jBorderColor', 'jAlign', 'jAddDeleteRowCol']],
                        ['info', ['jTableInfo']],
                        ['delete', ['jWidthHeightReset', 'deleteTable']],
                    ],
                    image: [
                        ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                        ['float', ['floatLeft', 'floatRight', 'floatNone']],
                        ['remove', ['removeMedia']]
                    ],
                    link: [
                        ['link', ['linkDialogShow', 'unlink']]
                    ],
                },
                jTable: {
                    /**
                     * drag || dialog
                     */
                    mergeMode: 'drag'
                }
            });
        });
    </script>




<!-- <script src="{{ asset('assets/js/dropzone-config.js') }}" ></script>
<script src="{{ asset('assets/js/dropzone.js') }}" ></script> -->
<script src="{{ asset('assets/webplugins/js/style.js') }}" ></script>
<script src="https://unpkg.com/xregexp@5.0.2/xregexp-all.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xregexp/3.2.0/xregexp-all.min.js"></script>
<script src="{{ asset('assets/js/video.js') }}" ></script>
<script src="{{ asset('assets/js/videojs-http-streaming.js') }}" ></script>
<script src="{{ asset('assets/js/videojs-contrib-hls.min.js') }}" ></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> 
<script src="{{ asset('assets/js/sweetalertjs.js') }}"></script>


