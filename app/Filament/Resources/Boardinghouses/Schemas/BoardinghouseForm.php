<?php

namespace App\Filament\Resources\Boardinghouses\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Tabs;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Components\Tabs\Tab;

class BoardinghouseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
        ->components([
            Tabs::make('Tabs')
            ->tabs([
                Tab::make('Informasi Umum')
                ->schema([
                    FileUpload::make('thumbnail')
                    ->directory('boarding_houses')
                    ->required(),
                    TextInput::make('name')
                    ->required(),
                    Select::make('city_id')
                    ->relationship('city', 'name')
                    ->required(),
                    Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),
                    RichEditor::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                    TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('IDR'),
                    Textarea::make('address')
                    ->default(null)
                    ->columnSpanFull(),
                ]),
                Tab::make('Bonus')
                ->schema([
                    Repeater::make('bonuses')
                    ->relationship('bonuses')
                    ->schema([
                        FileUpload::make('image')
                        ->directory('bonuses')
                        ->required(),
                        TextInput::make('name')
                        ->required(),
                        TextInput::make('description')
                        ->default(null)
                        ->columnSpanFull(),
                    ]),
                ]),
                Tab::make('Kamar')
                ->schema([
                    Repeater::make('rooms')
                    ->relationship('rooms')
                    ->schema([
                        TextInput::make('name')
                        ->required(),
                        TextInput::make('room_type')
                        ->default(null)
                        ->columnSpanFull(),
                        TextInput::make('square_feet')
                        ->default(null)
                        ->columnSpanFull(),
                        TextInput::make('capacity')
                        ->numeric()
                        ->columnSpanFull(),
                        TextInput::make('price_per_month')
                        ->numeric()
                        ->prefix('IDR')
                        ->columnSpanFull(),
                        Toggle::make('is_available')
                        ->default(null)
                        ->columnSpanFull(),
                        Repeater::make('images')
                        ->relationship('images')
                        ->schema([
                            FileUpload::make('image')
                            ->directory('room_images')
                            ->required(),
                        ]),
                    ]),
                ]),
                ])->columnSpan(2),

            ]);
        }
    }
