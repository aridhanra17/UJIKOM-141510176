<!DOCTYPE HTML>
<!--
    Projection by TEMPLATED
    templated.co @templatedco
    Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
    <head>
        <title>Penggaijan</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="assets/css/main.css" />
    </head>
    <body>

        <!-- Header -->
            <header id="header">
                <div class="inner">
                    <a href="index.html" class="logo"><strong>Penggajian</strong> </a>
                    <nav id="nav">
                        <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                    </nav>
                    <a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
                </div>
            </header>

        <!-- Banner -->
            <section id="banner">
                <div class="inner">
                    <header>
                        <h1>Welcome to Projection</h1>
                    </header>

                    <div class="flex ">

                        <div>
                            <span class="icon fa-key"></span>
                            <h3><a href="{{url('user')}}"> Private</a></h3>
                        </div>

                        <div>
                            <span class="icon fa-user"></span>
                            <h3><a href="{{url('pegawai')}}">Pegawai</a></h3>
                        </div>

                        <div>
                            <span class="icon fa-money"></span>
                            <h3><a href="{{url('penggajian')}}">Penggajian</a></h3>
                        </div>

                    </div>
                </div>
            </section>


        <!-- Three -->
            

        

        <!-- Scripts -->
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/skel.min.js"></script>
            <script src="assets/js/util.js"></script>
            <script src="assets/js/main.js"></script>

    </body>
</html>