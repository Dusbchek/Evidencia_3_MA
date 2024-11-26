<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Models\Customer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Tables\Columns\TextColumn;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    protected static ?string $label = 'Cliente'; // Nombre singular


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->label('Nombre') // Etiqueta para el campo
                ->required()    // Campo obligatorio
                ->maxLength(255), // Longitud máxima

            Forms\Components\TextInput::make('email')
                ->label('Correo') // Etiqueta
                ->email()        // Validación de formato de correo
                ->required()
                ->unique('customers', 'email') // Campo único en la tabla customers
                ->maxLength(255),

            Forms\Components\TextInput::make('phone')
                ->label('Telefono')
                ->tel()           // Formato de teléfono
                ->maxLength(15),   

            Forms\Components\TextInput::make('address')
                ->label('Dirección') // Etiqueta
                ->maxLength(500)
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

            // Columna para el Nombre
            TextColumn::make('name')
                ->label('Nombre')
                ->sortable()
                ->searchable(),

            // Columna para el Correo Electrónico
            TextColumn::make('email')
                ->label('Correo Electrónico')
                ->sortable()
                ->searchable(),

            // Columna para el Teléfono
            TextColumn::make('phone')
                ->label('Teléfono')
                ->sortable()
                ->searchable(),

            // Columna para la Dirección
            TextColumn::make('address')
            ->label('Dirección')
            ->limit(50) // Limita el número de caracteres mostrados en la tabla
            ->tooltip(fn ($record) => $record->address), // Muestra la dirección completa en el tooltip
          // Muestra el texto completo al pasar el mouse

       
                
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
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
