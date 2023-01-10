<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MemberResource\Pages;
use App\Models\Member;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Model;

class MemberResource extends Resource
{
    protected static ?string $model = Member::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationLabel = 'Members Resource';

    protected static ?string $navigationGroup = 'Resources';

    /**
     * Function that returns the name as the title of the found value
     *
     * @param Model $record
     * @return string
     */
    public static function getGlobalSearchResultTitle(Model $record): string
    {
        return $record->member_name;
    }

    /**
     * Function that fetches a value from the array mentioned below
     *
     * @return array
     */
    public static function getGloballySearchableAttributes(): array
    {
        return ['member_name', 'address', 'contact', 'email', 'age', 'gender'];
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
                        Forms\Components\TextInput::make('member_name')
                            ->placeholder('John Doe')
                            ->unique()
                            ->required(),
                        Forms\Components\TextInput::make('address')
                            ->placeholder('Some Place Here')
                            ->required(),
                        Forms\Components\TextInput::make('contact')
                            ->mask(fn (Forms\Components\TextInput\Mask $mask) => $mask->pattern('(00)00000-0000'))
                            ->placeholder('(22)99843-8864')
                            ->numeric()
                            ->tel()
                            ->unique()
                            ->required(),
                        Forms\Components\TextInput::make('email')
                            ->placeholder('teste@teste.com')
                            ->email()
                            ->unique()
                            ->required(),
                        Forms\Components\TextInput::make('age')
                            ->placeholder('18')
                            ->required(),
                        Forms\Components\Select::make('gender')
                            ->required()
                            ->disablePlaceholderSelection()
                            ->options([
                                'male' => 'Male',
                                'female' => 'Female',
                                'other' => 'Other'
                            ])
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('member_name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('contact')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('age')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('gender')
            ])->defaultSort('id')
            ->filters([
                SelectFilter::make('active')
                    ->options([
                        '0' => 'Unactive',
                        '1' => 'Active',
                    ])
                    ->attribute('active')
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
            'index' => Pages\ListMembers::route('/'),
            'create' => Pages\CreateMember::route('/create'),
            'edit' => Pages\EditMember::route('/{record}/edit'),
        ];
    }
}
