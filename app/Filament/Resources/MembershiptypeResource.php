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
    
    protected static ?int $navigationSort = 2;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'Membership';

    protected static ?string $navigationGroup = 'Manager Resources';

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
        return ['type_name'];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('type_name')
                            ->placeholder('Annually')
                            ->required(),
                        Forms\Components\TextInput::make('amount')
                            ->mask(fn (Forms\Components\TextInput\Mask $mask) => $mask->money(prefix: '$', isSigned: false))
                            ->placeholder('50')
                            ->required()
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
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
                    ->date(),
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
                Tables\Actions\DeleteAction::make(),
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
            'create' => Pages\CreateMembershiptype::route('/create'),
            'edit' => Pages\EditMembershiptype::route('/{record}/edit'),
        ];
    }
}
