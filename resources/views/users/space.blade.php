@include('../common/aside')
@include('../common/header')
@include('../common/footer')
<body class="overflow-hidden">
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
                        <div class="user-name m-top-sm">Jane Doe<i class="fa fa-circle text-success m-left-xs font-14"></i></div>

                        <div class="m-top-sm">
                            <div>
                                <i class="fa fa-map-marker user-profile-icon"></i>
                               陕西省 西安市 西安电子科技大学
                            </div>

                            <div class="m-top-xs">
                                <i class="fa fa-briefcase user-profile-icon"></i>
                                公司编号：123456
                            </div>

                            <div class="m-top-xs">
                                <i class="fa  user-profile-icon"><strong>$</strong></i>
                                @if(isset($userInfo['account']))
                                {{$userInfo['account']}}
                                    @else
                                账户余额： 0.0
                                    @endif
                            </div>
                        </div>

                        <div class="m-top-sm text-centers">
                            <a href="#profileTab2" data-toggle="tab" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>编辑资料</a>
                        </div>


                    </div>
                </div><!-- ./row -->
            </div><!-- ./col -->
            <div class="col-md-9">
                <div class="smart-widget">
                    <div class="smart-widget-inner">
                        <ul class="nav nav-tabs tab-style2 tab-right bg-grey">

                            <li>
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

                        </ul>
                        <div class="smart-widget-body">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="profileTab1">
                                    <h4 class="header-text m-top-md">编辑信息</h4>
                                    <form class="form-horizontal m-top-md">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">企业名称</label>
                                            <div class="col-sm-9">
                                                <text  class="form-control">{{$userInfo['username']}}</text>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">企业编号</label>
                                            <div class="col-sm-9">
                                                <text class="form-control">
                                                    @if(isset($userInfo['beNo']))
                                                    {{$userInfo['cbeNo']}}
                                                        @else
                                                    12345678
                                                        @endif
                                                </text>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Gender</label>
                                            <div class="col-sm-9">
                                                <div class="radio inline-block">
                                                    <div class="custom-radio m-right-xs">
                                                        <input type="radio" id="inlineRadio1" name="profileGender">
                                                        <label for="inlineRadio1"></label>
                                                    </div>
                                                    <div class="inline-block vertical-top">Male</div>
                                                </div>
                                                <div class="radio inline-block m-left-sm">
                                                    <div class="custom-radio m-right-xs">
                                                        <input type="radio" id="inlineRadio2" name="profileGender">
                                                        <label for="inlineRadio2"></label>
                                                    </div>
                                                    <div class="inline-block vertical-top">Female</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Address</label>
                                            <div class="col-sm-9">
                                                <textarea rows="4" class="form-control"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Phone</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Website</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="">
                                            </div>
                                        </div>

                                        <h4 class="header-text m-top-lg">Security Setting</h4>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Security Question</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Security Browsing</label>
                                            <div class="col-sm-9">
                                                <div class="m-top-xs">
                                                    <div class="custom-checkbox">
                                                        <input type="checkbox" id="securityChk1">
                                                        <label for="securityChk1"></label>
                                                    </div>
                                                    Yes
                                                    <div class="custom-checkbox m-left-sm">
                                                        <input type="checkbox" id="securityChk2">
                                                        <label for="securityChk2"></label>
                                                    </div>
                                                    No
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group m-top-lg">
                                            <label class="col-sm-3 control-label"></label>
                                            <div class="col-sm-9">
                                                <a class="btn btn-default">Submit</a>
                                                <a class="btn btn-info m-left-xs">Cancel</a>
                                            </div>
                                        </div>
                                    </form>

                                </div><!-- ./tab-pane -->
                                <div class="tab-pane fade" id="profileTab2">
                                    <h4 class="header-text m-top-md">编辑信息</h4>
                                    <form class="form-horizontal m-top-md">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="Jane Doe">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Surname</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Gender</label>
                                            <div class="col-sm-9">
                                                <div class="radio inline-block">
                                                    <div class="custom-radio m-right-xs">
                                                        <input type="radio" id="inlineRadio1" name="profileGender">
                                                        <label for="inlineRadio1"></label>
                                                    </div>
                                                    <div class="inline-block vertical-top">Male</div>
                                                </div>
                                                <div class="radio inline-block m-left-sm">
                                                    <div class="custom-radio m-right-xs">
                                                        <input type="radio" id="inlineRadio2" name="profileGender">
                                                        <label for="inlineRadio2"></label>
                                                    </div>
                                                    <div class="inline-block vertical-top">Female</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Address</label>
                                            <div class="col-sm-9">
                                                <textarea rows="4" class="form-control"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Phone</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Website</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="">
                                            </div>
                                        </div>

                                        <h4 class="header-text m-top-lg">Security Setting</h4>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Security Question</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Security Browsing</label>
                                            <div class="col-sm-9">
                                                <div class="m-top-xs">
                                                    <div class="custom-checkbox">
                                                        <input type="checkbox" id="securityChk1">
                                                        <label for="securityChk1"></label>
                                                    </div>
                                                    Yes
                                                    <div class="custom-checkbox m-left-sm">
                                                        <input type="checkbox" id="securityChk2">
                                                        <label for="securityChk2"></label>
                                                    </div>
                                                    No
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group m-top-lg">
                                            <label class="col-sm-3 control-label"></label>
                                            <div class="col-sm-9">
                                                <a class="btn btn-default">Submit</a>
                                                <a class="btn btn-info m-left-xs">Cancel</a>
                                            </div>
                                        </div>
                                    </form>
                                </div><!-- ./tab-pane -->
                                <div class="tab-pane fade" id="profileTab3">
                                    <div class="profile-follower-list clearfix">
                                        <ul>
                                            <li>
                                                <div class="panel panel-default clearfix">
                                                    <div class="panel-body">
                                                        <div class="user-wrapper">
                                                            <div class="user-avatar">
                                                                <img class="small-img img-circle img-thumbnail" src="images/profile/profile2.jpg" alt="">
                                                            </div>
                                                            <div class="user-detail small-img">
                                                                <div class="font-16">Karen Martin</div>
                                                                <small class="block text-muted font-12">Web Designer</small>
                                                                <small>
                                                                    <small class="freelancer-rating">
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-warning"></i>
                                                                    </small>
                                                                </small>

                                                                <div class="m-top-sm">
                                                                    <button type="button" class="btn btn-default btn-sm marginTB-xs" disabled="" data-toggle="modal">following</button>
                                                                    <button type="button" class="btn btn-success btn-sm marginTB-xs" data-toggle="modal">View Profile</button>
                                                                </div>
                                                            </div>
                                                        </div><!-- ./user-wrapper -->
                                                    </div>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="panel panel-default clearfix">
                                                    <div class="panel-body">
                                                        <div class="user-wrapper">
                                                            <div class="user-avatar">
                                                                <img class="small-img img-circle img-thumbnail" src="images/profile/profile3.jpg" alt="">
                                                            </div>
                                                            <div class="user-detail small-img">
                                                                <div class="font-16">Sarah Garcia</div>
                                                                <small class="block text-muted font-12">Content Writing</small>
                                                                <small>
                                                                    <small class="freelancer-rating">
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-warning"></i>
                                                                    </small>
                                                                </small>

                                                                <div class="m-top-sm">
                                                                    <button type="button" class="btn btn-default btn-sm marginTB-xs" disabled="" data-toggle="modal">following</button>
                                                                    <button type="button" class="btn btn-success btn-sm marginTB-xs" data-toggle="modal">View Profile</button>
                                                                </div>
                                                            </div>
                                                        </div><!-- ./user-wrapper -->
                                                    </div>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="panel panel-default clearfix">
                                                    <div class="panel-body">
                                                        <div class="user-wrapper">
                                                            <div class="user-avatar">
                                                                <img class="small-img img-circle img-thumbnail" src="images/profile/profile4.jpg" alt="">
                                                            </div>
                                                            <div class="user-detail small-img">
                                                                <div class="font-16">Jame Smith</div>
                                                                <small class="block text-muted font-12">Programmer</small>
                                                                <small>
                                                                    <small class="freelancer-rating">
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-warning"></i>
                                                                    </small>
                                                                </small>

                                                                <div class="m-top-sm">
                                                                    <button type="button" class="btn btn-primary btn-sm marginTB-xs" data-toggle="modal">follow</button>
                                                                    <button type="button" class="btn btn-success btn-sm marginTB-xs" data-toggle="modal">View Profile</button>
                                                                </div>
                                                            </div>
                                                        </div><!-- ./user-wrapper -->
                                                    </div>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="panel panel-default clearfix">
                                                    <div class="panel-body">
                                                        <div class="user-wrapper">
                                                            <div class="user-avatar">
                                                                <img class="small-img img-circle img-thumbnail" src="images/profile/profile5.jpg" alt="">
                                                            </div>
                                                            <div class="user-detail small-img">
                                                                <div class="font-16">Elizabeth Carter</div>
                                                                <small class="block text-muted font-12">@Elizabeth</small>
                                                                <small>
                                                                    <small class="freelancer-rating">
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-warning"></i>
                                                                    </small>
                                                                </small>

                                                                <div class="m-top-sm">
                                                                    <button type="button" class="btn btn-primary btn-sm marginTB-xs" data-toggle="modal">follow</button>
                                                                    <button type="button" class="btn btn-success btn-sm marginTB-xs" data-toggle="modal">View Profile</button>
                                                                </div>
                                                            </div>
                                                        </div><!-- ./user-wrapper -->
                                                    </div>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="panel panel-default clearfix">
                                                    <div class="panel-body">
                                                        <div class="user-wrapper">
                                                            <div class="user-avatar">
                                                                <img class="small-img img-circle img-thumbnail" src="images/profile/profile6.jpg" alt="">
                                                            </div>
                                                            <div class="user-detail small-img">
                                                                <div class="font-16">Christopher Brown</div>
                                                                <small class="block text-muted font-12">@Christopher</small>
                                                                <small>
                                                                    <small class="freelancer-rating">
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-warning"></i>
                                                                    </small>
                                                                </small>

                                                                <div class="m-top-sm">
                                                                    <button type="button" class="btn btn-primary btn-sm marginTB-xs" data-toggle="modal">follow</button>
                                                                    <button type="button" class="btn btn-success btn-sm marginTB-xs" data-toggle="modal">View Profile</button>
                                                                </div>
                                                            </div>
                                                        </div><!-- ./user-wrapper -->
                                                    </div>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="panel panel-default clearfix">
                                                    <div class="panel-body">
                                                        <div class="user-wrapper">
                                                            <div class="user-avatar">
                                                                <img class="small-img img-circle img-thumbnail" src="images/profile/profile7.jpg" alt="">
                                                            </div>
                                                            <div class="user-detail small-img">
                                                                <div class="font-16">Jane Doe</div>
                                                                <small class="block text-muted font-12">janeDoe@company.com</small>
                                                                <small>
                                                                    <small class="freelancer-rating">
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-warning"></i>
                                                                        <i class="fa fa-star text-warning"></i>
                                                                    </small>
                                                                </small>

                                                                <div class="m-top-sm">
                                                                    <button type="button" class="btn btn-primary btn-sm marginTB-xs" data-toggle="modal">follow</button>
                                                                    <button type="button" class="btn btn-success btn-sm marginTB-xs" data-toggle="modal">View Profile</button>
                                                                </div>
                                                            </div>
                                                        </div><!-- ./user-wrapper -->
                                                    </div>
                                                </div>
                                            </li>
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