<script src="{{ asset('frontend/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/plugins/waypoints.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/plugins/meanmenu.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/plugins/swiper.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/plugins/slick.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/plugins/wow.js') }}"></script>
<script src="{{ asset('frontend/assets/js/vendor/magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/vendor/type.js') }}"></script>
<script src="{{ asset('frontend/assets/js/plugins/counterup.js') }}"></script>
<script src="{{ asset('frontend/assets/js/plugins/nice-select.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/vendor/jquery-ui.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/plugins/parallax-scroll.js') }}"></script>
<script src="{{ asset('frontend/assets/js/vendor/ajax-form.js') }}"></script>
<script src="{{ asset('frontend/assets/js/main.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
    $(document).ready(function() {
        var  url_q_data = $('#url_q_data').val();
        var REQUEST_URI = $('#REQUEST_URI').val();
        var ENDPOINT = "{{ route('blog.lt_list') }}";
        if(url_q_data != '/blog' && url_q_data != '/blog-detail' && url_q_data != '/contact' && url_q_data != '/' && url_q_data != '/public/blog' && url_q_data != '/public/blog-detail' && url_q_data != '/public/contact' && url_q_data != '/public/' && url_q_data != '/privacy-policy' && url_q_data != '/public/privacy-policy'){
            infinteLoadMore()
        }
        function infinteLoadMore() {
            $.ajax({
                url: ENDPOINT,
                datatype: "html",
                type: "get",
            })
            .done(function (response) {
                if (response.html == '') {
                
                    return;
                }
                $("#data-blist").append(response.html);
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log('Server error occured');
            });
        }

        var ENDPOINT2 = "{{ route('video.lt_list') }}";
        if(url_q_data != '/video' && url_q_data != '/contact' && url_q_data != '/' && url_q_data != '/public/video' && url_q_data != '/public/contact' && url_q_data != '/public/' && url_q_data != '/privacy-policy' && url_q_data != '/public/privacy-policy'){
            infinteLoadMore_video()
        }
        function infinteLoadMore_video() {
            $.ajax({
                url: ENDPOINT2,
                datatype: "html",
                type: "get",
            }).done(function (response) {
                if (response.html == '') {
                    return;
                }
                $("#data-vlist").append(response.html);
            }).fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log('Server error occured');
            });
        }

        var ENDPOINT2 = "{{ route('faq.lt_list') }}";
        // if(REQUEST_URI == '/'){
        //     infinteLoadMore_faq()
        // }
        function infinteLoadMore_faq() {
            $.ajax({
                url: ENDPOINT2,
                datatype: "html",
                type: "get",
            }) .done(function (response) {
                if (response.html == '') {
                    return;
                }
                $("#accordionExample").append(response.html);
            }) .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log('Server error occured');
            });
        }
    });
</script>
<script>
    $(document).ready(function() {
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            console.log(type);
            switch (type) {
                case 'info':
                    toastr.options.timeOut = 3000;
                    toastr.info("{{ Session::get('message') }}");
                    // var audio = new Audio('audio.mp3');
                    // audio.play();
                    break;
                case 'success':
                    toastr.options.timeOut = 3000;
                    toastr.success("{{ Session::get('message') }}");
                    // var audio = new Audio('audio.mp3');
                    // audio.play();
                    break;
                case 'warning':
                    toastr.options.timeOut = 3000;
                    toastr.warning("{{ Session::get('message') }}");
                    // var audio = new Audio('audio.mp3');
                    // audio.play();
                    break;
                case 'error':
                    toastr.options.timeOut = 3000;
                    toastr.error("{{ Session::get('message') }}");
                    // var audio = new Audio('audio.mp3');
                    // audio.play();
                    break;
            }
        @endif
    });
</script>