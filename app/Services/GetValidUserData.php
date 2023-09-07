<?php

namespace App\Services;

use App\Models\ApiUser;
use App\Traits\ApiUserTrait;

class GetValidUserData
{
    use ApiUserTrait;
    
    public $users;
    public function get(){
        //if local data is older than 1 hour then first refresh local DB
        if( !$this->getValidityOfUserData()){
            $this->refreshLocalData();
        }

        return ApiUser::all();
    }
}