<?php

namespace App\Http\Controllers\Notifications;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    /**
     * Undocumented function
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {
        return view('notifications.index');
    }
}
