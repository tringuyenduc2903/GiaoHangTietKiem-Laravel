<?php

namespace TriNguyenDuc\GiaoHangTietKiem;

use Exception;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use TriNguyenDuc\GiaoHangTietKiem\GiaoHangTietKiem\Address;
use TriNguyenDuc\GiaoHangTietKiem\GiaoHangTietKiem\Order;
use TriNguyenDuc\GiaoHangTietKiem\GiaoHangTietKiem\Warehouse;

class GiaoHangTietKiem
{
    use Address;
    use Order;
    use Warehouse;

    protected function getRequest(
        ?int $partner_code,
        ?string $api_url,
        ?string $token
    ): PendingRequest {
        return Http::baseUrl($api_url ?: config('giaohangtietkiem-laravel.api_url'))
            ->withHeaders([
                'Token' => $token ?: config('giaohangtietkiem-laravel.token'),
                'X-Client-Source' => $partner_code ?: config('giaohangtietkiem-laravel.partner_code'),
            ])
            ->accept('application/json');
    }

    /**
     * @throws Exception
     */
    protected function handleFailedResponse(Response $response): void
    {
        if ($response->json('success')) {
            return;
        }

        Log::debug(
            'GiaoHangTietKiem API Error',
            $response->json()
        );

        throw new Exception($response->json('message'));
    }
}
