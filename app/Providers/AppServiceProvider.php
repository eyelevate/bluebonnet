<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
<<<<<<< HEAD
        // Send asset issues data globally to sidebar
        view()->composer('layouts.themes.backend.partials.sidebar', function ($view) {
=======

        // Footer
        view()->composer('layouts.themes.theme1.partials.footer', function($view) {
            $company = \App\Company::prepareCompany(\App\Company::find(1));
            $view->with('company', $company);
        });

        view()->composer('layouts.themes.theme2.partials.footer', function($view) {
            $company = \App\Company::prepareCompany(\App\Company::find(1));
            $view->with('company', $company);
        });

        // Send asset issues data globally to sidebar 
        view()->composer('layouts.themes.backend.partials.sidebar', function($view) {
>>>>>>> 01444c0159bb1ed8a5a1b0f681a180e4d04ef5e4
            $customer_count = \App\User::countCustomers();
            $design_count = \App\Design::countDesigns();
            $employee_count = \App\User::countEmployees();
            $companies_count = \App\Company::countCompanies();
            $fee_count = \App\Fee::countFees();
            $finger_count = \App\Finger::countFingers();
            $inventory_count = \App\Inventory::countInventories();
            $inventory_item_count = \App\InventoryItem::countInventoryItems();
            $line_count = \App\Line::countLines();
            $metal_count = \App\Metal::countMetals();
            $stone_size_count = \App\StoneSize::countStoneSizes();
            $stone_count = \App\Stone::countStones();
            $vendor_count = \App\Vendor::countVendors();
            $view->with('companies_count', $companies_count)
                 ->with('customer_count', $customer_count)
                 ->with('design_count', $design_count)
                 ->with('employee_count', $employee_count)
                 ->with('fee_count', $fee_count)
                 ->with('finger_count', $finger_count)
                 ->with('inventory_count', $inventory_count)
                 ->with('inventory_item_count', $inventory_item_count)
                 ->with('line_count', $line_count)
                 ->with('metal_count', $metal_count)
                 ->with('stone_size_count', $stone_size_count)
                 ->with('stone_count', $stone_count)
                 ->with('vendor_count', $vendor_count);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
