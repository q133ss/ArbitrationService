<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function clear()
    {
        //у всех уведомлений, ставим ис рид тру
        Auth()->User()->notifications()->update(['is_read' => true]);
        return true;
    }
}
