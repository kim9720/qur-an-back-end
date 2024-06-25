<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuranAudio extends Model
{
    use HasFactory;
    protected $fillable = [
       'reciter_id',
       'sura',
       'sura_number',
       'verses_number',
       'description',
      'revealed_at',
       'audio_url',
       'audio_duration',
    ];
}
