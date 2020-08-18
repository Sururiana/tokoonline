<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use DB;
use Response;
use App\Models\Notification;
use App\Http\Resources\NotificationResource;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function byuser($userid){
        $query = Notification::where('user_id', $userid)->get();

        if ($query->isEmpty()) {
            return Response::json(
                [
                    'status' =>[
                        'code' => 404,
                        'description' => 'Data Not Found'
                    ]
                ],404);
        } else {
            return NotificationResource::collection($query)
            ->additional([
                'status' =>[
                    'code' => 200,
                    'description' => 'OK!'
                ]
            ])->response()->setStatusCode(200);
        }
    }
}
