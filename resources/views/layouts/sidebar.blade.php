<div id="sidebar" class='active'>
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <img src="{{ asset('assets/images/logo.svg') }}" alt="" srcset="">
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class='sidebar-title'>Main Menu</li>
                <li class="sidebar-item active ">
                    <a href="{{route('positions.index')}}" class='sidebar-link'>
                        <i data-feather="home" width="20"></i>
                        <span>Должности</span>
                    </a>
                </li>
                <li class="sidebar-item active ">
                    <a href="{{route('user_types.index')}}" class='sidebar-link'>
                        <i data-feather="home" width="20"></i>
                        <span>Типы сотрудников</span>
                    </a>
                </li>
                <li class="sidebar-item has-sub">
                    <a href="#" class="sidebar-link">
                        <span>Сотрудники</span>
                    </a>
                    <ul class="submenu active">
                        <li>
                            <a href="{{route('users.index')}}">Все</a>
                        </li>
                        
                        @foreach (\App\Models\UserType::all()->pluck('title', ['id']) as $key => $item)
                            <li>
                                <a href="{{route('users.index', ['user_type_id' => $key])}}">{{$item}}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
