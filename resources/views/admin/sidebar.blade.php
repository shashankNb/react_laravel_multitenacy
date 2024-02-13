<!-- Brand Logo -->
<a href="#" class="brand-link bg-primary">
    <span class="brand-text font-weight-light"><strong>{{ $website_title ?? 'CRM System' }}</strong></span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="#" class="d-block">{{ auth()->guard('admin')->user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->


            <x-submenu-layout
                :parent="['url' => route('tenant.manage'), 'label' => 'Customer Manager']"
                icon="fa fa-users"
                :children="[
                    ['url' => route('tenant.manage'), 'label' => 'Customer Manage'],
                    ['url' => route('tenant', 0), 'label' => 'Add Customer'],
                ]">
            </x-submenu-layout>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
