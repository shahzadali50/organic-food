<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\UserMessage;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Ordes', Order::count())
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('success'),
            Stat::make('Total Sale', Order::sum('grand_total'))
            ->chart([7, 2, 5, 3, 1, 4, 17])
            ->descriptionIcon('heroicon-m-arrow-trending-down')
            ->color('danger'),
            Stat::make('Total Items', Product::count())
            ->chart([7, 20, 5, 3, 1, 4, 17])
            ->descriptionIcon('heroicon-m-arrow-trending-down')
            ->color('primary'),
            Stat::make('Total User', User::count())
            ->chart([7, 20, 5, 3, 1, 4, 40])
            ->descriptionIcon('heroicon-m-arrow-trending-down')
            ->color('info'),
            Stat::make('Client Reviews', UserMessage::count())
            ->chart([7, 20, 5, 3, 1, 4, 40])
            ->descriptionIcon('heroicon-m-arrow-trending-down')
            ->color('secondary'),
        ];
    }
}
