<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PetsResource\Pages;
use App\Filament\Resources\PetsResource\RelationManagers;
use App\Models\Pets;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
class PetsResource extends Resource
{
    protected static ?string $model = Pets::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $label = 'Mascota'; // Nombre singular

    public static function form(Form $form): Form
    {
        return $form
            ->schema([



             

                Forms\Components\TextInput::make('name')
                ->label('Nombre de la Mascota')
                ->required()
                ->maxLength(255),

                Forms\Components\Select::make('type_id')
                ->label('Tipo de Mascota')
                ->relationship('type', 'name')
                ->required()
                ->createOptionForm([
                    Forms\Components\TextInput::make('name')
                        ->label('Nombre del Tipo de Mascota')
                        ->required(),
                ]),
            
                Forms\Components\Select::make('customer_id')
                 ->label('Dueño') 
                 
                 ->relationship('customer', 'name') 
                 ->searchable()
                 ->required(),
            
                Forms\Components\TextInput::make('age')
                ->label('Edad ')
                
                ->required(),
                

                Forms\Components\Toggle::make('in_treatment')
    ->label('En tratamiento') // Cambia el texto si es necesario
    ->onColor('success') // Color cuando está activo (opcional)
    ->offColor('danger') // Color cuando está inactivo (opcional)
    ->default(false), // Valor predeterminado


          
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('name')
                    ->label('Nombre de la Mascota')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('type.name')
                    ->label('Tipo de Mascota')
                    ->sortable()
                    ->searchable(),

                    TextColumn::make("customer.name")
                    ->label('Dueño')
                    ->sortable()
                    ->searchable(),


                TextColumn::make('age')
                    ->label('Edad')

                    
                    ->sortable(),

                    Tables\Columns\BooleanColumn::make('in_treatment')
                    ->label('En tratamiento')
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListPets::route('/'),
            'create' => Pages\CreatePets::route('/create'),
            'edit' => Pages\EditPets::route('/{record}/edit'),
        ];
    }
}
