<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
  protected $table = "products";
  protected $fillable = [ 'name', 'price', 'description', 'seller_id' ];

  public function labels()
  {
    return $this->belongsToMany( 'App\Label' );
  }

  public function seller()
  {
    return $this->hasOne( 'App\Seller' );
  }

  public function reviews()
  {
    return $this->hasMany( 'App\Review' );
  }


}
