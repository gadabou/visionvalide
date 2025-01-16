<?php

use Illuminate\Support\Facades\Storage;
use Twilio\Rest\Client;
use Illuminate\Support\Str;

if (!function_exists('generateCode')) {
    function generateCode(string $codeInitial, $id = 0)
    {
        $id = $id ? ++$id : 1;
        $code = $codeInitial.''. str_pad($id, 4, "0", STR_PAD_LEFT);

        return $code;
    }
}

if (!function_exists('formatDate')) {
    function formatDate($date, $format = 'd/m/Y')
    {
        if (is_null($date)) {
            return null;
        }
        return date($format, strtotime($date));
    }
}

if (!function_exists('wordPlural')) {
    function wordPlural(string $word, int $count)
    {
        return Str::plural($word, $count);
    }
}

if (!function_exists('getFileUrl')) {
    function getFileUrl(string $file = null)
    {
        return $file ? Storage::url($file) : null;
    }
}

if (!function_exists('notify')) {
    function notify($message, $type = 'success')
    {
        return [
            'message' => $message,
            'type' => $type,
        ];
    }
}

// if (!function_exists('sendSMS')) {
//     function sendSMS($content)
//     {
//         $sid = getenv('TWILIO_ACCOUNT_SID');
//         $token = getenv('TWILIO_AUTH_TOKEN');
//         $from_number = getenv('TWILIO_NUMBER');
//         $to_number = '+22892904090';

//         $twilio = new Client($sid, $token);

//         $twilio->messages->create($to_number, [
//             'from' => $from_number,
//             'body' => $content,
//         ]);
//     }
// }

// if (!function_exists('alertLowStock')) {
//     function alertLowStock($stockValue, $alertValue, $message)
//     {
//         if ($stockValue <= $alertValue) {
//             sendSMS($message);
//         }
//     }
// }

if (!function_exists('getFileUrl')) {
    function getFileUrl(string $file = null)
    {
        return $file ? Storage::url($file) : null;
    }
}

if (!function_exists('wordPlural')) {
    function wordPlural(string $word, int $count)
    {
        return Str::plural($word, $count);
    }
}
?>
