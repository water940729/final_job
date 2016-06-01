
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <title><?php echo $userInfo['username'];?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">

    <!-- ionicons -->
    <link href="assets/css/ionicons.min.css" rel="stylesheet">

    <!-- datatable -->
    <link href="assets/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Simplify -->
    <link href="assets/css/simplify.min.css" rel="stylesheet">
    <link href="assets/css/daterangepicker-bs3.css" rel="stylesheet" type="text/css" media="all">


</head>
<body class="overflow-hidden">
<div class="wrapper preload">
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
                            <td>{{$order['num']}}</td>
                            <td>{{$order['BookNo']}}</td>
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
</div>
