<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderInfo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("cbe_id");//电商id
            $table->char("BookNo", 20);//电商单号
            $table->bigInteger("declareDate");//申报日期
            $table->string("cbeCode")->nullable();//电商代码
            $table->string("cbeName");//电商名称
            $table->integer("LogisticsNo")->nullable();//运单号
            //$table->char("TrackingNo",20)->nullable();//跟踪单号
            $table->string("shipper")->nullable();//国外发件人
            $table->string("shipperAddress")->nullable();//国外发件地址
            $table->integer("shipperPhone")->nullable();//国外发件人联系方式
            $table->string("shipperCountryCiq");//发件人所在国
            $table->string("consignor")->nullable();//国内发件人
            $table->string("phoneNum")->nullable();//国内发件人手机号
            $table->string("consignorAdd")->nullable();//国内发件地址
            $table->string("idType");// 发件人证件类型1-身份证 2-军官证 3-护照 4-其他
            $table->string("cardId");//证件号码
            $table->string("consigneePhone");//收件人手机号
            $table->string("province")->nullable();
            $table->string("city")->nullable();
            $table->string("zone")->nullable();//qu
            $table->string("Address");//收件人地址
            $table->string("countryiq");//收件人国家(检)
            $table->string("countryCus");//收件人国家（海）
            $table->integer("weight");
            $table->integer("quantity");
            //$table->char("ieType",1);// i 进口  E出口
            //$table->tinyInteger("stockFlag",1);// 1-集获 2-备货
            //$table->string("batchNum");
            //$table->tinyInteger("billTyp");//1 -总运单， 2-分运单  3-面单
            //$table->string("note")->nullable();//备注
            //$table->string("totalLogisticsNo")->nullable();//总单号
            //$table->string("subLogisticsNo")->nullable();//分单号
            $table->string("goodName")->nullable();// 商品名
            $table->string("agentCode");// 代理企业编号  报关行代码
            $table->string("agentName");//代理企业名称， 报关行名称
            $table->string("packageTypeCiq");//包装类别 按国检要求
            $table->string("transportationMethod");// 运输方式
            $table->string("shipCode");// 运输工具
            //$table->string("tradeCountryCiq");// 贸易国别
            //$table->string("goodsItem");//货物清单
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
