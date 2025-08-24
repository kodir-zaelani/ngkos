<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
        ->components([
            FileUpload::make('images')
            ->directory('categories')
            ->required(),
            TextInput::make('name')
            ->required(),
        ]);
    }
}
