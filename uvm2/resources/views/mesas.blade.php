@extends('index')

@section('title', 'UVM')

@section('sidebar')
@parent
@endsection

@section('contenido')

<br />
<br />
<br />
<br />
<br />

@php
$cantidadMesasFila=8;
$cantidadSillas = 12;
$filas = 3;
$idMesa= 0;
$cxMesa = 0;
$cyMesa = 0;
$vectorNormal = 62.5;
$radioMesa = 40;
$radioSilla = 10;

$colorMesa = "#222";
$colorSilla = "#111";
$colorNumAsiento = "#A5CDF3";
$colorMesa = "#848484";
$colorSilla = "#848484";
$idLugar = 0;
$arrReservacion = [];
$rIdM = "";
$rIdS = "";
$status = 0;
$sillaEncontrada = false;
$nombres = "";
$paterno = "";
$asientosDisponibles = 0;
$idReservacionUsuario = 0;
$indexMS = 0;
$idReserv = -1;
$arrMesas = [];
$arrMesas[0] = 0;
$arrSillas = [];
$arrSillas[0] = 0;

/*
if(isset($datosReservacionUsuario))
    foreach($datosReservacionUsuario as $user){
        $nombres = $user->nombres;
        $paterno = $user->paterno;
        $asientosDisponibles = $user->cantidad_asientos;
        $idReservacionUsuario = $user->id_reservacion;
        $status = $user->status;
    }*/

if (Session::has('datosReservacionUsuario')){
    $datosReservacionUsuario = Session::get('datosReservacionUsuario');

    foreach($datosReservacionUsuario as $user){
        $nombres = $user->nombres;
        $paterno = $user->paterno;
        $materno = $user->materno;
        $asientosDisponibles = $user->cantidad_asientos;
        $idReservacionUsuario = $user->id_reservacion;
        $status = $user->status;
        $noCuenta = $user->no_cuenta;
        $fechaEvento = $user->fecha_evento;
        $arrAux = explode(" ", $fechaEvento);
        $fechaEv = $arrAux[0];
        $horaIni = $arrAux[1];
    }
}
    


//primer fila cambia solo cx
//segunda fila en adelante aumenta cy y se mantiene toda la fila y cambia cx
//posicion de pista, escenario y entrada/salida no cambia
//la mesa mide 100px de diametro las sillas 15px entre la mesa y las sillas 5 px y entre sillas de diferente mesa 5px
//primer mesa en cx=100 cy=100, 2° cx = 250, 3° cx=400
//posicion de silla: posicion vector centro mesa -vector silla (por componente(x, y))

//reservaciones: [{"id":3,"id_mesa":5,"id_silla":2,"id_reservacion":3,"created_at":null,
//"updated_at":null,"id_alumno":3,"fecha_reservacion":"2018-10-16 00:00:00",
//"fecha_limite":"2018-11-30 00:00:00","fecha_evento":"2018-12-07 00:00:00",
//"monto_total":7600,"adeudo":0,"precio_unitario":760,"status":1,"cantidad_asientos":10},

//INSERT INTO `asiento` (`id`, `id_mesa`, `id_silla`, `id_reservacion`, `created_at`, `updated_at`) 
//VALUES (NULL, '11','6', '1', NULL, NULL), (NULL, '11', '7', '1', NULL, NULL);

//datosReservacionUsuario: [{"id":1,"nombres":"Noe Carlos","paterno":"Lara","materno":"Martinez","pass":"123456",
//"no_cuenta":"010033825","e_mail":"noelaramartinez@gmail.com","tel_movil":"5512462219","tel_fijo":"5512462219",
//"status":0,"created_at":null,"updated_at":null,"id_alumno":1,"fecha_reservacion":"2018-09-09 00:00:00",
//"fecha_limite":"2018-11-30 00:00:00","fecha_evento":"2018-12-07 00:00:00","monto_total":3040,"adeudo":340,
//"precio_unitario":760,"cantidad_asientos":4,"id_reservacion":1}]

@endphp


<script type="text/javascript">
    function validarMesa(event, j) {
        alert("se valida la mesa: " + event + "   j" + j);
    }
</script>

<style>
    circle:focus {
            outline: none;
        }
</style>

<body class="text-center" ng-app="App" ng-controller="MesasSillasController as con1">

    <button type="button" class="btn btn-info btn-block" ng-click="registrarReservMS()">Reservar</button>

    <br>
    <button type="button" class="btn btn-success" ng-click="imprimirLugares()" 
        ng-hide="hiddenButton">Imprimir</button>

    <br>
    <div class="badge badge-pill badge-primary">
        Total de Reservaciones <span class="badge badge-pill badge-light">{{$asientosDisponibles}}</span>
        <span class="sr-only">reservaciones</span>
    </div>
    <div class="badge badge-pill badge-info">
        Lugares por Asignar <span class="badge badge-pill badge-light" id="disponibles">{{$asientosDisponibles}}</span>
        <span class="sr-only">reservaciones</span>
    </div>
    <br>

    <h1>{{$nombres}} {{$paterno}}</h1>

    <input ng-hide="hiddendiv" value="{{$nombres}}" id="nombres" name="nombres" />
    <input ng-hide="hiddendiv" value="{{$status}}" id="status" name="status" />
    <input ng-hide="hiddendiv" value="{{$idReservacionUsuario}}" id="idReservacionUsuario" name="idReservacionUsuario" />

    <div item-width="1500" class="text-center" style="margin: auto;">
        <svg height="680" width="1240">
            @for ($i = 0; $i < $filas; $i++) 
                @for ($j=0; $j < $cantidadMesasFila; $j++) 
                    @if($i<2) 
                        @if($j < 3 || $j> 4)
                            <circle cx="{{100 + $j * 150}}" cy="{{100 + $i * 150}}" r="{{$radioMesa}}" stroke="" stroke-width=""
                                fill="{{$colorMesa}}" />
                            <text x="{{100 - 10 + $j * 150}}" y="{{100 + 6 + $i * 150}}" fill="white">M{{$idMesa + 1}}</text>

                        {{!!$cxMesa = 100 + $j * 150; $cyMesa = 100 + $i * 150;!!}}
                        @for ($k = 0; $k < $cantidadSillas; $k++) 
                            {{$colorSilla="#848484"}} 
                            @foreach($reservaciones as $reservacion) 
                                {{$idReserv=-1}}
                                {{!!
                                    $rIdM = $reservacion->id_mesa;
                                    $rIdS=$reservacion->id_silla;
                                    $status=$reservacion->status;
                                    $idReserv=$reservacion->id_reservacion;
                                !!}}
                                @if($rIdM==$idMesa && $rIdS==$k && !$sillaEncontrada) 

                                    @if($idReserv==$idReservacionUsuario)
                                        {{!!
                                            $arrMesas[$indexMS] = $rIdM + 1;
                                            $arrSillas[$indexMS++] = $rIdS + 1;
                                        !!}}
                                    @endif

                                    @if($idReserv==$idReservacionUsuario &&
                                        $asientosDisponibles>0)
                                        {{$asientosDisponibles-=1}}
                                    @endif
                                    {{$sillaEncontrada = true}}
                                    @if($status==1)
                                        {{$colorSilla="#BEF781"}}
                                    @else
                                        {{$colorSilla="#A9D0F5"}}
                                    @endif
                                @endif

                                @if($sillaEncontrada)
                                    break;
                                @endif
                            @endforeach

                            <circle ng-click="agregarMesaSilla($event, '{{$k}}', '{{$idMesa}}','{{$sillaEncontrada}}')" 
                                cx="{{$cxMesa-($vectorNormal*cos(deg2rad(30*$k)))}}"
                                cy="{{$cyMesa-($vectorNormal*sin(deg2rad(30*$k)))}}" 
                                r="{{$radioSilla}}" stroke="" stroke-width="0"
                                fill="{{$colorSilla}}" id="{{$idLugar}}" ng-init="idReservacionUsuario='<?php echo $idReservacionUsuario ?>'" />

                            <text font-size="12" stroke="{{$colorNumAsiento}}" stroke-width="1" x="{{$cxMesa-5-(($vectorNormal-16)*cos(deg2rad(30*$k)))}}"
                                y="{{$cyMesa+6-(($vectorNormal-16)*sin(deg2rad(30*$k)))}}" fill="{{$colorNumAsiento}}">{{$k+1}}</text>
                            {{!! $idLugar++; !!}}
                            {{$sillaEncontrada = false}}
                            @endfor

                            {{!! $idMesa++; !!}}
                            @endif
                        @else
                            <circle cx="{{100 + $j * 150}}" cy="{{100 + $i * 150}}" r="{{$radioMesa}}" stroke="gray"
                                stroke-width="0" fill="{{$colorMesa}}" />
                            <text x="{{100 - 10 + $j * 150}}" y="{{100 + 6 + $i * 150}}" fill="white">M{{$idMesa + 1}}</text>

                            {{!!$cxMesa = 100 + $j * 150; $cyMesa = 100 + $i * 150;!!}}
                            @for ($k = 0; $k< $cantidadSillas; $k++) 
                                {{$colorSilla="#848484"}} 
                                @foreach($reservaciones as $reservacion)
                                    {{$idReserv=-1}}
                                {{!!
                                    $rIdM = $reservacion->id_mesa;
                                    $rIdS=$reservacion->id_silla;
                                    $status=$reservacion->status;
                                    $idReserv=$reservacion->id_reservacion;
                                !!}}
                                @if($rIdM==$idMesa && $rIdS==$k && !$sillaEncontrada) 

                                    @if($idReserv==$idReservacionUsuario)
                                        {{!!
                                            $arrMesas[$indexMS] = $rIdM + 1;
                                            $arrSillas[$indexMS++] = $rIdS + 1;
                                        !!}}
                                    @endif

                                    @if($idReserv==$idReservacionUsuario &&
                                        $asientosDisponibles>0)
                                        {{$asientosDisponibles-=1}}
                                    @endif
                                    {{$sillaEncontrada = true}}
                                    @if($status==1)
                                        {{$colorSilla="#BEF781"}}
                                    @else
                                        {{$colorSilla="#A9D0F5"}}
                                    @endif
                                @endif

                                @if($sillaEncontrada)
                                    break;
                                @endif
                                @endforeach 
                                
                                <circle ng-click="agregarMesaSilla($event, '{{$k}}', '{{$idMesa}}','{{$sillaEncontrada}}')"
                                    cx="{{$cxMesa-($vectorNormal*cos(deg2rad(30*$k)))}}" cy="{{$cyMesa-($vectorNormal*sin(deg2rad(30*$k)))}}"
                                    r="{{$radioSilla}}" stroke="" stroke-width="0" fill="{{$colorSilla}}" id="{{$idLugar}}" />
                                    <text font-size="12" stroke="{{$colorNumAsiento}}" stroke-width="1" x="{{$cxMesa-5-(($vectorNormal-16)*cos(deg2rad(30*$k)))}}"
                                    y="{{$cyMesa+6-(($vectorNormal-16)*sin(deg2rad(30*$k)))}}" fill="{{$colorNumAsiento}}">{{$k+1}}</text>
                                    {{!! $idLugar++; !!}}
                                    {{$sillaEncontrada = false}}
                            @endfor

                            {{!! $idMesa++; !!}}
                        @endif
                    @endfor
                @endfor

                <rect x="480" y="50" width="290" height="250" style="fill:#848484;" />
                <text font-size="24" x="590" y="150" fill="white">PISTA</text>
        </svg>

        <input ng-hide="hiddendiv" value="{{$asientosDisponibles}}" id="asientosDisponibles" name="asientosDisponibles" />
    </div>

    <!-- 
        Nombre del estudiante, número de cuenta, adeudo, pago total, pago parcial,
        cantidad de sillas reservadas, fecha de reservacion, fecha limite de pago,
        fecha del evento, numero de recibo.
     -->
    
    <!-- Plantilla para impresion -->
    <div class="estado-reserv text-center" id="hiden-div" ng-hide="hiddendiv">
        @for ($k = 0; $k< $indexMS; $k++) 
            <br/>
            <br/>
            <br/>
            <br/>
            <hr/>
            <table class="table table-striped table-condensed" style="margin-left: 25%;width: 50%;" 
            border="0">
                <thead>
                    <tr>
                        <th colspan="2"><h2>Salón de Eventos La Tentación</h2></th>
                    </tr>
                    <!--<tr>
                        <th colspan="2"><img src="{{ asset('images/linces-uvm.svg') }}"/></th>
                    </tr>-->
                </thead>
                <tbody>
                    <tr>
                        <td>Reservado Para:</td>
                        <td>{{$nombres}} {{$paterno}} {{$materno}}</td>
                    </tr>
                    <tr>
                        <td>No. Cuenta:</td>
                        <td>{{$noCuenta}}</td>
                    </tr>
                    <tr>
                        <td>No. Reserv:</td>
                        <td>{{$idReservacionUsuario}}</td>
                </tr>
                <tr>
                        <td>Dirección:</td>
                        <td>Insurgentes Norte No.669</td>
                </tr>
                <tr>
                        <td>Mesa:</td>
                        <td>{{$arrMesas[$k]}}</td>
                </tr>
                <tr>
                        <td>Silla:</td>
                        <td>{{$arrSillas[$k]}}</td>
                </tr>
                <tr>
                        <td>Fecha Evento:</td>
                        <td>{{$fechaEv}}</td>
                </tr>
                <tr>
                        <td>Hora Inicio:</td>
                        <td>19:00 hrs.</td>
                </tr>
                </tbody>
            </table>
        @endfor
        
	</div>
</body>


@endsection