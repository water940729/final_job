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
                <span style="font-size: 30px">账户余额：</span><strong style="font-size: 30px; color: red">￥{{$userInfo['balance']}}</strong><br/><br/>
                <form method="post" action="recharge">
                    <span>充值方式：</span>
                    <select class="btn-info" name="type">
                        @if(isset($payList)&&!Empty($payList))
                            @foreach($payList as $pay)
                                <option value="{{$pay['pay_id']}}">{{strip_tags($pay['pay_name'])}}</option>
                            @endforeach
                        @endif
                    </select>
                    <span style="margin-left: 30px">充值金额：</span>
                    <input type="text" name="money"/><label>元</label>
                    <input class="btn btn-info" type="submit" value="我要充值" style="margin-left: 30px" />
                </form>
            </div>

            <table class="table table-striped" id="dataTable">
                <thead>
                <tr>
                    <th>充值方式</th>
                    <th>充值时间</th>
                    <th>充值金额</th>
                    <th>充值状态</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($rechargeList)&&!empty($rechargeList))
                    @foreach($rechargeList as $recharge)
                        <tr>
                            <td>{{strip_tags($recharge['pay_name'])}}</td>
                            <td>{{date('Y-m-d', $recharge['time'])}}</td>
                            <td>￥{{$recharge['money']}}</td>
                            @if($recharge['state']==1)
                                <td>充值成功</td>
                            @else
                                <td>充值中</td>
                            @endif
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div><!-- ./padding-md -->
    </div><!-- /main-container -->
</div>


