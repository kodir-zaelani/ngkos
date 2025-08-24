<?php

namespace App\Filament\Resources\Boardinghouses\Pages;

use App\Filament\Resources\Boardinghouses\BoardinghouseResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditBoardinghouse extends EditRecord
{
    protected static string $resource = BoardinghouseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }

     protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
