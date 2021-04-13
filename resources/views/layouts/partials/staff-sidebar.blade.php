<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #0656a7;">
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
                @can('manageClients', $workshopId)
                <li class="nav-item">
                    <a href="{{route('users.manageClients', $workshopId)}}" class="nav-link">
                        <i class="nav-icon fas fa-person-booth"></i>
                        <p>
                            Klienci
                        </p>
                    </a>
                </li>
                @endcan
                @can('calendar', $workshopId)
                <li class="nav-item">
                    <a href="{{route('workshops.calendar', $workshopId)}}" class="nav-link">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>
                            Kalendarz
                        </p>
                    </a>
                </li>
                @endcan
                @can('raport', $workshopId)
                    <li class="nav-item">
                        <a href="{{route('workshops.stats', $workshopId)}}" class="nav-link">
                             <i class="nav-icon fas fa-chart-area"></i>
                               <p>
                                   Statystyki wizyt
                               </p>
                         </a>
                      </li>
                @endcan
                    @can('raport', $workshopId)
                        <li class="nav-item">
                            <a href="{{route('workshops.usersStats', $workshopId)}}" class="nav-link">
                                <i class="nav-icon fas fa-caret-up"></i>
                                <p>
                                    Przyrost klientów
                                </p>
                            </a>
                        </li>
                    @endcan
                    @can('warehouse', $workshopId)
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Magazyn
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('warehouse.itemsList', $workshopId)}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Lista przedmiotów</p>
                                </a>
                            </li>
                                <li class="nav-item">
                                    <a href="{{route('warehouse.createItemForm', $workshopId)}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dodaj pozycję</p>
                                    </a>
                                </li>
                        </ul>
                    </li>
                    @endcan
                    @can('delivers', $workshopId)
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Dostawcy
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('delivers.list', $workshopId)}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Lista dostawców</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('delivers.createForm', $workshopId)}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dodaj dostawcę</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endcan
                <li class="nav-item">
                    <a href="{{route('panel.home')}}" class="nav-link">
                        <i class="nav-icon fas fa-history"></i>
                        <p>
                            Powrót
                        </p>
                    </a>
                </li>
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
