<!-- footer area -->

<footer class="get-footer-area">
    <div class="container text-center">
        <div class="row get-footer-line">
            <div class="get-footer"><a href="{{ url('/') }}"><h2 class="get-logo-text"><span>Get</span>Wobo.</h2></a></div>
            <ul class="social-icon">
                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            </ul>
            <a href="#">Terms and Condition</a>
            <p>© 2018. All rights reserved</p>
        </div>
    </div>
</footer>
</div>

@if(isset($modals))
    @include($modals)
    @endif

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- main js file -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>window.jQuery || document.write('<script src="{{ asset('public/assets/frontend/js/vendor/jquery-3.2.1.min.js') }}"><\/script>')</script>
<!-- bootstrap js -->
<script src="{{ asset('public/assets/frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/assets/frontend/js/plugins.js') }}"></script>
<!-- datepicker js -->
<script src="{{ asset('public/assets/frontend/js/moment.js') }}"></script>
<script src="{{ asset('public/assets/frontend/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('public/assets/frontend/js/zabuto_calendar.js') }}"></script>
<!-- bootstrap selcet js -->
<script src="{{ asset('public/assets/frontend/js/bootstrap-select.js') }}"></script>
<!-- main js file -->
<script src="{{ asset('public/assets/frontend/js/custom.js') }}"></script>

    @if(isset($js))
        @include($js)
        @endif

</body>
</html>