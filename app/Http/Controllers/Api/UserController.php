<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function massDestroy(Request $request)
    {
        $ids = $request->ids;

        if (!isset($ids)) {
            return response()->json([
                'message' => "please select at least one data you want to delete"
            ], 404);
        }

        User::whereIn('id', $ids)->delete();
        return response()->json(['message '=>"Users Deleted successfully."]);
    }
}
