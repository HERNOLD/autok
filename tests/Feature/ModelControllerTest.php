<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Models;
use App\Models\Maker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModelControllerTest extends TestCase
{
    use RefreshDatabase;
    public function test_user_can_view_fuel_index(){
        $actualMaker=Maker::factory()->create();
        Models::factory()->count(3)->create();

        $response=$this->get(route('models'));
        $response->assertStatus(200);
    }

    public function test_user_can_delete_fuel(){
        $actualMaker=Maker::factory()->create();
        $maker=Models::factory()->create();
        $response=$this->delete(route('models.delete', $maker->id));
        $this->assertDatabaseMissing('models', ['id'=>$maker->id]);
        $response->assertSessionHas('success', 'Sikeres törlés');
    }

    public function test_user_can_edit_fuel(){
        $actualMaker=Maker::factory()->create();
        $maker = Models::factory()->create();

        $updatedData = ['name'=>'HELP'];

        $response = $this->patch(route('models.update', $maker->id), $updatedData);

        $this->assertDatabaseHas('models', [
            'id' => $maker->id,
            'name' => 'HELP',
        ]);

        $response->assertRedirect(route('models'));
        $response->assertSessionHas('success', 'Sikeres módosítás');
    }
}
