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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->enum('transaction_type', ['credit', 'debit']);
            $table->string('description')->nullable(true);
            $table->float('amount')->default(0);
            $table->float('available_balance')->default(0);
            $table->integer('user_id');
            $table->timestamps();
        });

        Schema::table('admins', function (Blueprint $table) {
            $table->float('total_balance')->after('username')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');

        Schema::table('admins', function (Blueprint $table) {
            $table->dropColumn('total_balance');
        });
    }
};
