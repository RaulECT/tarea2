<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsReview extends Model
{
    //
    protected $table = "product_review";
    protected $fillable = [ 'product_id', 'review_id' ];
}
