<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\OrderBill;
use App\Util\OrderPDFBill;

class OrderBillServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(OrderBill::class, function ($app, $parameters){
            if($parameters['array_bill'] == "pdf"){
                return new OrderPDFBill();    
            }
        });
    }
}

