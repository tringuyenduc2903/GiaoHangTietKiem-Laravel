<?php

namespace TriNguyenDuc\GiaoHangTietKiem\GiaoHangTietKiem;

use Exception;
use Illuminate\Http\Client\ConnectionException;

trait Warehouse
{
    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function toRetrieveProductList(
        string $term,
        ?int $partner_code = null,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($partner_code, $api_url, $token)
            ->get('services/kho-hang/thong-tin-san-pham', [
                'term' => $term,
            ]);

        $this->handleFailedResponse($response);

        return $response->json('data');
    }
}
