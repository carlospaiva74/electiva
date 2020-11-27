@extends('layouts.app')

@section('breadcrumb')
   <li class="breadcrumb-item"><a href="javascript:void(0);">Inicio</a></li>
    <li class="breadcrumb-item" aria-current="page"><span><a href="{{route('ingresos.index')}}">Ingresos</a></span></li>
    <li class="breadcrumb-item" aria-current="page"><span>Nuevo</span></li>
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
                                Nuevo Ingreso                                
                            </h4></center>
                            <hr>

                            <form action="{{route('ingresos.store')}}" method="post">
                                @csrf
                                <div class="mb-3 h6">
                                    <strong>Los campos con un <span class="text-danger">*</span> son obligatorios</strong>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <h6>Proveedor <strong class="text-danger">*</strong></h6>
                                        <select class="form-control @error('proveedor') is-invalid @enderror" name="proveedor" required="required">
                                            <option value="">Seleccione una opción</option>
                                            @foreach($proveedores as $key)
                                                <?php  

                                                    if (old('proveedor') == $key->id) {
                                                        $selected = 'selected="selected"';
                                                    }else{
                                                        $selected = '';
                                                    }   
                                                ?>
                                                <option value="{{$key->id}}" {{$selected}} >{{$key->persona->nombre}}</option>
                                            @endforeach
                                        </select>
                                        @error('proveedor')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <br>
                                    </div>

                                    <div class="col-md-4">
                                        <h6>Tipo Comprobante <strong class="text-danger">*</strong></h6>
                                        <input class="form-control @error('tipo') is-invalid @enderror" required="required" type="text" name="tipo" placeholder="Boleta" maxlength="20" value="{{old('tipo')}}">
                                        @error('tipo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <br>
                                    </div>
                                    <div class="col-md-4">
                                        <h6>Serie Comprobante <strong class="text-danger">*</strong></h6>
                                        <input class="form-control @error('serie') is-invalid @enderror" required="required" type="number" name="serie" placeholder="Ej. 1234" min="0" max='9999999' value="{{old('serie')}}">
                                        @error('serie')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <br>
                                    </div>
                                    <div class="col-md-4">
                                        <h6>Número Comprobante <strong class="text-danger">*</strong></h6>
                                        <input class="form-control @error('numero') is-invalid @enderror" required="required" type="number" name="numero" placeholder="Ej. 1234" min="0" max="9999999999" value="{{old('numero')}}">
                                        @error('numero')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <br>
                                    </div>

                                    <div class="col-md-12">
                                        @error('id')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                              Por favor, ingresa al menos un artículo de la lista
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                        @enderror
                                        
                                    </div>

                                    <div class="col-md-12">
                                        
                                        <div class="table-responsive mb-4 mt-4">
                                            <table class="table table-hover" style="width:100%; text-align: center;">
                                                <thead>
                                                    <tr>
                                                        <th>Artículo</th>
                                                        <th>Cantidad</th>
                                                        <th>Precio Compra</th>
                                                        <th>Precio Venta</th>
                                                        <th>SubTotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  <tr id="data-vacia">
                                                    <td colspan="5">Sin datos todavía</td>
                                                  </tr>        
                                                </tbody> 
                                                <tfoot>
                                                    <th colspan="3"></th>
                                                    <th><center><h4 class="h5 text-primary"> <strong>TOTAL: </strong></h4></center></th>
                                                    <th id="total"><center><h4 class="h5 text-primary"><strong>Bs.S 0</strong></h4></center></th>
                                                </tfoot>                                               
                                            </table>
                                        </div>

                                        <br>
                                    </div>

                                    <div class="col-md-12">
                                        <center>
                                            <button class="btn btn-dark mb-1 mr-1 rounded-circle bs-tooltip" 
                                            data-toggle="tooltip" data-placement="bottom"
                                            title="Añadir un artículo a la lista"
                                            type="button" onclick="modal();">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                            </button>
                                        </center> 
                                        <br>
                                    </div>

                                </div>

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

@section('script')

    <div class="modal fade" id="modal-articulos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Artículo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive mb-4 mt-4">
                        <table id="zero-config" class="table table-hover" style="width:100%; text-align: center;">
                            <thead>
                                <tr>
                                    <th>Artículo</th>
                                    <th>Cantidad</th>   
                                    <th>Precio Compra</th>    
                                    <th>Precio Venta</th>                                  
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($articulos as $key)
                                    <tr>
                                        <td style="font-size: 18px;">{{$key->nombre}}</td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm cantidad modal-input-{{$key->id}}" placeholder="Ej. 2" id="cantidad-{{$key->id}}" name="cantidad[]">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm compra modal-input-{{$key->id}}" placeholder="Ej. 50 Bs.S" step="0.01" id="compra-{{$key->id}}" name="compra[]">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm venta modal-input-{{$key->id}}" placeholder="Ej. 80 Bs.S" step="0.01" id="venta-{{$key->id}}" name="venta[]">
                                        </td>
                                        <td id="accion-{{$key->id}}">
                                            <a href="javascript:add({{$key->id}},'{{$key->nombre}}')" 
                                                class="bs-tooltip text-primary" 
                                                data-toggle="tooltip" data-placement="bottom"
                                                title="Añadir a la lista">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>                                 
                        </table>
                    </div>  
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('js/datatables.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/table-data.js')}}"></script>
    <script type="text/javascript">

        table_data('#zero-config');

        function modal(){
            $('#modal-articulos').modal('show');
        }

        function total(){

            var total = 0;

            $('.data-subtotal').each(function(){
                total = total + parseInt($(this).val());
            });

            $('#total').html('<center><h4 class="h5 text-primary"><strong>Bs.S '+total+'</strong></h4></center>');
        }

        function remove(id,nombre){
            $('#accion-'+id).html(`
                <a href="javascript:add(${id},'${nombre}')" 
                    class="bs-tooltip text-primary" 
                    data-toggle="tooltip" data-placement="bottom"
                    title="Añadir a la lista">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line>
                    </svg>
                </a>
            `);

            $('#col-'+id).css({'display':'none'});
            $('#col-'+id).html('');
            $('#col-'+id).attr('id',false);
            total();

            $('.modal-input-'+id).attr('disabled',false);
        }

        function add(id,nombre){


            var cantidad = $('#cantidad-'+id).val();
            var compra   = $('#compra-'+id).val();
            var venta    = $('#venta-'+id).val();

            if (cantidad=='' || compra=='' || venta=='') {

                 Snackbar.show({
                    text: `Por favor, llene todo los campos`,
                    pos: 'bottom-right',
                    actionText:"Ok"
                });

            }else{

                if (cantidad<=0) {
                    cantidad=1;
                    $('#cantidad-'+id).val(1);
                }

                if (compra<=0) {
                    compra = 1;
                    $('#compra-'+id).val(1);
                }

                if (venta<=0) {
                    venta=1;
                    $('#venta-'+id).val();
                }

                $('#accion-'+id).html(`
                    <a href="javascript:remove(${id},'${nombre}')" 
                        class="bs-tooltip text-danger" 
                        data-toggle="tooltip" data-placement="bottom"
                        title="Revomer a la lista">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line>
                        </svg>
                    </a>
                `);

                $('.modal-input-'+id).attr('disabled',true);

                $('#data-vacia').css({'display':'none'});

                $('#data-vacia').before(`
                    <tr id="col-${id}">
                        <td style="font-size: 18px;">${nombre}
                            <input type='hidden' name='id[]' value='${id}'>
                        </td>
                        <td style="font-size: 18px;">${cantidad} 
                            <input type='hidden' name='cantidad[]' value='${cantidad}'>
                        </td>
                        <td style="font-size: 18px;">${compra} Bs.S
                        <input type='hidden' name='compra[]' value='${compra}'>
                        </td>
                        <td style="font-size: 18px;">${venta} Bs.S
                        <input type='hidden' name='venta[]' value='${venta}'>
                        </td>
                        <td style="font-size: 18px;">${compra * cantidad} Bs.S
                        <input type='hidden' name='subtotal[]' class='data-subtotal' value='${compra * cantidad}'>
                        </td>
                    </tr>
                `);

                total();
            }            
        }

    </script>
@endsection
