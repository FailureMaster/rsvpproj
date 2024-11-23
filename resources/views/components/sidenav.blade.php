<div class="sidebar">
    <!-- start with head -->
    <div class="head">
        <div class="logo">
        <img src="{{asset('login/images/macavent.jpg')}}" alt="">
        </div>
        <a href="#" class="btn btn-danger">add a new guest</a>
    </div>
    <!-- end with head -->
    <!-- start the list -->
    <div id="list">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>
    
            <li class="nav-item">
                <a href="{{ route('guest.create') }}" class="nav-link {{ Request::routeIs('guest.create') ? 'active' : '' }}">
                    <i class="fas fa-users"></i> Guests List
                </a>
            </li>
    
            <li class="nav-item">
                <a href="{{ route('plusone.index') }}" class="nav-link {{ Request::routeIs('plusone.index') ? 'active' : '' }}">
                    <i class="fas fa-user-plus"></i> Plus Ones List
                </a>
            </li>
    
            <li class="nav-item">
                <a href="{{ route('guest.attendance') }}" class="nav-link {{ Request::routeIs('guest.attendance') ? 'active' : '' }}">
                    <i class="fas fa-calendar-check"></i> Event Attendance
                </a>
            </li>
    
            <li class="nav-item">
                <a href="{{ route('admin.admins') }}" class="nav-link {{ Request::routeIs('admin.admins') ? 'active' : '' }}">
                    <i class="fas fa-user-shield"></i> Admins
                </a>
            </li>
        </ul>
    </div>
    
    <!-- end the list -->
</div>