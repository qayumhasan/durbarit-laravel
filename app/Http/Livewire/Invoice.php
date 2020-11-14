<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Invoice extends Component
{

    public $data="qayum hasan";
    public $newmessage;

    public function render()
    {
        return view('livewire.invoice');
    }
}
