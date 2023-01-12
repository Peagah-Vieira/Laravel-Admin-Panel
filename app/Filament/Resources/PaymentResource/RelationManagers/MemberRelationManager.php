<?php

namespace App\Filament\Resources\PaymentResource\RelationManagers;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;

class MemberRelationManager extends RelationManager
{
    protected static string $relationship = 'member';

    protected static ?string $recordTitleAttribute = 'member_name';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('member_name')
                    ->placeholder('John Doe')
                    ->required(),
                TextInput::make('address')
                    ->placeholder('Some Place Here')
                    ->required(),
                TextInput::make('contact')
                    ->mask(fn (TextInput\Mask $mask) => $mask->pattern('(00)00000-0000'))
                    ->placeholder('(22)99843-8864')
                    ->numeric()
                    ->tel()
                    ->required(),
                TextInput::make('email')
                    ->placeholder('teste@teste.com')
                    ->email()
                    ->required(),
                TextInput::make('age')
                    ->placeholder('18')
                    ->required(),
                Select::make('gender')
                    ->required()
                    ->disablePlaceholderSelection()
                    ->options([
                        'male' => 'Male',
                        'female' => 'Female',
                        'other' => 'Other'
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('member_name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('address')
                    ->sortable(),
                Tables\Columns\TextColumn::make('contact')
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('age')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                //Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
