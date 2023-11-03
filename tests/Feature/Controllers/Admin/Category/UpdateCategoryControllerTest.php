<?php

namespace Tests\Feature\Controllers\Admin\Category;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateCategoryControllerTest extends TestCase {
    use RefreshDatabase;

    private User $admin;
    private Category $category;

    public function setUp(): void {
        parent::setUp();

        $this->admin = User::factory()->create();
        $this->category = Category::create(['name' => fake()->word()]);
    }

    public function test_edit_success(): void {
        $this->actingAs($this->admin)
            ->get(route('admin.category.edit', [
                'category' => $this->category,
            ]))->assertSuccessful();
    }

    public function test_store_success(): void {
        $this->actingAs($this->admin)
            ->post(route('admin.category.update', [
                'category' => $this->category,
            ]), [
                'name' => 'Test',
            ])->assertRedirect();

        $this->category->refresh();
        $this->assertEquals('Test', $this->category->name);
    }

    public function test_store_fail_not_name(): void {
        $this->actingAs($this->admin)
            ->post(route('admin.category.update', [
                'category' => $this->category,
            ]), [
                'name' => null,
            ])->assertSessionHasErrors();

        $this->category->refresh();
        $this->assertNotEquals(null, $this->category->name);
    }

    public function test_store_fail_exist_name(): void {
        Category::create(['name' => 'Test']);
        $this->actingAs($this->admin)
            ->post(route('admin.category.update', [
                'category' => $this->category,
            ]), [
                'name' => 'Test',
            ])->assertSessionHasErrors();

        $this->category->refresh();
        $this->assertNotEquals('Test', $this->category->name);
    }
}
