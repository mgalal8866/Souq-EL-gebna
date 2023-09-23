<?php

namespace Tests;

use App\Livewire\Dashboard\Brands;
use Livewire\Livewire;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    protected function setUp(): void
    {
        parent::setUp();

      // ...

        $this->registerLivewireComponents();
    }

    protected function registerLivewireComponents()
    {
        Livewire::component('Brands', Brands::class);
    }
}
