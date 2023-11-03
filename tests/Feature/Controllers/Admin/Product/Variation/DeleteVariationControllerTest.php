<?php

namespace Tests\Feature\Controllers\Admin\Product\Variation;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Variation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteVariationControllerTest extends TestCase {
    use RefreshDatabase;

    private User $admin;
    private Variation $variation;

    public function setUp(): void {
        parent::setUp();

        $this->admin = User::factory()->create();
        $this->variation = Variation::factory()->create();
    }

    public function test_delete_success(): void {
        $this->actingAs($this->admin)
            ->post(route('admin.product.variation.delete', [
                'variation' => $this->variation,
            ]))->assertRedirect();

        $this->assertModelMissing($this->variation);
    }
}
