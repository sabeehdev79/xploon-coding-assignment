<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Services\GetValidUserData;


class Datatable extends Component
{ 

    public $users;
    private $handle;
    public function boot(){
        $this->handle = new GetValidUserData;
    }

    public function render()
    {
        $this->users = $this->handle->get(); 
        return view('livewire.users.datatable');
    }
}
