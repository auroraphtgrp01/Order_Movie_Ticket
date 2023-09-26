
<script src="/assets_client/js/jquery.js"></script>
<script src="/assets_client/js/popper.min.js"></script>
<script src="/assets_client/js/bootstrap.min.js"></script>
<script src="/assets_client/js/magnific-popup.min.js"></script>
<script src="/assets_client/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="/assets_client/js/appear.js"></script>
<script src="/assets_client/js/parallax.min.js"></script>
<script src="/assets_client/js/tilt.jquery.min.js"></script>
<script src="/assets_client/js/jquery.paroller.min.js"></script>
<script src="/assets_client/js/owl.js"></script>
<script src="/assets_client/js/wow.js"></script>
<script src="/assets_client/js/swiper.min.js"></script>
<script src="/assets_client/js/touchspin.js"></script>
<script src="/assets_client/js/odometer.js"></script>
<script src="/assets_client/js/mixitup.js"></script>
<script src="/assets_client/js/backToTop.js"></script>
<script src="/assets_client/js/jquery.marquee.min.js"></script>
<script src="/assets_client/js/nav-tool.js"></script>
<script src="/assets_client/js/jquery-ui.js"></script>
<script src="/assets_client/js/script.js"></script>
<script>
    $('document').ready(function(){
        toastr.options.showMethod = 'slideDown';
     toastr.options.progressBar = true;
        new Vue({
            el      :   '#headerNav',
            data    :   {
                check: false,
                user: {},
            },
            created()   {
                this.getHead();
            },
            methods :   {
                getHead() {
                    axios
                        .post('/api/header/userInfo')
                        .then((res) => {
                            if(res.data.status) {
                                this.check=true;
                                this.user=res.data.data;
                                console.log(this.user);
                            }
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function (k, v) {
                                toastr.error(v[0], 'Error');
                            });
                        });
                },
                logOut() {
                    axios
                        .post('/api/header/logout')
                        .then((res) => {
                            toastr.success('Đăng Xuất Thành Công !', 'Success');
                            setTimeout(function(){
                                window.location.href = '/';
                            }, 600);
                        });
                }
            },
        });
    });
</script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="/assets_client/js/respond.js"></script><![endif]-->
<script src="js_api/homepage.js"></script>
