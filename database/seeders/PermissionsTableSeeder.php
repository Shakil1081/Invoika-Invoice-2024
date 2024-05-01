<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'company_list_create',
            ],
            [
                'id'    => 18,
                'title' => 'company_list_edit',
            ],
            [
                'id'    => 19,
                'title' => 'company_list_show',
            ],
            [
                'id'    => 20,
                'title' => 'company_list_delete',
            ],
            [
                'id'    => 21,
                'title' => 'company_list_access',
            ],
            [
                'id'    => 22,
                'title' => 'invoice_access',
            ],
            [
                'id'    => 23,
                'title' => 'add_invoice_master_create',
            ],
            [
                'id'    => 24,
                'title' => 'add_invoice_master_edit',
            ],
            [
                'id'    => 25,
                'title' => 'add_invoice_master_show',
            ],
            [
                'id'    => 26,
                'title' => 'add_invoice_master_delete',
            ],
            [
                'id'    => 27,
                'title' => 'add_invoice_master_access',
            ],
            [
                'id'    => 28,
                'title' => 'payment_status_create',
            ],
            [
                'id'    => 29,
                'title' => 'payment_status_edit',
            ],
            [
                'id'    => 30,
                'title' => 'payment_status_show',
            ],
            [
                'id'    => 31,
                'title' => 'payment_status_delete',
            ],
            [
                'id'    => 32,
                'title' => 'payment_status_access',
            ],
            [
                'id'    => 33,
                'title' => 'billing_address_create',
            ],
            [
                'id'    => 34,
                'title' => 'billing_address_edit',
            ],
            [
                'id'    => 35,
                'title' => 'billing_address_show',
            ],
            [
                'id'    => 36,
                'title' => 'billing_address_delete',
            ],
            [
                'id'    => 37,
                'title' => 'billing_address_access',
            ],
            [
                'id'    => 38,
                'title' => 'shipping_address_create',
            ],
            [
                'id'    => 39,
                'title' => 'shipping_address_edit',
            ],
            [
                'id'    => 40,
                'title' => 'shipping_address_show',
            ],
            [
                'id'    => 41,
                'title' => 'shipping_address_delete',
            ],
            [
                'id'    => 42,
                'title' => 'shipping_address_access',
            ],
            [
                'id'    => 43,
                'title' => 'category_list_create',
            ],
            [
                'id'    => 44,
                'title' => 'category_list_edit',
            ],
            [
                'id'    => 45,
                'title' => 'category_list_show',
            ],
            [
                'id'    => 46,
                'title' => 'category_list_delete',
            ],
            [
                'id'    => 47,
                'title' => 'category_list_access',
            ],
            [
                'id'    => 48,
                'title' => 'brand_list_create',
            ],
            [
                'id'    => 49,
                'title' => 'brand_list_edit',
            ],
            [
                'id'    => 50,
                'title' => 'brand_list_show',
            ],
            [
                'id'    => 51,
                'title' => 'brand_list_delete',
            ],
            [
                'id'    => 52,
                'title' => 'brand_list_access',
            ],
            [
                'id'    => 53,
                'title' => 'color_create',
            ],
            [
                'id'    => 54,
                'title' => 'color_edit',
            ],
            [
                'id'    => 55,
                'title' => 'color_show',
            ],
            [
                'id'    => 56,
                'title' => 'color_delete',
            ],
            [
                'id'    => 57,
                'title' => 'color_access',
            ],
            [
                'id'    => 58,
                'title' => 'product_create',
            ],
            [
                'id'    => 59,
                'title' => 'product_edit',
            ],
            [
                'id'    => 60,
                'title' => 'product_show',
            ],
            [
                'id'    => 61,
                'title' => 'product_delete',
            ],
            [
                'id'    => 62,
                'title' => 'product_access',
            ],
            [
                'id'    => 63,
                'title' => 'client_list_create',
            ],
            [
                'id'    => 64,
                'title' => 'client_list_edit',
            ],
            [
                'id'    => 65,
                'title' => 'client_list_show',
            ],
            [
                'id'    => 66,
                'title' => 'client_list_delete',
            ],
            [
                'id'    => 67,
                'title' => 'client_list_access',
            ],
            [
                'id'    => 68,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 69,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 70,
                'title' => 'invoice_derail_create',
            ],
            [
                'id'    => 71,
                'title' => 'invoice_derail_edit',
            ],
            [
                'id'    => 72,
                'title' => 'invoice_derail_show',
            ],
            [
                'id'    => 73,
                'title' => 'invoice_derail_delete',
            ],
            [
                'id'    => 74,
                'title' => 'invoice_derail_access',
            ],
            [
                'id'    => 75,
                'title' => 'payment_access',
            ],
            [
                'id'    => 76,
                'title' => 'payment_type_create',
            ],
            [
                'id'    => 77,
                'title' => 'payment_type_edit',
            ],
            [
                'id'    => 78,
                'title' => 'payment_type_show',
            ],
            [
                'id'    => 79,
                'title' => 'payment_type_delete',
            ],
            [
                'id'    => 80,
                'title' => 'payment_type_access',
            ],
            [
                'id'    => 81,
                'title' => 'product_detail_access',
            ],
            [
                'id'    => 82,
                'title' => 'company_access',
            ],
            [
                'id'    => 83,
                'title' => 'tax_access',
            ],
            [
                'id'    => 84,
                'title' => 'tax_list_create',
            ],
            [
                'id'    => 85,
                'title' => 'tax_list_edit',
            ],
            [
                'id'    => 86,
                'title' => 'tax_list_show',
            ],
            [
                'id'    => 87,
                'title' => 'tax_list_delete',
            ],
            [
                'id'    => 88,
                'title' => 'tax_list_access',
            ],
            [
                'id'    => 89,
                'title' => 'discount_create',
            ],
            [
                'id'    => 90,
                'title' => 'discount_edit',
            ],
            [
                'id'    => 91,
                'title' => 'discount_show',
            ],
            [
                'id'    => 92,
                'title' => 'discount_delete',
            ],
            [
                'id'    => 93,
                'title' => 'discount_access',
            ],
            [
                'id'    => 94,
                'title' => 'shipping_charge_create',
            ],
            [
                'id'    => 95,
                'title' => 'shipping_charge_edit',
            ],
            [
                'id'    => 96,
                'title' => 'shipping_charge_show',
            ],
            [
                'id'    => 97,
                'title' => 'shipping_charge_delete',
            ],
            [
                'id'    => 98,
                'title' => 'shipping_charge_access',
            ],
            [
                'id'    => 99,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
