<?php
namespace App\Service;

use TaqnyatSms;
use Illuminate\Support\Facades\Log;

class Taqnyat
{
    protected const TOKEN = '9aef05261c42196bbf70fab04c6efa0e';
    protected const SENDER = 'Maraseem';
    // protected const TOKEN = '5e26048e234f5166d9977a27ad860fc5';
    // protected const SENDER = 'Taqnyat.sa';
    public static function send($body, $recipients = [], $sender = null, $smsId = "")
    {
        try {
            $taqnyt = new TaqnyatSms(self::TOKEN);
            $message = $taqnyt->sendMsg($body, $recipients, $sender ? $sender : self::SENDER, $smsId);
            Log::info($message);
            return json_decode($message);
        } catch (\Throwable $e) {
            return ['error' => true, 'message' => $e->getMessage()];
        }
    }
}
