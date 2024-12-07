<?php

namespace TriNguyenDuc\GiaoHangTietKiem\Enums;

use Rexlabs\Enum\Enum;

/**
 * The Tags enum.
 *
 * @method static self FRAGILE()
 * @method static self HIGH_VALUE_ITEMS()
 * @method static self AGRICULTURAL_PRODUCTS()
 * @method static self ALLOWED_TO_INSPECT_THE_PRODUCT()
 * @method static self CROSSCHECK()
 * @method static self CALL_THE_SHOP()
 * @method static self CUSTOMER_SELECTS_PRODUCTS()
 * @method static self PRODUCT_RETURN()
 * @method static self FEE()
 * @method static self WHOLE_BOX()
 * @method static self MAIL_AND_DOCUMENT()
 * @method static self FRESH_FOOD()
 * @method static self SMALL_GOODS()
 * @method static self ITEMS_REQUIRING_PROPER_ORIENTATION()
 * @method static self LIQUID_GOODS()
 * @method static self PLANT_GOODS()
 */
class Tags extends Enum
{
    /**
     * Fragile
     * ---------------
     * The items made of fragile materials are prone to damage and breakage during transportation.
     * If any damage occurs, GHTK will take full responsibility for orders marked as Fragile.
     * Cost 1,000 VND per order.
     */
    const FRAGILE = 1;

    /**
     * High-value items
     * ---------------
     * Items valued at > 3,000,000 VND (for Pro Shop) and > 1,000,000 VND (for Standard Shop) will have an additional
     * insurance fee, which is the insurance amount for risks during transportation or storage.
     * The insurance fee is equal to 0.5% of the value of the goods.
     * GHTK will reimburse 100% of the value when lost (maximum of 20,000,000 VND) if there is documentation proving the
     * origin and value of the goods (import invoices, valid purchase invoices matching the product information on the
     * GHTK system, etc.).
     * If the shop cannot prove the origin and value of the goods, compensation will be a maximum of 04 times the
     * shipping fee
     */
    const HIGH_VALUE_ITEMS = 2;

    /**
     * Agricultural Products
     * ---------------
     * For agricultural products with a short shelf life (< 30 days), the scheduled delivery time will not exceed 7 days
     * from the successful pickup.
     * Beyond this deadline, the order will not be automatically stored, and GHTK will return the items to shop.
     */
    const AGRICULTURAL_PRODUCTS = 7;

    /**
     * Allowed to inspect the product
     * ---------------
     * Customers are allowed to inspect the product before accepting delivery.
     */
    const ALLOWED_TO_INSPECT_THE_PRODUCT = 10;

    /**
     * Crosscheck
     * ---------------
     * Customers are allowed to count the quantity or check the condition of each item (excluding breaking seals on the
     * products).
     * Cost 2,000 VND per order.
     */
    const CROSSCHECK = 11;

    /**
     * Call the shop when the customer does not receive the goods, cannot be contacted, or the information is incorrect
     * ---------------
     * GHTK staff will contact the shop in case of issues such as incorrect information, inability to contact the
     * customer, or the customer refuses to receive the goods.
     */
    const CALL_THE_SHOP = 13;

    /**
     * Partial Delivery - Customer Selects Products
     * ---------------
     * Customers are allowed to only accept and pay for a partial of the order.
     * The remaining will be returned to shop with an intra-province fee of 5,000 VND per order and an inter-province
     * fee equal to 50% of the shipping fee.
     */
    const CUSTOMER_SELECTS_PRODUCTS = 17;

    /**
     * Partial Delivery - Product Return
     * ---------------
     * Assistance in delivering one item to the customer and returning the remaining portion to the shop.
     * The returned portion is treated as a return order with an intra-province fee of 5,000 VND per order and an
     * inter-province fee equal to 50% of the shipping fee.
     */
    const PRODUCT_RETURN = 18;

    /**
     * Fee for unsuccessful delivery attempt
     * ---------------
     * Supporting customers who do not accept the product but collecting a partial fee for the shop.
     * The fee to be collected defaults to the shipping fee, but the shop can adjust the amount they wish to collect.
     * The returned portion for the shop is treated as a return order with an intra-province fee of 5,000 VND per order
     * and an inter-province fee equal to 50% of the shipping fee.
     * Note: Partners need to include an additional field "not_delivered_fee" with a value
     * ```0 < not_delivered_fee <= 20,000,000 VND```.
     */
    const FEE = 19;

    /**
     * Whole box
     * ---------------
     * Items packed in the manufacturer's box, requiring intact preservation during transportation.
     * Cost 1,000 VND per order.
     */
    const WHOLE_BOX = 20;

    /**
     * Mail and documents
     * ---------------
     * Documents and files are carefully packaged to prevent damage to the products.
     */
    const MAIL_AND_DOCUMENT = 22;

    /**
     * Fresh food
     * --------------
     * For fresh and frozen food items with a same-day expiration date, if delivery to the customer is unsuccessful,
     * GHTK will refund the order on the same day.
     */
    const FRESH_FOOD = 39;

    /**
     * Small goods
     * --------------
     * Items with a weight of ≤ 300 grams.Small orders need to be packaged minimally in envelopes with dimensions of at
     * least 110x120mm.
     */
    const SMALL_GOODS = 40;

    /**
     * Items requiring proper orientation
     * --------------
     * Goods must be arranged according to the correct orientation/direction of the product during transportation;
     * otherwise, it will affect the safety and quality of the goods.
     */
    const ITEMS_REQUIRING_PROPER_ORIENTATION = 42;

    /**
     * Liquid goods
     * --------------
     * Liquid goods are items with physical characteristics in liquid, adhesive, or viscous form.
     * Liquid goods need to be contained in specialized bottles or sealed bags.
     */
    const LIQUID_GOODS = 52;

    /**
     * Plant goods
     * --------------
     * Orders tagged with ‘plants will be transported by GHTK through a separate shipping channel to ensure extended
     * storage time and minimize external impact
     */
    const PLANT_GOODS = 75;
}
