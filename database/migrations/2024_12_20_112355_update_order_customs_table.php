<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('order_customs', function (Blueprint $table) {
            $table->string('shipping_method')->after('user_id');
            $table->timestamp('delivery_time')->after('shipping_method');
            $table->text('shipping_address')->after('delivery_time');
            $table->string('payment_method')->after('shipping_address');
            $table->string('payment_proof')->nullable()->after('payment_method');
        });
    }

    public function down()
    {
        Schema::table('order_customs', function (Blueprint $table) {
            $table->dropColumn('shipping_method');
            $table->dropColumn('delivery_time');
            $table->dropColumn('shipping_address');
            $table->dropColumn('payment_method');
            $table->dropColumn('payment_proof');
        });
    }
};
