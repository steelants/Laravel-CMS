<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use SteelAnts\LaravelCMS\Types\NodeType;
use SteelAnts\LaravelCMS\Types\StatusType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nodes', function (Blueprint $table) {
            $table->id();
            $table->integer('order')->nullable()->default(0);
            $table->foreignIdFor(User::class)->nullable()->constrained();
            $table->string('slug')->unique();
            $table->string('title')->nullable();
            $table->json('data')->nullable()->default('[]');
            $table->string('type')->default(NodeType::PAGE);
            $table->integer('status')->nullable()->default(StatusType::CONCEPT);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nodes');
    }
};
