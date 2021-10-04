<!-- jquery -->
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"> </script>
<!-- bootstrap -->

<!-- bootstrap/css/bootstrap.min.css -->
<!-- <script src="{{ asset('assets/webassets/assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script> -->
<!-- <script src="{{ asset('assets/webassets/assets/bootstrap/js/bootstrap.min.js') }}"></script> -->

<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"> </script>
<script src="{{ asset('assets/js/popper.min.js') }}"> </script>

<!-- font icon -->
<script src="{{ asset('assets/fontawesome/all.min.js') }}"> </script>
<!-- image slider -->
<script src="{{ asset('assets/js/baguetteBox.min.js') }}"> </script>

<script src="{{ asset('assets/js/inputmask.js') }}" ></script>
<script src="{{ asset('assets/js/inputmask.js') }}" ></script>
<!-- videojs -->
<script src="{{ asset('assets/js/video.js') }}" ></script>
<script src="{{ asset('assets/js/videojs-http-streaming.js') }}" ></script>
<!-- <script src="{{ asset('assets/js/videojs-contrib-hls.min.js') }}" ></script> -->

<script src="{{ asset('assets/webassets/assets/js/glightbox.min.js') }}"></script>
<!-- for preloader and scroll top -->
<script src="{{ asset('assets/webassets/assets/js/main.js') }}"></script>
<script>
    var lightbox = GLightbox();
    lightbox.on('open', (target) => {
        console.log('lightbox opened');
    });
    var lightboxDescription = GLightbox({
        selector: '.glightbox2'
    });
    var lightboxVideo = GLightbox({
        selector: '.glightbox3'
    });
    lightboxVideo.on('slide_changed', ({
        prev,
        current
    }) => {
        console.log('Prev slide', prev);
        console.log('Current slide', current);

        const {
            slideIndex,
            slideNode,
            slideConfig,
            player
        } = current;

        if (player) {
            if (!player.ready) {
                // If player is not ready
                player.on('ready', (event) => {
                    // Do something when video is ready
                });
            }

            player.on('play', (event) => {
                console.log('Started play');
            });

            player.on('volumechange', (event) => {
                console.log('Volume change');
            });

            player.on('ended', (event) => {
                console.log('Video ended');
            });
        }
    });

    var lightboxInlineIframe = GLightbox({
        selector: '.glightbox4'
    });
</script>
