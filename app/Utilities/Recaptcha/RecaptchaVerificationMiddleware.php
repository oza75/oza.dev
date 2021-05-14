<?php

namespace App\Utilities\Recaptcha;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RecaptchaVerificationMiddleware
{
    protected $fieldName = 'recaptcha_token';

    protected $urls = [
        'post' => [
            '/contacts',
            '/meeting',
        ]
    ];

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     * @throws ValidationException
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$this->shouldVerify($request)) {
            return $next($request);
        }

        if (!$request->has($this->fieldName)) {
            $this->unauthorized($request, "La vérification recaptcha a échoué !");
        }

        if (!$this->passes($request)) {
            $this->unauthorized($request, "La vérification recaptcha a échoué !");
        }


        return $next($request);
    }

    /**
     * @param Request $request
     * @return bool
     */
    protected function shouldVerify(Request $request): bool
    {
        if (app()->runningInConsole()) {
            return false;
        }

        if (!in_array($request->method(), ['POST', 'GET'])) {
            return false;
        }

        $urls = $this->urls[strtolower($request->method())] ?? [];
        foreach ($urls as $url) {
            $pattern = preg_quote($url, '/');
            if (preg_match("/^{$pattern}/", $request->getRequestUri())) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param Request $request
     * @param string $message
     * @throws ValidationException
     */
    private function unauthorized(Request $request, string $message)
    {
        throw ValidationException::withMessages([
            'recaptcha' => $message
        ]);
    }

    /**
     * @param Request $request
     * @return bool
     */
    private function passes(Request $request): bool
    {
        $response = Http::post("https://www.google.com/recaptcha/api/siteverify?" . http_build_query([
                'secret' => config('services.recaptcha.private_key'),
                'response' => $request->get($this->fieldName)
            ]));

        if (!$response->ok()) {
            report(RecaptchaVerificationFailed::nonOkStatus($response));
            return false;
        }

        $status = $response->json()['success'] ?? false;

        if (!$status) {
            report(RecaptchaVerificationFailed::failed($request, $response->json('errors')));
            return false;
        }

        return true;
    }
}
