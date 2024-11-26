<?php

namespace TriNguyenDuc\GiaoHangTietKiem\GiaoHangTietKiem;

use Exception;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

trait Order
{
    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function submitOrder(
        array $data,
        ?int $partner_code = null,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($partner_code, $api_url, $token)
            ->post('services/shipment/order', $data);

        $this->handleFailedResponse($response);

        return $response->json('order');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function calculateShippingFee(
        array $data,
        ?int $partner_code = null,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($partner_code, $api_url, $token)
            ->withQueryParameters($data)
            ->get('services/shipment/fee');

        $this->handleFailedResponse($response);

        return $response->json('fee');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function getOrderStatus(
        int $tracking_order,
        ?int $partner_code = null,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($partner_code, $api_url, $token)
            ->get("services/shipment/v2/$tracking_order");

        $this->handleFailedResponse($response);

        return $response->json('order');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function printLabel(
        int $tracking_order,
        ?array $data = null,
        ?int $partner_code = null,
        ?string $api_url = null,
        ?string $token = null
    ): string {
        $response = Http::baseUrl($api_url ?: config('giaohangtietkiem-laravel.api_url'))
            ->withHeaders([
                'Token' => $token ?: config('giaohangtietkiem-laravel.token'),
                'X-Client-Source' => $partner_code ?: config('giaohangtietkiem-laravel.partner_code'),
            ])
            ->withQueryParameters($data ?: [])
            ->get("services/label/$tracking_order");

        if ($response->failed()) {
            Log::debug(
                'GiaoHangTietKiem API Error',
                $response->json()
            );

            throw new Exception($response->json('message'));
        }

        return $response->body();
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function orderCancellation(
        int $tracking_order,
        ?int $partner_code = null,
        ?string $api_url = null,
        ?string $token = null
    ): string {
        $response = $this
            ->getRequest($partner_code, $api_url, $token)
            ->post("services/shipment/cancel/$tracking_order");

        $this->handleFailedResponse($response);

        return $response->json('message');
    }
}
