<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('company_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/company-lists*") ? "c-show" : "" }} {{ request()->is("admin/billing-addresses*") ? "c-show" : "" }} {{ request()->is("admin/shipping-addresses*") ? "c-show" : "" }} {{ request()->is("admin/client-lists*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.company.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('company_list_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.company-lists.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/company-lists") || request()->is("admin/company-lists/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.companyList.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('billing_address_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.billing-addresses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/billing-addresses") || request()->is("admin/billing-addresses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.billingAddress.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('shipping_address_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.shipping-addresses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/shipping-addresses") || request()->is("admin/shipping-addresses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.shippingAddress.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('client_list_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.client-lists.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/client-lists") || request()->is("admin/client-lists/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.clientList.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('invoice_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/add-invoice-masters*") ? "c-show" : "" }} {{ request()->is("admin/invoice-derails*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.invoice.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('add_invoice_master_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.add-invoice-masters.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/add-invoice-masters") || request()->is("admin/add-invoice-masters/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.addInvoiceMaster.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('invoice_derail_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.invoice-derails.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/invoice-derails") || request()->is("admin/invoice-derails/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.invoiceDerail.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('payment_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/payment-statuses*") ? "c-show" : "" }} {{ request()->is("admin/payment-types*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.payment.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('payment_status_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.payment-statuses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/payment-statuses") || request()->is("admin/payment-statuses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.paymentStatus.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('payment_type_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.payment-types.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/payment-types") || request()->is("admin/payment-types/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.paymentType.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('product_detail_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/colors*") ? "c-show" : "" }} {{ request()->is("admin/category-lists*") ? "c-show" : "" }} {{ request()->is("admin/brand-lists*") ? "c-show" : "" }} {{ request()->is("admin/products*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.productDetail.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('color_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.colors.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/colors") || request()->is("admin/colors/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.color.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('category_list_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.category-lists.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/category-lists") || request()->is("admin/category-lists/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.categoryList.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('brand_list_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.brand-lists.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/brand-lists") || request()->is("admin/brand-lists/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.brandList.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('product_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.products.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/products") || request()->is("admin/products/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-shopping-cart c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.product.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/audit-logs*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.audit-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.auditLog.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('tax_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/tax-lists*") ? "c-show" : "" }} {{ request()->is("admin/discounts*") ? "c-show" : "" }} {{ request()->is("admin/shipping-charges*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.tax.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('tax_list_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.tax-lists.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/tax-lists") || request()->is("admin/tax-lists/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.taxList.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('discount_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.discounts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/discounts") || request()->is("admin/discounts/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.discount.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('shipping_charge_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.shipping-charges.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/shipping-charges") || request()->is("admin/shipping-charges/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.shippingCharge.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>