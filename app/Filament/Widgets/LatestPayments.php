<?php

namespace App\Filament\Widgets;

use App\Models\Payment;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Widgets\TableWidget as BaseWidget;
use HusamTariq\FilamentTimePicker\Forms\Components\TimePickerField;

class LatestPayments extends BaseWidget
{
    public static function canView(): bool
    {
        return auth()->user()->hasAnyRole(['admin', 'manager']);
    }

    protected int | string | array $columnSpan = 'full';

    protected function getTableQuery(): Builder
    {
        return Payment::query()->latest();
    }

    protected function getTableColumns(): array
    {
        return ([
            TextColumn::make('member.member_name')
                ->searchable()
                ->sortable(),
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
                ->searchable()
                ->sortable()
                ->time(),
        ]);
    }

    protected function getTableActions(): array
    {
        return [
            ViewAction::make()
                ->form([
                    Select::make('member_name')
                        ->label('Member name')
                        ->relationship('member', 'member_name')
                        ->disablePlaceholderSelection()
                        ->searchable()
                        ->preload()
                        ->required(),
                    Select::make('type_name')
                        ->label('Membership type')
                        ->relationship('membershiptype', 'type_name')
                        ->disablePlaceholderSelection()
                        ->searchable()
                        ->preload()
                        ->required(),
                    TextInput::make('amount')
                        ->mask(fn (TextInput\Mask $mask) => $mask->money(prefix: '$', isSigned: false))
                        ->required(),
                    TimePickerField::make('payment_time')
                        ->okLabel('Confirm')
                        ->cancelLabel('Cancel'),
                    DatePicker::make('payment_date')
                        ->placeholder('Jan 5, 2023')
                        ->maxDate(now())
                        ->required(),
                ])
        ];
    }

    protected function isTablePaginationEnabled(): bool
    {
        return true;
    }
}
