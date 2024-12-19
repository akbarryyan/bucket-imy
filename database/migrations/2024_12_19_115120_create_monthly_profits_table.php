<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('monthly_profits', function (Blueprint $table) {
            $table->id();
            $table->string('month', 7)->unique(); // format YYYY-MM
            $table->decimal('total_profit', 15, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('monthly_profits');
    }
};
