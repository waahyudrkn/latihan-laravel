<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Policies\MapelPolicy;
use App\Policies\NilaiPolicy;
use App\Policies\SiswaPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Siswa::class => SiswaPolicy::class,
        Mapel::class => MapelPolicy::class,
        Nilai::class => NilaiPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        
    }
}
