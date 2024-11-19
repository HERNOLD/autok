<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Maker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MakerControllerTest extends TestCase
{
    use RefreshDatabase;
    public function test_user_can_view_makers_index(){
        Maker::factory()->count(3)->create();

        $response=$this->get(route('makers'));
        $response->assertStatus(200);
    }

    public function test_user_can_delete_maker(){
        $maker=Maker::factory()->create();
        $response=$this->delete(route('makers.delete', $maker->id));
        $this->assertDatabaseMissing('makers', ['id'=>$maker->id]);
        $response->assertSessionHas('success', 'Sikeresen törölve');
    }

    public function test_user_can_edit_maker(){
        $maker = Maker::factory()->create();

        $updatedData = ['name'=>'HELP'];

        $response = $this->patch(route('makers.update', $maker->id), $updatedData);

        $this->assertDatabaseHas('makers', [
            'id' => $maker->id,
            'name' => 'HELP',
        ]);

        $response->assertRedirect(route('makers'));
        $response->assertSessionHas('success', 'Sikeres módosítás');
    }
}
