<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateStatusUserRequest;
use App\Models\User;

class UpdateStatusController extends Controller
{
    public function __invoke(UpdateStatusUserRequest $request) {
        
        $user = User::find($request->id);
        if ($user) {
            $user->user_status = $request->user_status;
            $user->save();
            //$user->update(['user_status' => $request->user_status]);
            return response()->json(
                [
                    'message' => 'Update successful',
                    'id' => $user->id,
                    'user_status' => $user->user_status,
                    'success' => true,
                    'version' => 'v1'
                ]
            );
        } else {
            return response()->json([
                'message' => 'User not found',
                'success' => false,
                'version' => 'v1'
            ]);
        }
    }
}
