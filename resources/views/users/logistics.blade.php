@include('../common/aside')
@include('../common/header')
@include('../common/footer')


<body class="overflow-hidden">
<div class="wrapper preload">

    <div class="main-container">
        <div class="padding-md">
            <ul class="breadcrumb">
                <li><span class="primary-font"><i class="icon-home"></i></span><a href="index.html">企业管理</a></li>
                <li>物流管理</li>
            </ul>

            <form method="post" action="changeLogistics">
                <div class="col-sm-9">
                    <span>物流选择方式：</span>
                    <div class="radio inline-block">
                        <div class="custom-radio m-right-xs">
                            @if(empty($userInfo['chooseType']) || $userInfo['chooseType']==1)
                                <input type="radio" id="inlineRadio1" name="chooseType" value="1" checked="true" onclick="changeVisible(this)">
                            @else
                                <input type="radio" id="inlineRadio1" name="chooseType" value="1" onclick="changeVisible(this)">
                            @endif
                            <label for="inlineRadio1"></label>
                        </div>
                        <div class="inline-block vertical-top">手动</div>
                    </div>
                    <div class="radio inline-block m-left-sm">
                        <div class="custom-radio m-right-xs">
                            @if(!empty($userInfo['chooseType']) && $userInfo['chooseType']==2)
                                <input type="radio" id="inlineRadio2" name="chooseType" value="2" checked="true" onclick="changeVisible(this)">
                            @else
                                <input type="radio" id="inlineRadio2" name="chooseType" value="2" onclick="changeVisible(this)">
                            @endif
                            <label for="inlineRadio2"></label>
                        </div>
                        <div class="inline-block vertical-top">自动</div>
                    </div>
                </div>
                @if(empty($userInfo['chooseType']) || $userInfo['chooseType']==1)
                    <div class="col-sm-9" id="company" style="display: none">
                @else
                    <div class="col-sm-9" id="company">
                        @endif
                        <span>选择默认物流公司：</span>
                        <select class="btn-info" name="logisticsType">
                            <option value="0">未选择</option>
                            @if(isset($logisticsList)&&!empty($logisticsList))
                                @foreach($logisticsList as $logistics)
                                    <option value="{{$logistics['shipping_id']}}" @if($userInfo['logisticsType']==$logistics['shipping_id'])selected="selected"@endif>{{$logistics['shipping_name']}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                <div class="col-sm-9">
                    <input class="btn btn-info" style="margin-top: 10px;padding: 2px;height: 30px;width: 60px" type="submit" value="提交" onclick="return check(this.form)">
                </div>
            </form>
        </div><!-- ./padding-md -->
    </div><!-- /main-container -->
</div>

<script type="text/javascript">
    function changeVisible(sender){
        var company = document.getElementById("company");
        if(sender.value == 1){
            company.style.display = "none";
        }else if(sender.value == 2){
            company.style.display = "block";
        }
    }
    function check(form) {
        if(form.chooseType.value == 2) {
            if (form.logisticsType.value == 0){
                alert("请选择默认物流公司!");
                form.logisticsType.focus();
                return false;
            }
        }
        return true;
    }
</script>
