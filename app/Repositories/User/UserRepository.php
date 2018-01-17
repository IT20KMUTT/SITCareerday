<?php

namespace App\Repositories\User;

use App\Repositories\User\UserInterface as UserInterface;
use App\User;


class UserRepository implements UserInterface
{
    public $user;


    function __construct(User $user) {
	     $this->user = $user;
    }


    public function getAll()
    {
        return $this->user->getAll();
    }


    public function find($id)
    {
        return $this->user->findUser($id);
    }


    public function delete($id)
    {
        return $this->user->deleteUser($id);
    }

    public function updateUserProfile($data){
      $this->user->where('std_id',array_get($data,'std_id'))
                    ->update(array('prefix' => array_get($data,'prefix'),
                            'name' => array_get($data,'name'),
                            'surname' => array_get($data,'surname'),
                            'age' => array_get($data,'age'),
                            'religion' => array_get($data,'religion'),
                            'birth' => array_get($data,'birth'),
                            'sodier' => array_get($data,'sodier'),
                            'status' => array_get($data,'status')));
      $result = $this->user->where('std_id',array_get($data,'std_id'))->get();
      return $result;
    }
}
