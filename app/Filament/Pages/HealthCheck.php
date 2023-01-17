<?php

namespace App\Filament\Pages;

use ShuvroRoy\FilamentSpatieLaravelHealth\Pages\HealthCheckResults;
use Carbon\Carbon;
use Filament\Pages\Actions\ButtonAction;
use Illuminate\Support\Facades\Artisan;
use Spatie\Health\Commands\RunHealthChecksCommand;
use Spatie\Health\ResultStores\ResultStore;

class HealthCheck extends HealthCheckResults
{
    protected $listeners = ['refreshComponent' => '$refresh'];

    protected static ?int $navigationSort = 10;

    protected static ?string $navigationIcon = 'heroicon-o-heart';

    protected static string $view = 'filament-spatie-health::pages.health-check-results';

    protected static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->hasAnyRole(['admin']);
    }

    public function mount(): void
    {
        abort_unless(auth()->user()->hasAnyRole(['admin']), 403);
    }

    protected function getActions(): array
    {
        return [
            ButtonAction::make(__('filament-spatie-health::health.pages.health_check_results.buttons.refresh'))->action('refresh'),
        ];
    }

    protected function getHeading(): string
    {
        return __('filament-spatie-health::health.pages.health_check_results.heading');
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('filament-spatie-health::health.pages.health_check_results.navigation.group');
    }

    protected static function getNavigationLabel(): string
    {
        return __('filament-spatie-health::health.pages.health_check_results.navigation.label');
    }

    protected function getViewData(): array
    {
        $checkResults = app(ResultStore::class)->latestResults();

        return [
            'lastRanAt' => new Carbon($checkResults?->finishedAt),
            'checkResults' => $checkResults,
        ];
    }

    public function refresh(): void
    {
        Artisan::call(RunHealthChecksCommand::class);

        $this->emitSelf('refreshComponent');
    }
}
