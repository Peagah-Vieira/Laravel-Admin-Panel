<?php

namespace App\Filament\Resources\MembershiptypeResource\Pages;

use App\Filament\Resources\MembershiptypeResource;
use Filament\Notifications\Notification;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMembershiptype extends CreateRecord
{
    protected static string $resource = MembershiptypeResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
    
    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Membership registered')
            ->body('The Membership has been created.');
    }
}
