<?php

namespace App\Filament\Resources\MembershiptypeResource\Pages;

use App\Filament\Resources\MembershiptypeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMembershiptype extends EditRecord
{
    protected static string $resource = MembershiptypeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
