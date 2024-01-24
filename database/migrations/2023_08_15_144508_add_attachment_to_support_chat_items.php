<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('support_chat_items', function (Blueprint $table) {
            $table->string('attachment')->nullable(); // حقل المرفقات

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('support_chat_items', function (Blueprint $table) {
            $table->dropColumn('attachment'); // إزالة حقل المرفقات

        });
    }
};
