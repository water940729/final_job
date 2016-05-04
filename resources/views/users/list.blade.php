@include('../common/aside')
@include('../common/header')
@include('../common/footer')


<body class="overflow-hidden">
<div class="wrapper preload">

    <div class="main-container">


        <div class="padding-md">
            <ul class="breadcrumb">
                <li><span class="primary-font"><i class="icon-home"></i></span><a href="index.html">企业管理</a></li>
                <li>订单列表</li>
            </ul>

            <div class="well">
                <form class="form-horizontal" action="orderlist" id="queryForm" method="POST">
                    <fieldset>
                        <div class="control-group">
                            <div class="controls">

                                <div class="input-prepend input-group">
                                    <td class="col-md-5">
                                    <span class=" input-group-addon ">
                                        <label>查询范围</label>
                                    </span>
                                    <span class=" input-group-addon">
                                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                    </span>
                                    <input type="text" style="width: 200px" readonly="readonly" name="reservation" id="reservation"
                                           class="form-control" value="{{date("m/d/Y",time())}} - {{date("m/d/Y",time())}}" />
                                    </td>
                                    <td class="col-md-4">

                                    <span class=" input-group-addon ">
                                        <label>单号查询</label>
                                    </span>
                                    <span class=" input-group-addon">
                                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                    </span>

                                    <input type="text" style="width: 200px" name="num" id="numQuery" class="form-control" value=""/>
                                </div>
                                </td>

                                <input type="submit" class="btn-info"  id="query" value="查询">
                                <input type="button" class="btn-info" value="导出">
                            </div>
                        </div>

                    </fieldset>

                </form>
            </div>

            <table class="table table-striped" id="dataTable">
                <thead>
                <tr>

                    <th>平台单号</th>
                    <th>电商单号</th>
                    <th>下单时间</th>
                    <th>物流公司</th>
                    <th>是否支付</th>
                    <th>订单金额</th>
                    <th>订单状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($orderList)&&!empty($orderList))
                    @foreach($orderList as $order)
                        <tr>
                            <td>{{$order['BookNo']}}</td>
                            <td>{{$order['num']}}</td>
                            <td>{{date("Y-m-d H:i:s",$order['time'])}}</td>
                            @if(empty($order['log_id']))
                            <td>
                                <select class="btn-info">
                                    <option value="0">未选择</option>
                                    @foreach($ships as $ship)
                                    <option value="{{$ship['shipping_id']}}">{{@$ship['shipping_name']}}</option>
                                        @endforeach
                                </select>
                            </td>
                            @else
                                <td>
                                    <select class="btn-info">
                                        <option value="{{$order['log_id']}}">{{$order['log_company']}}</option>

                                    </select>
                                </td>
                            @endif
                            @if($order['state']!=3)
                                <td>
                                    未支付
                                </td>
                            @else
                                <td>
                                    已支付
                                </td>
                            @endif
                            <td>{{$order['money']}}</td>

                            @if($order['state']==1)
                                <td><span class="label label-danger">待确认</span></td>
                            @elseif($order['state']==2)
                                <td><span class="label label-danger">待支付</span></td>
                            @else
                                <td><span class="label label-danger">已支付</span></td>
                            @endif

                    <td>
                        <a href="#" class="btn-info">确认</a>
                        <a href="#" class="btn-info">编辑</a>
                    </td>
                </tr>
                        @endforeach
                    @endif


                </tbody>
            </table>
        </div><!-- ./padding-md -->
    </div><!-- /main-container -->
</div>



