<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TreatmentsResource\Pages;
use App\Filament\Resources\TreatmentsResource\RelationManagers;
use App\Models\Treatments;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\DateColumn;
use Filament\Tables\Columns\BooleanColumn;


class TreatmentsResource extends Resource
{
    protected static ?string $model = Treatments::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-duplicate';
    protected static ?string $label = 'Tratamiento'; // Nombre singular

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->label('Nombre del Tratamiento')
                ->required()
                ->maxLength(255),

            Forms\Components\Textarea::make('description')
                ->label('Descripción')
                ->required()
                ->maxLength(65535),

            Forms\Components\Select::make('doctor_id')
                ->label('Doctor Asignado')
                ->relationship('doctor', 'name') // Relación con la tabla `doctors`
                ->required(),

            Forms\Components\DatePicker::make('date')
                ->label('Fecha del Tratamiento')
                ->required(),


                Forms\Components\Select::make('pet_id')
    ->label('Mascota')
    ->relationship('pet', 'name') // Relación con la tabla `pets`
    ->required(),


            Forms\Components\Toggle::make('is_finished')
                ->label('¿Finalizado?')
                ->default(false),
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


                TextColumn::make('pet.name')
                ->label('Mascota')
                ->sortable()
                ->searchable(),
            

            TextColumn::make('description')
                ->label('Descripción')
                ->limit(50)
                ->searchable(),

            TextColumn::make('doctor.name')
                ->label('Doctor Asignado')
                ->sortable()
                ->searchable(),

            TextColumn::make('date')
                ->label('Fecha')
                ->sortable(),

            BooleanColumn::make('is_finished')
                ->label('Finalizado')
                ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListTreatments::route('/'),
            'create' => Pages\CreateTreatments::route('/create'),
            'view' => Pages\ViewTreatments::route('/{record}'),
            'edit' => Pages\EditTreatments::route('/{record}/edit'),
        ];
    }
}
