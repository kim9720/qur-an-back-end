<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReciterResource\Pages;
use App\Filament\Resources\ReciterResource\RelationManagers;
use App\Models\Reciter;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;



class ReciterResource extends Resource
{
    protected static ?string $model = Reciter::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = "Manage Resoucees";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('reciter_name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('juzuu_number')
                    ->required()
                    ->numeric(),
                FileUpload::make('reciter_image')
                    ->image(),
                TextInput::make('reciter_bio')
                    ->maxLength(255)
                    ->default(null),
                TextInput::make('reciter_email')
                    ->email()
                    ->maxLength(255)
                    ->default(null),
                TextInput::make('reciter_phone')
                    ->tel()
                    ->maxLength(255)
                    ->default(null),
                TextInput::make('reciter_facebook')
                    ->maxLength(255)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('reciter_name')
                    ->searchable(),
                TextColumn::make('juzuu_number')
                    ->numeric()
                    ->sortable(),
                ImageColumn::make('reciter_image'),
                TextColumn::make('reciter_bio')
                    ->searchable(),
                TextColumn::make('reciter_email')
                    ->searchable(),
                TextColumn::make('reciter_phone')
                    ->searchable(),
                TextColumn::make('reciter_facebook')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReciters::route('/'),
            'create' => Pages\CreateReciter::route('/create'),
            'edit' => Pages\EditReciter::route('/{record}/edit'),
        ];
    }
}
