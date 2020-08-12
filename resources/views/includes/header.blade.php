<style type="text/css">
    .profile-sec {
        background: #fff;
        display: -webkit-inline-box;
    }

    .profile-sec h4 {
        color: #005294;
    }

    .profile-sec span {
        color: #005294;
    }

    .profile-sec .dash-content {
        padding-bottom: 10px;
        display: -webkit-box;
        margin-top: 14px;
    }
    .content-left{
        padding: 29px 0px;
    }
    .open>.profile{
        padding: 20px 0px;
    }
</style>
<div class="dashboard-sticky-nav">
    <div class="content-left pull-left">
        <a href="{{url('dashboard')}}" style="color:#fff; font-weight:800; font-size:30px;">CRUD DEMO</a>
    </div>
    <div class="content-right pull-right">
        <!-- <div class="search-bar">
            <form>
                <div class="form-group">
                    <input type="text" class="form-control" id="search" placeholder="Search Now">
                    <a href="#"><span class="search_btn"><i class="fa fa-search" aria-hidden="true"></i></span></a>
                </div>
            </form>
        </div> -->
        <div class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown">
                <div class="profile-sec">
                    <div class="dash-image">
                        <img src="{{asset('public/images/comment.jpg')}}" alt="">
                    </div>
                    <div>

                    </div>
                </div>
            </a>
            <!-- <ul class="dropdown-menu profile">
                <li><a href="{{url('edit_profile')}}"><i class="sl sl-icon-user"></i>Profile</a></li>
                <li><a href="{{url('change_password')}}"><i class="sl sl-icon-lock"></i>Change Password</a></li>
                <li><a href="{{url('logout')}}"><i class="sl sl-icon-power"></i>Logout</a></li> -->
            </ul>
        </div>
        <!-- <div class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown">
                <div class="dropdown-item">
                    <i class="sl sl-icon-envelope-open"></i>
                    <span class="notify">3</span>
                </div>
            </a>
            <div class="dropdown-menu notification-menu">
                <h4> 23 Messages</h4>
                <ul>
                    <li>
                        <a href="#">
                            <div class="notification-item">
                                <div class="notification-image">
                                    <img src="{{asset('public/images/comment.jpg')}}" alt="">
                                </div>
                                <div class="notification-content">
                                    <p>You have a notification.</p><span class="notification-time">2 hours
                                        ago</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="notification-item">
                                <div class="notification-image">
                                    <img src="{{asset('images/comment.jpg')}}" alt="">
                                </div>
                                <div class="notification-content">
                                    <p>You have a notification.</p><span class="notification-time">2 hours
                                        ago</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="notification-item">
                                <div class="notification-image">
                                    <img src="images/comment.jpg" alt="">
                                </div>
                                <div class="notification-content">
                                    <p>You have a notification.</p><span class="notification-time">2 hours
                                        ago</span>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
                <p class="all-noti"><a href="#">See all messages</a></p>
            </div>
        </div>
        <div class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown">
                <div class="dropdown-item">
                    <i class="sl sl-icon-bell"></i>
                    <span class="notify">3</span>
                </div>
            </a>
            <div class="dropdown-menu notification-menu">
                <h4> 599 Notifications</h4>
                <ul>
                    <li>
                        <a href="#">
                            <div class="notification-item">
                                <div class="notification-image">
                                    <img src="images/comment.jpg" alt="">
                                </div>
                                <div class="notification-content">
                                    <p>You have a notification.</p><span class="notification-time">2 hours
                                        ago</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="notification-item">
                                <div class="notification-image">
                                    <img src="images/comment.jpg" alt="">
                                </div>
                                <div class="notification-content">
                                    <p>You have a notification.</p><span class="notification-time">2 hours
                                        ago</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="notification-item">
                                <div class="notification-image">
                                    <img src="images/comment.jpg" alt="">
                                </div>
                                <div class="notification-content">
                                    <p>You have a notification.</p><span class="notification-time">2 hours
                                        ago</span>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
                <p class="all-noti"><a href="#">See all notifications</a></p>
            </div>
        </div> -->
    </div>
</div>
<!-- <div class="container-fluid sb1">
    <div class="row">
        <div class="col-md-2 col-sm-3 col-xs-6 sb1-1">
            <a href="#" class="btn-close-menu"><i class="fa fa-times" aria-hidden="true"></i></a>
            <a href="#" class="atab-menu"><i class="fa fa-bars tab-menu" aria-hidden="true"></i></a>
            <a href="index.html" class="logo"><img src="{{asset('public/images/logo1.png')}}" alt="" />
            </a>
        </div>
        <div class="col-md-6 col-sm-6 mob-hide">
            <form class="app-search">
                <input type="text" placeholder="Search..." class="form-control">
                <a href="#"><i class="fa fa-search"></i></a>
            </form>
        </div>
        <div class="col-md-2 tab-hide">
            <div class="top-not-cen">
                <a class='waves-effect btn-noti' href='#'><i class="fa fa-commenting-o"
                        aria-hidden="true"></i><span>5</span></a>
                <a class='waves-effect btn-noti' href='#'><i class="fa fa-envelope-o"
                        aria-hidden="true"></i><span>5</span></a>
                <a class='waves-effect btn-noti' href='#'><i class="fa fa-tag" aria-hidden="true"></i><span>5</span></a>
            </div>
        </div>
        <div class="col-md-2 col-sm-3 col-xs-6">
            <a class='waves-effect dropdown-button top-user-pro' href='#' data-activates='top-menu'><img
                    src="{{asset('public/images/user/6.png')}}" alt="" />My Account <i class="fa fa-angle-down" aria-hidden="true"></i>
            </a>

            <ul id='top-menu' class='dropdown-content top-menu-sty'>

                <li><a href="{{url('/edit_profile')}}" class="waves-effect"><i class="fa fa-user-plus" aria-hidden="true"></i> Profile</a>
                <li><a href="{{url('/change_password')}}" class="waves-effect"><i class="fa fa-user-plus" aria-hidden="true"></i> Change Password</a>
                <li class="divider"></li>
                <li><a href="{{url('/logout')}}" class="ho-dr-con-last waves-effect"><i class="fa fa-sign-in" aria-hidden="true"></i>
                        Logout</a>
                </li>
            </ul>
        </div>
    </div>
</div> -->