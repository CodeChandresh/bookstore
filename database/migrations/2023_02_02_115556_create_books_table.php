<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('books')){
            Schema::create('books', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('author');
                $table->string('genre');
                $table->text('description');
                $table->string('isbn');
                $table->string('image')->nullable();
                $table->date('published');
                $table->string('publisher');
                $table->timestamps();
            });

            
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasTable('books')){
            Schema::dropIfExists('books');
        }
    }
};
