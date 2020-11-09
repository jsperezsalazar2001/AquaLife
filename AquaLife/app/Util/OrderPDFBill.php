<?php 

namespace App\Util;

use App\Interfaces\OrderBill;
use Illuminate\Http\Request;
use PDF;

class OrderPDFBill implements OrderBill {
    public function generateBill($data){
        $pdf = PDF::loadView('util.order_pdf_bill', compact('data'));
        return $pdf->stream($data['filename'].'.pdf');
    }
}
