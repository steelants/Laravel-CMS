<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use SteelAnts\LaravelCMS\Models\Node;
use SteelAnts\LaravelCMS\Types\PartType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('node_parts', function (Blueprint $table) {
            $table->id();
            $table->integer('order')->nullable()->default(0);
            $table->foreignIdFor(Node::class)->constrained();
            $table->longText('content')->nullable();
            $table->json('data')->nullable()->default('[]');
            $table->string('type')->default(PartType::HTML);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('node_parts');
    }
};
