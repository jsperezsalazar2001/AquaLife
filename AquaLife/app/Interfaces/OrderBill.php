<?php 

namespace App\Interfaces;
use Illuminate\Http\Request;

interface OrderBill {
    public function generateBill($request);
}
