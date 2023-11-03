<?php

namespace Tests\Feature\Controllers\Admin\Filter;

use App\Enums\FilterType;
use App\Models\Category;
use App\Models\Filter;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateFilterControllerTest extends TestCase {
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
            ->get(route('admin.filter.create', [
                'category' => $this->category,
            ]))->assertSuccessful();
    }

    public function test_store_success(): void {
        $this->actingAs($this->admin)
            ->post(route('admin.filter.store', [
                'category' => $this->category,
            ]), [
                'name' => 'Test',
                'type' => FilterType::CHECKBOX->value,
            ])->assertRedirect();

        $filters = Filter::where([
            'name' => 'Test',
            'category_id' => $this->category->id,
        ])->get();
        $this->assertCount(1, $filters);
    }

    public function test_store_fail_not_name(): void {
        $this->actingAs($this->admin)
            ->post(route('admin.filter.store', [
                'category' => $this->category,
            ]), [
                'name' => null,
            ])->assertSessionHasErrors();

        $filters = Filter::all();
        $this->assertCount(0, $filters);
    }

    public function test_store_fail_exist_name(): void {
        Filter::factory()->create(['name' => 'Test']);
        $this->actingAs($this->admin)
            ->post(route('admin.filter.store', [
                'category' => $this->category,
            ]), [
                'name' => 'Test',
            ])->assertSessionHasErrors();

        $filters = Filter::all();
        $this->assertCount(1, $filters);
    }
}
