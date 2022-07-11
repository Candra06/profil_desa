<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Dusun;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DusunTest extends TestCase
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
    public function it_gets_dusuns_list()
    {
        $dusuns = Dusun::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.dusuns.index'));

        $response->assertOk()->assertSee($dusuns[0]->nama_dusun);
    }

    /**
     * @test
     */
    public function it_stores_the_dusun()
    {
        $data = Dusun::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.dusuns.store'), $data);

        $this->assertDatabaseHas('dusuns', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_dusun()
    {
        $dusun = Dusun::factory()->create();

        $data = [
            'nama_dusun' => $this->faker->text(255),
            'kepala_dusun' => $this->faker->text(255),
            'deskripsi' => $this->faker->text,
        ];

        $response = $this->putJson(route('api.dusuns.update', $dusun), $data);

        $data['id'] = $dusun->id;

        $this->assertDatabaseHas('dusuns', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_dusun()
    {
        $dusun = Dusun::factory()->create();

        $response = $this->deleteJson(route('api.dusuns.destroy', $dusun));

        $this->assertDeleted($dusun);

        $response->assertNoContent();
    }
}
