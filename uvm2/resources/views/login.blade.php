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
                <form action="{{route('login')}}" method="POST">
                    <img src="{{ asset('images/uvm_logo.png') }}" alt="BannerHome_Compartamos" />
                    @if ($errors->any())
                        <div class="alert alert-danger font-weight-bold" role="alert">
                            Por Favor revise los siguientes errores
                        </div>
                        {!!$errors->first('error','<div class="help-block text-danger font-weight-bold">
                            <strong>:message</strong></div>')!!}
                    @endif
                    {!! csrf_field() !!}
                    <div class="col-auto ">
                        <label class="sr-only" for="inlineFormInputGroup">Usuario</label>
                        <div class="input-group mb-2 ">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Usuario</div>
                            </div>
                            <input type="text" class="form-control " 
                            id="usuario" name="usuario"
                            placeholder="No. de Cuenta ó E-mail" value="{{old('usuario')}}">
                            {!! $errors->first('usuario','<span 
                            class="text-danger font-weight-bold">:message</span>') !!}
                        </div>
                    </div>

                    <div class="col-auto">
                        <label class="sr-only" for="inlineFormInputGroup">Password</label>
                        <div class="input-group mb-2 ">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Password</div>
                            </div>
                            <input type="password" class="form-control " 
                            name="password" id="password" placeholder="contraseña">
                            {!! $errors->first('password','<span 
                            class="text-danger font-weight-bold">:message</span>') !!}
                        </div>
                    </div>
                    <br/>
                    <button type="submit" class="btn btn-danger btn-block font-weight-bold">Log In</button>
                    <br/>
                </form>
            </div>
        </div>
    </div>

</div>



@endsection