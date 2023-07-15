<?php

namespace App\Providers;

use App\Facades\Invoice;
use App\PostcardSendingService;
use App\Billing\BankPaymentGateway;
use App\Billing\CreditPaymentGateway;
use App\Billing\PaymentGatewayContract;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->singleton(PaymentGatewayContract::class,function($app){
            if (request()->has('credit')) {
                return new CreditPaymentGateway('usd');
            }
             return new BankPaymentGateway('usd');
        });

        $this->app->singleton('Postcard',function($app){
            return new PostcardSendingService(country:'us',width:4,height:6);
        });

        //facade
        $this->app->singleton('Invoice',function($app){
            return new Invoice();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
