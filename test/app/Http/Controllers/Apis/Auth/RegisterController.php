<?php

namespace App\Http\Controllers\Apis\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(RegisterRequest $request)
    {
        $data=$request->except("password_confirmation","password");
        $data["password"]= Hash::make($request->Password);
        dd($request->all());
        
    }
}
