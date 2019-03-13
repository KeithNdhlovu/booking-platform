<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li> 
                    <a class="waves-effect waves-dark" href="{{ url('/home') }}" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                </li>
                <li> 
                    <a class="waves-effect waves-dark" href="{{ url('/profile') }}" aria-expanded="false"><i class="mdi mdi-account-check"></i><span class="hide-menu">Profile</span></a>
                </li>
                <li> 
                    <a class="waves-effect waves-dark" href="{{ url('/tickets') }}" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Tickets</span></a>
                </li>
                <li> 
                    <a class="waves-effect waves-dark" href="{{ url('/orders') }}" aria-expanded="false"><i class="mdi mdi-earth"></i><span class="hide-menu">Orders</span></a>
                </li>
                <li> 
                    <a class="waves-effect waves-dark" href="{{ url('/transactions') }}" aria-expanded="false"><i class="mdi mdi-currency-usd"></i><span class="hide-menu">Transactions</span></a>
                </li>
                <!-- 
                <li> <a class="waves-effect waves-dark" href="pages-blank.html" aria-expanded="false"><i class="mdi mdi-book-open-variant"></i><span class="hide-menu">Blank Page</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="pages-error-404.html" aria-expanded="false"><i class="mdi mdi-help-circle"></i><span class="hide-menu">Error 404</span></a>
                </li> -->
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <!-- Bottom points-->
    <div class="sidebar-footer">
        <!-- item--><a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
        <!-- item--><a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
        <!-- item--><a href="" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a> </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    <!-- End Bottom points-->
</aside>