<?php

namespace App\Http\Controllers\Api\Notifications;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Notifications\NotificationCollection;

class NotificationController extends Controller
{
    /**
     * Undocumented function
     */
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $notifications = $request->user()
            ->notifications()
            ->paginate(25);

        return new NotificationCollection($notifications);
    }
}
