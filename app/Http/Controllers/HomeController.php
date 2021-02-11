<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{

    public function index()
    {
      return User::limit('15')->get();
    }

}
