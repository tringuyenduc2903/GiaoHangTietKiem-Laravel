<?php

namespace TriNguyenDuc\GiaoHangTietKiem\GiaoHangTietKiem;

use Exception;
use Illuminate\Http\Client\ConnectionException;

trait B2c
{
    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function createAccount(
        array $data,
        ?int $partner_code = null,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($partner_code, $api_url, $token)
            ->post('services/shops/add', $data);

        $this->handleFailedResponse($response);

        return $response->json('data');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function registeredAccount(
        array $data,
        ?int $partner_code = null,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($partner_code, $api_url, $token)
            ->post('services/shops/token', $data);

        $this->handleFailedResponse($response);

        return $response->json('data');
    }
}
