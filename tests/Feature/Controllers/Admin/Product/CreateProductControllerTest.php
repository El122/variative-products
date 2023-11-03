<?php

namespace Tests\Feature\Controllers\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateProductControllerTest extends TestCase {
    use RefreshDatabase;

    private User $admin;
    private Category $category;

    public function setUp(): void {
        parent::setUp();

        $this->admin = User::factory()->create();
        $this->category = Category::factory()->create();
    }

    public function test_create_success(): void {
        $this->actingAs($this->admin)
            ->get(route('admin.product.create', [
                'category' => $this->category,
            ]))->assertSuccessful();
    }

    public function test_store_success(): void {
        $this->actingAs($this->admin)
            ->post(route('admin.product.store', [
                'category' => $this->category,
            ]), [
                'name' => 'Test',
                'vendor' => '123',
                'description' => fake()->text,
            ])->assertRedirect();

        $products = Product::where('name', 'Test')->get();
        $this->assertCount(1, $products);
    }

    public function test_store_fail(): void {
        $this->actingAs($this->admin)
            ->post(route('admin.product.store', [
                'category' => $this->category,
            ]), [
                'name' => null,
            ])->assertSessionHasErrors();

        $products = Product::all();
        $this->assertCount(0, $products);
    }
}
