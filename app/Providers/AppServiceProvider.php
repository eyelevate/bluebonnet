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
        
        // Layouts
        view()->composer([
            'layouts.themes.backend.login',
            'layouts.themes.backend.layout',
            'layours.themes.backend.partials.nav',
            'layouts.themes.theme1.layout',
            'layouts.themes.theme2.layout',
            'layouts.themes.theme2.partials.nav'
            ], function($view) {
            $company = \App\Company::prepareCompany(\App\Company::find(1));
            $view->with('company', $company);
        });


        // Footer
        view()->composer([
            'layouts.themes.theme1.partials.footer',
            'layouts.themes.theme2.partials.footer',
            'emails.user.invoiceuserorder'
            ], function ($view) {
            $company = \App\Company::prepareCompany(\App\Company::find(1));
            $view->with('company', $company);
        });

        // Send asset issues data globally to sidebar
        view()->composer('layouts.themes.backend.partials.sidebar', function ($view) {
            $collections_count = \App\Collection::countCollections();
            $customer_count = \App\User::countCustomers();
            $employee_count = \App\User::countEmployees();
            $companies_count = \App\Company::countCompanies();
            $fee_count = \App\Fee::countFees();
            $finger_count = \App\Finger::countFingers();
            $inventory_count = \App\Inventory::countInventories();
            $inventory_item_count = \App\InventoryItem::countInventoryItems();
            $metal_count = \App\Metal::countMetals();
            $size_count = \App\Size::countSizes();
            $stone_count = \App\Stone::countStones();
            $vendor_count = \App\Vendor::countVendors();
            $view->with('companies_count', $companies_count)
            ->with('collections_count',$collections_count)
            ->with('customer_count', $customer_count)
            ->with('employee_count', $employee_count)
            ->with('fee_count', $fee_count)
            ->with('finger_count', $finger_count)
            ->with('inventory_count', $inventory_count)
            ->with('inventory_item_count', $inventory_item_count)
            ->with('metal_count', $metal_count)
            ->with('size_count',$size_count)
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
