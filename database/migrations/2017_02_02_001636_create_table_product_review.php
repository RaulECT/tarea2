<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProductReview extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create( 'product_review', function ( Blueprint $table ) {
          $table->integer( 'product_id' )->unsigned();
          $table->integer( 'review_id' )->unsigned();

          $table->foreign( 'product_id' )
            ->references( 'id' )
            ->on( 'products' );

          $table->foreign( 'review_id' )
            ->references( 'id' )
            ->on( 'review' );

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
        Schema::dropIfExists( 'product_review' );
    }
}
