<?php



namespace App\Filament\Widgets;

use App\Models\Customer;
use App\Models\doctors;
use App\Models\Pets;
use App\Models\treatments;
use Filament\Widgets\Widget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class TreatmentsCountWidget extends BaseWidget
{

    public $count;

    public function mount()
    {
        // Contar los tratamientos no finalizados
        $this->count = treatments::where('is_finished', false)->count();
    }

  
    protected function getStats(): array
    {
        $petsCount = Pets::count();
        $doctorsCount = doctors::count();
        $customersCount = Customer::count();


        return [
            Stat::make('Tratamientos pendientes', $this->count)
                ->description('Tratamientos sin completar')
                
                ,
                Stat::make('Total de Mascotas', $petsCount)
                ->description('Cantidad de mascotas registradas'),
                
                Stat::make('Total de Doctores', $doctorsCount)
                ->description('Cantidad de doctores registrados')
                ->descriptionIcon('heroicon-o-user-group'),

                Stat::make('Total de Clientes', $customersCount)
                ->description('Cantidad de clientes registrados')
                ->descriptionIcon('heroicon-o-user-group')
        ];
    }
}
