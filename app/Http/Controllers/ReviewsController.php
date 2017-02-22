<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductsReview;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ReviewsController extends Controller
{
    //
  public function destroy( Product $product, Review $review )
  {
    $productsReview = ProductsReview::all();
    $productId = $product->id;
    $reviewId = $review->id;


    /*foreach ( $productsReview as $productReview )
    {
      if ( ( $productReview->product_id == $productId ) && ( $productReview->review_id == $reviewId ) )
      {

        break;
      }
    }*/

    //$review->delete();

    return \Response::json( [], 200 );
  }

  public function show( Product $product )
  {
    $productsReview = ProductsReview::all();
    $productId = $product->id;

    $reviews = array();

    foreach ( $productsReview as $productReview )
    {
      if( $productReview->product_id == $productId )
      {
        $review = Review::findOrFail( $productReview->review_id );
        array_push( $reviews, $review );
      }
    }

    return $reviews;
  }

  public function store( Request $request, Product $product )
  {
    $reviewAttributes = $request->all();
    $review = Review::create( $reviewAttributes );

    $productId = $product->id;
    $reviewId = $review->id;

    $attributes = [ "product_id" => $productId, "review_id" => $reviewId ];
    $productReview = ProductsReview::create( $attributes );
    return $productReview;
  }
}
