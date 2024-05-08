<?php

namespace App\Providers;

use App\Models\Chidoan;
use App\Models\Chucvu;
use App\Models\Doanphi;
use App\Models\Doanvien;
use App\Models\Hoatdong;
use App\Models\Khoa;
use App\Models\Renluyen;
use App\Policies\API\ChidoanPolicy;
use App\Policies\API\ChucvuPolicy;
use App\Policies\API\DoanphiPolicy;
use App\Policies\API\DoanvienPolicy;
use App\Policies\API\HoatdongPolicy;
use App\Policies\API\KhoaPolicy;
use App\Policies\API\RenluyenPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Doanvien::class => DoanvienPolicy::class,
        Chidoan::class => ChidoanPolicy::class,
        Chucvu::class => ChucvuPolicy::class,
        Doanphi::class => DoanphiPolicy::class,
        Hoatdong::class => HoatdongPolicy::class,
        Renluyen::class => RenluyenPolicy::class,
        Khoa::class => KhoaPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();



        //
    }
}
