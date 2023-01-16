<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\PaymentResource;
use App\Models\Membershiptype;
use App\Models\Payment;
use Filament\Forms\Components\TimePicker;

class PaymentForm extends CreateRecord implements HasForms
{    
    protected static string $resource = PaymentResource::class;
    
    protected static ?int $navigationSort = 3;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    protected static ?string $navigationLabel = 'Realize Payment';

    protected static ?string $navigationGroup = 'Payments';

    protected static string $view = 'filament.pages.payment-form';

    protected function getFormModel(): string 
    {
        return Payment::class;
    } 

    protected static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->hasAnyRole(['user']);
    }

    public function mount(): void
    {
        $this->form->fill([
            'user_id' => auth()->id(),
            'payment_time' => now(),
            'payment_date' => now(),
        ]);

        abort_if(auth()->user()->hasAnyRole(['admin', 'manager', 'isntructor', 'member']), 403);
    }

    protected function getFormSchema(): array
    {
        return [
            Card::make()
                ->schema([
                    Select::make('Membership_type')
                        ->options(Membershiptype::all()->pluck('type_name', 'id')->toArray())
                        ->reactive()
                        ->disablePlaceholderSelection()
                        ->searchable()
                        ->preload()
                        ->required(),
                    TextInput::make('amount')
                        ->mask(fn (TextInput\Mask $mask) => $mask->money(prefix: '$', isSigned: false))
                        ->required(),
                    TimePicker::make('payment_time')
                        ->disabled()
                        ->required(),
                    DatePicker::make('payment_date')
                        ->disabled()
                        ->required(),
                ])
        ];
    }
}
