<?php

use TriNguyenDuc\GiaoHangTietKiem\Facades\GiaoHangTietKiem;

test('1 must be array', function () {
    expect(GiaoHangTietKiem::submitOrder([
        'products' => [[
            'name' => 'bút',
            'weight' => 0.1,
            'quantity' => 1,
            'product_code' => 1,
        ], [
            'name' => 'tẩy',
            'weight' => 0.2,
            'quantity' => 1,
            'product_code' => 2,
        ]],
        'order' => [
            'id' => '1',
            'pick_name' => 'HCM-nội thành',
            'pick_address' => '590 CMT8 P.11',
            'pick_province' => 'TP. Hồ Chí Minh',
            'pick_district' => 'Quận 3',
            'pick_ward' => 'Phường 1',
            'pick_tel' => '0982213854',
            'tel' => '0987654321',
            'name' => 'GHTK - HCM - Noi Thanh',
            'address' => '123 nguyễn chí thanh',
            'province' => 'TP. Hồ Chí Minh',
            'district' => 'Quận 1',
            'ward' => 'Phường Bến Nghé',
            'hamlet' => 'Khác',
            'is_freeship' => '1',
            'pick_date' => '2016-09-30',
            'pick_money' => 47000,
            'note' => 'Khối lượng tính cước tối đa=> 1.00 kg',
            'value' => 3000000,
            'transport' => 'fly',
        ],
    ]))->toBeArray()->dump();
});

test('2 must be array', function () {
    expect(GiaoHangTietKiem::calculateShippingFee([
        'pick_province' => 'Hà Nội',
        'pick_district' => 'Quận Hai Bà Trưng',
        'province' => 'Hà nội',
        'district' => 'Quận Cầu Giấy',
        'address' => 'P.503 tòa nhà Auu Việt, số 1 Lê Đức Thọ',
        'weight' => 1000,
        'value' => 3000000,
        'transport' => 'fly',
        'deliver_option' => 'xteam',
        'tags' => [1, 7],
    ]))->toBeArray()->dump();
});

test('3 must be array', function () {
    expect(GiaoHangTietKiem::getOrderStatus('1375835526'))->toBeArray()->dump();
});

test('4 must be string', function () {
    expect(GiaoHangTietKiem::printLabel('1375835526'))->toBeString()->dump();
});

test('5 must be string', function () {
    expect(GiaoHangTietKiem::orderCancellation('1822654513'))->toBeString()->dump();
});
