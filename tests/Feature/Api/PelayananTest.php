<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Pelayanan;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PelayananTest extends TestCase
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
    public function it_gets_pelayanans_list()
    {
        $pelayanans = Pelayanan::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.pelayanans.index'));

        $response->assertOk()->assertSee($pelayanans[0]->judul_pelayanan);
    }

    /**
     * @test
     */
    public function it_stores_the_pelayanan()
    {
        $data = Pelayanan::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.pelayanans.store'), $data);

        $this->assertDatabaseHas('pelayanans', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_pelayanan()
    {
        $pelayanan = Pelayanan::factory()->create();

        $data = [
            'judul_pelayanan' => $this->faker->text(255),
            'link_pelayanan' => $this->faker->text(255),
        ];

        $response = $this->putJson(
            route('api.pelayanans.update', $pelayanan),
            $data
        );

        $data['id'] = $pelayanan->id;

        $this->assertDatabaseHas('pelayanans', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_pelayanan()
    {
        $pelayanan = Pelayanan::factory()->create();

        $response = $this->deleteJson(
            route('api.pelayanans.destroy', $pelayanan)
        );

        $this->assertDeleted($pelayanan);

        $response->assertNoContent();
    }
}
