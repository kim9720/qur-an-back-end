<?php
namespace App\Filament\Resources\Custom;

use Filament\Tables\Columns\Column;
use App\Filament\Resources\QuranAudioResource;
use App\Http\Controllers\QuranAudioController;


class AudioColumn extends Column
{


    protected string $view = 'tables.columns.audio_column';
  
    }

?>
