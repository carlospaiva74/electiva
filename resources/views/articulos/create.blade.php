@extends('layouts.app')

@section('breadcrumb')
   <li class="breadcrumb-item"><a href="javascript:void(0);">Inicio</a></li>
    <li class="breadcrumb-item" aria-current="page"><span><a href="{{route('articulos.index')}}">Artículos</a></span></li>
    <li class="breadcrumb-item" aria-current="page"><span>Registrar</span></li>
@endsection

@section('css')

@endsection

@section('content')
<div class="row layout-spacing layout-top-spacing feather-icon">
    <div id="font-icon_feather" class="col-lg-12">
        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area bx-top-6">
                <div class="icon-section">
                    <div class="row">
                        <div class="col-xl-12">

                            <a href="{{ route('articulos.index') }}" class="ml-1 btn btn-dark float-left rounded-circle" data-toggle="tooltip"
                                data-placement="right" title="Volver">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
                            </a>
                            
                            <center><h4>                                
                                Registrar artículo                               
                            </h4></center>
                            <hr>

                            <form action="{{route('articulos.store')}}" method="post">
                                @csrf
                                <div class="mb-3 h6">
                                    <strong>Los campos con un <span class="text-danger">*</span> son obligatorios</strong>
                                </div>
                                <!-- Input -->
                                @include('articulos.input')
                                <!-- Input -->
                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary float-right">Registrar</button>
                                    </div>
                                </div>
                            </form>                                         
                        </div>
                    </div>
                </div>         
            </div>
        </div>
    </div>
</div>
@endsection
