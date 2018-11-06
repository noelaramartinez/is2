<html lang="{{ app()->getLocale() }}">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <title>UVM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">  --}}
    <link href="{{ asset('css/angular-material.min.css') }}" rel="stylesheet" type="text/css">
    <style>
        html,
        body {
            background-color: #fff;
            color: #111;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        ul li {
            list-style: none;
        }

        a,
        a:hover {
            text-decoration: none;
            color: white;
        }

        nav {
            display: block;
            margin: 0;
        }

        nav.menu>ul>li:hover {
            cursor: pointer;
        }

        .seccion {
            position: relative;
        }

        .fondo-gris {
            background-color: #eeeeee;
        }

        .fondo-oscuro {
            background-color: rgba(0, 0, 0, .8);
        }

        .gris-translucido {
            background-color: rgba(0, 0, 0, .5);
        }

        .seccion-ligas {
            list-style: none;
        }

        .texto-blanco {
            color: whitesmoke;
        }

        .menu,
        .menu-bar {
            margin: auto;
            text-align: left;
            color: fff;
            font-weight: bold;
            font-size: .8em;
            position: relative;
            background-color: rgba(0, 0, 0, .5);
            width: 90%;
            z-index: 1;
        }

        .menu ul,
        .menu-bar ul {
            margin: 0;
            padding: 0;
        }

        .menu-bar ul li {
            list-style: none;
            display: inline-block;
        }



        /*
        =================================
            Menu desplegable responsivo
        =================================
        */

        .navi {
            height: 48px;
        }

        .navi>li {
            float: left;
            border-top: 4px solid #C00;
        }

        .navi>li:hover {
            background-color: rgba(0, 0, 0, .7);
            border-top: 4px solid rgba(0, 0, 0, .7);
        }

        .navi>li {
            padding: 16px;
        }

        .navi li ul {
            display: none;
        }

        .navi>li:hover>ul {
            display: inline-table;
            position: absolute;
            background-color: #333333;
            min-width: 200px;
            margin-left: -16px;
            padding-left: 16px;
        }

        .navi li ul li:hover {
            background-color: #555555;
            margin-left: -16px;
            border-left: 16px solid #555555;
        }

        .navi li ul li:hover> ul {
            display: inline-block;
            position: absolute;
            background-color: #333333;
            min-width: 200px;
            padding-left: 16px;
            margin-left: 16px;
        }


        /* .navi {
            height: 32px;
        }

        .navi>li {
            float: left;
            height: 100%;
            border-top: 4px solid #C00;
        }

        .navi>li>ul {
            display: none;
        }

        .navi>li:hover {
            background-color: rgba(0, 0, 0, .7);
            border-top: 4px solid rgba(0, 0, 0, .7);
        }

        .navi>li a {
            padding: 40px 16px 16px 16px;
            color: white;
            text-decoration: none;
        }

        .navi>li:hover>ul {
            display: block;
            background-color: #333333;
            position: relative;
        }

        .navi> li> ul> li {
            position: relative;
            display: block;
        }

        .navi> li> ul> li> ul {
            position: relative;
            display: none;
        }

        .navi> li> ul> li:hover ul {
            background-color: #555555;
            display: inline-block;
            margin-top: -16px;
            position: absolute;
            margin-left: 100%;
        } */



        /*
        =================================
            Fin Menu desplegable responsivo
        =================================
        */

        svg:focus {
            outline: none;
        }

        .contenedor-principal {
            margin-top: -85px;
        }

        .menu-bar {
            position: absolute;
            width: 100%;
            margin-top: -400px;
        }

        .menu-bar ul li {
            padding: 10px;
        }

        #waldenImg {
            width: 100%;
        }

        /*
            css para carrousel
            */
        .slider {
            margin: 0 auto;
            width: 100%;
            overflow: hidden;
            position: relative;
        }

        .slider ul {
            padding: 0;
            display: flex;
            width: 200%;
            animation: slide 9s infinite alternate;
        }

        .slider li {
            width: 100%;
        }

        .slider img {
            width: 100%;
            height: 100%;
        }

        @keyframes slide {
            0% {
                margin-left: 0;
            }

            33% {
                margin-left: 0%;
            }

            66% {
                margin-left: -100%;
            }

            100% {
                margin-left: -100%;
            }
        }

        /*fin css para carousel*/
        .footer {
            background-color: #222222;
            color: white;
        }
    </style>
</head>

<body>
    @section('sidebar')
    <nav class="menu gris-translucido">
        <!-- <h1> ESTE ES EL MENU PRINCIPAL </h1> -->
        <ul class="navi">
            <li><a href="#">ASPIRANTES </a></li>
            <li><a href="#">ESTUDIANTES </a></li>
            <li><a href="#">PADRES </a></li>
            <li><a href="#">PROFESORES </a></li>
            <li><a href="#">ORGANIZACIONES </a></li>
            <li><a href="#">CAMPAÑA 2018 </a></li>
            <li><a href="#">GRADUACIÓN </a>
                <ul>
                    <li> <a href="#"> RESERVACIÓN </a>
                        <ul>
                            <li> <a href="login"> LOG IN </a></li>
                            <li> <a href="#">ADEUDOS O PAGOS </a>
                                <ul>
                                    <li> <a href="referencia"> No. REFERENCIA </a> </li>
                                    <li> <a href="copia"> COPIA </a> </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li> <a href="mesas"> MESAS </a> </li>
                </ul>

            </li>
            <li><a href="inicio">INICIO </a>
        </ul>
    </nav>
    @show

    <div class="contenedor-principal">
        @yield('contenido')
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>

<script src="{{ asset('js/angular/angular.min.js') }}"></script>
<script src="{{ asset('js/angular/angular-animate.min.js') }}"></script>
<script src="{{ asset('js/angular/angular-aria.min.js') }}"></script>
<script src="{{ asset('js/angular/angular-messages.min.js') }}"></script>
<script src="{{ asset('js/angular/angular-material.min.js') }}"></script>
<script src="{{ asset('js/angular/angular-cookies.min.js') }}"></script>
<script src="{{ asset('js/angular/angular-sanitize.min.js') }}"></script>
<script src="{{ asset('js/ngMain.js') }}"></script>

</html>