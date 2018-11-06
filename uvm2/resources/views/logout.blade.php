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
<div class="container text-center">
    <div class="row ">
        <div class="col-4 mx-auto">
            <div class="card">
                <form action="{{route('logout')}}" method="POST">
                    {!! csrf_field() !!}
                    <br/>
                    <div class="col-auto ">
                        <div class="alert alert-success font-weight-bold" role="alert">
                            {{Session::get('usuario')}} con Sesión iniciada ¿Desea terminarla?
                        </div>

                    </div>

                    <br />
                    <button type="submit" class="btn btn-danger btn-block font-weight-bold">Log Out</button>
                    <br />
                </form>
            </div>
        </div>
    </div>

</div>



@endsection