<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Dusun;
use App\Models\GaleriDusun;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DusunGaleriDusunsTest extends TestCase
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
    public function it_gets_dusun_galeri_dusuns()
    {
        $dusun = Dusun::factory()->create();
        $galeriDusuns = GaleriDusun::factory()
            ->count(2)
            ->create([
                'dusun_id' => $dusun->id,
            ]);

        $response = $this->getJson(
            route('api.dusuns.galeri-dusuns.index', $dusun)
        );

        $response->assertOk()->assertSee($galeriDusuns[0]->nama_foto);
    }

    /**
     * @test
     */
    public function it_stores_the_dusun_galeri_dusuns()
    {
        $dusun = Dusun::factory()->create();
        $data = GaleriDusun::factory()
            ->make([
                'dusun_id' => $dusun->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.dusuns.galeri-dusuns.store', $dusun),
            $data
        );

        $this->assertDatabaseHas('galeri_dusuns', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $galeriDusun = GaleriDusun::latest('id')->first();

        $this->assertEquals($dusun->id, $galeriDusun->dusun_id);
    }
}
