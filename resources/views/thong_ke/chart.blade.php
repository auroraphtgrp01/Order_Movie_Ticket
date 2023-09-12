{{-- @extends('admin.share.master')
@section('content')
    <div class="" id="app">
        <div class="card">
            <div class="card-body row">
                <div class="col-md">
                    <input type="date" name="" v-model="begin" id="" class="form-control">
                </div>
                <div class="col-md">
                    <input type="date" name="" v-model="end" id="" class="form-control">
                </div>
                <div class="col-md">
                    <button v-on:click="thongKe()" class="btn btn-primary w-100">
                        Thống Kê
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
        integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                begin: '',
                end: ''
            },
            created() {
                this.end = moment(new Date()).format('YYYY-MM-DD');
                this.begin = moment().subtract(7, 'days').format('YYYY-MM-DD');
            },
            methods: {
                thongKe() {
                    console.log('sdsd');
                    var payload = {
                        'begin': this.begin,
                        'end': this.end,
                    }
                    axios
                        .post('/api/admin/thong-ke/bt-1', payload)
                        .then((res) => {

                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0], 'Error');
                            });
                        });
                }
            },
        });
    </script>
@endsection --}}
