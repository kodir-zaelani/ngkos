<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
        ->components([
            FileUpload::make('photo')
            ->required()
            ->columnSpan(2),
            Select::make('boardinghouse_id')
            ->relationship('boardinghouse', 'name')
            ->required()
            ->columnSpan(2),
            Textarea::make('content')
            ->default(null)
            ->columnSpanFull(),
            TextInput::make('name')
            ->required(),
            TextInput::make('rating')
            ->required()
            ->minValue(1)
            ->maxValue(5)
            ->numeric(),
        ]);
    }
}