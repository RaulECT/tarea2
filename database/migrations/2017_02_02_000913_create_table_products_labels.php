<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProductsLabels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create( 'label_of_products', function ( Blueprint $table ) {
          $table->integer( 'product_id' )->unsigned();
          $table->integer( 'label_id' )->unsigned();

          $table->foreign( 'product_id' )
            ->references( 'id' )
            ->on( 'products' );

          $table->foreign( 'label_id' )
            ->references( 'id' )
            ->on( 'label' );

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
        Schema::dropIfExists( 'label_of_products' );
    }
}
