<div class="row">
	<div class="col-md-6">
		<h6>Nombre <strong class="text-danger">*</strong></h6>
		<input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre')}}" placeholder="Ingrese el nombre del usuario" required="required">
		@error('nombre')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <br>
	</div>
	<div class="col-md-6">
		<h6>Rol del usuario <strong class="text-danger">*</strong></h6>
		<select class="form-control @error('rol') is-invalid @enderror" name="rol" required="required">
			<option value="">Seleccione una opción</option>
			@foreach($roles as $key)
				<?php  

                    if (old('rol') == $key->id) {
                        $selected = 'selected="selected"';
                    }else{
                        $selected = '';
                    }   
                ?>
                <option value="{{$key->id}}" {{$selected}}>{{$key->nombre}}</option>
			@endforeach
		</select>
		@error('rol')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
		<br>
	</div>

	<div class="col-md-6">
		<h6>Correo electrónico <strong class="text-danger">*</strong></h6>
		<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Ingrese el correo electrónico del usuario" value="{{old('email')}}" required="required">
		@error('email')
			<span class="invalid-feedback" role="alert">
		        <strong>{{ $message }}</strong>
		    </span>
		@enderror
		<br>
	</div>

	<div class="col-md-6">
		<h6>Cédula de identidad <strong class="text-danger">*</strong></h6>
		<div class="input-group">
        	<div class="input-group-prepend">
                <select class="form-control pr-0 mr-0" name="tipo_documento" required="required">
                  <option value="V" <?php if(old('tipo_documento') == 'V') { echo "selected"; } ?> >V - </option>
                  <option value="E" <?php if(old('tipo_documento') == 'E') { echo "selected"; } ?> >E - </option>
                  <option value="P" <?php if(old('tipo_documento') == 'P') { echo "selected"; } ?> >P - </option>
                </select>
            </div>
            <input class="form-control @error('num_documento') is-invalid @enderror" type="number" id="su-documento" placeholder="Número de documento" name="num_documento" required value="{{old('num_documento')}}">
            @error('num_documento')
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $message }}</strong>
	            </span>
	        @enderror
	        <br>
     	</div>
	</div>

	<div class="col-md-6">
		<h6>Número de teléfono <strong class="text-danger">*</strong></h6>
		<input type="number" name="telefono" class="form-control @error('telefono') is-invalid @enderror" placeholder="Ingrese el número de teléfono del usuario" value="{{old('telefono')}}" required="required">
		@error('telefono')
			<span class="invalid-feedback" role="alert">
	            <strong>{{ $message }}</strong>
	        </span>
		@enderror
		<br>
	</div>

	<div class="col-md-6">
		<h6>Dirección <strong class="text-danger">*</strong></h6>
		<input type="text" name="direccion" class="form-control @error('direccion') is-invalid @enderror" placeholder="Dirección del usuario" value="{{old('direccion')}}" required="required">
		@error('direccion')
			<span class="invalid-feedback" role="alert">
	            <strong>{{ $message }}</strong>
	        </span>
		@enderror
		<br>
	</div>

	<div class="col-md-6">
		<h6>Contraseña <strong class="text-danger">*</strong></h6>
		<input type="password" name="password" class="form-control" placeholder="Ingrese la contraseña" required="required">
		@error('password')
			<span class="invalid-feedback" role="alert">
	            <strong>{{ $message }}</strong>
	        </span>
		@enderror
		<br>
	</div>
	<div class="col-md-6">
		<h6>Confirme la contraseña <strong class="text-danger">*</strong></h6>
		<input type="password" name="password_confirmation" class="form-control" placeholder="Ingrese la confirmación de la contraseña" required="required">
		<br>
	</div>

</div>