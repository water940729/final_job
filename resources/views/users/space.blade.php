@include('../common/aside')
@include('../common/header')
@include('../common/footer')
<body class="overflow-hidden" xmlns="http://www.w3.org/1999/html">
<div class="wrapper preload">
<div class="main-container">
    <div class="padding-md">
        <h3 class="header-text m-bottom-md">
            {{$userInfo['username']}}
						<span class="sub-header">
							企业信息管理
						</span>
        </h3>

        <div class="row user-profile-wrapper">
            <div class="col-md-3 user-profile-sidebar m-bottom-md">
                <div class="row">
                    <div class="col-sm-4 col-md-12">
                        <div class="user-profile-pic">
                            <img src="image/min_logo.png" alt="">
                            <div class="ribbon-wrapper">
                                <div class="ribbon-inner shadow-pulse bg-success">
                                    Elite
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-12">
                        <div class="user-name m-top-sm">{{$userInfo['username']}}<i class="fa fa-circle text-success m-left-xs font-14"></i></div>

                        <div class="m-top-sm">
                            <div>
                                <i class="fa fa-map-marker user-profile-icon"></i>
                               上次登录：
                                @if(!empty($address))
                                {{$address}}
                                @else
                                    无
                                @endif
                            </div>

                            <div class="m-top-xs">
                                <i class="fa fa-briefcase user-profile-icon"></i>
                                @if(isset($userInfo['cbeTime']))
                                    注册时间：{{date("Y/m/d H:i:s",$userInfo['cbeTime'])}}
                                @else
                                    注册时间：123456
                                @endif
                            </div>

                            <div class="m-top-xs">
                                <i class="fa  user-profile-icon"><strong>$</strong></i>
                                @if(isset($userInfo['cbeBalance']))
                                账户余额：{{$userInfo['cbeBalance']}}
                                    @else
                                账户余额：0.0
                                    @endif
                            </div>
                        </div>

                        <div class="m-top-sm text-centers smart-widget-inner">
                            <a href="#profileTab2" data-toggle="tab" id="btnEdit" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>编辑资料</a>
                        </div>


                    </div>
                </div><!-- ./row -->
            </div><!-- ./col -->
            <div class="col-md-8">
                <div class="smart-widget">
                    <div class="smart-widget-inner">
                        <ul class="nav nav-tabs tab-style2 tab-right bg-grey">

                            <li id="activeEdit">
                                <a href="#profileTab2" data-toggle="tab">
                                    <span class="icon-wrapper"><i class="fa fa-book"></i></span>
                                    <span class="text-wrapper">编辑信息</span>
                                </a>
                            </li>


                            <li class="active">
                                <a href="#profileTab1" data-toggle="tab">
                                    <span class="icon-wrapper"><i class="fa fa-trophy"></i></span>
                                    <span class="text-wrapper">企业信息</span>
                                </a>
                            </li>
                            <li>
                                <a href="#profileTab3" data-toggle="tab">
                                    <span class="icon-wrapper"><i class="fa fa-trophy"></i></span>
                                    <span class="text-wrapper">登陆信息</span>
                                </a>
                            </li>

                        </ul>
                        <div class="smart-widget-body">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="profileTab1">
                                    <h4 class="header-text m-top-md">企业信息</h4>
                                    <form class="form-horizontal m-top-md">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">企业名称</label>
                                            <div class="col-sm-7">
                                                <text  class="form-control">{{$userInfo['username']}}</text>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">企业账号</label>
                                            <div class="col-sm-7">
                                                <text  class="form-control">
                                                    @if(isset($userInfo['cbeAccount']))
                                                    {{$userInfo['cbeAccount']}}
                                                    @else
                                                        1549@qq.com
                                                    @endif

                                                </text>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">企业编号</label>
                                            <div class="col-sm-7">
                                                <text class="form-control">
                                                    @if(isset($userInfo['cbeNo']))
                                                    {{$userInfo['cbeNo']}}
                                                        @else
                                                    未填写
                                                        @endif
                                                </text>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">企业代码</label>
                                            <div class="col-sm-7">
                                                <text class="form-control">
                                                    @if(isset($userInfo['cbeCode'])&&!empty($userInfo['cbeCode']))
                                                        {{$userInfo['cbeCode']}}
                                                    @else
                                                        未填写
                                                    @endif
                                                </text>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">默认物流</label>
                                            <div class="col-sm-7">
                                                <text class="form-control">
                                                    @if(isset($userInfo['Logist']))
                                                        {{$userInfo['Logist']}}
                                                    @else
                                                        未选择
                                                    @endif
                                                </text>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">接入方式</label>
                                            <div class="col-sm-7">
                                                <div class="radio inline-block">
                                                    <div class="custom-radio m-right-xs">
                                                        <input type="radio" id="inlineRadio1" name="profileGender" checked>

                                                        {{--@if(empty($usernfo['cebChoice']))--}}
                                                        {{--<input type="radio" id="inlineRadio1" name="profileGender" checked>--}}
                                                        {{--@else--}}
                                                            {{--<input type="radio" id="inlineRadio1" name="profileGender">--}}
                                                        {{--@endif--}}
                                                        <label for="inlineRadio1"></label>
                                                    </div>
                                                    <div class="inline-block vertical-top">
                                                        @if(empty($usernfo['cbeChoice'])||$userInfo['cbeChoice']==1)
                                                            手动
                                                        @else
                                                        自动
                                                        @endif
                                                    </div>
                                                </div>

                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">手机号</label>
                                            <div class="col-sm-7">
                                                <text class="form-control">
                                                    @if(isset($userInfo['phone'])&&!empty($userInfo['phone']))
                                                        {{$userInfo['phone']}}
                                                    @else
                                                        未填写
                                                    @endif

                                                </text>
                                            </div>
                                        </div>
                                    </form>


                                </div><!-- ./tab-pane -->
                                <div class="tab-pane fade" id="profileTab2">
                                    <h4 class="header-text m-top-md">编辑信息</h4>
                                    <form class="form-horizontal m-top-md" id="infoEdit" action = "infoEdit">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">企业名称</label>
                                            <div class="col-sm-7">
                                                <text  class="form-control">{{$userInfo['username']}}</text>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">企业账号</label>
                                            <div class="col-sm-7">
                                                @if(isset($userInfo['cbeAccount']))
                                                <input type="text"  class="form-control" id="Account" value="{{$userInfo['cbeAccount']}}">

                                                @else
                                                    <input type="text"  class="form-control" value="154@qq.com">
                                                    @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">企业编号</label>
                                            <div class="col-sm-7">
                                                <text class="form-control">
                                                    @if(isset($userInfo['cbeNo']))
                                                        {{$userInfo['cbeNo']}}
                                                    @else
                                                        未填写
                                                    @endif
                                                </text>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">企业代码</label>
                                            <div class="col-sm-7">
                                                    @if(isset($userInfo['cbeCode'])&&!empty($userInfo['cbeCode']))
                                                        <input type="text" class="form-control" id="Code" value="{{$userInfo['cbeCode']}}">
                                                        {{$userInfo['cbeCode']}}
                                                    @else
                                                    <input type="text" class="form-control" id="Code" value="未填写">
                                                    @endif
                                                </text>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">手机号</label>
                                            <div class="col-sm-7">
                                                    @if(isset($userInfo['phone'])&&!empty($userInfo['phone']))
                                                        <input type="text" class="form-control" id="phone" value="{{$userInfo['phone']}}">
                                                    @else
                                                        <input type="text" class="form-control" id="phone" value="未填写">
                                                    @endif

                                                </text>
                                            </div>
                                        </div>
                                        <div class="form-group m-top-lg">
                                            <label class="col-sm-3 control-label"></label>
                                            <div class="col-sm-9">
                                                <input  type="button" class="btn btn-default" id ="infoSave"value="保存">
                                                <input type="reset" class="btn btn-info m-left-xs" value="重置">
                                            </div>
                                        </div>
                                        </form>
                                    <form class="form-horizontal m-top-md" id="passEdit" action = "passEdit">
                                        <h4 class="header-text m-top-lg">修改密码</h4>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">旧密码</label>
                                            <div class="col-sm-7">
                                                <input type="password" class="form-control" id="oldPass" value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">新密码</label>
                                            <div class="col-sm-7">
                                                <input type="password" class="form-control" id="newPass" value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">确认密码</label>
                                            <div class="col-sm-7">
                                                <input type="password" class="form-control" id="repeatPass" value="">
                                            </div>
                                        </div>



                                        <div class="form-group m-top-lg">
                                            <label class="col-sm-3 control-label"></label>
                                            <div class="col-sm-9">
                                                <input  type="button" class="btn btn-default" id ="passSave"value="修改">
                                                <input type="reset" class="btn btn-info m-left-xs" value="重置">
                                            </div>
                                        </div>
                                    </form>
                                </div><!-- ./tab-pane -->
                                <div class="tab-pane fade" id="profileTab3">
                                    <div class="profile-follower-list clearfix">
                                        <ul>
                                            <table class="table" id="">
                                                <thead >
                                                <tr >
                                                    <th>登陆地址</th>
                                                    <th>登陆IP</th>
                                                    <th>登陆时间</th>

                                                </tr>
                                                </thead>
                                                @foreach($ip as $key=>$value)
                                                <tr>
                                                    <td>
                                                        {{$value['address']}}
                                                    </td>
                                                    <td>
                                                        {{$value['cbeLoginIP']}}
                                                    </td>
                                                    <td>
                                                        {{date("Y/m/d H:i:s",$value['cbeLoginTime'])}}
                                                    </td>
                                                </tr>
                                                    @endforeach

                                            </table>

                                        </ul>
                                    </div><!-- ./profile-follower-list -->
                                </div><!-- ./tab-pane -->
                            </div><!-- ./tab-content -->
                        </div><!-- ./smart-widget-body -->
                    </div><!-- ./smart-widget-inner -->
                </div><!-- ./smart-widget -->
            </div>
        </div>
    </div><!-- ./padding-md -->
</div><!-- /main-container -->
</div>


