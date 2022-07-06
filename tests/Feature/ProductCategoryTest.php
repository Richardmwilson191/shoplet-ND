<?php

namespace Tests\Feature;

use App\Models\ProductCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductCategoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test
     *
     * @return void
     */
    public function test_a_category_can_be_added()
    {

        $response = $this->post('/api/product/category', [
            'name' => 'Phones',
            'desc' => 'Cell phones'
        ]);

        $response->assertStatus(201);
        $this->assertCount(1, ProductCategory::all());
    }

    public function test_a_name_is_required()
    {
        $response = $this->post('/api/product/category', [
            'name' => '',
            'desc' => 'Cell phones'
        ]);

        $response->assertSessionHasErrors('name');
    }

    public function test_a_category_can_be_updated()
    {
        // $this->withoutExceptionHandling();
        $this->post('/api/product/category', [
            'name' => 'Phones',
            'desc' => 'Cell phones'
        ]);

        $pc = ProductCategory::first();

        $this->patch('/api/product/category/' . $pc->id, [
            'name' => 'Mobile Phones',
            'desc' => 'Cell phones'
        ]);

        $this->assertEquals('Mobile Phones', ProductCategory::first()->name);
    }
}
