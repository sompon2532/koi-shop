<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id'); //รหัสผู้สั่งซื้อ
            $table->text('cart'); 
            $table->string('name'); //ชื่อผู้รับ
            $table->text('address'); //ที่อยู่จัดส่ง
            $table->string('tel'); //เบอร์โทร
            $table->integer('status'); //สถานะคำสั่งซื้อ
            $table->integer('totalQty'); //จำนวนรวมของสินค้า
            $table->double('totalPrice', 10, 2); //ราคารวม
            $table->string('payment_id');
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
        Schema::dropIfExists('orders');
    }
}
