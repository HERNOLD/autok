<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Maker;
use App\Models\Models;
use App\Models\Fuels;
use App\Models\GearShift;
use App\Models\Body;
use App\Models\Color;
use App\Models\Car;

class CarControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_car()
    {
        $maker = Maker::factory()->create();
        $model = Models::factory()->create();
        $fuel = Fuels::factory()->create();
        $gear = GearShift::factory()->create();
        $body = Body::factory()->create();
        $color = Color::factory()->create();

        $carData = [
            'maker' => $maker->id,
            'model' => $model->id,
            'fuel' => $fuel->id,
            'shift' => $gear->id,
            'body' => $body->id,
            'color' => $color->id,
        ];

        $response = $this->post(route('cars.store'), $carData);

        $response->assertRedirect(route('cars.show', ['id' => 1]));
    }

    public function test_user_can_view_car(){
        $maker = Maker::factory()->create();
        $model = Models::factory()->create();
        $fuel = Fuels::factory()->create();
        $gear = GearShift::factory()->create();
        $body = Body::factory()->create();
        $color = Color::factory()->create();

        Car::factory()->create();

        $response=$this->get(route('cars'));
        $response->assertStatus(200);
    }

    public function test_user_can_delete_car(){
        $maker = Maker::factory()->create();
        $model = Models::factory()->create();
        $fuel = Fuels::factory()->create();
        $gear = GearShift::factory()->create();
        $body = Body::factory()->create();
        $color = Color::factory()->create();

        $car=Car::factory()->create();

        $response=$this->delete(route('cars.delete', $car->id));
        $this->assertDatabaseMissing('cars', ['id'=>$car->id]);
        $response->assertSessionHas('success', 'Sikeresen törölve');
    }

    public function test_user_can_edit_car()
    {
        $maker = Maker::factory()->create();
        $model1 = Models::factory()->create(); // model_id = 1
        $model2 = Models::factory()->create(); // model_id = 2
        $fuel = Fuels::factory()->create();
        $gear = GearShift::factory()->create();
        $body = Body::factory()->create();
        $color = Color::factory()->create();

        $car = Car::factory()->create();

        $updatedData = ['maker'=>$maker->id, 'model' => $model2->id, 'fuel'=>$fuel->id, 'shift'=>$gear->id, 'body'=>$body->id, 'color'=>$color->id];

        $response = $this->patch(route('cars.update', $car->id), $updatedData);

        $this->assertDatabaseHas('cars', [
            'id' => $car->id,
            'model_id' => $model2->id,
        ]);

        $response->assertRedirect(route('cars.show'));
        $response->assertSessionHas('success', 'Sikeres módosítás');
    }
}
