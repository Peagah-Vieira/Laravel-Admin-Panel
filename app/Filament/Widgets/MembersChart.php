<?php

namespace App\Filament\Widgets;

use App\Models\Member;
use Carbon\Carbon;
use Filament\Widgets\LineChartWidget;

class MembersChart extends LineChartWidget
{
    protected static ?string $heading = 'New Members';

    protected function getData(): array
    {
        $members = Member::select('created_at')->get()->groupBy( function($users) {
            return Carbon::parse($users->created_at)->format('F');
        });

        $quantities = [];

        foreach ($members as $member => $value) {
            array_push($quantities, $value->count());
        }

        return [
            'datasets' => [
                [
                    'label' => 'Members Joined',
                    'data' => $quantities,
                    'backgroundColor' => [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)',
                    ],
                    'borderColor' => [
                        'rgba(255, 99, 132)',
                        'rgba(255, 159, 64)',
                        'rgba(255, 205, 86)',
                        'rgba(75, 192, 192)',
                        'rgba(54, 162, 235)',
                        'rgba(153, 102, 255)',
                        'rgba(201, 203, 207)',
                    ],
                    'borderWidth' => 1
                ],
            ],
            'labels' => $members->keys(),
        ];
    }
}
