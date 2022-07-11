<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\GaleriDusun;

use App\Models\Dusun;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GaleriDusunTest extends TestCase
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
    public function it_gets_galeri_dusuns_list()
    {
        $galeriDusuns = GaleriDusun::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.galeri-dusuns.index'));

        $response->assertOk()->assertSee($galeriDusuns[0]->nama_foto);
    }

    /**
     * @test
     */
    public function it_stores_the_galeri_dusun()
    {
        $data = GaleriDusun::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.galeri-dusuns.store'), $data);

        $this->assertDatabaseHas('galeri_dusuns', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_galeri_dusun()
    {
        $galeriDusun = GaleriDusun::factory()->create();

        $dusun = Dusun::factory()->create();

        $data = [
            'dusun_id' => $this->faker->randomNumber,
            'nama_foto' => $this->faker->text(255),
            'foto' => $this->faker->text(255),
            'dusun_id' => $dusun->id,
        ];

        $response = $this->putJson(
            route('api.galeri-dusuns.update', $galeriDusun),
            $data
        );

        $data['id'] = $galeriDusun->id;

        $this->assertDatabaseHas('galeri_dusuns', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_galeri_dusun()
    {
        $galeriDusun = GaleriDusun::factory()->create();

        $response = $this->deleteJson(
            route('api.galeri-dusuns.destroy', $galeriDusun)
        );

        $this->assertDeleted($galeriDusun);

        $response->assertNoContent();
    }
}
