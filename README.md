# GiaoHangTietKiem (GHTK) SDK for Laravel Framework

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tringuyenduc2903/giaohangtietkiem-laravel.svg?style=flat-square)](https://packagist.org/packages/tringuyenduc2903/giaohangtietkiem-laravel)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/tringuyenduc2903/giaohangtietkiem-laravel/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/tringuyenduc2903/giaohangtietkiem-laravel/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/tringuyenduc2903/giaohangtietkiem-laravel.svg?style=flat-square)](https://packagist.org/packages/tringuyenduc2903/giaohangtietkiem-laravel)

## Installation

You can install the package via composer:

```bash
composer require tringuyenduc2903/giaohangtietkiem-laravel
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="giaohangtietkiem-laravel-config"
```

This is the contents of the published config file:

```php
return [
    // For Dev:  https://services-staging.ghtklab.com
    // For Prod: https://services.giaohangtietkiem.vn
    'api_url' => env('GHTK_API_URL', 'https://services.giaohangtietkiem.vn'),

    // For Dev:
    // For Prod: https://i.ghtk.vn
    'tracking_url' => env('GHTK_TRACKING_URL', 'https://i.ghtk.vn/'),

    // For Dev:  https://khachhang-staging.ghtklab.com
    // For Prod: https://khachhang.giaohangtietkiem.vn
    'token' => env('GHTK_TOKEN'),
    'partner_code' => env('GHTK_PARTNER_CODE'),
];
```

## Usage

### #1 [Submit order](https://docs.giaohangtietkiem.vn/en/docs/submit-order/submit-order-express)

**This API is to submit an order to GHTK system.**

**Syntax**

```php
\GiaoHangTietKiem::submitOrder([
    'order' => [
        'id' => $id,
        // Order picking information
        'pick_name' => $pick_name,
        'pick_money' => $pick_money,
        'pick_address_id' => $pick_address_id,
        'pick_address' => $pick_address,
        'pick_province' => $pick_province,
        'pick_district' => $pick_district,
        'pick_ward' => $pick_ward,
        'pick_street' => $pick_street,
        'pick_tel' => $pick_tel,
        'pick_email' => $pick_email,
        // Order delivery information
        'name' => $name,
        'address' => $address,
        'province' => $province,
        'district' => $district,
        'ward' => $ward,
        'street' => $street,
        'tel' => $tel,
        'email' => $email,
        'note' => $note,
        // Order return information
        'use_return_address' => $use_return_address,
        'return_name' => $return_name,
        'return_address' => $return_address,
        'return_province' => $return_province,
        'return_district' => $return_district,
        'return_ward' => $return_ward,
        'return_street' => $return_street,
        'return_tel' => $return_tel,
        'return_email' => $return_email,
        // Other information
        'weight_option' => $weight_option,
        'total_weight' => $total_weight,
        'pick_work_shift' => $pick_work_shift,
        'deliver_work_shift' => $deliver_work_shift,
        'label_id' => $label_id,
        'pick_date' => $pick_date,
        'deliver_date' => $deliver_date,
        'expired' => $expired,
        'value' => $value,
        'opm' => $opm,
        'pick_option' => $pick_option,
        'actual_transfer_method' => $actual_transfer_method,
        'transport' => $transport,
        'deliver_option' => $deliver_option,
        'booking_id' => $booking_id,
        'tags' => $tags,
        'pending_order' => $pending_order,
        'total_box' => $total_box,
        'height' => $height,
        'length' => $length,
        'width' => $width,
        'sub_tags' => $sub_tags,
    ],
    'products' => [[
        'name' => $name,
        'price' => $price,
        'quantity' => $quantity,
        'weight' => $weight,
        'height' => $height,
        'length' => $length,
        'width' => $width,
        'product_code' => $product_code,
    ]],
]);
```

**Example**

```php
\GiaoHangTietKiem::submitOrder([
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
];
```

**Result**

```php
array:17 [
  "partner_id" => "1"
  "label" => "S22749126.SGP39-J31.1375835526"
  "area" => 1
  "fee" => 37000
  "insurance_fee" => 15000
  "estimated_pick_time" => "Sáng 2024-11-26"
  "estimated_deliver_time" => "Chiều 2024-11-27"
  "products" => []
  "status_id" => 2
  "tracking_id" => 1375835526
  "sorting_code" => "SGP39-J31"
  "date_to_delay_pick" => "2024-11-26 00:00:00"
  "pick_work_shift" => 1
  "date_to_delay_deliver" => "2024-11-27 00:00:00"
  "deliver_work_shift" => 2
  "pkg_draft_id" => 0
  "is_xfast" => 0
]
```

### #2 [Calculate shipping fee](https://docs.giaohangtietkiem.vn/en/docs/submit-order/calculate-shipping-fee)

**This API provides the shipping fee based on given pickup & delivery address and the package weight.**

**Syntax**

```php
\GiaoHangTietKiem::calculateShippingFee([
    'pick_address_id' => $pick_address_id,
    'pick_address' => $pick_address,
    'pick_province' => $pick_province,
    'pick_district' => $pick_district,
    'pick_ward' => $pick_ward,
    'pick_street' => $pick_street,
    'address' => $address,
    'province' => $province,
    'district' => $district,
    'ward' => $ward,
    'street' => $street,
    'weight' => $weight,
    'value' => $value,
    'transport' => $transport,
    'deliver_option' => $deliver_option,
    'tags' => $tags,
]);
```

**Example**

```php
\GiaoHangTietKiem::calculateShippingFee([
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
]);
```

**Result**

```php
array:14 [
  "name" => "area1"
  "fee" => 78500
  "insurance_fee" => 15000
  "include_vat" => 0
  "cost_id" => 0
  "delivery_type" => ""
  "a" => 1
  "dt" => "local"
  "extFees" => array:2 [
    0 => array:5 [
      "display" => "(+1.000 đ)"
      "title" => "Phụ phí đơn hàng dễ vỡ"
      "amount" => 1000
      "type" => "fragile"
      "tag_id" => 1
    ]
    1 => array:5 [
      "display" => "(+2.000 đ)"
      "title" => "Phụ phí hàng nông sản/thực phẩm khô"
      "amount" => 2000
      "type" => "food"
      "tag_id" => 7
    ]
  ]
  "promotion_key" => ""
  "delivery" => true
  "ship_fee_only" => 60500
  "distance" => 11.262
  "options" => array:15 [
    "name" => ""
    "title" => ""
    "shipMoney" => 60500
    "shipMoneyText" => "60.500 đ"
    "vatText" => ""
    "desc" => ""
    "coupon" => ""
    "maxUses" => 0
    "maxDates" => 0
    "maxDateString" => ""
    "content" => ""
    "activatedDate" => ""
    "couponTitle" => ""
    "discount" => ""
    "couponId" => 0
  ]
]
```

### #3 [Get order status](https://docs.giaohangtietkiem.vn/en/docs/submit-order/tracking-status)

**This API provides the current status of the order.**

**Syntax**

```php
\GiaoHangTietKiem::getOrderStatus($tracking_order);
```

**Example**

```php
\GiaoHangTietKiem::getOrderStatus('1375835526');
```

**Result**

```php
array:21 [
  "label_id" => "S22749126.SGP39-J31.1375835526"
  "partner_id" => "1"
  "order_id" => null
  "status" => 2
  "status_text" => "Đã tiếp nhận"
  "created" => "2024-11-25 22:03:34"
  "modified" => "2024-11-25 22:03:35"
  "message" => "Khối lượng tính cước tối đa=> 1.00 kg"
  "pick_date" => "2024-11-26"
  "deliver_date" => "2024-11-27"
  "customer_fullname" => "GHTK - HCM - Noi Thanh"
  "customer_tel" => "0987654321"
  "address" => "123 nguyễn chí thanh Phường Bến Nghé, Quận 1, TP Hồ Chí Minh"
  "storage_day" => 0
  "ship_money" => 37000
  "insurance" => 15000
  "value" => 3000000
  "weight" => 400
  "pick_money" => 47000
  "is_freeship" => 1
  "products" => array:2 [
    0 => array:5 [
      "full_name" => "tẩy"
      "product_code" => "236320441"
      "weight" => 0.2
      "quantity" => 1
      "cost" => 0
    ]
    1 => array:5 [
      "full_name" => "bút"
      "product_code" => "236320440"
      "weight" => 0.1
      "quantity" => 1
      "cost" => 0
    ]
  ]
]
```

### #4 [Print label](https://docs.giaohangtietkiem.vn/en/docs/submit-order/print-label)

**This API provides printing label for the package order in PDF format.**

**Syntax**

```php
\GiaoHangTietKiem::printLabel($tracking_order, [
    'ORIGINAL' => $original,
    'PAPER_SIZE' => $paper_size,
]);
```

**Example**

```php
\GiaoHangTietKiem::printLabel('1375835526');
```

**Result**

- Sample for A5 landscape

![Sample for A5 landscape](https://docs.giaohangtietkiem.vn/img/docs/a5_landscape.png)

- Sample for A5 portrait

![Sample for A5 portrait](https://docs.giaohangtietkiem.vn/img/docs/a5_portrait.png)

### #5 [Order cancellation](https://docs.giaohangtietkiem.vn/en/docs/submit-order/api-cancel-order)

**API for canceling an order already pushed to GHTK system.**

**Syntax**

```php
\GiaoHangTietKiem::orderCancellation($tracking_order);
```

**Example**

```php
\GiaoHangTietKiem::orderCancellation('1822654513');
```

**Result**

```php
"ĐÃ GỬI YÊU CẦU HỦY ĐƠN HÀNG S22749126.SGP39-J31.1822654513"
```

### #6 [Get pick addresses](https://docs.giaohangtietkiem.vn/en/docs/submit-order/api-get-pick-addresses)

**The API returns a list of pickup addresses that have been configured in the system through GHTK's Customer Platform.**

**Syntax**

```php
\GiaoHangTietKiem::getPickAddresses();
```

**Result**

```php
array:1 [
  0 => array:4 [
    "pick_address_id" => "18227226"
    "address" => "Số 8, Xã Đông Mỹ, Thanh Trì, Hà Nội"
    "pick_tel" => "0982213854"
    "pick_name" => "Nguyễn Đức Trí"
  ]
]
```

### #7 [To get the list of level 4 addresses](https://docs.giaohangtietkiem.vn/en/docs/submit-order/api-get-specific-addresses)

**API to get the list of level 4 addresses (hamlets/villages/subdivisions) within a street/ward/commune. For some
addresses, this information is mandatory and must be included in the order submission API.**

**Syntax**

```php
\GiaoHangTietKiem::getListLevelAddresses([
    'address' => $address,
    'province' => $province,
    'district' => $district,
    'ward_street' => $ward_street,
]);
```

**Example**

```php
\GiaoHangTietKiem::getListLevelAddresses([
    'province' => 'Hà nội',
    'district' => 'Quận Ba Đình',
    'ward_street' => 'Đội Cấn',
]);
```

**Result**

```php
array:6 [
  0 => "Vinapaco Building"
  1 => "IIG"
  2 => "126 Đội Cấn"
  3 => "Trường THCS Thống Nhất"
  4 => "Đường Đội Cấn"
  5 => "Khác"
]
```

### #8 [To retrieve the product list](https://docs.giaohangtietkiem.vn/en/docs/submit-order/api-get-product)

**The API returns a list of products (and their corresponding IDs) that match the search query.**
**The product ID will need to be included in the order submission API for certain specific workflows.**

**Syntax**

```php
\GiaoHangTietKiem::toRetrieveProductList($term);
```

**Example**

```php
\GiaoHangTietKiem::toRetrieveProductList('laptop');
```

**Result**

```php
array:3 [
  0 => array:4 [
    "product_code" => "237233673"
    "full_name" => "laptop asus"
    "cost" => 0
    "weight" => 0
  ]
  ...
]
```

### #9 [Create account](https://docs.giaohangtietkiem.vn/en/docs/submit-order/api-b2c-create-account)

**Syntax**

```php
\GiaoHangTietKiem::createAccount([
    'name' => $name,
    'first_address' => $first_address,
    'province' => $province,
    'district' => $district,
    'tel' => $tel,
    'email' => $email,
]);
```

**Example**

```php
\GiaoHangTietKiem::createAccount([
    'name' => 'shop test',
    'first_address' => 'ngõ 2, Phan Bá Vành, Cầu Diễn',
    'province' => 'Hà Nội',
    'district' => 'Bắc Từ Liêm',
    'tel' => '01234555666',
    'email' => 'shoptest@email.com',
]);
```

**Result**

```php
Exception: Tài khoản của bạn không có quyền tạo tài khoản mới trên GHTK
```

### #10 [Registered account](https://docs.giaohangtietkiem.vn/en/docs/submit-order/api-b2c-account-created-before)

**Syntax**

```php
\GiaoHangTietKiem::registeredAccount([
    'email' => $email,
    'password' => $password,
]);
```

**Example**

```php
\GiaoHangTietKiem::registeredAccount([
    'email' => 'shoptest@email.com',
    'password' => '1S@fF#K2',
]);
```

**Result**

```php
Exception: Tài khoản của bạn không có quyền sử dụng API này
```

### #11 Get Tracking Url

**Syntax**

```php
\GiaoHangTietKiem::getTrackingUrl($tracking_order);
```

**Example**

```php
\GiaoHangTietKiem::getTrackingUrl('1375835526');
```

**Result**

```php
"https://i.ghtk.vn//1375835526"
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](https://github.com/tringuyenduc2903/GiaoHangTietKiem-Laravel/security/policy) on how
to report security vulnerabilities.

## Credits

- [Nguyễn Đức Trí](https://github.com/tringuyenduc2903)
- [All Contributors](https://github.com/tringuyenduc2903/GiaoHangTietKiem-Laravel/contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
