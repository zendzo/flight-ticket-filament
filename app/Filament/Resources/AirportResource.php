<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AirportResource\Pages;
use App\Filament\Resources\AirportResource\RelationManagers;
use App\Models\Airport;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AirportResource extends Resource
{
  protected static ?string $model = Airport::class;

  protected static ?string $navigationIcon = 'heroicon-o-map';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Forms\Components\Section::make('Airport')
          ->description('Information about the airport.')
          ->schema([
            Forms\Components\FileUpload::make('image')
              ->image()
              ->directory('airports')
              ->required()
              ->columnSpan(2),
            Forms\Components\TextInput::make('iata_code')
              ->label('IATA Code')
              ->required()
              ->placeholder('e.g. LAX'),
            Forms\Components\TextInput::make('name')
              ->required()
              ->placeholder('e.g. Los Angeles International Airport'),
            Forms\Components\TextInput::make('city')
              ->required()
              ->placeholder('e.g. Los Angeles'),
            Forms\Components\TextInput::make('country')
              ->required()
              ->placeholder('e.g. United States'),
          ])
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        Tables\Columns\ImageColumn::make('image')
          ->label('Image'),
        Tables\Columns\TextColumn::make('iata_code')
          ->label('IATA Code'),
        Tables\Columns\TextColumn::make('name')
          ->label('Name'),
        Tables\Columns\TextColumn::make('city')
          ->label('City'),
        Tables\Columns\TextColumn::make('country')
          ->label('Country'),
      ])
      ->filters([
        //
      ])
      ->actions([
        Tables\Actions\EditAction::make(),
        Tables\Actions\ViewAction::make(),
        Tables\Actions\DeleteAction::make(),
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
      'index' => Pages\ListAirports::route('/'),
      'create' => Pages\CreateAirport::route('/create'),
      'edit' => Pages\EditAirport::route('/{record}/edit'),
    ];
  }
}
