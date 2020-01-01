<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\User;
use Dingo\Api\Http\Response;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * @param RegisterRequest $request
     *
     * @return Response
     */
    public function store(RegisterRequest $request): Response
    {
        User::create(array_merge(
            $request->except('password'),
            ['password' => Hash::make($request->password)]
        ));

        return $this->response->created();
    }
}
