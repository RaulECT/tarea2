<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
  public function index()
  {
    return \Response::json( Product::all() );
  }

  public function show( Product $product )
  {
    return $product;
  }

  public function store( Request $request )
  {
    $attributes = $request->all();
    $product = Product::create( $attributes );
    return \Response::json( $product );
  }

  public function destroy( Product $product )
  {
    $product->delete();
    return \Response::json( [], 200 );
  }
}
