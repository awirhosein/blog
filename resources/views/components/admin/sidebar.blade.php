<nav class="sidebar col-lg-2 d-lg-block bg-light collapse">
    <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column mb-5 pr-0 pb-5" id="sidebar">

            <x-admin.sidebar-item title="Dashboard" :link="route('admin.dashboard')" icon="fad fa-house-chimney" active="dashboard" />

            @can('admin')
                <x-admin.sidebar-item title="Users" :link="route('admin.users.index')" icon="fad fa-users" active="users.*" />
            @endcan

            <x-admin.sidebar-item title="Articles" :link="route('admin.articles.index')" icon="fad fa-cart-shopping" active="articles.*" />
           
        </ul>
    </div>
</nav>
