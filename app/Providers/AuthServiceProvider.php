<?php

namespace App\Providers;

use App\Models\Chidoan;
use App\Models\Chucvu;
use App\Models\Doanphi;
use App\Models\Doanvien;
use App\Models\Hoatdong;
use App\Models\Khoa;
use App\Policies\API\ChidoanPolicy;
use App\Policies\API\ChucvuPolicy;
use App\Policies\API\DoanphiPolicy;
use App\Policies\API\DoanvienPolicy;
use App\Policies\API\HoatdongPolicy;
use App\Policies\API\KhoaPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
