<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShoppingListTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_can_access_shopping_list_page()
    {

        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get('/shopping-list');


        $response->assertOk();
    }

    public function test_can_add_shopping_item()
    {

        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post('/shopping-list', [
                'name' => 'random',
                'shopping_list_id' => $user->shoppingList->id,
                'quantity' => 1,
                'purchased' => 0
            ]);

        $this->assertAuthenticated();
        $response->assertStatus(302);
    }


    public function test_user_can_delete_item()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get('/shopping-list/1/delete');

        $this->assertAuthenticated();
        $response->assertStatus(302);
    }


    public function test_user_can_access_share_list_page()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get('/shopping-list/share');

        $response->assertOk();
    }


    public function test_user_can_share_list()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post('/shopping-list/share', [
                'email' => 'test@test.com'
            ]);
            
        $this->assertAuthenticated();
        $response->assertStatus(302);
    }
}
