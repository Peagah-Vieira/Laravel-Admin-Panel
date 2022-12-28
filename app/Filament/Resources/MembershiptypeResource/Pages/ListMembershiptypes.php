<?php

namespace App\Filament\Resources\MembershiptypeResource\Pages;

use App\Filament\Resources\MembershiptypeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMembershiptypes extends ListRecords
{
    protected static string $resource = MembershiptypeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
