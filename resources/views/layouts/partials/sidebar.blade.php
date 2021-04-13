<aside class="main-sidebar sidebar-dark-secondary elevation-4" style="background-color: #0656a7;">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="{{asset('images/garage.png')}}" alt="Manager Warsztatów" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Manager Warsztatów</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('images/profile.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }} ({{$role}})</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                @can('client')
                <li class="nav-item">
                    <a href="{{route('orders.create')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Zamów termin
                        </p>
                    </a>
                </li>
                    <li class="nav-item">
                        <a href="{{route('orders.myOrders')}}" class="nav-link">
                            <i class="nav-icon fas fa-calendar"></i>
                            <p>
                                Mój kalendarz
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('orders.myOrdersHistory')}}" class="nav-link">
                            <i class="nav-icon fas fa-history"></i>
                            <p>
                                Historia
                            </p>
                        </a>
                    </li>
                @endcan
                @if($workshops)
                @foreach($workshops as $workshop)
                        @can('workshop', $workshop->id)
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-chart-pie"></i>
                                    <p>
                                        {{$workshop->name}}
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('workshops.manage',$workshop->id)}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Otwórz</p>
                                        </a>
                                    </li>
                                    @can('owner')
                                    <li class="nav-item">
                                        <a href="{{route('workshops.editForm',$workshop->id)}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Zarządzaj</p>
                                        </a>
                                    </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan
                    @endforeach
                        @endif
                @can('owner')
                    <li class="nav-item">
                        <a href="{{route('users.list')}}" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Lista użytkowników
                            </p>
                        </a>
                    </li>
                @endcan
                @can('owner')
                    <li class="nav-item">
                        <a href="{{route('workshops.createForm')}}" class="nav-link">
                            <i class="nav-icon fas fa-plus"></i>
                            <p>
                                Dodaj warsztat
                            </p>
                        </a>
                    </li>
                @endcan

                @can('workshopsManage')

                @endcan
                <li class="nav-item">
                    <a href="{{route('logout')}}" class="nav-link">
                        <i class="nav-icon fas fa-sad-cry"></i>
                        <p>
                            Wyloguj
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<style>
    @media (min-width: 992px) {
        .sidebar-mini .nav-sidebar, .sidebar-mini .nav-sidebar .nav-link, .sidebar-mini .nav-sidebar > .nav-header {
            white-space: normal !important;
        }
    }
</style>
