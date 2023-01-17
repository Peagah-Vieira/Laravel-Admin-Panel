<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InstructorResource\Pages;
use App\Models\Instructor;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Model;

class InstructorResource extends Resource
{
    protected static ?string $model = Instructor::class;
    
    protected static ?int $navigationSort = 2;

    protected static ?string $navigationIcon = 'heroicon-o-identification';

    protected static ?string $navigationLabel = 'Instructors';

    protected static ?string $navigationGroup = 'Manager Resources';

    public static function getGlobalSearchResultTitle(Model $record): string
    {
        return $record->instructor_name;
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['instructor_name', 'email', 'contact', 'address'];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('instructor_name')
                            ->placeholder('John Doe')
                            ->required(),
                        Forms\Components\TextInput::make('contact')
                            ->mask(fn (Forms\Components\TextInput\Mask $mask) => $mask->pattern('(00)00000-0000'))
                            ->placeholder('(22)99843-8864')
                            ->numeric()
                            ->tel()
                            ->required(),
                        Forms\Components\TextInput::make('address')
                            ->placeholder('Some Place Here')
                            ->required(),
                        Forms\Components\TextInput::make('email')
                            ->placeholder('teste@teste.com')
                            ->email()
                            ->required(),
                        Forms\Components\Toggle::make('active')
                            ->nullable()
                            ->onColor('success')
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('instructor_name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('contact')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('active')
                    ->boolean()
                    ->sortable(),
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
            'index' => Pages\ListInstructors::route('/'),
            'create' => Pages\CreateInstructor::route('/create'),
            'edit' => Pages\EditInstructor::route('/{record}/edit'),
        ];
    }
}
