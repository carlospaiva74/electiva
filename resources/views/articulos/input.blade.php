                                <div class="row">
                                    <div class="col-md-12">
                                        <h6>Nombre del artículo <strong class="text-danger">*</strong></h6>
                                        <input type="text" name="articulo" class="form-control @error('articulo') is-invalid @enderror" value="{{old('articulo')}}" placeholder="Ingrese el nombre del artículo" maxlength="100">
                                        @error('articulo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <br>
                                    </div>
                                    <div class="col-md-6">
                                        <h6>Código <strong class="text-danger">*</strong></h6>
                                        <input type="text" name="codigo" class="form-control @error('codigo') is-invalid @enderror" placeholder="Ingrese el código del artículo" maxlength="50" value="{{old('codigo')}}" required="required">
                                        @error('codigo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <br>
                                    </div>
                                    <div class="col-md-6">
                                        <h6>Categoría <strong class="text-danger">*</strong></h6>
                                        <select class="form-control @error('categoria') is-invalid @enderror" name="categoria" required="required">
                                            <option value="">Selecciona una opción</option>
                                            @foreach($categorias as $key)

                                                <?php  

                                                    if (old('categoria') == $key->id) {
                                                        $selected = 'selected="selected"';
                                                    }else{
                                                        $selected = '';
                                                    }   
                                                ?>
                                                <option value="{{$key->id}}" {{$selected}}>{{$key->nombre}}</option>
                                            @endforeach
                                        </select>
                                        @error('categoria')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <br>
                                    </div>
                                    <div class="col-md-6">
                                        <h6>Precio venta <strong class="text-danger">*</strong></h6>
                                        <input type="number" class="form-control @error('precio_venta') is-invalid @enderror" name="precio_venta" value="{{old('precio_venta')}}" placeholder="Ingrese el precio de venta" step="0.01" min="0.01">
                                        @error('precio_venta')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <br>
                                    </div>
                                    <div class="col-md-6">
                                        <h6>Stock <strong class="text-danger">*</strong></h6>
                                        <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" min="1" value="{{old('stock')}}" placeholder="Ingrese el stock del artículo">
                                        @error('stock')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <br>
                                    </div>
                                    <div class="col-md-12">
                                        <h6>Descripción <strong class="text-danger">*</strong></h6>
                                        <textarea class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" placeholder="Ingrese la descripción" maxlength="256">{{old('descripcion')}}</textarea>
                                        @error('descripcion')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <br>
                                    </div>
                                </div>