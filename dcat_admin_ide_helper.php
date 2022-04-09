<?php

/**
 * A helper file for Dcat Admin, to provide autocomplete information to your IDE
 *
 * This file should not be included in your code, only analyzed by your IDE!
 *
 * @author jqh <841324345@qq.com>
 */
namespace Dcat\Admin {
    use Illuminate\Support\Collection;

    /**
     * @property Grid\Column|Collection order
     * @property Grid\Column|Collection name
     * @property Grid\Column|Collection value
     * @property Grid\Column|Collection notes
     * @property Grid\Column|Collection id
     * @property Grid\Column|Collection type
     * @property Grid\Column|Collection version
     * @property Grid\Column|Collection detail
     * @property Grid\Column|Collection created_at
     * @property Grid\Column|Collection updated_at
     * @property Grid\Column|Collection is_enabled
     * @property Grid\Column|Collection parent_id
     * @property Grid\Column|Collection icon
     * @property Grid\Column|Collection uri
     * @property Grid\Column|Collection extension
     * @property Grid\Column|Collection user_id
     * @property Grid\Column|Collection path
     * @property Grid\Column|Collection method
     * @property Grid\Column|Collection ip
     * @property Grid\Column|Collection input
     * @property Grid\Column|Collection permission_id
     * @property Grid\Column|Collection menu_id
     * @property Grid\Column|Collection slug
     * @property Grid\Column|Collection http_method
     * @property Grid\Column|Collection http_path
     * @property Grid\Column|Collection role_id
     * @property Grid\Column|Collection username
     * @property Grid\Column|Collection password
     * @property Grid\Column|Collection avatar
     * @property Grid\Column|Collection remember_token
     * @property Grid\Column|Collection coupon_id
     * @property Grid\Column|Collection coupon_name
     * @property Grid\Column|Collection order_id
     * @property Grid\Column|Collection order_number
     * @property Grid\Column|Collection product_name
     * @property Grid\Column|Collection amount
     * @property Grid\Column|Collection discount
     * @property Grid\Column|Collection start
     * @property Grid\Column|Collection end
     * @property Grid\Column|Collection status
     * @property Grid\Column|Collection use_date
     * @property Grid\Column|Collection uuid
     * @property Grid\Column|Collection connection
     * @property Grid\Column|Collection queue
     * @property Grid\Column|Collection payload
     * @property Grid\Column|Collection exception
     * @property Grid\Column|Collection failed_at
     * @property Grid\Column|Collection product_id
     * @property Grid\Column|Collection qty
     * @property Grid\Column|Collection vendor_id
     * @property Grid\Column|Collection vendor_name
     * @property Grid\Column|Collection bank_name
     * @property Grid\Column|Collection bank_code
     * @property Grid\Column|Collection bank_account
     * @property Grid\Column|Collection deliver_type
     * @property Grid\Column|Collection deliver_date
     * @property Grid\Column|Collection receiver
     * @property Grid\Column|Collection email
     * @property Grid\Column|Collection token
     * @property Grid\Column|Collection tokenable_type
     * @property Grid\Column|Collection tokenable_id
     * @property Grid\Column|Collection abilities
     * @property Grid\Column|Collection last_used_at
     * @property Grid\Column|Collection category_id
     * @property Grid\Column|Collection category_name
     * @property Grid\Column|Collection spec
     * @property Grid\Column|Collection price
     * @property Grid\Column|Collection images
     * @property Grid\Column|Collection code
     * @property Grid\Column|Collection auth
     * @property Grid\Column|Collection auth_id
     * @property Grid\Column|Collection gender
     * @property Grid\Column|Collection birthday
     * @property Grid\Column|Collection shop_no
     * @property Grid\Column|Collection hash
     * @property Grid\Column|Collection key
     *
     * @method Grid\Column|Collection order(string $label = null)
     * @method Grid\Column|Collection name(string $label = null)
     * @method Grid\Column|Collection value(string $label = null)
     * @method Grid\Column|Collection notes(string $label = null)
     * @method Grid\Column|Collection id(string $label = null)
     * @method Grid\Column|Collection type(string $label = null)
     * @method Grid\Column|Collection version(string $label = null)
     * @method Grid\Column|Collection detail(string $label = null)
     * @method Grid\Column|Collection created_at(string $label = null)
     * @method Grid\Column|Collection updated_at(string $label = null)
     * @method Grid\Column|Collection is_enabled(string $label = null)
     * @method Grid\Column|Collection parent_id(string $label = null)
     * @method Grid\Column|Collection icon(string $label = null)
     * @method Grid\Column|Collection uri(string $label = null)
     * @method Grid\Column|Collection extension(string $label = null)
     * @method Grid\Column|Collection user_id(string $label = null)
     * @method Grid\Column|Collection path(string $label = null)
     * @method Grid\Column|Collection method(string $label = null)
     * @method Grid\Column|Collection ip(string $label = null)
     * @method Grid\Column|Collection input(string $label = null)
     * @method Grid\Column|Collection permission_id(string $label = null)
     * @method Grid\Column|Collection menu_id(string $label = null)
     * @method Grid\Column|Collection slug(string $label = null)
     * @method Grid\Column|Collection http_method(string $label = null)
     * @method Grid\Column|Collection http_path(string $label = null)
     * @method Grid\Column|Collection role_id(string $label = null)
     * @method Grid\Column|Collection username(string $label = null)
     * @method Grid\Column|Collection password(string $label = null)
     * @method Grid\Column|Collection avatar(string $label = null)
     * @method Grid\Column|Collection remember_token(string $label = null)
     * @method Grid\Column|Collection coupon_id(string $label = null)
     * @method Grid\Column|Collection coupon_name(string $label = null)
     * @method Grid\Column|Collection order_id(string $label = null)
     * @method Grid\Column|Collection order_number(string $label = null)
     * @method Grid\Column|Collection product_name(string $label = null)
     * @method Grid\Column|Collection amount(string $label = null)
     * @method Grid\Column|Collection discount(string $label = null)
     * @method Grid\Column|Collection start(string $label = null)
     * @method Grid\Column|Collection end(string $label = null)
     * @method Grid\Column|Collection status(string $label = null)
     * @method Grid\Column|Collection use_date(string $label = null)
     * @method Grid\Column|Collection uuid(string $label = null)
     * @method Grid\Column|Collection connection(string $label = null)
     * @method Grid\Column|Collection queue(string $label = null)
     * @method Grid\Column|Collection payload(string $label = null)
     * @method Grid\Column|Collection exception(string $label = null)
     * @method Grid\Column|Collection failed_at(string $label = null)
     * @method Grid\Column|Collection product_id(string $label = null)
     * @method Grid\Column|Collection qty(string $label = null)
     * @method Grid\Column|Collection vendor_id(string $label = null)
     * @method Grid\Column|Collection vendor_name(string $label = null)
     * @method Grid\Column|Collection bank_name(string $label = null)
     * @method Grid\Column|Collection bank_code(string $label = null)
     * @method Grid\Column|Collection bank_account(string $label = null)
     * @method Grid\Column|Collection deliver_type(string $label = null)
     * @method Grid\Column|Collection deliver_date(string $label = null)
     * @method Grid\Column|Collection receiver(string $label = null)
     * @method Grid\Column|Collection email(string $label = null)
     * @method Grid\Column|Collection token(string $label = null)
     * @method Grid\Column|Collection tokenable_type(string $label = null)
     * @method Grid\Column|Collection tokenable_id(string $label = null)
     * @method Grid\Column|Collection abilities(string $label = null)
     * @method Grid\Column|Collection last_used_at(string $label = null)
     * @method Grid\Column|Collection category_id(string $label = null)
     * @method Grid\Column|Collection category_name(string $label = null)
     * @method Grid\Column|Collection spec(string $label = null)
     * @method Grid\Column|Collection price(string $label = null)
     * @method Grid\Column|Collection images(string $label = null)
     * @method Grid\Column|Collection code(string $label = null)
     * @method Grid\Column|Collection auth(string $label = null)
     * @method Grid\Column|Collection auth_id(string $label = null)
     * @method Grid\Column|Collection gender(string $label = null)
     * @method Grid\Column|Collection birthday(string $label = null)
     * @method Grid\Column|Collection shop_no(string $label = null)
     * @method Grid\Column|Collection hash(string $label = null)
     * @method Grid\Column|Collection key(string $label = null)
     */
    class Grid {}

    class MiniGrid extends Grid {}

    /**
     * @property Show\Field|Collection order
     * @property Show\Field|Collection name
     * @property Show\Field|Collection value
     * @property Show\Field|Collection notes
     * @property Show\Field|Collection id
     * @property Show\Field|Collection type
     * @property Show\Field|Collection version
     * @property Show\Field|Collection detail
     * @property Show\Field|Collection created_at
     * @property Show\Field|Collection updated_at
     * @property Show\Field|Collection is_enabled
     * @property Show\Field|Collection parent_id
     * @property Show\Field|Collection icon
     * @property Show\Field|Collection uri
     * @property Show\Field|Collection extension
     * @property Show\Field|Collection user_id
     * @property Show\Field|Collection path
     * @property Show\Field|Collection method
     * @property Show\Field|Collection ip
     * @property Show\Field|Collection input
     * @property Show\Field|Collection permission_id
     * @property Show\Field|Collection menu_id
     * @property Show\Field|Collection slug
     * @property Show\Field|Collection http_method
     * @property Show\Field|Collection http_path
     * @property Show\Field|Collection role_id
     * @property Show\Field|Collection username
     * @property Show\Field|Collection password
     * @property Show\Field|Collection avatar
     * @property Show\Field|Collection remember_token
     * @property Show\Field|Collection coupon_id
     * @property Show\Field|Collection coupon_name
     * @property Show\Field|Collection order_id
     * @property Show\Field|Collection order_number
     * @property Show\Field|Collection product_name
     * @property Show\Field|Collection amount
     * @property Show\Field|Collection discount
     * @property Show\Field|Collection start
     * @property Show\Field|Collection end
     * @property Show\Field|Collection status
     * @property Show\Field|Collection use_date
     * @property Show\Field|Collection uuid
     * @property Show\Field|Collection connection
     * @property Show\Field|Collection queue
     * @property Show\Field|Collection payload
     * @property Show\Field|Collection exception
     * @property Show\Field|Collection failed_at
     * @property Show\Field|Collection product_id
     * @property Show\Field|Collection qty
     * @property Show\Field|Collection vendor_id
     * @property Show\Field|Collection vendor_name
     * @property Show\Field|Collection bank_name
     * @property Show\Field|Collection bank_code
     * @property Show\Field|Collection bank_account
     * @property Show\Field|Collection deliver_type
     * @property Show\Field|Collection deliver_date
     * @property Show\Field|Collection receiver
     * @property Show\Field|Collection email
     * @property Show\Field|Collection token
     * @property Show\Field|Collection tokenable_type
     * @property Show\Field|Collection tokenable_id
     * @property Show\Field|Collection abilities
     * @property Show\Field|Collection last_used_at
     * @property Show\Field|Collection category_id
     * @property Show\Field|Collection category_name
     * @property Show\Field|Collection spec
     * @property Show\Field|Collection price
     * @property Show\Field|Collection images
     * @property Show\Field|Collection code
     * @property Show\Field|Collection auth
     * @property Show\Field|Collection auth_id
     * @property Show\Field|Collection gender
     * @property Show\Field|Collection birthday
     * @property Show\Field|Collection shop_no
     * @property Show\Field|Collection hash
     * @property Show\Field|Collection key
     *
     * @method Show\Field|Collection order(string $label = null)
     * @method Show\Field|Collection name(string $label = null)
     * @method Show\Field|Collection value(string $label = null)
     * @method Show\Field|Collection notes(string $label = null)
     * @method Show\Field|Collection id(string $label = null)
     * @method Show\Field|Collection type(string $label = null)
     * @method Show\Field|Collection version(string $label = null)
     * @method Show\Field|Collection detail(string $label = null)
     * @method Show\Field|Collection created_at(string $label = null)
     * @method Show\Field|Collection updated_at(string $label = null)
     * @method Show\Field|Collection is_enabled(string $label = null)
     * @method Show\Field|Collection parent_id(string $label = null)
     * @method Show\Field|Collection icon(string $label = null)
     * @method Show\Field|Collection uri(string $label = null)
     * @method Show\Field|Collection extension(string $label = null)
     * @method Show\Field|Collection user_id(string $label = null)
     * @method Show\Field|Collection path(string $label = null)
     * @method Show\Field|Collection method(string $label = null)
     * @method Show\Field|Collection ip(string $label = null)
     * @method Show\Field|Collection input(string $label = null)
     * @method Show\Field|Collection permission_id(string $label = null)
     * @method Show\Field|Collection menu_id(string $label = null)
     * @method Show\Field|Collection slug(string $label = null)
     * @method Show\Field|Collection http_method(string $label = null)
     * @method Show\Field|Collection http_path(string $label = null)
     * @method Show\Field|Collection role_id(string $label = null)
     * @method Show\Field|Collection username(string $label = null)
     * @method Show\Field|Collection password(string $label = null)
     * @method Show\Field|Collection avatar(string $label = null)
     * @method Show\Field|Collection remember_token(string $label = null)
     * @method Show\Field|Collection coupon_id(string $label = null)
     * @method Show\Field|Collection coupon_name(string $label = null)
     * @method Show\Field|Collection order_id(string $label = null)
     * @method Show\Field|Collection order_number(string $label = null)
     * @method Show\Field|Collection product_name(string $label = null)
     * @method Show\Field|Collection amount(string $label = null)
     * @method Show\Field|Collection discount(string $label = null)
     * @method Show\Field|Collection start(string $label = null)
     * @method Show\Field|Collection end(string $label = null)
     * @method Show\Field|Collection status(string $label = null)
     * @method Show\Field|Collection use_date(string $label = null)
     * @method Show\Field|Collection uuid(string $label = null)
     * @method Show\Field|Collection connection(string $label = null)
     * @method Show\Field|Collection queue(string $label = null)
     * @method Show\Field|Collection payload(string $label = null)
     * @method Show\Field|Collection exception(string $label = null)
     * @method Show\Field|Collection failed_at(string $label = null)
     * @method Show\Field|Collection product_id(string $label = null)
     * @method Show\Field|Collection qty(string $label = null)
     * @method Show\Field|Collection vendor_id(string $label = null)
     * @method Show\Field|Collection vendor_name(string $label = null)
     * @method Show\Field|Collection bank_name(string $label = null)
     * @method Show\Field|Collection bank_code(string $label = null)
     * @method Show\Field|Collection bank_account(string $label = null)
     * @method Show\Field|Collection deliver_type(string $label = null)
     * @method Show\Field|Collection deliver_date(string $label = null)
     * @method Show\Field|Collection receiver(string $label = null)
     * @method Show\Field|Collection email(string $label = null)
     * @method Show\Field|Collection token(string $label = null)
     * @method Show\Field|Collection tokenable_type(string $label = null)
     * @method Show\Field|Collection tokenable_id(string $label = null)
     * @method Show\Field|Collection abilities(string $label = null)
     * @method Show\Field|Collection last_used_at(string $label = null)
     * @method Show\Field|Collection category_id(string $label = null)
     * @method Show\Field|Collection category_name(string $label = null)
     * @method Show\Field|Collection spec(string $label = null)
     * @method Show\Field|Collection price(string $label = null)
     * @method Show\Field|Collection images(string $label = null)
     * @method Show\Field|Collection code(string $label = null)
     * @method Show\Field|Collection auth(string $label = null)
     * @method Show\Field|Collection auth_id(string $label = null)
     * @method Show\Field|Collection gender(string $label = null)
     * @method Show\Field|Collection birthday(string $label = null)
     * @method Show\Field|Collection shop_no(string $label = null)
     * @method Show\Field|Collection hash(string $label = null)
     * @method Show\Field|Collection key(string $label = null)
     */
    class Show {}

    /**
     * @method \App\Admin\Extensions\Form\SelectCreate selectCreate(...$params)
     */
    class Form {}

}

namespace Dcat\Admin\Grid {
    /**
     
     */
    class Column {}

    /**
     
     */
    class Filter {}
}

namespace Dcat\Admin\Show {
    /**
     * @method $this video(...$params)
     */
    class Field {}
}
