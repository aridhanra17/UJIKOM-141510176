<!DOCTYPE HTML>
<!--
    Projection by TEMPLATED
    templated.co @templatedco
    Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
    <head>
        <title>Penggajian</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="assets/css/main.css" />
    </head>
    <body>

        <!-- Header -->

        <!-- Banner -->
            <section id="banner">
                <div class="inner">
                    <header>
                        <h1>Hallo {{ Auth::user()->name }}</h1>
                    </header>
                    <center><img src="{{ asset('gambar/'.$pegawai->photo.'') }}" width="100" height="100"></center> 
                    <br>
                    <div class="flex ">

                        <div>
                            <span class="icon fa-user"></span>
                            <h3>{{ Auth::user()->email }}</h3>
                        </div>

                        <div>
                            <span class="icon fa-money"></span>
                            <h3>Gaji Anda Rp. {{ $gaji_kar }}</h3>
                        </div>

                        <div>
                            <span class="icon fa-newspaper-o"  ></span></span>
                            @if($gaji->status_pengambilan == 0)
                        
                            <p>Gaji Belum Diambil <p>
                        
                            @endif
                            @if($gaji->status_pengambilan == 1)
                            
                                <h3>Gaji Sudah Diambil</h3>
                            
                            @endif
                        </div>

                    </div>
                        
                        <footer>
                        <a href="{{url('/logout')}}" class="button"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                                                     <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                    </footer>
                </div>
            </section>

        <!-- Scripts -->
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/skel.min.js"></script>
            <script src="assets/js/util.js"></script>
            <script src="assets/js/main.js"></script>

    </body>
</html>