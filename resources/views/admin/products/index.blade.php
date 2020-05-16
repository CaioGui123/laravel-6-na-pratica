@extends('layouts.app') <!-- Onde está o template -->

@section('content') <!-- Define o conteúdo que será adicionado em $yield -->

<a href="{{route('admin.products.create')}}" class="btn btn-lg btn-success my-2 float-right">Criar Produto</a>

<h1>Listagem de Produtos</h1>

<table class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th>#</th>
			<th>Nome</th>
			<th>Preço</th>
			<th>Loja</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		@if ($products)
			@foreach ($products as $product)
			<tr>
				<td>{{$product->id}}</td>
				<td>{{$product->name}}</td>
				<td>R$ {{number_format($product->price, 2, ',', '.')}}</td>
				<td>{{$product->store->name}}</td>
				<td>
					<div class="d-flex justify-content-around">
						<a href="{{route('admin.products.edit', ['product' => $product->id])}}" class="btn btn-sm w-100 btn-warning mx-2">Editar</a>

						<form action="{{route('admin.products.destroy', ['product' => $product->id])}}" method="post" class="w-100 mx-2">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-sm btn-danger w-100">Excluir</button>
						</form>
					</div>
				</td>
			</tr>		
			@endforeach
		@else
			<tr>
				<td colspan="5">Esta loja não tem produtos.</td>
			</tr>
		@endif

	</tbody>
</table>

{{$products->links()}}

@endsection