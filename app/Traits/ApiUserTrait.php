<?php

namespace App\Traits;

use App\Models\ApiUser;
use App\Services\PullUsers;
use Illuminate\Support\Facades\Cache;

trait ApiUserTrait {
    
    public function getUsersFromAPI() {
        // Fetch users from XPloon API
        return $users = PullUsers::get(); 
    }
    
    public function prepareDataForInsert($rawData){
        $users = [];

        foreach($rawData as $row){
            $users[] = ['external_id' => $row['id'],
                        'first_name' => $row['fname'],
                        'last_name' => $row['lname'],
                        'email' => $row['email'],
                        'joining_date' => $row['date'],
                       ];
        }
        return $users;
    }

    public function storeUsersLocally($usersData){
        //if no users fetched then do nothing and just get out of this function
        if(empty($usersData))
            return;
        
        // Delete existing users data 
        ApiUser::truncate(); 
        
        $users = $this->prepareDataForInsert($usersData);

        ApiUser::insert($users);
        
    }
    /** 
     * This function sets marker in cache for 1 hour so that next request should not be made to
     * server before one hour.
    */
    public function setValidityOfUserData(){
        Cache::put('user_data_valid', 'valid', $seconds = 3600);
    }

    /***
     * Check if users local data is valid or not
     */
    public function getValidityOfUserData(){
       return Cache::get('user_data_valid');
    }


    public function getLocalUsers(){
        return ApiUser::all();
    }

    public function refreshLocalData(){
        $users = $this->getUsersFromAPI();
        $this->storeUsersLocally($users);
        $this->setValidityOfUserData();
    }
}