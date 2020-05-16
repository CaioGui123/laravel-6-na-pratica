@extends('layouts.app') <!-- Onde está o template -->

@section('content') <!-- Define o conteúdo que será adicionado em $yield -->

@if(!$store)

<a href="{{route('admin.stores.create')}}" class="btn btn-lg btn-block btn-success my-2 float-right">Criar Loja</a>
<p class="text-center">Este usuário não possui uma loja.</p>
@else

<h1>Listagem de Lojas</h1>

<table class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th>#</th>
			<th>Loja</th>
			<th>Total de Produtos</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>{{$store->id}}</td>
			<td>{{$store->name}}</td>
			<td>{{$store->products->count()}}</td>
			<td>
				<div class="d-flex justify-content-around">
					<a href="{{route('admin.stores.edit', ['store' => $store->id])}}" class="btn btn-sm w-100 btn-warning mx-2">Editar</a>

					<form action="{{route('admin.stores.destroy', ['store' => $store->id])}}" method="post" class="w-100 mx-2">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-sm w-100 btn-danger mx-2">Excluir</button>
					</form>
				</div>
			</td>
		</tr>
	</tbody>
</table>
@endif

@endsection