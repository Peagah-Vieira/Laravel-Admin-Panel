<x-filament-breezy::auth-card action="authenticate">
    <div>
        <h2 class="font-bold tracking-tight text-center text-2xl">
            {{ __('filament::login.heading') }}
        </h2>
        @if(config("filament-breezy.enable_registration"))
        <p class="mt-2 text-sm text-center">
            {{ __('filament-breezy::default.or') }}
            <a class="text-primary-600" href="{{route(config('filament-breezy.route_group_prefix').'register')}}">
                {{ strtolower(__('filament-breezy::default.registration.heading')) }}
            </a>
        </p>
        @endif
    </div>

    {{ $this->form }}

    <x-filament::button type="submit" class="w-full">
        {{ __('filament::login.buttons.submit.label') }}
    </x-filament::button>

    <div class="relative flex items-center justify-center text-center">
        <div class="absolute border-t border-gray-200 w-full h-px"></div>
        <p class="inline-block relative bg-white text-sm p-2 rounded-full font-medium text-gray-500 dark:bg-gray-800 dark:text-gray-100">
            {{ __('Or log in via') }}
        </p>
    </div>

    <div class="grid gap-4 grid-cols-2 grid-rows-2">
        <div class="grid grid-cols-1 gap-4">
            <x-filament::button color="secondary" tag="a" icon='fab-github' href="{{ route('login.github.redirect')}}">
                {{ __('GitHub') }}
            </x-filament::button>
        </div>

        <div class="grid grid-cols-1 gap-4">
            <x-filament::button color="secondary" tag="a" icon='fab-gitlab' href="{{ route('login.gitlab.redirect')}}">
                {{ __('GitLab') }}
            </x-filament::button>
        </div>
      </div>

    <div class="text-center">
        <a class="text-primary-600 hover:text-primary-700" href="{{route(config('filament-breezy.route_group_prefix').'password.request')}}">{{ __('filament-breezy::default.login.forgot_password_link') }}</a>
    </div>
</x-filament-breezy::auth-card>
