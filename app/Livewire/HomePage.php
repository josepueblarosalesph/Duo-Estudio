<?php

namespace App\Livewire;

use Livewire\Component;

class HomePage extends Component
{
    public bool $menuOpen = false;

    public function toggleMenu(): void
    {
        $this->menuOpen = ! $this->menuOpen;
    }

    public function closeMenu(): void
    {
        $this->menuOpen = false;
    }

    public function render()
    {
        return view('livewire.home-page')
            ->layout('components.layouts.app');
    }
}
