<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\VillagePottentions;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VillagePottentionsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_all_village_pottentions_list()
    {
        $allVillagePottentions = VillagePottentions::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.all-village-pottentions.index'));

        $response
            ->assertOk()
            ->assertSee($allVillagePottentions[0]->nama_potensi);
    }

    /**
     * @test
     */
    public function it_stores_the_village_pottentions()
    {
        $data = VillagePottentions::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.all-village-pottentions.store'),
            $data
        );

        $this->assertDatabaseHas('village_pottentions', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_village_pottentions()
    {
        $villagePottentions = VillagePottentions::factory()->create();

        $data = [
            'nama_potensi' => $this->faker->text(255),
            'gambar' => $this->faker->text(255),
        ];

        $response = $this->putJson(
            route('api.all-village-pottentions.update', $villagePottentions),
            $data
        );

        $data['id'] = $villagePottentions->id;

        $this->assertDatabaseHas('village_pottentions', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_village_pottentions()
    {
        $villagePottentions = VillagePottentions::factory()->create();

        $response = $this->deleteJson(
            route('api.all-village-pottentions.destroy', $villagePottentions)
        );

        $this->assertDeleted($villagePottentions);

        $response->assertNoContent();
    }
}
