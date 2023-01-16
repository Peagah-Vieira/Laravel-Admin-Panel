<?php

namespace App\Filament\Pages;

use App\Models\Payment;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PaymentResource;

class MyPayments extends ListRecords implements HasTable
{
    protected static string $resource = PaymentResource::class;
    
    protected static ?int $navigationSort = 3;

    protected static ?string $navigationIcon = 'heroicon-o-cash';

    protected static ?string $navigationLabel = 'My Payments';

    protected static ?string $navigationGroup = 'Payments';

    protected static string $view = 'filament.pages.my-payments';

    protected static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->hasAnyRole(['user', 'member']);
    }

    public function mount(): void
    {
        abort_if(auth()->user()->hasAnyRole(['admin', 'manager']), 403);
    }

    protected function getTableQuery(): Builder
    {
        return Payment::query()->where('user_id', auth()->id());
    }

    protected function getTableColumns(): array
    {
        return [
                TextColumn::make('membershiptype.type_name')
                    ->searchable()
                    ->sortable(),
                BadgeColumn::make('amount')
                    ->prefix('$')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('payment_date')
                    ->searchable()
                    ->sortable()
                    ->date(),
                TextColumn::make('payment_time')
                    ->time()
                    ->searchable()
                    ->sortable()
        ];
    }

    protected function getTableBulkActions(): array
    {
        return [
            //
        ];
    }
}
