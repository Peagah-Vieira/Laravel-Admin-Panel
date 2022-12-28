<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\UserMenuItem;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Filament::serving(function () {
            //Register a navigation group(Using on sidebar)
            Filament::registerNavigationGroups([
                NavigationGroup::make()
                    ->label('Resources')
            ]);
            
            //Register a user menu item(Using on navbar profile)
            Filament::registerUserMenuItems([
                'logout' => UserMenuItem::make()->label('Logout'),
            ]);
        });
    }
}