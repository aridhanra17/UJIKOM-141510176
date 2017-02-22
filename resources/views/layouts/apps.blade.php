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
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	    <!-- CSRF Token -->
	    <meta name="csrf-token" content="{{ csrf_token() }}">

	    <title>{{ config('app.name', 'Laravel') }}</title>

	    <!-- Styles -->
	    <link href="/css/app.css" rel="stylesheet">

	    <!-- Scripts -->
	    <script>
	        window.Laravel = <?php echo json_encode([
	            'csrfToken' => csrf_token(),
	        ]); ?>
	    </script>
	</head>
	<body>
	<a class="navbar-brand" href="{{ url('/home') }}">
                        {{ 'HOME' }}
                    </a>
		<!-- Header -->
			<div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <ul class="nav navbar-nav">
                            <li><a href="{{ url('/jabatan') }}">Jabatan</a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li><a href="{{ url('/golongan') }}">Golongan</a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li><a href="{{ url('/pegawai') }}">Pegawai</a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li><a href="{{ url('/tunjangan') }}">Tunjangan</a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li><a href="{{ url('/tunjangan_pegawai') }}">Tunjangan Pegawai</a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li><a href="{{ url('/kategori_lembur') }}">Kategori Lembur</a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li><a href="{{ url('/lembur_pegawai') }}">Lembur Pegawai</a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li><a href="{{ url('/penggajian') }}">Penggajian</a></li>
                        </ul>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>

			<footer id="footer">
				<div class="inner">
					@yield('content')
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>