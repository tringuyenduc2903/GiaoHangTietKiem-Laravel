<?php

namespace TriNguyenDuc\GiaoHangTietKiem\GiaoHangTietKiem;

trait Utility
{
    public function getTrackingUrl(
        string $order_code,
        ?string $tracking_url = null
    ): string {
        if (is_null($tracking_url)) {
            $tracking_url = config('giaohangtietkiem-laravel.tracking_url');
        }

        return "$tracking_url/$order_code";
    }
}
