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

            <form method="post" action="">
                <div class="col-sm-9">
                    <span>物流选择方式：</span>
                    <div class="radio inline-block">
                        <div class="custom-radio m-right-xs">
                            <input type="radio" id="inlineRadio1" name="chooseType" value="1" checked="true" onclick="changeVisible(this)">
                            <label for="inlineRadio1"></label>
                        </div>
                        <div class="inline-block vertical-top">手动</div>
                    </div>
                    <div class="radio inline-block m-left-sm">
                        <div class="custom-radio m-right-xs">
                            <input type="radio" id="inlineRadio2" name="chooseType" value="2" onclick="changeVisible(this)">
                            <label for="inlineRadio2"></label>
                        </div>
                        <div class="inline-block vertical-top">自动</div>
                    </div>
                </div>
                <div class="col-sm-9" id="company" style="display: none">
                    <span>选择默认物流公司：</span>
                    <select class="btn-info" name="logisticsCompany">
                        <option value="0">未选择</option>
                        <option value="1">圆通快递</option>
                        <option value="2">顺丰快递</option>
                        <option value="3">中通快递</option>
                    </select>
                </div>
                <div class="col-sm-9">
                    <input class="btn btn-info" style="margin-top: 10px;padding: 2px;height: 30px;width: 60px" type="submit" value="提交">
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
</script>
