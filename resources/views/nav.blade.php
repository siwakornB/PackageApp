<nav class="navbar navbar-expand-lg navbar-light">
    <div class="collapse navbar-collapse">
        <a href="/home" class="navbar-brand">
            <img src="{{ asset('image/logo02-300x270.png')}}"
            alt="log not found" class="logo" height="130" width="150">
        </a>
        
        <div>
            <h1 class="th-kmitl">พระจอมเกล้าเจ้าคุณทหารลาดกระบัง</h1>
            <h1 class="eng-kmitl">King Mongkut Institute of Technology Ladrabang</h1>
        </div>
    
    </div>
    <ul class="nav nav-pills">
            @if(Auth::check())
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('home') }}">หน้าหลัก</a>
            </li>
            @can('package-create')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('Packages_register') }}">ลงทะเบียนคุรุภัณฑ์</a>
            </li>
            @endcan
            <li class="nav-item">
                <a class="nav-link" href="{{ route('search') }}">ค้นหา</a>
            </li>
            <li class="nav-item dropdown">
                    
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            @endif
    </ul> 
    
</nav>
