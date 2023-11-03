<?php

namespace Tests\Feature\Controllers\Admin\Filter;

use App\Enums\FilterType;
use App\Models\Filter;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateFilterControllerTest extends TestCase {
    use RefreshDatabase;

    private User $admin;
    private Filter $filter;

    public function setUp(): void {
        parent::setUp();

        $this->admin = User::factory()->create();
        $this->filter = Filter::factory()->create();
    }

    public function test_edit_success(): void {
        $this->actingAs($this->admin)
            ->get(route('admin.filter.edit', [
                'filter' => $this->filter,
            ]))->assertSuccessful();
    }

    public function test_store_success(): void {
        $this->actingAs($this->admin)
            ->post(route('admin.filter.update', [
                'filter' => $this->filter,
            ]), [
                'name' => 'Test',
                'type' => FilterType::RADIO->value,
            ])->assertRedirect();

        $this->filter->refresh();
        $this->assertEquals('Test', $this->filter->name);
        $this->assertEquals(FilterType::RADIO->value, $this->filter->type);
    }

    public function test_store_fail_not_name(): void {
        $this->actingAs($this->admin)
            ->post(route('admin.filter.update', [
                'filter' => $this->filter,
            ]), [
                'name' => null,
                'type' => FilterType::CHECKBOX->value,
            ])->assertSessionHasErrors();

        $this->filter->refresh();
        $this->assertNotEquals(null, $this->filter->name);
        $this->assertNotEquals(FilterType::CHECKBOX->value, $this->filter->type);
    }

    public function test_store_fail_exist_name(): void {
        Filter::factory()->create([
            'name' => 'Test',
            'category_id' => $this->filter->category_id,
        ]);
        $this->actingAs($this->admin)
            ->post(route('admin.filter.update', [
                'filter' => $this->filter,
            ]), [
                'name' => 'Test',
                'type' => FilterType::CHECKBOX->value,
            ])->assertSessionHasErrors();

        $this->filter->refresh();
        $this->assertNotEquals('Test', $this->filter->name);
        $this->assertNotEquals(FilterType::CHECKBOX->value, $this->filter->type);
    }

    public function test_store_exist_name_success(): void {
        Filter::factory()->create();
        $this->actingAs($this->admin)
            ->post(route('admin.filter.update', [
                'filter' => $this->filter,
            ]), [
                'name' => 'Test',
                'type' => FilterType::RADIO->value,
            ])->assertRedirect();

        $this->filter->refresh();
        $this->assertEquals('Test', $this->filter->name);
        $this->assertEquals(FilterType::RADIO->value, $this->filter->type);
    }
}
