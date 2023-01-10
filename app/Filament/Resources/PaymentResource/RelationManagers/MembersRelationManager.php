<?php

namespace App\Filament\Resources\PaymentResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;

class MembersRelationManager extends RelationManager
{
    protected static string $relationship = 'members';

    protected static ?string $recordTitleAttribute = 'member_name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('member_name')
                ->placeholder('John Doe')
                ->required()
                ->maxLength(50),
            Forms\Components\TextInput::make('address')
                ->placeholder('Some Place Here')
                ->required()
                ->maxLength(100),
            Forms\Components\TextInput::make('contact')
                ->mask(fn (Forms\Components\TextInput\Mask $mask) => $mask->pattern('(00)00000-0000'))
                ->placeholder('(22)99843-8864')
                ->numeric()
                ->tel()
                ->required()
                ->maxLength(15),
            Forms\Components\TextInput::make('email')
                ->placeholder('teste@teste.com')
                ->email()
                ->required()
                ->maxLength(30),
            Forms\Components\TextInput::make('age')
                ->placeholder('18')
                ->required(),
            Forms\Components\Select::make('gender')
                ->required()
                ->options([
                    'Male' => 'Male',
                    'Female' => 'Female',
                    'Other' => 'Other'
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\BadgeColumn::make('id')
                ->label('Member ID')
                ->sortable(),
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
