<nav class="navbar fixed-top navbar-expand-lg navbar-dark">
    <div class="collapse navbar-collapse">
        <a href="/home" class="navbar-brand">
            <img src="{{ asset('image/logo02-300x270.png')}}"
            alt="log not found" class="logo" height="110" width="130">
        </a>
        
        <div>
            <h1 style="font-family:Prompt" class="header1">ระบบทะเบียนสินทรัพย์</h1>
            <h1 style="font-family:Prompt" class="header2">สถาบันพระจอมเกล้าเจ้าคุณทหารลาดกระบัง <br>King Mongkut Institute of Technology Ladrabang</h1>
        </div>
    
    </div>
    <ul class="nav nav-pills">
            @if(Auth::check())
            <li class="nav-item">
                <a class="nav-link {{ request()->is('home') ? 'active' : '' }}" href="{{ route('home') }}">หน้าหลัก</a>
            </li>
            @can('package-create')
            <li class="nav-item">
                <a class="nav-link {{ request()->is('packages_register') ? 'active' : '' }}" href="{{ route('Packages_register') }}">ลงทะเบียนคุรุภัณฑ์</a>
            </li>
            @endcan
            <li class="nav-item">
                <a class="nav-link {{ request()->is('search') ? 'active' : '' }}" href="{{ route('search') }}">ค้นหา</a>
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
@push('scripts')
<script type="text/javascript">
    $('.navbar-nav .nav-link').click(function(){
        $('.navbar-nav .nav-link').removeClass('active');
        $(this).addClass('active');
    })
</script>
@endpush