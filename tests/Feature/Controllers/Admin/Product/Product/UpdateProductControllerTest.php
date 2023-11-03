<?php

namespace Tests\Feature\Controllers\Admin\Product\Product;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateProductControllerTest extends TestCase {
    use RefreshDatabase;

    private User $admin;
    private Product $product;

    public function setUp(): void {
        parent::setUp();

        $this->admin = User::factory()->create();
        $this->product = Product::factory()->create();
    }

    public function test_edit_success(): void {
        $this->actingAs($this->admin)
            ->get(route('admin.product.edit', [
                'product' => $this->product,
            ]))->assertSuccessful();
    }

    public function test_store_success(): void {
        $this->actingAs($this->admin)
            ->post(route('admin.product.update', [
                'product' => $this->product,
            ]), [
                'name' => 'Test',
                'vendor' => '222',
                'description' => fake()->text,
            ])->assertRedirect();

        $this->product->refresh();
        $this->assertEquals('Test', $this->product->name);
        $this->assertEquals('222', $this->product->vendor);
    }

    public function test_store_fail_not_name(): void {
        $this->actingAs($this->admin)
            ->post(route('admin.product.update', [
                'product' => $this->product,
            ]), [
                'name' => null,
            ])->assertSessionHasErrors();

        $this->product->refresh();
        $this->assertNotEquals(null, $this->product->name);
    }
}
