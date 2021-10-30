<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AlertMessageError extends Component
{

    public $message;

    public function render()
    {
        return view('livewire.alert-message-error');
    }

    public function close(){

        $this->emit('closeAlert');
    }

}
