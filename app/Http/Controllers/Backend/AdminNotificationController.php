<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notifications\AdminNotification;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class AdminNotificationController extends Controller
{
    public function createnotifi(){

        return view('Backend.notification.create');
    }
    public function sendMessage(Request $request)
    {
        $rules = [
            'massage_subject' => 'required|string',
            'massage_content' => 'required|string',
            'recipient_type' => 'required|in:users,vendors',
            ];
            
            // Custom validation error messages
        $messages = [
                'massage_subject.required' => 'massage subject  is required.',             
                'massage_content.required' => 'massage content  is required.',             
                'recipient_type.required' => 'recipient type  is required.',             
            ];
        $request->validate($rules, $messages);
       

    
        $subject = $request->input('massage_subject');
        $content = $request->input('massage_content');
        $recipientType = $request->input('recipient_type');
    
        $users = [];
        $vendors = [];
    
        // Fetch users and vendors based on recipient type
        if ($recipientType === 'users') {
            $users = User::where('role','user')->get();
            Notification::send($users, new AdminNotification($subject, $content,$recipientType));

        } elseif ($recipientType === 'vendors') {
            $vendors = User::where('role','vendor')->get();        }
            Notification::send($vendors, new AdminNotification($subject, $content,$recipientType));

        // Send notifications
    
        return redirect()->route('admin.dashboard')->with('success', 'Notification sent successfully');
    }
    public function markAllAsRead()
    {
        $user = Auth::user();
        $user->unreadNotifications->markAsRead();

        // Return a JSON response
        return response()->json(['message' => 'All notifications marked as read']);
    }
}
