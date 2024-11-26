<?php

use Carbon\Carbon;
use Random\RandomException;
use TriNguyenDuc\GiaoHangTietKiem\Facades\GiaoHangTietKiem;

test(
    'submitOrder must be array',
    /**
     * @throws RandomException
     */
    function () {
        expect(GiaoHangTietKiem::submitOrder([
            'products' => [[
                'name' => vnfaker()->fullName(),
                'weight' => random_int(1, 9) / 10,
                'quantity' => random_int(1, 9),
                'product_code' => random_int(1, 100),
            ], [
                'name' => vnfaker()->fullName(),
                'weight' => random_int(1, 9) / 10,
                'quantity' => random_int(1, 9),
                'product_code' => random_int(1, 100),
            ]],
            'order' => [
                'id' => Str::uuid(),
                'pick_name' => fake()->address(),
                'pick_address' => fake()->streetAddress(),
                'pick_province' => 'TP. Hồ Chí Minh',
                'pick_district' => 'Quận 3',
                'pick_ward' => 'Phường 1',
                'pick_tel' => vnfaker()->mobilePhone(),
                'tel' => vnfaker()->mobilePhone(),
                'name' => vnfaker()->fullName(),
                'address' => fake()->address,
                'province' => 'TP. Hồ Chí Minh',
                'district' => 'Quận 1',
                'ward' => 'Phường Bến Nghé',
                'hamlet' => 'Khác',
                'is_freeship' => fake()->boolean,
                'pick_date' => Carbon::now()->addDay()->format('Y-m-d'),
                'pick_money' => random_int(1, 99) * 1000,
                'note' => 'Khối lượng tính cước tối đa=> 1.00 kg',
                'value' => random_int(1, 99) * 1000,
                'transport' => 'fly',
            ],
        ]))->toBeArray()->dump();
    }
);

test(
    'calculateShippingFee must be array',
    /**
     * @throws RandomException
     */
    function () {
        expect(GiaoHangTietKiem::calculateShippingFee([
            'pick_province' => 'Hà Nội',
            'pick_district' => 'Quận Hai Bà Trưng',
            'province' => 'Hà nội',
            'district' => 'Quận Cầu Giấy',
            'address' => fake()->streetAddress(),
            'weight' => random_int(1, 9) * 1000,
            'value' => random_int(1, 99) * 1000,
            'transport' => 'fly',
            'deliver_option' => 'xteam',
            'tags' => [1, 7],
        ]))->toBeArray()->dump();
    }
);

test('getOrderStatus must be array', function (int $tracking_order) {
    expect(GiaoHangTietKiem::getOrderStatus($tracking_order))->toBeArray()->dump();
})->with('tracking order');

test('printLabel must be string', function (int $tracking_order) {
    expect(GiaoHangTietKiem::printLabel($tracking_order))->toBeString()->dump();
})->with('tracking order');

test('orderCancellation must be string', function (int $tracking_order) {
    expect(GiaoHangTietKiem::orderCancellation($tracking_order))->toBeString()->dump();
})->with('tracking order');
