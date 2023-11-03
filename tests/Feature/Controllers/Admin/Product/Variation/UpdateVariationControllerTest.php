<?php

namespace Tests\Feature\Controllers\Admin\Product\Variation;

use App\Models\Filter;
use App\Models\User;
use App\Models\Variation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateVariationControllerTest extends TestCase {
    use RefreshDatabase;

    private User $admin;
    private Variation $variation;
    private Filter $filter;

    public function setUp(): void {
        parent::setUp();

        $this->admin = User::factory()->create();
        $this->variation = Variation::factory()->create();
        $this->filter = Filter::factory()->create();
    }

    public function test_edit_success(): void {
        $this->actingAs($this->admin)
            ->get(route('admin.product.variation.edit', [
                'variation' => $this->variation,
            ]))->assertSuccessful();
    }

    public function test_store_success(): void {
        $this->actingAs($this->admin)
            ->post(route('admin.product.variation.update', [
                'variation' => $this->variation,
            ]), [
                'price' => 900,
                'description' => fake()->text,
                'variation' => [$this->filter->id => 'Test'],
            ])->assertRedirect();

        $this->variation->refresh();
        $this->assertEquals(900, $this->variation->price);
    }

    public function test_store_fail_not_name(): void {
        $this->actingAs($this->admin)
            ->post(route('admin.product.variation.update', [
                'variation' => $this->variation,
            ]), [
                'description' => null,
            ])->assertSessionHasErrors();

        $this->variation->refresh();
        $this->assertNotEquals(null, $this->variation->description);
    }
}
