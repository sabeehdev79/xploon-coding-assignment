<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Services\GetValidUserData;


class Datatable extends Component
{ 

    public $users;
    public $show = false;
    
    private $handle;


    public function boot(){
        $this->handle = new GetValidUserData;
    }

    public function rendering(){
        $this->show = true;
    }

    public function rendered(){
        $this->show = false;
    }

    public function render()
    {
        $this->users = $this->handle->get(); 
        return view('livewire.users.datatable');
    }
}
