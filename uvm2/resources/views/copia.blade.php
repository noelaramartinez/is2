@extends('index')

@section('title', 'UVM')

@section('sidebar')
@parent
@endsection

@section('contenido')

@php

$nombres = "";
$paterno = "";
$materno = "";
$asientosDisponibles = 0;
$idReservacionUsuario = 0;
$status = false;
$noCuenta = 0;
$fechaEvento = "";
$cantidadAsientos = 0;
$montoTotal = 0;
$adeudo = 0;
$fechaLimitePago = "";
$fechaReservacion = "";
$horaInicio = "";
$direccionSalon = "";

if(isset($datosReservacionUsuario))
foreach($datosReservacionUsuario as $user){
$nombres = $user->nombres;
$paterno = $user->paterno;
$materno = $user->materno;
$asientosDisponibles = $user->cantidad_asientos;
$idReservacionUsuario = $user->id_reservacion;
$status = $user->status;
$noCuenta = $user->no_cuenta;
$fechaEvento = $user->fecha_evento;
$cantidadAsientos = $user->cantidad_asientos;
$montoTotal = $user->monto_total;
$adeudo = $user->adeudo;
$fechaLimitePago = $user->fecha_limite;
$fechaReservacion = $user->fecha_reservacion;
$horaInicio = "19:00 hrs.";
$direccionSalon = "Insurgentes Norte 669 col. Roma";
}

//datosReservacionUsuario: [{"id":1,"nombres":"Noe Carlos","paterno":"Lara","materno":"Martinez","pass":"123456",
//"no_cuenta":"010033825","e_mail":"noelaramartinez@gmail.com","tel_movil":"5512462219","tel_fijo":"5512462219",
//"status":0,"created_at":null,"updated_at":null,"id_alumno":1,"fecha_reservacion":"2018-09-09 00:00:00",
//"fecha_limite":"2018-11-30 00:00:00","fecha_evento":"2018-12-07 00:00:00","monto_total":3040,"adeudo":340,
//"precio_unitario":760,"cantidad_asientos":4,"id_reservacion":1}]
@endphp

<br />
<br />
<br />
<br />
<br />

<!-- 
        Nombre del estudiante, número de cuenta, adeudo, pago total, pago parcial,
        cantidad de sillas reservadas, fecha de reservacion, fecha limite de pago,
        fecha del evento, numero de recibo.
     -->

@if($nombres!="")


<div class="container text-center" ng-app="App" ng-controller="MesasSillasController as con1">

<button type="button" class="btn btn-info" ng-click="imprimirLugares()">Imprimir</button>
    <br/>
    <br/>

    <div id="hiden-div">
        <table class="table table-striped text-center " id="my-tbl" style="margin-left: 25%;width: 50%;" border="0">
            <thead class="thead-dark">
                <tr>
                    <th colspan="2">
                        <h1>Estado de Reservación</h1>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-muted">Reservación: </td>
                    <td class="text-info">{{$nombres}} {{$paterno}} {{$materno}}</td>
                </tr>
                <tr>
                    <td class="text-muted">No. Cuenta:</td>
                    <td class="text-info">{{$noCuenta}}</td>
                </tr>
                <tr>
                    <td class="text-muted">Número de Reservación:</td>
                    <td class="text-info">{{$idReservacionUsuario}}</td>
                </tr>
                <tr>
                    <td class="text-muted">Dirección:</td>
                    <td class="text-info">{{$direccionSalon}}</td>
                </tr>
                <tr>
                    <td class="text-muted">Fecha Evento:</td>
                    <td class="text-info">{{$fechaEvento}}</td>
                </tr>
                <tr>
                    <td class="text-muted">Hora Inicio:</td>
                    <td class="text-info">{{$horaInicio}}</td>
                </tr>
                <tr>
                    <td class="text-muted">Cantidad de Reservaciones:</td>
                    <td class="text-info">{{$cantidadAsientos}}</td>
                </tr>
                <tr>
                    <td class="text-muted">Monto Total:</td>
                    <td class="text-info">${{$montoTotal}}</td>
                </tr>
                <tr>
                    <td class="text-muted">Adeudo:</td>
                    <td class="text-info">${{$adeudo}}</td>
                </tr>
                <tr>
                    <td class="text-muted">Fecha Limite de Pago:</td>
                    <td class="text-info">{{$fechaLimitePago}}</td>
                </tr>
                <tr>
                    <td class="text-muted">Fecha Reservacion:</td>
                    <td class="text-info">{{$fechaReservacion}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    
</div>


@else
<div class="container text-center">
    <div class="row ">
        <div class="col-4 mx-auto">
            <div class="card">
                <div class="alert alert-warning font-weight-bold" role="alert">
                    Debe iniciar sesión y luego validar su numero de referencia en la pestaña referencia del menú principal
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection