<div class="col-md-2 bg-white p-3 border-end ">
    <ul class="nav flex-column">
        <li>
            <a class="nav-link fs-5 {{ request()->is('dashboard') ? 'active' : 'link-secondary' }}" href="/dashboard">
                <i class="bi bi-speedometer2 me-2"></i>
                Dashboard
            </a>
        </li>
        <li>
            <a class="nav-link fs-5 {{ request()->is('dashboard/orders') ? 'active' : 'link-secondary' }}" href="/dashboard/orders">
                <i class="bi bi-card-checklist me-2"></i>
                Orders
            </a>
        </li>
        <li>
            <a class="nav-link fs-5 {{ request()->is('dashboard/categories') ? 'active' : 'link-secondary' }}" href="/dashboard/categories">
                <i class="bi bi-tags me-2"></i>
                Categories
            </a>
        </li>
        <li>
            <a class="nav-link fs-5 {{ request()->is('dashboard/items') ? 'active' : 'link-secondary' }}" href="/dashboard/items">
                <i class="bi bi-box-seam me-2"></i>
                Items
            </a>
        </li>
        <li>
            <a class="nav-link fs-5 {{ request()->is('dashboard/customers') ? 'active' : 'link-secondary' }}" href="/dashboard/customers">
                <i class="bi bi-people me-2"></i>
                Customers
            </a>
        </li>
        {{-- <li>
            <a class="nav-link fs-5 {{ request()->is('dashboard/promos') ? 'active' : 'link-secondary' }}" href="/dashboard/promos">
                <i class="bi bi-code me-2"></i>
                Promo Codes
            </a>
        </li> --}}
    </ul>
</div>
