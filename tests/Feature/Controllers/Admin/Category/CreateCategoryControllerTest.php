<?php

namespace Tests\Feature\Controllers\Admin\Category;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateCategoryControllerTest extends TestCase {
    use RefreshDatabase;

    private User $admin;

    public function setUp(): void {
        parent::setUp();

        $this->admin = User::factory()->create();
    }

    public function test_create_success(): void {
        $this->actingAs($this->admin)
            ->get(route('admin.category.create'))->assertSuccessful();
    }

    public function test_store_success(): void {
        $this->actingAs($this->admin)
            ->post(route('admin.category.store'), [
                'name' => 'Test',
            ])->assertRedirect();

        $categories = Category::where('name', 'Test')->get();
        $this->assertCount(1, $categories);
    }

    public function test_store_fail_not_name(): void {
        $this->actingAs($this->admin)
            ->post(route('admin.category.store'), [
                'name' => null,
            ])->assertSessionHasErrors();

        $categories = Category::all();
        $this->assertCount(0, $categories);
    }

    public function test_store_fail_exist_name(): void {
        Category::create(['name' => 'Test']);
        $this->actingAs($this->admin)
            ->post(route('admin.category.store'), [
                'name' => 'Test',
            ])->assertSessionHasErrors();

        $categories = Category::all();
        $this->assertCount(1, $categories);
    }
}
