<?php

namespace App\Http\Services\account;

use App\Models\User;

class accountService
{
    public function get()
    {
        return User::orderByDesc('id')->get();
    }
}