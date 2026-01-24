<?php

namespace App\Providers;

use App\Repository\TenantRepository;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->shareActiveTenantToAllViews();
    }

    private function shareActiveTenantToAllViews(): void
    {
        try {
            /** @var TenantRepository $tenantRepository */
            $tenantRepository = $this->app->get(TenantRepository::class);
        } catch (NotFoundExceptionInterface|ContainerExceptionInterface) {

        }

        $activeTenant = $tenantRepository->findActive();

        //$activeTenant->socials = json_decode($activeTenant->socials, true);

        View::share('tenant', $activeTenant);
    }
}
