<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SellerTableAddSellerAddressForeighKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table( 'seller', function ( Blueprint $table ) {
          $table->integer( 'address_id' )->nullable()->unsigned()->unique();

          $table->foreign( 'address_id' )
            ->references( 'id' )
            ->on( 'address_seller' );
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
        Schema::table( 'seller', function ( Blueprint $table ) {
          $table->dropForeign(['address_id']);

          $table->dropColumn('address_id');
        } );
    }
}
