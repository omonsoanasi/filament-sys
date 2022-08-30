<?php

namespace App\Filament\Resources\EmployeeResource\Widgets;

use App\Models\Country;
use App\Models\Employee;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class EmployeeStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $m = now()->month;
        $thisMonth = Employee::where('created_at',$m)->count();
        $KE = Country::where('country_code','KE')->withCount('employees')->first();
        return [
            Card::make('No. of Employees', Employee::all()->count())
                ->description($thisMonth.' this month')
                ->descriptionIcon('heroicon-s-trending-up')
                ->color('success'),
            Card::make('From '.$KE->name, $KE->employees_count),
            Card::make('Unique views', '192.1k')
                ->description('32k increase')
                ->descriptionIcon('heroicon-s-trending-up')
                ->color('success'),
        ];
    }
}
