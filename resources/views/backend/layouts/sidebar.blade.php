<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
    <div class="position-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-tachometer-alt"></i> Dashboard
                </a>
            </li>

            <!-- Dropdown with expanded view -->
            <li class="nav-item">
                <a class="nav-link dropdown-toggle {{ request()->routeIs('admin.hotels.*') ? 'active' : '' }}" href="#" id="hotelsDropdown" role="button" data-bs-toggle="collapse" data-bs-target="#collapseHotels" aria-expanded="false">
                    <i class="fa fa-hotel"></i> Hotels
                </a>
                <div id="collapseHotels" class="collapse {{ request()->routeIs('admin.hotels.*') ? 'show' : '' }}">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.hotels.index') }}">All Hotels</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.hotels.create') }}">Add New Hotel</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link dropdown-toggle {{ request()->routeIs('admin.rooms.*') ? 'active' : '' }}" href="#" id="roomsDropdown" role="button" data-bs-toggle="collapse" data-bs-target="#collapseRooms" aria-expanded="false">
                    <i class="fa fa-bed"></i> Rooms
                </a>
                <div id="collapseRooms" class="collapse {{ request()->routeIs('admin.rooms.*') ? 'show' : '' }}">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.rooms.index') }}">All Rooms</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.rooms.create') }}">Add New Room</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link dropdown-toggle {{ request()->routeIs('admin.bookings.*') ? 'active' : '' }}" href="#" id="bookingsDropdown" role="button" data-bs-toggle="collapse" data-bs-target="#collapseBookings" aria-expanded="false">
                    <i class="fa fa-calendar-check"></i> Bookings
                </a>
                <div id="collapseBookings" class="collapse {{ request()->routeIs('admin.bookings.*') ? 'show' : '' }}">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.bookings.index') }}">All Bookings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.bookings.create') }}">Add New Booking</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link dropdown-toggle {{ request()->routeIs('admin.users.*') ? 'active' : '' }}" href="#" id="usersDropdown" role="button" data-bs-toggle="collapse" data-bs-target="#collapseUsers" aria-expanded="false">
                    <i class="fa fa-users"></i> Users
                </a>
                <div id="collapseUsers" class="collapse {{ request()->routeIs('admin.users.*') ? 'show' : '' }}">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.users.index') }}">All Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.users.create') }}">Add New User</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link dropdown-toggle {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}" href="#" id="settingsDropdown" role="button" data-bs-toggle="collapse" data-bs-target="#collapseSettings" aria-expanded="false">
                    <i class="fa fa-cogs"></i> Settings
                </a>
                <div id="collapseSettings" class="collapse {{ request()->routeIs('admin.settings.*') ? 'show' : '' }}">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.settings.edit') }}">Edit Settings</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out-alt"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>
