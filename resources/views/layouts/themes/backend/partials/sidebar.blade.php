    <div class="sidebar">
        <nav class="sidebar-nav">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.index') }}"><i class="icon-speedometer"></i> Dashboard</a>
                </li>

                <li class="nav-item">
                    <form class="form-horizontal" method="POST" action="">
                        {{ csrf_field() }}
                        <input id="" placeholder="search.." type="text" class="form-control" name="search" value="{{ old('search') }}" required autofocus>
                    </form>
                </li>

                <li class="nav-title">
                    Menu
                </li>
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-people"></i> Users</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('customer.index') }}"><i class="icon-arrow-right-circle"></i> Customers <span class="badge badge-info">{{ $customer_count }}</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('employee.index') }}"><i class="icon-arrow-right-circle"></i> Employees <span class="badge badge-info">{{ $employee_count }}</span></a>
                        </li>

                    </ul>
                </li>

{{--                 <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-event"></i> Designs</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('design.create') }}"><i class="icon-arrow-right-circle"></i> Create</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('design.index') }}"><i class="icon-arrow-right-circle"></i> Manage <span class="badge badge-info">{{ $design_count }}</span></a>
                        </li>
                    </ul>
                </li> --}}

                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-shopping-basket"></i> Collections </a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('collection.create') }}"><i class="icon-arrow-right-circle"></i> Create</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('collection.index') }}"><i class="icon-arrow-right-circle"></i> Manage <span class="badge badge-info">{{ $collections_count }}</span></a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-diamond"></i> Inventory</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('inventory.create') }}"><i class="icon-arrow-right-circle"></i> Create</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('inventory.index') }}"><i class="icon-arrow-right-circle"></i> Manage <span class="badge badge-info">{{ $inventory_count }}</span></a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-wrench"></i> Setup</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('company.index') }}"><i class="icon-arrow-right-circle"></i> Company <span class="badge badge-info">{{ $companies_count }}</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('fee.index') }}"><i class="icon-arrow-right-circle"></i> Fees <span class="badge badge-info">{{ $fee_count }}</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('finger.index') }}"><i class="icon-arrow-right-circle"></i> Finger Sizes <span class="badge badge-info">{{ $finger_count }}</span></a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('metal.index') }}"><i class="icon-arrow-right-circle"></i> Metal Types <span class="badge badge-info">{{ $metal_count }}</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('tax.index') }}"><i class="icon-arrow-right-circle"></i> Sales Tax </a>
                        </li>

                        <li class="nav-item">
<<<<<<< HEAD
                            <a class="nav-link" href="{{ route('size.index') }}"><i class="icon-arrow-right-circle"></i> Size <span class="badge badge-info">{{ $size_count }}</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('stone_size.index') }}"><i class="icon-arrow-right-circle"></i> Stone Size <span class="badge badge-info">{{ $stone_size_count }}</span></a>
=======
                            <a class="nav-link" href="{{ route('size.index') }}"><i class="icon-arrow-right-circle"></i> Sizes <span class="badge badge-info">{{ $size_count }}</span></a>
>>>>>>> a340ff5dc46b815cb6d6d35e412daa6979054732
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('stone.index') }}"><i class="icon-arrow-right-circle"></i> Stone Types <span class="badge badge-info">{{ $stone_count }}</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('vendor.index') }}"><i class="icon-arrow-right-circle"></i> Vendors <span class="badge badge-info">{{ $vendor_count }}</span></a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="charts.html"><i class="icon-pie-chart"></i> Reports</a>
                </li>
                <li class="divider"></li>
                <li class="nav-title">
                    Extras
                </li>
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-star"></i> Pages</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="pages-login.html" target="_top"><i class="icon-star"></i> Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages-register.html" target="_top"><i class="icon-star"></i> Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages-404.html" target="_top"><i class="icon-star"></i> Error 404</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages-500.html" target="_top"><i class="icon-star"></i> Error 500</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
    </div>