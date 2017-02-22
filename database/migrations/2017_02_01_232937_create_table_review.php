<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableReview extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create( 'review', function ( Blueprint $table ) {
          $table->increments( 'id' );
          $table->string( 'critic_name' );
          $table->string( 'title' );
          $table->text( 'content' );
          $table->string( 'date' );
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
        Schema::dropIfExists( 'review' );
    }
}
