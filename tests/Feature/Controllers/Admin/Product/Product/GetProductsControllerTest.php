<?php

namespace Tests\Feature\Controllers\Admin\Product\Product;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetProductsControllerTest extends TestCase {
    use RefreshDatabase;

    private User $admin;

    public function setUp(): void {
        parent::setUp();

        $this->admin = User::factory()->create();
        Product::factory()->create();
    }

    public function test_get_all(): void {
        $this->actingAs($this->admin)
            ->get(route('admin.product.index'))->assertSuccessful();
    }
}
