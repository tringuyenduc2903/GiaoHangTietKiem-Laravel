<?php

use TriNguyenDuc\GiaoHangTietKiem\Facades\GiaoHangTietKiem;

test('getTrackingUrl must be string', function (int|string $tracking_order) {
    expect(GiaoHangTietKiem::getTrackingUrl($tracking_order))->toBeString()->dump();
})->with('tracking order');
