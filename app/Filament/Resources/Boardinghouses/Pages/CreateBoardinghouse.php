<?php

namespace App\Filament\Resources\Boardinghouses\Pages;

use App\Filament\Resources\Boardinghouses\BoardinghouseResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBoardinghouse extends CreateRecord
{
    protected static string $resource = BoardinghouseResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
