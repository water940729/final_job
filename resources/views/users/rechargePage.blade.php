@include('../common/aside')
@include('../common/header')
@include('../common/footer')


<body class="overflow-hidden">
<div class="wrapper preload">

    <div class="main-container">
        <div class="padding-md">
            <ul class="breadcrumb">
                <li><span class="primary-font"><i class="icon-home"></i></span><a href="index.html">企业管理</a></li>
                <li>账户充值</li>
            </ul>

            <div class="card-layout">
                <span style="font-size: 30px">账户余额：</span><strong style="font-size: 30px; color: red">￥30</strong><br/><br/>
                <form method="post" action="recharge">
                    <span>充值方式：</span>
                    <select class="btn-info" name="type">
                        <option value="0">支付宝</option>
                        <option value="1">微信支付</option>
                        <option value="2">银行卡</option>
                    </select>
                    <span style="margin-left: 30px">充值金额：</span>
                    <input type="text" name="money"/><label>元</label>
                    <input class="btn btn-info" type="submit" value="我要充值" style="margin-left: 30px" />
                </form>
            </div>

            <table class="table table-striped" id="dataTable">
                <thead>
                <tr>
                    <th>充值编号</th>
                    <th>充值时间</th>
                    <th>充值方式</th>
                    <th>充值金额</th>
                    <th>充值状态</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>11111111</td>
                    <td>2016-4-12</td>
                    <td>
                        <select class="btn-info" name="type">
                            <option value="0">支付宝</option>
                            {{--<option value="1">微信支付</option>--}}
                            {{--<option value="2">银行卡</option>--}}
                        </select>
                    </td>
                    <td>￥20</td>
                    <td><span class="label label-success">充值成功</span></td>
                </tr>
                <tr>
                    <td>22222222</td>
                    <td>2016-4-12</td>
                    <td>
                        <select class="btn-info" name="type">
                            {{--<option value="0">支付宝</option>--}}
                            <option value="1">微信支付</option>
                            {{--<option value="2">银行卡</option>--}}
                        </select>
                    </td>
                    <td>￥20</td>
                    <td><span class="label label-success">充值成功</span></td>
                </tr>
                <tr>
                    <td>33333333</td>
                    <td>2016-4-12</td>
                    <td>
                        <select class="btn-info" name="type">
                            <option value="0">支付宝</option>
                            {{--<option value="1">微信支付</option>--}}
                            {{--<option value="2">银行卡</option>--}}
                        </select>
                    </td>
                    <td>￥20</td>
                    <td><span class="label label-success">充值成功</span></td>
                </tr>
                <tr>
                    <td>44444444</td>
                    <td>2016-4-12</td>
                    <td>
                        <select class="btn-info" name="type">
                            {{--<option value="0">支付宝</option>--}}
                            {{--<option value="1">微信支付</option>--}}
                            <option value="2">银行卡</option>
                        </select>
                    </td>                    
                    <td>￥20</td>
                    <td><span class="label label-success">充值成功</span></td>
                </tr>
                <tr>
                    <td>55555555</td>
                    <td>2016-4-12</td>
                    <td>
                        <select class="btn-info" name="type">
                            {{--<option value="0">支付宝</option>--}}
                            <option value="1">微信支付</option>
                            {{--<option value="2">银行卡</option>--}}
                        </select>
                    </td>
                    <td>￥20</td>
                    <td><span class="label label-success">充值成功</span></td>
                </tr>

                </tbody>
            </table>
        </div><!-- ./padding-md -->
    </div><!-- /main-container -->
</div>


