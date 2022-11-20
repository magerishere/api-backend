<?php

use App\Enums\LocaleEnums;
use App\Enums\MenuEnums;
use App\Models\Menu;
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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->enum('locale', LocaleEnums::getValues());
            $table->boolean('is_active');
            $table->foreignIdFor(Menu::class, 'parent_id')->nullable()->constrained('menus')->cascadeOnDelete();
            $table->enum('type', MenuEnums::getValues());
            $table->string('title');
            $table->string('link');
            $table->text('icon');
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
        Schema::dropIfExists('menus');
    }
};
