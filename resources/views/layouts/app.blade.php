<!-- Arquivo Template Base das Páginas -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>MarketPlace L6</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
		<a class="navbar-brand" href="{{route('home')}}">MarketPlace L6</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				
				@auth <!-- Se está autenticado... -->
					<ul class="navbar-nav mr-auto">
						<li class="nav-item @if(request()->is('admin/stores*')) active @endif">
						<a class="nav-link" href="{{route('admin.stores.index')}}">Lojas</a>
						</li>

						<li class="nav-item @if(request()->is('admin/products*')) active @endif">
						<a class="nav-link" href="{{route('admin.products.index')}}">Produtos</a>
						</li>

						<li class="nav-item @if(request()->is('admin/categories*')) active @endif">
						<a class="nav-link" href="{{route('admin.categories.index')}}">Categorias</a>
						</li>
						</ul>
					<div class="my-2 my-lg-0">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item">
							<!--Log Out-->
							<a class="nav-item btn btn-danger text-white" href="#" onclick="event.preventDefault(); document.querySelector('form.logout').submit();">Sair</a>
							<form action="{{route('logout')}}" class="logout" method="POST" style="display: none;">
								@csrf
							</form>
							<!-- ./Log Out -->
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link text-white">{{auth()->user()->name}}</a>
							</li>
						</ul>
					</div>
				@endauth

			</div>
	</nav>

	<div class="container">
		@include('flash::message')
		@yield('content')
	</div>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>