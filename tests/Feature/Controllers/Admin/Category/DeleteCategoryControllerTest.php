<?php

namespace Tests\Feature\Controllers\Admin\Category;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteCategoryControllerTest extends TestCase {
    use RefreshDatabase;

    private User $admin;
    private Category $category;

    public function setUp(): void {
        parent::setUp();

        $this->admin = User::factory()->create();
        $this->category = Category::create(['name' => fake()->word()]);
    }

    public function test_delete_success(): void {
        $this->actingAs($this->admin)
            ->post(route('admin.category.delete', [
                'category' => $this->category,
            ]))->assertRedirect();

        $this->assertModelMissing($this->category);
    }
}
