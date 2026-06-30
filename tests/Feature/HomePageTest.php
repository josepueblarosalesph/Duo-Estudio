<?php

namespace Tests\Feature;

use App\Livewire\HomePage;
use Livewire\Livewire;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    public function test_mobile_menu_can_be_opened_and_closed(): void
    {
        Livewire::test(HomePage::class)
            ->assertSet('menuOpen', false)
            ->call('toggleMenu')
            ->assertSet('menuOpen', true)
            ->assertSee('Navegación móvil')
            ->call('closeMenu')
            ->assertSet('menuOpen', false);
    }
}
