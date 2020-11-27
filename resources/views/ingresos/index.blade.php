@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>Ingresos</span></li>
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
                            <div class="row">
                                <div class="col">
                                    <h4 class="mt-2">Ingresos</h4>
                                </div>
                                <div class="col">
                                    <a href="{{route('ingresos.create')}}" class="btn btn-primary mb-2 float-right">Nuevo ingreso</a>
                                </div>
                            </div>
                            
                           
                            <div class="table-responsive mb-4 mt-4">
                                <table id="zero-config" class="table table-hover" style="width:100%; text-align: center;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Fecha y Hora</th>
                                            <th>Proveedor</th>
                                            <th>Comprobante</th>
                                            <th>Total</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($ingresos as $key)
                                        <tr>
                                            <td style="font-size: 18px;">{{$i++}}</td> 
                                            <td style="font-size: 18px;">{{$key->fecha_hora}}</td>
                                            <td style="font-size: 18px;">{{$key->proveedor->persona->nombre}}</td>
                                            <td style="font-size: 18px;">{{$key->tipo_comprobante}}</td>
                                            <td style="font-size: 18px;">{{$key->total}}</td>
                                            <td>

                                                <a href="{{route('ingresos.show',$key->id)}}" 
                                                class="bs-tooltip" 
                                                data-toggle="tooltip" data-placement="bottom"
                                                 title="Ver más">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                </a>

                                            </td>
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

@section('script')
    
    <form id="destroy-form" action="#" method="POST" style="display: none;">
        @csrf
        <input name="_method" type="hidden" value="DELETE">
    </form>

    <script type="text/javascript" src="{{asset('js/datatables.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/table-data.js')}}"></script>
    <script type="text/javascript">
        table_data('#zero-config');
    </script>

    <script type="text/javascript">
        function eliminar (link,name){
            swal({   
                title: "¿Estás seguro?",
                text: "¿Deseas eliminar la categoría: "+name+"  ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Si, eliminar!",
                cancelButtonText: "No, cancelar!",
                closeOnConfirm: false,
                closeOnCancel: false 
            }, function(isConfirm){
                if (isConfirm) {
                    $('#destroy-form').attr('action',link);
                    $('#destroy-form').submit();
                } else {
                    swal("Cancelado", "Tu categoría "+name+" no fue eliminada", "error");
                }
            });
        }
    </script>
@endsection