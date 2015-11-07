<header class="header fixed-top clearfix">
    <!--logo start-->
    <div class="brand">
        <a href="/" class="logo">
            Sorcerer
        </a>
    </div>
    <!--logo end-->
    <div class="top-nav clearfix">
        <!--search & user info start-->
        <ul class="nav pull-right top-menu">
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <img alt="" src="/images/user.png">
                    <span class="username">{{Session::get('username')}}</span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">
                    <li><a href="/logout"><i class="fa fa-key"></i> Log Out</a></li>
                </ul>
            </li>
            <!-- user login dropdown end -->
        </ul>
        <!--search & user info end-->
    </div>
</header>