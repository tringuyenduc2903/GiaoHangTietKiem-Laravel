<?php

namespace TriNguyenDuc\GiaoHangTietKiem\GiaoHangTietKiem;

use Exception;
use Illuminate\Http\Client\ConnectionException;

trait Address
{
    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function getPickAddresses(
        ?int $partner_code = null,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($partner_code, $api_url, $token)
            ->get('services/shipment/list_pick_add');

        $this->handleFailedResponse($response);

        return $response->json('data');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function getListLevelAddresses(
        array $data,
        ?int $partner_code = null,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($partner_code, $api_url, $token)
            ->get('services/address/getAddressLevel4', $data);

        $this->handleFailedResponse($response);

        return $response->json('data');
    }
}
