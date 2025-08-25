<?php

namespace App\Filament\Resources\Transactions\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
        ->components([
            TextInput::make('code')
            ->required(),
            Select::make('boardinghouse_id')
            ->relationship('boardinghouse', 'name')
            ->required(),
            Select::make('room_id')
            ->relationship('room', 'name')
            ->required(),
            TextInput::make('name')
            ->required(),
            TextInput::make('email')
            ->label('Email address')
            ->email()
            ->required(),
            TextInput::make('phone')
            ->tel()
            ->required(),
            Select::make('payment_methode')
            ->options(['down_payment' => 'Down payment', 'full_payment' => 'Full payment'])
            ->default(null),
            TextInput::make('payment_status')
            ->default(null),
            DatePicker::make('start_date')
            ->required(),
            TextInput::make('duration')
            ->required()
            ->numeric(),
            TextInput::make('total_amount')
            ->numeric()
            ->default(null),
            DatePicker::make('transaction_date'),
        ]);
    }
}
