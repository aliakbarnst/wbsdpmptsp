<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Auth;
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
        Paginator::useBootstrap();
        
        view()->composer(['frontend.main-1','frontend.include.sidebar','dashboard.include.sidebar','frontend.include.sidebar-profil','frontend.page.kontak.index','frontend.page.konsultasi.index','frontend.page.home.index','frontend.page.statistik.index','frontend.page.faqs.index','dashboard.page.pengaduan.detail'],function($view)
        {
            $view->with('pengaturan_website',\App\Models\Pengaturan::first());
        });

        view()->composer(['dashboard.include.sidebar','dashboard.include.header'],function($view)
        {
            $view->with('pengaturan_website',\App\Models\Pengaturan::first());

        });

        // view()->composer('',function($view)
        // {
        //     $view->with('profil',\App\Models\Profil::orderBy('nama','asc')->get());
        // });
    }
}
