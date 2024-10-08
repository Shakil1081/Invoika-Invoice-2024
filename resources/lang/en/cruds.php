<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'approved'                 => 'Approved',
            'approved_helper'          => ' ',
        ],
    ],
    'companyList' => [
        'title'          => 'Company List',
        'title_singular' => 'Company List',
        'fields'         => [
            'id'                         => 'ID',
            'id_helper'                  => ' ',
            'company_name'               => 'Company Name',
            'company_name_helper'        => ' ',
            'logo'                       => 'Logo',
            'logo_helper'                => ' ',
            'website_url'                => 'Website Url',
            'website_url_helper'         => ' ',
            'email'                      => 'Email',
            'email_helper'               => ' ',
            'contact_no'                 => 'Contact No',
            'contact_no_helper'          => ' ',
            'postalcode'                 => 'Postalcode',
            'postalcode_helper'          => ' ',
            'invoice_number_slug'        => 'Invoice Number Slug',
            'invoice_number_slug_helper' => ' ',
            'address'                    => 'Address',
            'address_helper'             => ' ',
            'approved_signature'         => 'Approved Signature',
            'approved_signature_helper'  => ' ',
            'created_at'                 => 'Created at',
            'created_at_helper'          => ' ',
            'updated_at'                 => 'Updated at',
            'updated_at_helper'          => ' ',
            'deleted_at'                 => 'Deleted at',
            'deleted_at_helper'          => ' ',
        ],
    ],
    'invoice' => [
        'title'          => 'Invoice',
        'title_singular' => 'Invoice',
    ],
    'addInvoiceMaster' => [
        'title'          => 'Add Invoice Master',
        'title_singular' => 'Add Invoice Master',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'select_client'           => 'Select Client',
            'select_client_helper'    => ' ',
            'invoice_number'          => 'Invoice Number',
            'invoice_number_helper'   => ' ',
            'inv_date'                => 'Inv Date',
            'inv_date_helper'         => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
            'payment_status'          => 'Payment Status',
            'payment_status_helper'   => ' ',
            'total_amount'            => 'Total Amount',
            'total_amount_helper'     => ' ',
            'billing_address'         => 'Billing Address',
            'billing_address_helper'  => ' ',
            'shipping_address'        => 'Shipping Address',
            'shipping_address_helper' => ' ',
            'sub_total'               => 'Sub Total',
            'sub_total_helper'        => ' ',
            'discount'                => 'Discount',
            'discount_helper'         => ' ',
            'tax'                     => 'Tax',
            'tax_helper'              => ' ',
            'shipping_charge'         => 'Shipping Charge',
            'shipping_charge_helper'  => ' ',
            'notes'                   => 'Notes',
            'notes_helper'            => ' ',
        ],
    ],
    'paymentStatus' => [
        'title'          => 'Payment Status',
        'title_singular' => 'Payment Status',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'payment_status'        => 'Payment Status',
            'payment_status_helper' => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
        ],
    ],
    'billingAddress' => [
        'title'          => 'Billing Address',
        'title_singular' => 'Billing Address',
        'fields'         => [
            'id'                           => 'ID',
            'id_helper'                    => ' ',
            'full_name'                    => 'Full Name',
            'full_name_helper'             => ' ',
            'billing_address'              => 'Billing Address',
            'billing_address_helper'       => ' ',
            'billing_mobile_number'        => 'Billing Mobile Number',
            'billing_mobile_number_helper' => ' ',
            'billing_tax_number'           => 'Billing Tax Number',
            'billing_tax_number_helper'    => ' ',
            'created_at'                   => 'Created at',
            'created_at_helper'            => ' ',
            'updated_at'                   => 'Updated at',
            'updated_at_helper'            => ' ',
            'deleted_at'                   => 'Deleted at',
            'deleted_at_helper'            => ' ',
        ],
    ],
    'shippingAddress' => [
        'title'          => 'Shipping Address',
        'title_singular' => 'Shipping Address',
        'fields'         => [
            'id'                             => 'ID',
            'id_helper'                      => ' ',
            'shipping_name'                  => 'Full Name',
            'shipping_name_helper'           => ' ',
            'shippling_address'              => 'Shippling Address',
            'shippling_address_helper'       => ' ',
            'shippling_mobile_number'        => 'Shippling Mobile Number',
            'shippling_mobile_number_helper' => ' ',
            'shippling_tax_number'           => 'Shippling Tax Number',
            'shippling_tax_number_helper'    => ' ',
            'created_at'                     => 'Created at',
            'created_at_helper'              => ' ',
            'updated_at'                     => 'Updated at',
            'updated_at_helper'              => ' ',
            'deleted_at'                     => 'Deleted at',
            'deleted_at_helper'              => ' ',
        ],
    ],
    'categoryList' => [
        'title'          => 'Category List',
        'title_singular' => 'Category List',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'category_name'        => 'Category Name',
            'category_name_helper' => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'brandList' => [
        'title'          => 'Brand List',
        'title_singular' => 'Brand List',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'brand_name'        => 'Brand Name',
            'brand_name_helper' => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'color' => [
        'title'          => 'Color',
        'title_singular' => 'Color',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'color_name'        => 'Color Name',
            'color_name_helper' => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'product' => [
        'title'          => 'Product',
        'title_singular' => 'Product',
        'fields'         => [
            'id'                             => 'ID',
            'id_helper'                      => ' ',
            'name'                           => 'Name',
            'name_helper'                    => ' ',
            'brand'                          => 'Brand',
            'brand_helper'                   => ' ',
            'category'                       => 'Category',
            'category_helper'                => ' ',
            'product_color'                  => 'Product Color',
            'product_color_helper'           => ' ',
            'price'                          => 'Price',
            'price_helper'                   => ' ',
            'old_price'                      => 'Old Price',
            'old_price_helper'               => ' ',
            'photo'                          => 'Photo',
            'photo_helper'                   => ' ',
            'product_thumbnail_image'        => 'Product Thumbnail Image',
            'product_thumbnail_image_helper' => ' ',
            'description'                    => 'Description',
            'description_helper'             => ' ',
            'created_at'                     => 'Created at',
            'created_at_helper'              => ' ',
            'updated_at'                     => 'Updated at',
            'updated_at_helper'              => ' ',
            'deleted_at'                     => 'Deleted at',
            'deleted_at_helper'              => ' ',
        ],
    ],
    'clientList' => [
        'title'          => 'Client List',
        'title_singular' => 'Client List',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'first_name'           => 'First Name',
            'first_name_helper'    => ' ',
            'last_name'            => 'Last Name',
            'last_name_helper'     => ' ',
            'username'             => 'Username',
            'username_helper'      => ' ',
            'mobile_number'        => 'Mobile Number',
            'mobile_number_helper' => ' ',
            'email'                => 'Email',
            'email_helper'         => ' ',
            'country'              => 'Country',
            'country_helper'       => ' ',
            'password'             => 'Password',
            'password_helper'      => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'invoiceDerail' => [
        'title'          => 'Invoice Detail',
        'title_singular' => 'Invoice Detail',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'product'                => 'Product',
            'product_helper'         => ' ',
            'rate'                   => 'Rate',
            'rate_helper'            => ' ',
            'quantity'               => 'Quantity',
            'quantity_helper'        => ' ',
            'product_details'        => 'Product Details',
            'product_details_helper' => ' ',
            'amount'                 => 'Amount',
            'amount_helper'          => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
        ],
    ],
    'payment' => [
        'title'          => 'Payment',
        'title_singular' => 'Payment',
    ],
    'paymentType' => [
        'title'          => 'Payment Type',
        'title_singular' => 'Payment Type',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'productDetail' => [
        'title'          => 'Product Detail',
        'title_singular' => 'Product Detail',
    ],
    'company' => [
        'title'          => 'Company',
        'title_singular' => 'Company',
    ],
    'tax' => [
        'title'          => 'Tax',
        'title_singular' => 'Tax',
    ],
    'taxList' => [
        'title'          => 'Tax List',
        'title_singular' => 'Tax List',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'tax_name'           => 'Tax Name',
            'tax_name_helper'    => ' ',
            'tax_rate_in'        => 'Tax Rate (In %)*',
            'tax_rate_in_helper' => ' ',
            'status'             => 'Status',
            'status_helper'      => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'discount' => [
        'title'          => 'Discount',
        'title_singular' => 'Discount',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'discount_name'        => 'Discount Name',
            'discount_name_helper' => ' ',
            'rate'                 => 'Rate (In %)*',
            'rate_helper'          => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'shippingCharge' => [
        'title'          => 'Shipping Charge',
        'title_singular' => 'Shipping Charge',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'tax_name'           => 'Tax Name',
            'tax_name_helper'    => ' ',
            'country'            => 'Country',
            'country_helper'     => ' ',
            'tax_rate_in'        => 'Tax Rate (In %)',
            'tax_rate_in_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],

];
