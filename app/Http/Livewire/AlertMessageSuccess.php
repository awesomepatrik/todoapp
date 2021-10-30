<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AlertMessageSuccess extends Component
{
    public $message;
    public function render()
    {
        return view('livewire.alert-message-success');
    }
}
