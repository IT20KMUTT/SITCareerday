<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function updateUserProfile(){
       $data = Input::all();
       $result = $this->UserRepository->updateUserProfile($data);
       return $result;
    }
}
