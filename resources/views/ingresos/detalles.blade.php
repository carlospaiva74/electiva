@extends('layouts.app')

@section('breadcrumb')
   <li class="breadcrumb-item"><a href="javascript:void(0);">Inicio</a></li>
    <li class="breadcrumb-item" aria-current="page"><span><a href="{{route('ingresos.index')}}">Ingresos</a></span></li>
    <li class="breadcrumb-item" aria-current="page"><span>Detalles</span></li>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/dt-global_style.css')}}">
@endsection

@section('content')
<div class="row layout-spacing layout-top-spacing feather-icon">
    <div id="font-icon_feather" class="col-lg-12">
        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area bx-top-6">
                <div class="icon-section">
                    <div class="row">
                        <div class="col-xl-12">

                            <a href="{{ route('ingresos.index') }}" class="ml-1 btn btn-dark float-left rounded-circle" data-toggle="tooltip"
                                data-placement="right" title="Volver">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
                            </a>
                            
                            <center><h4>                                
                                Detalles del Ingreso                                
                            </h4></center>
                            <hr>

                            <div class="table-responsive mb-4 mt-4">
                                <table class="table table-hover" style="width:100%; text-align: center;">
                                    <thead>
                                        <tr>
                                            <th>Fecha y Hora</th>
                                            <th>Proveedor</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                            
                                            <td style="font-size: 18px;">{{$ingreso->fecha_hora}}</td>
                                            <td style="font-size: 18px;">{{$ingreso->proveedor->persona->nombre}}</td>
                                            <td style="font-size: 18px;">{{$ingreso->total}}</td>
                                        </tr>
                                    </tbody>                                    
                                </table>
                            </div>     
                                           

                             <div class="table-responsive mb-4 mt-4">
                                <table class="table table-hover" style="width:100%; text-align: center;">
                                    <thead>
                                        <tr>                                            
                                            <th>Comprobante</th>
                                            <th>Serie Comprobante</th>
                                            <th>Número Comprobante</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                            <td style="font-size: 18px;">{{$ingreso->tipo_comprobante}}</td>
                                            <td style="font-size: 18px;">{{$ingreso->serie_comprobante}}</td>
                                            <td style="font-size: 18px;">{{$ingreso->num_comprobante}}</td>
                                        </tr>
                                    </tbody>                                    
                                </table>
                            </div>        
                           
                            <hr>
                            <center><h4>Ingresos de artículos</h4></center>   

                            <div class="table-responsive mb-4 mt-4">
                                <table class="table table-hover" style="width:100%; text-align: center;">
                                    <thead>
                                        <tr>                                            
                                            <th>Artículo</th>
                                            <th>Cantidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php $detalles = $ingreso->detalles; ?>

                                       @foreach($detalles as $key)
                                        <tr>
                                            
                                            <td style="font-size: 18px;">{{$key->articulo->nombre}}</td>
                                            <td style="font-size: 18px;">{{$key->cantidad}}</td>
                                        </tr>
                                       @endforeach
                                    </tbody>                                    
                                </table>
                            </div>           
                        </div>
                    </div>
                </div>         
            </div>
        </div>
    </div>
</div>


@endsection
