<?php

namespace App\Filament\Resources;

use Illuminate\Http\Request;
use App\Filament\Resources\QuranAudioResource\Pages;
use App\Models\QuranAudio;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\Custom\AudioColumn;

class QuranAudioResource extends Resource
{
    protected static ?string $model = QuranAudio::class;

    protected static ?string $navigationIcon = 'heroicon-o-speaker-wave';
    protected static ?string $navigationGroup = "Manage Resoucees";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('reciter_id')->required()->numeric(),
                TextInput::make('sura')->required()->maxLength(255),
                TextInput::make('sura_number')->required()->numeric(),
                TextInput::make('verses_number')->required()->numeric(),
                TextInput::make('description')->maxLength(255)->default(null),
                TextInput::make('revealed_at')->required()->maxLength(255),
                FileUpload::make('audio_url')
                    ->label('Audio File')
                    ->required()
                    ->disk('public')
                    ->directory('audio') // Ensure audio files are stored in a specific directory
                    // ->acceptedFileTypes(['audio/mpeg', 'audio/mp3', 'audio/mp4', 'audio/x-mpeg'])
                    ->maxSize(10240), // 10 MB
                TextInput::make('audio_duration')->required()->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('reciter_id')->numeric()->sortable(),
                TextColumn::make('sura')->searchable(),
                TextColumn::make('sura_number')->numeric()->sortable(),
                TextColumn::make('verses_number')->numeric()->sortable(),
                TextColumn::make('description')->searchable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('revealed_at')->searchable(),
                AudioColumn::make('audio_url')
                    ->label('Audio File')
                    ->sortable(),
                TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQuranAudio::route('/'),
            'create' => Pages\CreateQuranAudio::route('/create'),
            'edit' => Pages\EditQuranAudio::route('/{record}/edit'),
        ];
    }

    public static function saving(Request $request)
    {
        if ($request->hasFile('audio_url')) {
            $file = $request->file('audio_url');
            $mimeType = $file->getMimeType();
            if (!in_array($mimeType, ['audio/mpeg', 'audio/mp3', 'audio/mp4', 'audio/x-mpeg'])) {
                throw new \Exception('The uploaded file must be an MP3 audio file.');
            }
        }
    }
}
