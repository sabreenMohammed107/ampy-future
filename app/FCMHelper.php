<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;

class FCMHelper extends Model
{
// this package link : https://github.com/code-lts/Laravel-FCM
    public static $title;
    public static $body;
    public static $sound;
    public static $priority;
    public static $badge;
    public static $action;


    /**
     * Set The Notification Params.
     * @return boolean
    */
    public static function setNotificationParams($title, $body)
    {
        self::$title = $title;
        self::$body = $body;
        self::$sound = 'default';
        self::$priority = 'high';
        self::$badge = 1;
        self::$action = '';
    }


    /**
     * Sending a Downstream Message to a Device.
     * @param  token
     * @return arrays
    */
    public static function sendNotifcationToDevice($token)
    {
        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);
        $optionBuilder->setPriority(self::$priority);

        $notificationBuilder = new PayloadNotificationBuilder(self::$title);
        $notificationBuilder->setBody(self::$body)
                            ->setSound(self::$sound)
                            ->setBadge(self::$badge)
                            ->setClickAction(self::$action);

        // $dataBuilder = new PayloadDataBuilder();
        // $dataBuilder->addData(['a_data' => 'my_data']);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        // $data = $dataBuilder->build();

        $downstreamResponse = FCM::sendTo($token, $option, $notification, null);

        $downstreamResponse->numberSuccess();
        $downstreamResponse->numberFailure();
        $downstreamResponse->numberModification();
        // return Array - you must remove all this tokens in your database
        $downstreamResponse->tokensToDelete();
        // return Array (key : oldToken, value : new token - you must change the token in your database)
        $downstreamResponse->tokensToModify();
        // return Array - you should try to resend the message to the tokens in the array
        $downstreamResponse->tokensToRetry();
        // return Array (key:token, value:error) - in production you should remove from your database the tokens
        $downstreamResponse->tokensWithError();

        self::FCMDatabaseModifications($downstreamResponse, [$token]);

        if ($downstreamResponse->numberSuccess() > 0)
            return true;
        else
            return false;
    }


    /**
     * Sending a Downstream Message to Multiple Devices.
     * @return arrays
    */
    public static function sendNotifcationToMultipleDevices($tokens = null)
    {
        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);
        $optionBuilder->setPriority(self::$priority);

        $notificationBuilder = new PayloadNotificationBuilder(self::$title);
        $notificationBuilder->setBody(self::$body)
                            ->setSound(self::$sound)
                            ->setBadge(self::$badge)
                            ->setClickAction(self::$action);

        // $dataBuilder = new PayloadDataBuilder();
        // $dataBuilder->addData(['a_data' => 'my_data']);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        // $data = $dataBuilder->build();

        // You must change it to get your tokens
        if($tokens == null){
            $tokens = \App\Device::pluck('token')->toArray();
        }

        $downstreamResponse = FCM::sendTo($tokens, $option, $notification, null);

        $downstreamResponse->numberSuccess();
        $downstreamResponse->numberFailure();
        $downstreamResponse->numberModification();
        // return Array - you must remove all this tokens in your database
        $downstreamResponse->tokensToDelete();
        // return Array (key : oldToken, value : new token - you must change the token in your database)
        $downstreamResponse->tokensToModify();
        // return Array - you should try to resend the message to the tokens in the array
        $downstreamResponse->tokensToRetry();
        // return Array (key:token, value:error) - in production you should remove from your database the tokens
        $downstreamResponse->tokensWithError();

        self::FCMDatabaseModifications($downstreamResponse, $tokens);

        if ($downstreamResponse->numberSuccess() > 0)
            return true;
        else
            return false;
    }



    /**
     * Make Modifications After Send The Notifiations.
     * @return arrays
    */
    public static function FCMDatabaseModifications($response, $tokens)
    {
        //  Delete tokens if have..
        // $deletes = $response->tokensToDelete();
        // foreach ($deletes as $key => $value)
        // {
        //     $device = \App\Device::where('token', $value)->first();
        //     $device->delete();
        // }
        //  Save The notificatio DB..
        foreach ($tokens as $token)
        {
            $deviceRow = \App\Device::where('token', $token)->first();
            if ($deviceRow != null)
            {
                $notify['user_id'] = $deviceRow->user_id;
                $notify['title'] = self::$title;
                $notify['body'] = self::$body;
                \App\FCMNotification::create($notify);
            }
        }
    }


}
