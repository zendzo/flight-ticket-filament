<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FlightResource\Pages;
use App\Filament\Resources\FlightResource\RelationManagers;
use App\Models\Flight;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FlightResource extends Resource
{
    protected static ?string $model = Flight::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe-asia-australia';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Wizard::make([
                    Forms\Components\Wizard\Step::make('Flight Information')
                      ->schema([
                        Forms\Components\TextInput::make('flight_number')
                          ->label('Flight Number')
                          ->required(),
                        Forms\Components\Select::make('airline_id')
                          ->label('Airline')
                          ->relationship('airline', 'name')
                          ->required(),
                      ]),
                    Forms\Components\Wizard\Step::make('Flight Segments')
                      ->schema([
                        Forms\Components\Repeater::make('flight_segments')
                          ->relationship('segments')
                          ->schema([
                            Forms\Components\TextInput::make('sequence')
                              ->label('Sequence')
                              ->numeric()
                              ->required(),
                            Forms\Components\Select::make('airport_id')
                              ->label('Airport')
                              ->relationship('airport', 'name')
                              ->required(),
                            Forms\Components\DateTimePicker::make('time')
                              ->label('Time')
                              ->required(),
                          ])
                          ->collapsed(false)
                          ->minItems(1)
                      ]),
                    Forms\Components\Wizard\Step::make('Flight Classes')
                      ->schema([
                        Forms\Components\Repeater::make('flight_classes')
                          ->relationship('classes')
                          ->schema([
                            Forms\Components\Select::make('class')
                              ->label('Class')
                              ->options([
                                'economy' => 'Economy',
                                'business' => 'Business',
                              ])
                              ->required(),
                            Forms\Components\TextInput::make('price')
                              ->label('Price')
                              ->numeric()
                              ->prefix('IDR')
                              ->minValue(0)
                              ->required(),
                            Forms\Components\TextInput::make('available_seats')
                              ->label('Available Seats')
                              ->numeric()
                              ->required(),
                            Forms\Components\Select::make('facilities')
                              ->label('Facilities')
                              ->relationship('facilities', 'name')
                              ->multiple()
                              ->preload(true)
                              ->required(),
                          ])
                          ->collapsed(false)
                          ->minItems(1)
                      ]),
                ])->columnSpan(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('flight_number')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('airline.name'),
                Tables\Columns\TextColumn::make('segments')
                    ->label('Route & Duration')
                    ->formatStateUsing(function (Flight $record) : string {
                        $firstSegment = $record->segments->first();
                        $lastSegment = $record->segments->last();
                        $route = $firstSegment->airport->iata_code . ' - ' . $lastSegment->airport->iata_code;
                        $duration = (new \DateTime($firstSegment->timte))->format('d F Y H:i') . ' - ' . (new \DateTime($lastSegment->time))->format('d F Y H:i');
                        return "{$route} | ({$duration})";
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListFlights::route('/'),
            'create' => Pages\CreateFlight::route('/create'),
            'edit' => Pages\EditFlight::route('/{record}/edit'),
        ];
    }
}
