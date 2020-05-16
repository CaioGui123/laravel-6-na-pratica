@extends('layouts.app') <!-- Onde está o template -->

@section('content') <!-- Define o conteúdo que será adicionado em $yield -->

<h1>Criar Loja</h1>

<form action="{{route('admin.stores.store')}}" method="post" enctype="multipart/form-data">
	<!-- Necessário para o envio de informações -->
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<div class="form-group">
		<label for="nameStore">Nome Da Loja</label>
		<input type="text" name="name" id="nameStore" class="form-control @error('name') is-invalid" @enderror value="{{old('name')}}">

		@error('name')
			<div class="invalid-feedback">{{$message}}</div>
		@enderror
	</div>

	<div class="form-group">
		<label for="descriptionStore">Descrição</label>
		<input type="text" name="description" id="descriptionStore" class="form-control @error('description') is-invalid" @enderror value="{{old('description')}}">

		@error('description')
			<div class="invalid-feedback">{{$message}}</div>
		@enderror
	</div>

	<div class="form-group">
		<label for="phoneStore">Telefone</label>
		<input type="text" name="phone" id="phoneStore" class="form-control @error('phone') is-invalid" @enderror  value="{{old('phone')}}">

		@error('phone')
			<div class="invalid-feedback">{{$message}}</div>
		@enderror
	</div>

	<div class="form-group">
		<label for="mobilePhoneStore">Celular/Whatsapp</label>
		<input type="text" name="mobile_phone" id="mobilePhoneStore" class="form-control @error('mobile_phone') is-invalid" @enderror value="{{old('mobile_phone')}}">

		@error('mobile_phone')
			<div class="invalid-feedback">{{$message}}</div>
		@enderror
	</div>

	<div class="form-group">
        <label for="storeLogo">Fotos da Loja</label>
        <input name="logo" type="file" id="storeLogo" class="form-control-file @error('logo') is-invalid @enderror" multiple>
		
		@error('logo')
		<div class="invalid-feedback">
			{{$message}}
		</div>
		@enderror
    </div>

	<div>
		<button type="submit" class="btn btn-success btn-block">Criar Loja</button>
	</div>
</form>

@endsection