<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Models\register;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $youtube=DB::table('youtubes')->get();
        View::share('youtube',$youtube);

        $vendors = DB::table('vendors')
        ->select('*')
        ->where('Vendor_Type','!=','Broker')
        ->where('Approval_Status','=','Approved')
        ->get();
        View::share('vendorimage',$vendors);

        $testimonials=DB::table('testimonials')->get();
        View::share('testimonials',$testimonials);

    }
}
