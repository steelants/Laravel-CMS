<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use SteelAnts\LaravelCMS\Models\Menu;
use SteelAnts\LaravelCMS\Types\MenuItemType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->integer('order')->nullable()->default(0);
            $table->bigInteger('parent_id')->nullable();
            $table->foreignIdFor(Menu::class)->constrained();
            $table->string('title')->nullable();
            $table->string('value');
            $table->string('type')->default(MenuItemType::URL);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};
