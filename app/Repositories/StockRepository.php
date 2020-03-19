<?php


namespace App\Repositories;


use App\Stock;
use Illuminate\Support\Carbon;

class StockRepository
{
    public function stockCurrentDay()
    {
        $current_day = strtolower(Carbon::now('Asia/Krasnoyarsk')->dayName);
        $date_now = \Carbon\Carbon::now()->format('Y-m-d');
        return Stock::with('days', 'company')
            ->select(Stock::FIELD_SELECT)
            ->where('type', Stock::PERIODICAL)
            ->whereDate('day_begin', '<=', $date_now)
            ->whereDate('day_end', '>=', $date_now)
            ->union(
                Stock::with('days', 'company')
                    ->select(Stock::FIELD_SELECT)
                    ->where('type', Stock::CONSTANT)
                    ->whereHas('days', function ($query) use ($current_day) {
                        return $query->where('day', $current_day);
                    })
            );
    }
}
