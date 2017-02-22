<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAddressSeller extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create( 'address_seller', function ( Blueprint $table ) {
          $table->increments( 'id' );
          $table->string( 'address' );
          $table->string( 'city' );
          $table->string( 'state' );
          $table->string( 'country' );
          $table->string( 'postal_code' );
          $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists( 'address_seller' );
    }
}
