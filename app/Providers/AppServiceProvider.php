<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ContactInformation;
use App\Logo;
use App\partner;
use App\Social;
use App\Page;
use App\ProjectCategory;
use App\Service;

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
        $contactinfo=ContactInformation::first();
        view()->share('contactinfo',$contactinfo);

        $logo=Logo::first();
        view()->share('logo',$logo);
        
        $partner=partner::where('status',1)->get();
        view()->share('partner',$partner);

        $social=Social::first();
        view()->share('social',$social);

        $allpage=Page::where('status',1)->get();
        view()->share('allpage',$allpage);

        $service=ProjectCategory::where('status',1)->get();
        view()->share('service',$service);
    }
}
