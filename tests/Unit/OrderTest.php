<?php

use Carbon\Carbon;
use Random\RandomException;
use TriNguyenDuc\GiaoHangTietKiem\Enums\SubTags;
use TriNguyenDuc\GiaoHangTietKiem\Enums\Tags;
use TriNguyenDuc\GiaoHangTietKiem\Facades\GiaoHangTietKiem;

test(
    'submitOrder must be array',
    /**
     * @throws RandomException
     */
    function (int $tag) {
        $is_freeship = fake()->boolean;

        $data = [
            'products' => $tag === Tags::SMALL_GOODS
                ? [[
                    'name' => 'small product 1',
                    'weight' => random_int(1, 9) / 100,
                    'quantity' => random_int(1, 9),
                    'product_code' => 1,
                ], [
                    'name' => 'small product 2',
                    'weight' => random_int(1, 9) / 100,
                    'quantity' => random_int(1, 9),
                    'product_code' => 2,
                ]]
                : [[
                    'name' => 'normal product 1',
                    'weight' => random_int(1, 9) / 10,
                    'quantity' => random_int(1, 9),
                    'product_code' => 3,
                ], [
                    'name' => 'normal product 2',
                    'weight' => random_int(1, 9) / 10,
                    'quantity' => random_int(1, 9),
                    'product_code' => 4,
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
                'is_freeship' => $is_freeship,
                'pick_money' => $is_freeship ? 0 : random_int(11, 19999) * 1000,
                'pick_date' => Carbon::now()->addDay()->format('Y-m-d'),
                'value' => random_int(11, 19999) * 1000,
                'transport' => 'fly',
                'tags' => [$tag],
            ],
        ];

        if ($tag === Tags::PLANT_GOODS) {
            $data['order']['sub_tags'] = fake()->randomElements(SubTags::keys());
        }

        if ($tag === Tags::FEE) {
            $data['order']['not_delivered_fee'] = random_int(11, 19999) * 1000;
        }

        expect(GiaoHangTietKiem::submitOrder($data))->toBeArray()->dump();
    }
)->with(Tags::keys());

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
            'value' => random_int(11, 19999) * 1000,
            'transport' => 'fly',
            'deliver_option' => 'xteam',
            'tags' => [Tags::FRAGILE, Tags::AGRICULTURAL_PRODUCTS],
        ]))->toBeArray()->dump();
    }
);

test('getOrderStatus must be array', function (int|string $tracking_order) {
    expect(GiaoHangTietKiem::getOrderStatus($tracking_order))->toBeArray()->dump();
})->with('tracking order');

test('printLabel must be string', function (int|string $tracking_order) {
    expect(GiaoHangTietKiem::printLabel($tracking_order))->toBeString()->dump();
})->with('tracking order');

test('orderCancellation must be string', function (int|string $tracking_order) {
    expect(GiaoHangTietKiem::orderCancellation($tracking_order))->toBeString()->dump();
})->with('tracking order');
