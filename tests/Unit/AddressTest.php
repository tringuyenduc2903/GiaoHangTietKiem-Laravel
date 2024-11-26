<?php

use TriNguyenDuc\GiaoHangTietKiem\Facades\GiaoHangTietKiem;

test('getPickAddresses must be array', function () {
    expect(GiaoHangTietKiem::getPickAddresses())->toBeArray()->dump();
});

test('getListLevelAddresses must be array', function () {
    expect(GiaoHangTietKiem::getListLevelAddresses([
        'province' => 'Hà nội',
        'district' => 'Quận Ba Đình',
        'ward_street' => 'Đội Cấn',
    ]))->toBeArray()->dump();
});
