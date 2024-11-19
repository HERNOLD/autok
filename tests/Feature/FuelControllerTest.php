<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Fuels;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FuelControllerTest extends TestCase
{
    use RefreshDatabase;
    public function test_user_can_view_fuel_index(){
        Fuels::factory()->count(3)->create();

        $response=$this->get(route('fuels'));
        $response->assertStatus(200);
    }

    public function test_user_can_delete_fuel(){
        $maker=Fuels::factory()->create();
        $response=$this->delete(route('fuels.delete', $maker->id));
        $this->assertDatabaseMissing('fuels', ['id'=>$maker->id]);
        $response->assertSessionHas('success', 'Sikeres törlés');
    }

    public function test_user_can_edit_fuel(){
        $maker = Fuels::factory()->create();

        $updatedData = ['name'=>'HELP'];

        $response = $this->patch(route('fuels.update', $maker->id), $updatedData);

        $this->assertDatabaseHas('fuels', [
            'id' => $maker->id,
            'name' => 'HELP',
        ]);

        $response->assertRedirect(route('fuels'));
        $response->assertSessionHas('success', 'Sikeres módosítás');
    }
}
