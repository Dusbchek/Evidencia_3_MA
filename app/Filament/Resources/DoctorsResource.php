<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DoctorsResource\Pages;
use App\Filament\Resources\DoctorsResource\RelationManagers;
use App\Models\Doctors;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;

class DoctorsResource extends Resource
{
    protected static ?string $model = Doctors::class;

    protected static ?string $navigationIcon = 'heroicon-o-plus-circle';
    protected static ?string $label = 'Doctor'; // Nombre singular
    protected static ?string $pluralLabel = 'Doctores'; // Nombre plural

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->label('Nombre del Doctor')
                ->required()
                ->maxLength(255),

            Forms\Components\Select::make('main_type_id')
                ->label('Tipo Principal de Mascota')
                ->relationship('mainType', 'name') // Relación con la tabla pets_types
                ->required(),

            Forms\Components\TextInput::make('email')
                ->label('Correo Electrónico')
                ->email()
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('phone')
                ->label('Teléfono')
                ->tel()
                ->required()
                ->maxLength(15),

            
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                ->label('Nombre')
                ->sortable()
                ->searchable(),

            TextColumn::make('mainType.name')
                ->label('Especialidad')
                ->sortable()
                ->searchable(),

            TextColumn::make('email')
                ->label('Correo Electrónico')
                ->sortable()
                ->searchable(),

            TextColumn::make('phone')
                ->label('Teléfono')
                ->sortable()
                ->searchable(),

       

           
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
            'index' => Pages\ListDoctors::route('/'),
            'create' => Pages\CreateDoctors::route('/create'),
            'edit' => Pages\EditDoctors::route('/{record}/edit'),
        ];
    }
}
