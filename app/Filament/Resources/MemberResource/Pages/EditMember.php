<?php

namespace App\Filament\Resources\MemberResource\Pages;

use App\Filament\Resources\MemberResource;
use Filament\Notifications\Notification;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMember extends EditRecord
{
    protected static string $resource = MemberResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    /**
     * Function that return a notification after the resource has been updated.
     *
     * @return Notification
     */
    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Member updated')
            ->body('The member has been updated.');
    }
}
