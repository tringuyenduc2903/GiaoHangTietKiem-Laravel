<?php

use TriNguyenDuc\GiaoHangTietKiem\Facades\GiaoHangTietKiem;

test('toRetrieveProductList must be array', function () {
    expect(GiaoHangTietKiem::toRetrieveProductList('laptop'))->toBeArray()->dump();
});
