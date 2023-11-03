<?php

namespace Tests\Feature\Controllers\Admin\Product\Product;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteProductControllerTest extends TestCase {
    use RefreshDatabase;

    private User $admin;
    private Product $product;

    public function setUp(): void {
        parent::setUp();

        $this->admin = User::factory()->create();
        $this->product = Product::factory()->create();
    }

    public function test_delete_success(): void {
        $this->actingAs($this->admin)
            ->post(route('admin.product.delete', [
                'product' => $this->product,
            ]))->assertRedirect();

        $this->assertSoftDeleted($this->product);
    }
}
