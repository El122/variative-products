<?php

namespace Tests\Feature\Controllers\Admin\Category;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetCategoriesControllerTest extends TestCase {
    use RefreshDatabase;

    private User $admin;
    private Category $category;

    public function setUp(): void {
        parent::setUp();

        $this->admin = User::factory()->create();
        $this->category = Category::create(['name' => fake()->word()]);
    }

    public function test_get_all(): void {
        $this->actingAs($this->admin)
            ->get(route('admin.category.index'))->assertSuccessful();
    }

    public function test_get(): void {
        $this->actingAs($this->admin)
            ->get(route('admin.category.get', [
                'category' => $this->category,
            ]))->assertSuccessful();
    }
}
