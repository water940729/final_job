<aside class="sidebar-menu fixed">
    <div class="sidebar-inner scrollable-sidebar">
        <div class="main-menu">
            <ul class="accordion">
                <li class="menu-header">
                    Main Menu
                </li>
                <li class="bg-palette1">
                    <a href="index.html">
									<span class="menu-content block">
										<span class="menu-icon"><i class="block fa fa-home fa-lg"></i></span>
										<span class="text m-left-sm">首页</span>
									</span>
									<span class="menu-content-hover block">
										Home
									</span>
                    </a>
                </li>
                <li class="bg-palette2 ">
                    @if($userInfo['asideToken']=="manager")
                    <a href="userspace" style="color: white">
                        @else
                            <a href="userspace">
                                @endif
									<span class="menu-content block">
										<span class="menu-icon"><i class="block fa fa-desktop fa-lg"></i></span>
										<span class="text m-left-sm">企业信息管理</span>
									</span>
									<span class="menu-content-hover block">
										Landing
									</span>
                    </a>
                </li>

                <li class="bg-palette4">
                    @if($userInfo['asideToken']=="logistics")
                    <a href="logistics" style="color: white">
                        @else
                            <a href="logistics">
                                @endif
									<span class="menu-content block">
										<span class="menu-icon"><i class="block fa fa-gift fa-lg"></i></span>
										<span class="text m-left-sm">物流管理</span>
									</span>
									<span class="menu-content-hover block">
										Home
									</span>
                    </a>
                </li>
                @if($userInfo['asideToken']=="orderlist"||$userInfo['asideToken']=="unfinished"||$userInfo['asideToken']=="finished")
                <li class="openable bg-palette3 open">
                @else
                    <li class="openable bg-palette3">
                        @endif

                    <a href="#">
									<span class="menu-content block">
										<span class="menu-icon"><i class="block fa fa-list fa-lg"></i></span>
										<span class="text m-left-sm">企业订单管理</span>
										<spa class="submenu-icon"></spa>
									</span>
									<span class="menu-content-hover block">
										Form
									</span>
                    </a>
                    <ul class="submenu bg-palette3">
                        {{--<li><a href="form_element.html"><span class="submenu-label">企业信息管理</span></a></li>--}}
                        <li><a href="unfinished" ><span class="submenu-label" class ="active">未完成订单</span></a></li>
                        <li><a href="finished"><span class="submenu-label">已完成订单</span></a></li>
                        <li><a href="orderlist"><span class="submenu-label">全部订单</span></a></li>
                        {{--<li><a href="dropzone.html"><span class="submenu-label">Dropzone</span></a></li>--}}
                    </ul>
                </li>
                @if($userInfo['asideToken']=="account")
                <li class="openable bg-palette5 open">
                @else
                    <li class="openable bg-palette5">
                        @endif

                    <a href="#">
									<span class="menu-content block">
										<span class="menu-icon"><i class="block fa fa-envelope fa-lg"></i></span>
										<span class="text m-left-sm">企业账户管理</span>
										<span class="submenu-icon"></span>
									</span>
									<span class="menu-content-hover block">
										Form
									</span>
                    </a>
                    <ul class="submenu bg-palette5">
                        <li><a href="rechargePage"><span class="submenu-label">账户充值</span></a></li>
                        <li><a href="history"><span class="submenu-label">消费记录</span></a></li>
                        {{--<li><a href="dropzone.html"><span class="submenu-label">Dropzone</span></a></li>--}}
                    </ul>
                </li>

                {{--<li class="openable bg-palette4">--}}
                    {{--<a href="#">--}}
									{{--<span class="menu-content block">--}}
										{{--<span class="menu-icon"><i class="block fa fa-tags fa-lg"></i></span>--}}
										{{--<span class="text m-left-sm">UI Elements</span>--}}
										{{--<span class="submenu-icon"></span>--}}
									{{--</span>--}}
									{{--<span class="menu-content-hover block">--}}
										{{--UI Kits--}}
									{{--</span>--}}
                    {{--</a>--}}
                    {{--<ul class="submenu">--}}
                        {{--<li><a href="ui_element.html"><span class="submenu-label">Basic Elements</span></a></li>--}}
                        {{--<li><a href="button.html"><span class="submenu-label">Button & Icons</span></a></li>--}}
                        {{--<li class="openable open">--}}
                            {{--<a href="#">--}}
                                {{--<small class="badge badge-success badge-square bounceIn animation-delay2 m-left-xs pull-right">2</small>--}}
                                {{--<span class="submenu-label">Tables</span>--}}
                            {{--</a>--}}
                            {{--<ul class="submenu third-level">--}}
                                {{--<li><a href="static_table.html"><span class="submenu-label">Static Table</span></a></li>--}}
                                {{--<li class="active"><a href="users"><span class="submenu-label">订单列表</span></a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li><a href="widget.html"><span class="submenu-label">Widget</span></a></li>--}}
                        {{--<li><a href="tab.html"><span class="submenu-label">Tab</span></a></li>--}}
                        {{--<li><a href="calendar.html"><span class="submenu-label">Calendar</span></a></li>--}}
                        {{--<li><a href="treeview.html"><span class="submenu-label">Treeview</span></a></li>--}}
                        {{--<li><a href="nestable_list.html"><span class="submenu-label">Nestable Lists</span></a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li class="bg-palette1">--}}
                    {{--<a href="inbox.html">--}}
									{{--<span class="menu-content block">--}}
										{{--<span class="menu-icon"><i class="block fa fa-envelope fa-lg"></i></span>--}}
										{{--<span class="text m-left-sm">Inboxs</span>--}}
										{{--<small class="badge badge-danger badge-square bounceIn animation-delay5 m-left-xs">5</small>--}}
									{{--</span>--}}
									{{--<span class="menu-content-hover block">--}}
										{{--Inboxs--}}
									{{--</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="bg-palette2">--}}
                    {{--<a href="timeline.html">--}}
									{{--<span class="menu-content block">--}}
										{{--<span class="menu-icon"><i class="block fa fa-clock-o fa-lg"></i></span>--}}
										{{--<span class="text m-left-sm">Timeline</span>--}}
										{{--<small class="badge badge-warning badge-square bounceIn animation-delay6 m-left-xs pull-right">7</small>--}}
									{{--</span>--}}
									{{--<span class="menu-content-hover block">--}}
										{{--Timeline--}}
									{{--</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="menu-header">--}}
                    {{--Others--}}
                {{--</li>--}}
                {{--<li class="openable bg-palette3">--}}
                    {{--<a href="#">--}}
									{{--<span class="menu-content block">--}}
										{{--<span class="menu-icon"><i class="block fa fa-gift fa-lg"></i></span>--}}
										{{--<span class="text m-left-sm">Extra Pages</span>--}}
										{{--<span class="submenu-icon"></span>--}}
									{{--</span>--}}
									{{--<span class="menu-content-hover block">--}}
										{{--Pages--}}
									{{--</span>--}}
                    {{--</a>--}}
                    {{--<ul class="submenu">--}}
                        {{--<li><a href="signin.html"><span class="submenu-label">Sign in</span></a></li>--}}
                        {{--<li><a href="signup.html"><span class="submenu-label">Sign Up</span></a></li>--}}
                        {{--<li><a href="lockscreen.html"><span class="submenu-label">Lock Screen</span></a></li>--}}
                        {{--<li><a href="profile.html"><span class="submenu-label">Profile</span></a></li>--}}
                        {{--<li><a href="gallery.html"><span class="submenu-label">Gallery</span></a></li>--}}
                        {{--<li><a href="blog.html"><span class="submenu-label">Blog</span></a></li>--}}
                        {{--<li><a href="single_post.html"><span class="submenu-label">Single Post</span></a></li>--}}
                        {{--<li><a href="pricing.html"><span class="submenu-label">Pricing</span></a></li>--}}
                        {{--<li><a href="invoice.html"><span class="submenu-label">Invoice</span></a></li>--}}
                        {{--<li><a href="error404.html"><span class="submenu-label">Error404</span></a></li>--}}
                        {{--<li><a href="blank.html"><span class="submenu-label">Blank</span></a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li class="openable bg-palette4">--}}
                    {{--<a href="#">--}}
									{{--<span class="menu-content block">--}}
										{{--<span class="menu-icon"><i class="block fa fa-list fa-lg"></i></span>--}}
										{{--<span class="text m-left-sm">Menu Level</span>--}}
										{{--<span class="submenu-icon"></span>--}}
									{{--</span>--}}
									{{--<span class="menu-content-hover block">--}}
										{{--Menu--}}
									{{--</span>--}}
                    {{--</a>--}}
                    {{--<ul class="submenu">--}}
                        {{--<li class="openable">--}}
                            {{--<a href="signin.html">--}}
                                {{--<span class="submenu-label">menu 2.1</span>--}}
                                {{--<small class="badge badge-success badge-square bounceIn animation-delay2 m-left-xs pull-right">3</small>--}}
                            {{--</a>--}}
                            {{--<ul class="submenu third-level">--}}
                                {{--<li><a href="#"><span class="submenu-label">menu 3.1</span></a></li>--}}
                                {{--<li><a href="#"><span class="submenu-label">menu 3.2</span></a></li>--}}
                                {{--<li class="openable">--}}
                                    {{--<a href="#">--}}
                                        {{--<span class="submenu-label">menu 3.3</span>--}}
                                        {{--<small class="badge badge-danger badge-square bounceIn animation-delay2 m-left-xs pull-right">2</small>--}}
                                    {{--</a>--}}
                                    {{--<ul class="submenu fourth-level">--}}
                                        {{--<li><a href="#"><span class="submenu-label">menu 4.1</span></a></li>--}}
                                        {{--<li><a href="#"><span class="submenu-label">menu 4.2</span></a></li>--}}
                                    {{--</ul>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li><a href="#"><span class="submenu-label">menu 2.2</span></a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
            </ul>
        </div>
        <div class="sidebar-fix-bottom clearfix">
            <div class="user-dropdown dropup pull-left">
                <a href="#" class="dropdwon-toggle font-18" data-toggle="dropdown"><i class="ion-person-add"></i>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="inbox.html">
                            Inbox
                            <span class="badge badge-danger bounceIn animation-delay2 pull-right">1</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Notification
                            <span class="badge badge-purple bounceIn animation-delay3 pull-right">2</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="sidebarRight-toggle">
                            Message
                            <span class="badge badge-success bounceIn animation-delay4 pull-right">7</span>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">Setting</a>
                    </li>
                </ul>
            </div>
            <a href="lockscreen.html" class="pull-right font-18"><i class="ion-log-out"></i></a>
        </div>
    </div><!-- sidebar-inner -->
</aside>
