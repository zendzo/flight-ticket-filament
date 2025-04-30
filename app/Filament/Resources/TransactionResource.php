<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionResource\Pages;
use App\Models\Transaction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Umum')
                    ->schema([
                        Forms\Components\Select::make('flight_id')
                            ->label('Penerbangan')
                            ->relationship('flight', 'flight_number')
                            ->required(),
                        Forms\Components\Select::make('class_id')
                            ->label('Kelas')
                            ->relationship('class', 'class')
                            ->required(),
                    ]),
                Forms\Components\Section::make('Informasi Penumpang')
                    ->schema([
                        Forms\Components\TextInput::make('total_passengers')
                            ->label('Jumlah Penumpang')
                            ->required(),
                        Forms\Components\TextInput::make('name')
                            ->label('Nama')
                            ->required(),
                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->required(),
                        Forms\Components\TextInput::make('phone')
                            ->label('Telepon')
                            ->required(),
                        Forms\Components\Section::make('Daftar Penumpang')
                            ->schema([
                                Forms\Components\Repeater::make('passengers')
                                    ->relationship('passengers')
                                    ->schema([
                                        Forms\Components\Select::make('seat.name'),
                                        Forms\Components\TextInput::make('name'),
                                        Forms\Components\TextInput::make('date_of_birth'),
                                        Forms\Components\TextInput::make('nationality'),
                                    ]),
                            ]),
                    ]),
                Forms\Components\Section::make('Informasi Pembayaran')
                    ->schema([
                        Forms\Components\TextInput::make('promo.code')
                            ->label('Kode Promo'),
                        Forms\Components\TextInput::make('promo.discount_type'),
                        Forms\Components\TextInput::make('promo.discount_value'),
                        Forms\Components\TextInput::make('payment_status')
                            ->label('Status Pembayaran'),
                        Forms\Components\TextInput::make('subtotal')
                            ->label('Subtotal'),
                        Forms\Components\TextInput::make('grandtotal')
                            ->label('Grandtotal'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code'),
                Tables\Columns\TextColumn::make('flight.flight_number'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\TextColumn::make('number_of_passengers'),
                Tables\Columns\TextColumn::make('promo.code'),
                Tables\Columns\TextColumn::make('payement_status'),
                Tables\Columns\TextColumn::make('subtotal'),
                Tables\Columns\TextColumn::make('grandtotal'),
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
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }
}
