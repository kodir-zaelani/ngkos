<?php

namespace App\Filament\Resources\Boardinghouses\Pages;

use App\Filament\Resources\Boardinghouses\BoardinghouseResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewBoardinghouse extends ViewRecord
{
    protected static string $resource = BoardinghouseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
