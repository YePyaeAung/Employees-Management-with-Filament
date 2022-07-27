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
        $mm = Country::where('country_code', 'MM')->withCount('employees')->first();
        $th = Country::where('country_code', 'TH')->withCount('employees')->first();
        return [
            Card::make('All Employees', Employee::all()->count()),
            Card::make('Myanmar Employees', $mm ? $mm->employees_count : 0),
            Card::make('Thailand Employees', $th ? $th->employees_count : 0),
        ];
    }
}
