<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentResource\Pages;
use App\Filament\Resources\PaymentResource\RelationManagers\MemberRelationManager;
use App\Filament\Resources\PaymentResource\RelationManagers\MembershiptypeRelationManager;
use App\Models\Payment;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Model;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static ?string $navigationIcon = 'heroicon-o-cash';

    protected static ?string $navigationLabel = 'Payments Resource';

    protected static ?string $navigationGroup = 'Resources';

    /**
     * Function that returns the name as the title of the found value
     *
     * @param Model $record
     * @return string
     */
    public static function getGlobalSearchResultTitle(Model $record): string
    {
        return $record->member->member_name;
    }

    /**
     * Function that fetches a value from the array mentioned below
     *
     * @return array
     */
    public static function getGloballySearchableAttributes(): array
    {
        return ['member.member_name', 'amount'];
    }

    /**
     * Function that returns values ​​from the model and shows in the sidebar
     *
     * @return integer
     */
    protected static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Select::make('member_name')
                        ->label('Member name')
                        ->relationship('member', 'member_name')
                        ->disablePlaceholderSelection()
                        ->searchable()
                        ->preload()
                        ->required(),
                        Forms\Components\Select::make('type_name')
                        ->label('Membership type')
                        ->relationship('membershiptype', 'type_name')
                        ->disablePlaceholderSelection()
                        ->searchable()
                        ->preload()
                        ->required(),
                        Forms\Components\TextInput::make('amount')
                            ->mask(fn (Forms\Components\TextInput\Mask $mask) => $mask->money(prefix: '$', isSigned: false))
                            ->required(),
                        Forms\Components\TimePicker::make('payment_time')
                            ->placeholder('18:00')
                            ->withoutSeconds()
                            ->required(),
                        Forms\Components\DatePicker::make('payment_date')
                            ->placeholder('Jan 5, 2023')
                            ->maxDate(now())
                            ->required(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('member.member_name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('membershiptype.type_name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('amount')
                    ->prefix('$')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('payment_date')
                    ->searchable()
                    ->sortable()
                    ->date(),
                Tables\Columns\TextColumn::make('payment_time')
                    ->time()
                    ->searchable()
                    ->sortable()
            ])->defaultSort('id')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            MemberRelationManager::class,
            MembershiptypeRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayment::route('/create'),
            'edit' => Pages\EditPayment::route('/{record}/edit'),
        ];
    }
}
