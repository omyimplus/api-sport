<div class="sidebar" data-color="orange" data-background-color="black">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="{{url('/home')}}" class="simple-text logo-normal">
        API-MM88
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
        <li class="nav-item{{ $activePage == 'blogs' ? ' active' : '' }}">
            <a class="nav-link" href="{{ url('/blogs') }}">
                <span class="sidebar-mini"> <i class="fas fa-rss text-danger"></i> </span>
                <span class="sidebar-normal">{{ __('ข่าวกีฬา') }} </span>
            </a>
        </li>
        <li class="nav-item{{ $activePage == 'analyze' ? ' active' : '' }}">
            <a class="nav-link" href="{{ url('/analyze') }}">
                <span class="sidebar-mini"> <i class="fas fa-volleyball-ball text-danger"></i> </span>
                <span class="sidebar-normal">{{ __('บทวิเคราะห์') }} </span>
            </a>
        </li>
        <li class="nav-item{{ $activePage == 'youtube' ? ' active' : '' }}">
            <a class="nav-link" href="{{ url('/youtube') }}">
                <span class="sidebar-mini"> <i class="fab fa-youtube text-danger"></i> </span>
                <span class="sidebar-normal">{{ __('คลิปยูทูป') }} </span>
            </a>
        </li>
        <li class="nav-item{{ $activePage == 'tstep' ? ' active' : '' }}">
            <a class="nav-link" href="{{ url('/tstep') }}">
                <span class="sidebar-mini"> <i class="fab fa-angellist text-danger"></i> </span>
                <span class="sidebar-normal">{{ __('ทีเด็ดสเต็ป') }} </span>
            </a>
        </li>
        <li class="nav-item{{ $activePage == 'lotto' ? ' active' : '' }}">
            <a class="nav-link" href="{{ url('/lotto') }}">
                <span class="sidebar-mini"> <i class="far fa-money-bill-alt text-danger"></i> </span>
                <span class="sidebar-normal">{{ __('หวยรัฐบาล') }} </span>
            </a>
        </li>
        {{-- <li class="nav-item{{ $activePage == 'setup' ? ' active' : '' }}">
            <a class="nav-link" href="{{ url('/setup') }}">
                <span class="sidebar-mini"> <i class="fas fa-cogs text-danger"></i> </span>
                <span class="sidebar-normal">{{ __('ตั้งค่า') }} </span>
            </a>
        </li> --}}
        <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('user.index') }}">
                <i class="fas fa-user text-danger"></i>
                <span class="sidebar-normal"> {{ __('จัดการสมาชิก') }} </span>
            </a>
        </li>
    </ul>
  </div>
</div>
