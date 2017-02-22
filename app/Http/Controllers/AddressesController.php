<?php

namespace App\Http\Controllers;

use App\AddressSeller;
use Illuminate\Http\Request;

class AddressesController extends Controller
{
    //
  public function store( Request $request )
  {
    $attributes = $request->all();
    $address = AddressSeller::create( $attributes );
    return \Response::json( $address );
  }


}
