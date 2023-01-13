<?php

namespace App\Filament\Widgets;

use App\Models\Instructor;
use App\Models\Member;
use App\Models\Payment;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Instructors', Instructor::all()->count())
                ->description('3% increase')
                ->descriptionIcon('heroicon-s-trending-up')
                ->chart([7, 2, 6, 3, 8, 4, 17])
                ->color('success'),
            Card::make('Payments', Payment::all()->count())
                ->description('5% decrease')
                ->descriptionIcon('heroicon-s-trending-down')
                ->chart([8, 7, 5, 6, 4, 3, 3])
                ->color('danger'),
            Card::make('Members', Member::all()->count())
                ->description('10% increase')
                ->descriptionIcon('heroicon-s-trending-up')
                ->chart([10, 4, 7, 3, 15, 5, 17])
                ->color('success'),
        ];
    }
}
