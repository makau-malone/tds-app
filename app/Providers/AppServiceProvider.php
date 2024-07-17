<?php

namespace App\Providers;

use App\Http\Livewire\ProductsComponent;
use App\Http\Livewire\ProjectsComponent;
use App\Http\Livewire\PannellumComponent;
use Livewire\Livewire;
use Illuminate\Support\ServiceProvider;

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
        Livewire::component('products-component', ProductsComponent::class);
        Livewire::component('projects-component', ProjectsComponent::class);
        Livewire::component('pannellum-component', PannellumComponent::class);
        //
    }
}
