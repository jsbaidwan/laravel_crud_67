@php 
    //echo Request::path();die;
    $meanu_arr = array(
        'Customers' => array(
            'url' => url('/customers'),
            'icon' => 'fa fa-users',
            'sub_menus' => array('customers','add_customer'),
        ),
    );
@endphp
<div class="dashboard-nav">
    <div class="dashboard-nav-inner">
        <ul>
            @foreach($meanu_arr as $menu_name => $sub_menus)
                @php 
                    $current_page = Request::path();
                    if(strpos(Request::path(), '/') !== false) {
                        $current_page = explode('/', Request::path());
                        $current_page = $current_page[0];
                    } 
                    if($current_page == '') {
                        $current_page = 'customers';
                    }
                    $class = '';
                    if(in_array($current_page, $sub_menus['sub_menus'])) {
                        $class = 'active';
                    }
                @endphp
                <li class="{{$class}}"><a href="{{$sub_menus['url']}}"><i class="{{$sub_menus['icon']}}"></i> {{$menu_name}}</a></li>
            @endforeach
        </ul>
    </div>
</div>