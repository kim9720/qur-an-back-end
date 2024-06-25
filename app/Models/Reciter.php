<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reciter extends Model
{
    use HasFactory;
    // Schema::create('reciters', function (Blueprint $table) {
    //     $table->id();
    //     $table->string('reciter_name');
    //     $table->integer('juzuu_number');
    //     $table->string('reciter_image')->nullable();
    //     $table->string('reciter_bio')->nullable();
    //     $table->string('reciter_email')->nullable();
    //     $table->string('reciter_phone')->nullable();
    //     $table->string('reciter_facebook')->nullable();

    //     $table->timestamps();
    // });

    protected $fillable = [
       'reciter_name',
        'juzuu_number',
       'reciter_image',
       'reciter_bio',
       'reciter_email',
       'reciter_phone',
       'reciter_facebook',
    ];

}
