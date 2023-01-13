<?php

namespace App\Filament\Widgets;

use Filament\Widgets\LineChartWidget;

class PaymentsChart extends LineChartWidget
{
    protected static ?string $heading = 'Total Payments';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Payments',
                    'data' => [0, 10, 5, 2, 21, 32, 45, 74, 65, 50, 77, 89],
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }
}
