<?php

namespace App\Livewire;

use App\Models\Donasi;
use Livewire\Component;

class Home extends Component
{
    public $donations;
    public function mount(Donasi $donasi)
    {
        $this->donations = $donasi->get();
    }
    public function render()
    {
        return view('livewire.home');
    }
}
