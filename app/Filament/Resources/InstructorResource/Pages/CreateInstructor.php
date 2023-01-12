<?php

namespace App\Filament\Resources\InstructorResource\Pages;

use App\Filament\Resources\InstructorResource;
use Filament\Notifications\Notification;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateInstructor extends CreateRecord
{
    protected static string $resource = InstructorResource::class;

    /**
     * Function that redirect after the resource has been created.
     *
     * @return string
     */
    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
    
    /**
     * Function that return a notification after the resource has been created.
     *
     * @return Notification
     */
    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Instructor registered')
            ->body('The instructor has been created.');
    }
}
