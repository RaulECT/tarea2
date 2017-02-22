<?php

namespace App\Http\Controllers;

use App\AddressSeller;
use App\Seller;
use Illuminate\Http\Request;
use Rs\Json\Patch;
use Rs\Json\Patch\InvalidPatchDocumentJsonException;
use Rs\Json\Patch\InvalidTargetDocumentJsonException;
use Rs\Json\Patch\InvalidOperationException;


class SellersControler extends Controller
{
    //
  public function index()
  {
    return \Response::json( Seller::all() );
  }

  public function show( Seller $seller )
  {
    return $seller;
  }

  public function attach( Request $request, Seller $seller )
  {
    $address = $request->all();
    $seller->address_id = $address[ 'id' ];
    $seller->save();
    return $seller;
  }

  public function store( Request $request )
  {
    $attributes = $request->all();
    $seller = Seller::create( $attributes );
    return \Response::json( $seller );
  }

  public function destroy( Seller $seller )
  {
    $seller->delete();
    return \Response::json( [], 200 );
  }

  public function updateAddress( Request $request, Seller $seller )
  {
    $addres = $seller->address_id;
    $addresInstance = AddressSeller::findOrFail( $addres );

    $attributes = $request->all();
    $addresInstance->update( $attributes );

    return $addresInstance;
  }

  public function update( Request $request, Seller $seller )
  {

    if ( $request->isMethod( 'put' )  )
    {
      if( is_null( $request->first_name ) && is_null( $request->last_name ) ){
        return "NULL";
      }else
      {
        $attributes = $request->all();
        $seller->update( $attributes );
        return $seller;
      }

    } else
    {
      $attributes = $request->all();
      //GET INPUTS KEYS
      $p = array();
      $values = array();
      foreach ( $attributes as $key => $val )
      {
        array_push( $p, $key );
        array_push( $values, $val );
      }

      $patchSeller = '[';

      for ( $i=0; $i < sizeof( $p ); $i++ )
      {
        $path = "/" . $p[ $i ];
        $value = $values[ $i ];

        if ( $i == sizeof( $p ) -1   )
        {
          $change = '{"op" : "replace", "path" : "' . $path .'"'. ', "value" : "'. $value .'"'. '}';
          $patchSeller = $patchSeller . $change;
        }else{
          $change = '{"op" : "replace", "path" : "' . $path .'"'. ', "value" : "'. $value .'"'. '},';
          $patchSeller = $patchSeller . $change;
        }


      }

      $patchSeller= $patchSeller. ']';

      $patch = new Patch( $seller, $patchSeller );
      $patchedSeller = $patch->apply();

      $array = (array)$patchedSeller;
      //$seller->update( $array );

      $attributes = $request->all();
      $seller->update( $attributes );
      return $seller;

    }


  }
}
