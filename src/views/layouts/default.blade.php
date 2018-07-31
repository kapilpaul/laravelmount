@include('laravelmount::layouts.header')

<body>
    <div class="image-container set-full-height" style="background-image: url('{{ asset('laravelmount/img/paper-5.jpg')
    }}');background-attachment: fixed;" id="laravelmount">
        <!--   Big container   -->
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">

                    <!--      Wizard container        -->
                    <div class="wizard-container">
                        <div class="card wizard-card" data-color="green" id="wizard">
                            @yield('content')
                        </div>
                    </div>
                    <!-- wizard container -->
                </div>
            </div>
            <!-- row -->
        </div>
        <!--  big container -->

        <div class="footer">
            <div class="container text-center">
                Made with <i class="fa fa-heart heart"></i> by <a href="http://kapilpaul.me">Kapil Paul</a>
            </div>
        </div>
    </div>

</body>

@include('laravelmount::layouts.footer')