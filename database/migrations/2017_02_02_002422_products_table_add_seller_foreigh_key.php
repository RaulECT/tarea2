<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductsTableAddSellerForeighKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table( 'products', function ( Blueprint $table ) {
          $table->integer( 'seller_id' )->unsigned();

          $table->foreign( 'seller_id' )
            ->references( 'id' )
            ->on( 'seller' );
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
      Schema::table( 'products', function ( Blueprint $table ) {
        $table->dropForeign(['seller_id']);
        $table->dropColumn('seller_id');
      } );

    }
}
