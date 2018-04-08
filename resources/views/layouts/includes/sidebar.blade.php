<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            @each('layouts.includes._sidebar_item', $menus, 'menu')
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
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>