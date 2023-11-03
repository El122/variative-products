<?php

namespace Tests\Feature\Controllers\Admin\Product\Variation;

use App\Models\Filter;
use App\Models\Product;
use App\Models\User;
use App\Models\Variation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateVariationControllerTest extends TestCase {
    use RefreshDatabase;

    private User $admin;
    private Product $product;
    private Filter $filter;

    public function setUp(): void {
        parent::setUp();

        $this->admin = User::factory()->create();
        $this->product = Product::factory()->create();
        $this->filter = Filter::factory()->create();
    }

    public function test_create_success(): void {
        $this->actingAs($this->admin)
            ->get(route('admin.product.variation.create', [
                'product' => $this->product,
            ]))->assertSuccessful();
    }

    public function test_store_success(): void {
        $this->actingAs($this->admin)
            ->post(route('admin.product.variation.store', [
                'product' => $this->product,
            ]), [
                'price' => fake()->numberBetween(2000, 20000),
                'description' => fake()->text,
                'variation' => [$this->filter->id => 'Test'],
            ])->assertRedirect();

        $variations = Variation::all();
        $this->assertCount(1, $variations);
    }

    public function test_store_fail(): void {
        $this->actingAs($this->admin)
            ->post(route('admin.product.variation.store', [
                'product' => $this->product,
            ]), [
                'name' => null,
            ])->assertSessionHasErrors();

        $variations = Variation::all();
        $this->assertCount(0, $variations);
    }
}
