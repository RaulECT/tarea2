<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddressSeller extends Model
{
    //
  protected $table = "address_seller";
  protected $fillable = [ 'address', 'city', 'state', 'country', 'postal_code' ];
}
