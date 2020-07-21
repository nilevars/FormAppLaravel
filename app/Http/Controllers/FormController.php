<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormDataRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;

class FormController extends Controller
{
    public function addData(FormDataRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = $request->password;
        if ($user->save()) {
            return new Response(['user' => $user], Response::HTTP_CREATED);
        } else {
            return new Response(['message' => "User creation failed"], Response::HTTP_BAD_REQUEST);
        }
    }
}
