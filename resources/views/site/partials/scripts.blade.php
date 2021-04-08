<!-- JQUERY -->
<script src="{{ asset('site/js/jquery.min.js') }}"></script>
<script src="{{ asset('site/js/jquery-migrate.min.js') }}"></script>

<!-- POPPER JS -->
<script src="{{ asset('site/js/popper.min.js') }}"></script>

<!-- BOOTSTRAP JS -->
<script src="{{ asset('site/js/bootstrap.min.js') }}"></script>

<!-- COLORS JS -->
<script src="{{ asset('site/js/colors.js') }}"></script>

<!-- MODERNIZER JS -->
<script src="{{ asset('site/js/modernizr.min.js') }}"></script>

<!-- NICE SELECT JS -->
<script src="{{ asset('site/js/niceselect.js') }}"></script>

<!-- TILT JQUERY JS -->
<script src="{{ asset('site/js/tilt.jquery.min.js') }}"></script>

<!-- FANCYBOX  -->
<script src="{{ asset('site/js/jquery.fancybox.min.js') }}"></script>

<!-- JQUERY NAV -->
<script src="{{ asset('site/js/jquery.nav.js') }}"></script>

<!-- OWL CAROUSEL JS -->
<script src="{{ asset('site/js/owl.carousel.min.js') }}"></script>

<!-- SLICK SLIDER JS -->
<script src="{{ asset('site/js/slickslider.min.js') }}"></script>

<!-- CUBE PORTFOLIO JS -->
<script src="{{ asset('site/js/cubeportfolio.min.js') }}"></script>

<!-- SLICK NAV JS -->
<script src="{{ asset('site/js/jquery.slicknav.min.js') }}"></script>

<!-- JQUERY STELLER JS -->
<script src="{{ asset('site/js/jquery.stellar.min.js') }}"></script>

<!-- MAGNIFIC POPUP JS -->
<script src="{{ asset('site/js/magnific-popup.min.js') }}"></script>

<!-- WOW JS -->
<script src="{{ asset('site/js/wow.min.js') }}"></script>

<!-- COUNTERUP JS -->
<script src="{{ asset('site/js/jquery.counterup.min.js') }}"></script>

<!-- WAYPOINT JS -->
<script src="{{ asset('site/js/waypoints.min.js') }}"></script>

<!-- JQUERY EASING JS -->
<script src="{{ asset('site/js/easing.min.js') }}"></script>

<!-- MAIN JS -->
<script src="{{ asset('site/js/main.js') }}"></script>

<!-- PLAYER -->
<script src="{{ asset('site/js/plyr.polyfilled.js') }}"></script>
<script>
    const players = Plyr.setup('.js-player');
</script>

<!-- VALIDATE FILE SIZE  -->
<script>
    function showFileSize() {
        let file = document.getElementById("file").files[0];
        let file2 = document.getElementById("file2").files[0];

        if (file) {
            if (file.size > 5000000) {
                event.preventDefault();
                let error = document.getElementById("errorMsg").style.display = 'block';
                let error2 = document.getElementById("sizeMsg").style.display = 'block';
            }else{
                let error = document.getElementById("errorMsg").style.display = 'none';
                let error2 = document.getElementById("sizeMsg").style.display = 'none';
            }
        }

        if (file2) {
            if (file2.size > 2000000) {
                event.preventDefault();
                let error3 = document.getElementById("errorMsg").style.display = 'block';
                let error4 = document.getElementById("sizeMsg2").style.display = 'block';
            }else{
                let error3 = document.getElementById("errorMsg").style.display = 'none';
                let error4 = document.getElementById("sizeMsg2").style.display = 'none';
            }
        }

    }
</script>
