<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminPanelController extends Controller
{
    public function __invoke() {
        $user = User::all();
        return response()->json($user);
    }
}
