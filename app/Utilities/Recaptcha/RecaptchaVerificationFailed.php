<?php


namespace App\Utilities\Recaptcha;


use Exception;
use Illuminate\Http\Request;

class RecaptchaVerificationFailed extends Exception
{
    public static function nonOkStatus($response): RecaptchaVerificationFailed
    {
        return new static("Error while sending recaptcha token :" . json_encode($response));
    }

    public static function failed(Request $request, $errors): RecaptchaVerificationFailed
    {
        $data = ['user' => auth()->id(), 'ip' => $request->ip(), 'errors' => $errors];

        return new static("Recaptcha verification failed : " . json_encode($data));
    }
}
