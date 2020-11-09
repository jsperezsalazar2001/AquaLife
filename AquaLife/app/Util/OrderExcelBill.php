<?php 

namespace App\Util;

use App\Interfaces\OrderBill;
use App\Exports\Bill;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class OrderExcelBill implements OrderBill {
    public function generateBill($data){
        //dd($data);
        return Excel::download(new Bill, $data['filename'].".xlsx");
    }
}