<?php

namespace Tests\Feature\Controllers\Admin\Filter;

use App\Models\Filter;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteFilterControllerTest extends TestCase {
    use RefreshDatabase;

    private User $admin;
    private Filter $filter;

    public function setUp(): void {
        parent::setUp();

        $this->admin = User::factory()->create();
        $this->filter = Filter::factory()->create();
    }

    public function test_delete_success(): void {
        $this->actingAs($this->admin)
            ->post(route('admin.filter.delete', [
                'filter' => $this->filter,
            ]))->assertRedirect();

        $this->assertModelMissing($this->filter);
    }
}
