<?php

namespace App\Filament\Resources\Boardinghouses\Pages;

use App\Filament\Resources\Boardinghouses\BoardinghouseResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBoardinghouses extends ListRecords
{
    protected static string $resource = BoardinghouseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
