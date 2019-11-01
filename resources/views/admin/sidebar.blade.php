<div class="sidebar-scroll">
    <nav>
        <ul class="nav">
            <li><a href="/dashboard" class="select"><i class="lnr lnr-home"></i> <span>Home</span></a></li>
            @if(auth()->user()->role == 'admin')
            <li><a href="/siswa" class="select"><i class="lnr lnr-user"></i> <span>Manage Students</span></a></li>
            <li><a href="/mapel" class="select"><i class="lnr lnr-bookmark"></i> <span>Manage Mapel</span></a></li>
            <li><a href="/users" class="select"><i class="lnr lnr-user"></i> <span>Manage Users</span></a></li>
            <li><a href="/teachers" class="select"><i class="lnr lnr-user"></i> <span>Manage teachers</span></a></li>
            <li><a href="/posts" class="select"><i class="lnr lnr-pencil"></i> <span>Manage Posts</span></a></li>
            @endif
            <li><a href="/logout" class="select"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
            <li><a href="/" class="select"><i class="lnr lnr-location"></i> <span>Web</span></a></li>
            </li>
        </ul>
    </nav>
</div>
