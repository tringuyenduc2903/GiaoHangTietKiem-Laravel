<?php

use TriNguyenDuc\GiaoHangTietKiem\Facades\GiaoHangTietKiem;

test('createAccount must be array', function () {
    expect(GiaoHangTietKiem::createAccount([
        'name' => 'shop test',
        'first_address' => 'ngõ 2, Phan Bá Vành, Cầu Diễn',
        'province' => 'Hà Nội',
        'district' => 'Bắc Từ Liêm',
        'tel' => '01234555666',
        'email' => 'shoptest@email.com',
    ]))->toBeArray()->dump();
});

test('registeredAccount must be array', function () {
    expect(GiaoHangTietKiem::registeredAccount([
        'email' => 'shoptest@email.com',
        'password' => '1S@fF#K2',
    ]))->toBeArray()->dump();
});
