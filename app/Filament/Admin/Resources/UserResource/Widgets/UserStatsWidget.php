<?php

namespace App\Filament\Admin\Resources\UserResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;

class UserStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Всего пользователей:', User::count()),
            Stat::make('Администраторов:', User::where('role', User::ROLE_ADMIN)->count()),
            Stat::make('Редакторов:', User::where('role', User::ROLE_EDITOR)->count()),
        ];
    }
}
