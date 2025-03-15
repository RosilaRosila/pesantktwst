<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light fixed-top">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <section class="content">
        <!-- Default box -->
        <div class="card-body text-success">
            @yield('content')
        </div>
    </section>



    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto" class="notification-list">
        <!-- Dropdown Menu Pesan Tiket Pengunjung -->
        @can('notif-list')
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                <i class="far fa-bell" style="margin-right:8px"></i>
                <span class="badge badge-info navbar-badge" style="font-size:10px">
                    {{ auth()->user()->unreadNotifications->count() }}
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="min-width: 22rem;">

                @foreach($notifications as $notification)
                <a href="{{ url($notification->data['url']. '?id='.$notification->id) }}" class="dropdown-item">
                    <div class="media">
                        <img src="{{ asset('images/user-account-profil.png') }}" alt="User Avatar" class="img-size-10 mr-3 img-circle" style="height: 50px;">
                        <div class="media-body">
                            <h3 class="dropdown-item-title" style="font-weight: bold;">
                                {{ $notification->data['title'] }}
                            </h3>
                            <hr>
                            <p class="text-sm" style="font-weight: bold;">{{ $notification->data['body'] }} </p>
                            <p class="text-sm"> {{ $notification->data['messages'] }} </p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{ $notification->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    <form action="{{ route('markAsRead', $notification->id) }}" method="POST" class="mark-as-read">
                        @csrf
                        <button type="submit" class="btn btn-link">
                            <p class="icon-unread float-right" style="font-size:20px">&#9733;</p>
                        </button>
                    </form>

                </a>
                <div class="dropdown-divider mb-2"></div>
                @endforeach
                <div class="see-all mt-3" style="text-align: center;">
                    <a href="{{ route('notifications.all') }}" class="text-link" style="text-decoration:none; color:black; text-align:center;">See All Messages</a>
                </div>
            </div>
        </li>
        @endcan


        <li class="nav-item">
            <a class="nav-link">
                <i class="fas fa-user"></i>
            </a>
        </li>
    </ul>
</nav>


<!-- /.navbar -->