<div class="sidebar">
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
    <nav class="sidebar-nav">
        <ul class="nav">
            {{--@each('layouts.includes._sidebar_item', $menus, 'menu')--}}
            {{--<li class="nav-item">--}}
            {{--<a class="nav-link" href="#">--}}
            {{--<i class="fas fa-tachometer-alt fa-fw"></i> Dashboard</a>--}}
            {{--</li>--}}


            {{--<li class="nav-item nav-dropdown">--}}
            {{--<a class="nav-link nav-dropdown-toggle" href="#">--}}
            {{--<i class="fas fa-cog fa-fw"></i> Settings--}}
            {{--</a>--}}
            {{--<ul class="nav-dropdown-items">--}}
            {{--<li class="nav-item">--}}
            {{--<a class="nav-link" href="#">--}}
            {{--<i class="fas fa-bars fa-fw"></i> Manage Menu</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item nav-dropdown">--}}
            {{--<a class="nav-link nav-dropdown-toggle" href="#">--}}
            {{--<i class="fas fa-shield-alt fa-fw"></i> Auth--}}
            {{--</a>--}}
            {{--<ul class="nav-dropdown-items">--}}
            {{--<li class="nav-item">--}}
            {{--<a class="nav-link" href="#">--}}
            {{--<i class="fas fa-users fa-fw"></i> Manage Users--}}
            {{--</a>--}}
            {{--<a class="nav-link" href="#">--}}
            {{--<i class="fas fa-lock fa-fw"></i> Roles & Permissions--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</li>--}}

            {{-- {{ route('recurringInvoices.index') }}--}}
            {{-- {{ route('payments.index') }}      --}}
            {{-- {{ route('expenses.index') }}      --}}
            {{-- {{ route('reports.clientStatement') }}      --}}
            {{-- {{ route('reports.expenseList') }}      --}}
            {{-- {{ route('reports.itemSales') }}      --}}
            {{-- {{ route('reports.paymentsCollected') }}      --}}
            {{-- {{ route('reports.profitLoss') }}      --}}
            {{-- {{ route('reports.taxSummary') }}      --}}


            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="nav-icon fas fa-cog"></i>
                    <span>@lang('ip.recurring_invoices')</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="nav-icon fas fa-tachometer-alt"></i> <span>@lang('ip.payments')</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="nav-icon fas fa-cog"></i> <span>@lang('ip.expenses')</span>
                </a>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon fas fa-cog"></i> <span>@lang('ip.reports')</span>
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            @lang('ip.client_statement')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            @lang('ip.expense_list')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            @lang('ip.item_sales')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            @lang('ip.payments_collected')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            @lang('ip.profit_and_loss')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            @lang('ip.revenue_by_client')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            @lang('ip.tax_summary')
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>