@include('../common/aside')
@include('../common/header')
@include('../common/footer')


<body class="overflow-hidden">
<div class="wrapper preload">

    <div class="main-container">
        <div class="padding-md">
            <ul class="breadcrumb">
                <li><span class="primary-font"><i class="icon-home"></i></span><a href="index.html">企业管理</a></li>
                <li>消费记录</li>
            </ul>

            <table class="table table-striped" id="dataTable">
                <thead>
                <tr>

                    <th>订单编号</th>
                    <th>下单时间</th>
                    <th>物流公司</th>
                    <th>订单金额</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>11111111</td>
                    <td>2016-4-12</td>
                    <td>
                        <select class="btn-info">
                        <option value="0">未选择</option>
                        <option value="1">圆通快递</option>
                        <option value="2">顺丰快递</option>
                        <option value="3">中通快递</option>
                        </select>
                    </td>
                    <td>￥20</td>
                    <td>
                        <a href="#" class="btn-info">删除</a>
                    </td>
                </tr>
                <tr>
                    <td>22222222</td>
                    <td>2016-4-12</td>
                    <td>
                        <select class="btn-success">
                            {{--<option value="0">未选择</option>--}}
                            <option value="1">圆通快递</option>
                            {{--<option value="2">顺丰快递</option>--}}
                            {{--<option value="3">中通快递</option>--}}
                        </select>
                    </td>
                    <td>￥20</td>
                    <td>
                        <a href="#" class="btn-info">删除</a>
                    </td>
                </tr>
                <tr>

                    <td>33333333</td>
                    <td>2016-4-12</td>
                    <td>
                        <select class="btn-success">
                            {{--<option value="0">未选择</option>--}}
                            <option value="1">中通快递</option>
                            {{--<option value="2">顺丰快递</option>--}}
                            {{--<option value="3">中通快递</option>--}}
                        </select>
                    </td>
                    <td>￥20</td>
                    <td>
                        <a href="#" class="btn-info">删除</a>
                    </td>
                </tr>
                <tr>

                    <td>33333333</td>
                    <td>2016-4-12</td>
                    <td>
                        <select class="btn-info">
                            <option value="0">未选择</option>
                            <option value="1">圆通快递</option>
                            <option value="2" selected>顺丰快递</option>
                            <option value="3">中通快递</option>
                        </select>
                    </td>
                    <td>￥20</td>
                    <td>
                        <a href="#" class="btn-info">删除</a>
                    </td>
                </tr>

                </tbody>
            </table>
        </div><!-- ./padding-md -->
    </div><!-- /main-container -->
</div>


