<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;


class NotificationController extends Controller
{
  
     public function sendNotification(Request $request)
    {
        
          
        $SERVER_API_KEY ='AAAAUP6pWks:APA91bGFW4sKe41YmIsdwbMSN3sIuFxHQKJ6VKLEFAyIGJzwVLb9HfdKMsJoOJ1JUzskqjQNCY582l-wENsnAXpYVWatZj1h9S-_SUnTDq7YlvyxCVjPF5SYSqr7IJZwpSwvrP3BPSBT';
  
        $data = [
            "registration_ids" => ["f6J6pNVORJu5oy1ZH-FJTr:APA91bG8XYKwKbouVYeHqZlP-Oa6-dOt19Z10Qq3UHntEq2BhDdXB7ai5UqbvJNmGcyA7ljIr0pMjrVjuzwbfwRy1YDUcFGmJGitCAI4ZSAWqxWFWMvENX_jaQpJbc0IqrXTwWa0u7bS"],
            "notification" => [
                "title" => "hello",
                "body" => "hhhhhh",  
            ]
        ];
        $dataString = json_encode($data);
    
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
    
        $ch = curl_init();
      
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
               
        $response = curl_exec($ch);
  
        dd($response);
    }
}
