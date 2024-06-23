<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateStoresTableRemoveTotals extends Migration
{
    public function up()
    {
        Schema::table('stores', function (Blueprint $table) {
            $table->dropColumn(['total_revenue', 'total_profit']);
        });
    }

    public function down()
    {
        Schema::table('stores', function (Blueprint $table) {
            $table->decimal('total_revenue', 10, 2)->nullable();
            $table->decimal('total_profit', 10, 2)->nullable();
        });
    }
}

