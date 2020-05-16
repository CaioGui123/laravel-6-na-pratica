<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ProductPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductPhotoController extends Controller
{
    public function removePhoto(Request $request)
    {
    	$photoName = $request->get('photoName');
    	// Busco a foto no banco
    	if (Storage::disk('public')->exists($photoName)) {
    		Storage::disk('public')->delete($photoName);
    	}

    	// Removo a imagem do BD
    	$removePhoto = ProductPhoto::where('image', $photoName);
    	$productId = $removePhoto->first()->product_id; // Id para retorna à edit

    	$removePhoto->delete();

    	flash('Imagem removida com sucesso.')->success();

    	return redirect()->route('admin.products.edit', ['product' => $productId]);
    }
}
