<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MembershiptypeResource\Pages;
use App\Models\Membershiptype;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Model;

class MembershiptypeResource extends Resource
{
    protected static ?string $model = Membershiptype::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'Membership Resource';

    protected static ?string $navigationGroup = 'Resources';

    /**
     * Function that returns the name as the title of the found value
     *
     * @param Model $record
     * @return string
     */
    public static function getGlobalSearchResultTitle(Model $record): string
    {
        return $record->type_name;
    }

    /**
     * Function that fetches a value from the array mentioned below
     *
     * @return array
     */
    public static function getGloballySearchableAttributes(): array
    {
        return ['type_name', 'created_at'];
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
                        Forms\Components\TextInput::make('type_name')
                            ->placeholder('Annually')
                            ->required()
                            ->maxLength(50),
                        Forms\Components\TextInput::make('amount')
                            ->mask(fn (Forms\Components\TextInput\Mask $mask) => $mask->money(prefix: '$', isSigned: false))
                            ->placeholder('50')
                            ->required()
                            ->maxLength(15),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\BadgeColumn::make('id')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('type_name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('amount')
                    ->prefix('$')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->searchable()
                    ->sortable()
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->searchable()
                    ->sortable()
                    ->dateTime(),
            ])->defaultSort('id')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMembershiptypes::route('/'),
            'edit' => Pages\EditMembershiptype::route('/{record}/edit'),
        ];
    }
}
