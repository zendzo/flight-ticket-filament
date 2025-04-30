<?php

namespace App\Filament\Resources\TransactionResource\Widgets;

use App\Models\Transaction;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TransactionOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Transactions', Transaction::query()->count()),
            Stat::make('Total Amount (Pending)', 'Rp. '.number_format(Transaction::query()->where('status', 'pending')->sum('amount'))),
            Stat::make('Total Amount (Success)', 'Rp. '.number_format(Transaction::query()->where('status', 'success')->sum('amount'))),
        ];
    }
}
