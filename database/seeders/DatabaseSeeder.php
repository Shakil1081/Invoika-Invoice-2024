<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            AddInvoiceMastersTableSeeder::class,
            BillingAddressSeeder::class,
            BrandListSeeder::class,
            CategoryListSeeder::class,
            ClientListSeeder::class,
            ColorSeeder::class,
            CompanyListSeeder::class,
            DiscountsTableSeeder::class,
            InvoiceDetailsTableSeeder::class,
            PaymentStatusesTableSeeder::class,
            PaymentTypesTableSeeder::class,
            ProductsTableSeeder::class,
            ShippingAddressesTableSeeder::class,
            ShippingChargesTableSeeder::class,
            TaxListsTableSeeder::class,
        ]);
    }
}
