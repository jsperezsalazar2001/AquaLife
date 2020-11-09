<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Order;

class Bill implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings(): array{
        return [
            "id",
            "payment_type",
            "total_price",
            "status",
            "user_id",
            "created_at",
            "updated_at"
        ];
    }

    public function collection()
    {
        $order = Order::where("id", session()->get('id_current_order'))->get();
        return $order;
    }
}
