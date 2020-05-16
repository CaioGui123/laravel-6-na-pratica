<?php

Route::get('/', function () {
	$helloWorld = 'Hello World';
    return view('welcome', ['helloWorld' => $helloWorld]); // Pode ser usado compact('helloWorld')
})->name('home');

Route::get('/model', function () {

	// $user = new \App\User();
	// $user->name = "Teste";
	// $user->email = "teste@teste.com";
	// $user->password = bcrypt("12345678");

	// return $user->save(); // Salva o usuario...

	// \App\User::all(); - Retorna todos os usuarios...
	// \App\User::find(3); - Retorna 1 usuario pelo id...
	// \App\User::where('name', 'Laurianne Koss')->get(); - where(coluna, valor);
	// \App\User::where('name', 'Laurianne Koss')->first(); - pega o primeiro res. da cond.
	// \App\User::where('name', 'Laurianne Koss')->paginate(10); - retorna o res. paginado 

	// Mass Assignment...

	// $user = \App\User::create([
	// 	"name" => "Caio Guilherme",
	// 	"email" => "caiodugrau@gmail.com",
	// 	"password" => bcrypt("1223344657")
	// ]);

	// Mass Update...

	// $user = \App\User::find(42);
	// $user->update([
	// 	"name" => "Mass Update"
	// ]); // true ou false

	/**----------------------------- Queries com Relações -----------------------------**/

	/* Como pegar a loja de um usuario? */

	// $user = \App\User::find(4);

	// como prop., store retorna a store com o user_id referente
	// $user->store()->count() ==> pega a quant. de resultados
	// $user_store = $user->store; // Retorno

	/* Como pegar os produtos de uma loja? */

	// $loja = \App\Store::find(1);

	// Pode se fazer $loja->products->count()
	// return $loja->products | $loja->products()->where('id', 1)->get();

	/* Como pegar as lojas de uma categoria? */

	// $categoria = \App\Category::find(1);

	// return $categoria->products;

	/**----------------------------- Inserção com Relações -----------------------------**/

	/* Criar uma loja para um usuario? */

	// $user = \App\User::find(10);
	// $store = $user->store()->create([
	// 	'name' => 'Loja Teste',
	// 	'description' => 'Loja Teste de produtos de informática.',
	// 	'phone' => '00 00000-0000',
	// 	'mobile_phone' => '00 00000-0000',
	// 	'slug' => 'loja-teste'
	// ]);
	// return $store;

	/* Criar um produto para uma loja? */

	// $store = \App\Store::find(4);
	// $product = $store->products()->create([
	// 	'name' => 'Notebook Dell',
	// 	'description' => 'CORE I5 10GB',
	// 	'body'  => 'Qualquer coisa...',
	// 	'price' => 2999.90,
	// 	'slug'  => 'notebook-dell'
	// ]);
	// return $product;

	/* Criar uma categoria? */

	// $category = \App\Category::create([
	// 	'name' => 'Games',
	// 	'description' => null,
	// 	'slug' => 'games'
	// ]);

	/* Adicionar um produto para uma categoria? */

	// $product = \App\Product::find(30);
	// dd($product->categories()->sync([2])); // attach -> insere, detach() -> Deleta
});

Route::group(['middleware' => ['auth']], function () { // Necessário para Autenticação...
	Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function() {
		Route::resource('stores', 'StoreController');
		Route::resource('products', 'ProductController');
		Route::resource('categories', 'CategoryController');

		Route::post('photos/remove/', 'ProductPhotoController@removePhoto')->name('photo.remove');
	});
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
