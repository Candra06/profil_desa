<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\GaleriDusun;

use App\Models\Dusun;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GaleriDusunControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_galeri_dusuns()
    {
        $galeriDusuns = GaleriDusun::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('galeri-dusuns.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.galeri_dusuns.index')
            ->assertViewHas('galeriDusuns');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_galeri_dusun()
    {
        $response = $this->get(route('galeri-dusuns.create'));

        $response->assertOk()->assertViewIs('app.galeri_dusuns.create');
    }

    /**
     * @test
     */
    public function it_stores_the_galeri_dusun()
    {
        $data = GaleriDusun::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('galeri-dusuns.store'), $data);

        $this->assertDatabaseHas('galeri_dusuns', $data);

        $galeriDusun = GaleriDusun::latest('id')->first();

        $response->assertRedirect(route('galeri-dusuns.edit', $galeriDusun));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_galeri_dusun()
    {
        $galeriDusun = GaleriDusun::factory()->create();

        $response = $this->get(route('galeri-dusuns.show', $galeriDusun));

        $response
            ->assertOk()
            ->assertViewIs('app.galeri_dusuns.show')
            ->assertViewHas('galeriDusun');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_galeri_dusun()
    {
        $galeriDusun = GaleriDusun::factory()->create();

        $response = $this->get(route('galeri-dusuns.edit', $galeriDusun));

        $response
            ->assertOk()
            ->assertViewIs('app.galeri_dusuns.edit')
            ->assertViewHas('galeriDusun');
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

        $response = $this->put(
            route('galeri-dusuns.update', $galeriDusun),
            $data
        );

        $data['id'] = $galeriDusun->id;

        $this->assertDatabaseHas('galeri_dusuns', $data);

        $response->assertRedirect(route('galeri-dusuns.edit', $galeriDusun));
    }

    /**
     * @test
     */
    public function it_deletes_the_galeri_dusun()
    {
        $galeriDusun = GaleriDusun::factory()->create();

        $response = $this->delete(route('galeri-dusuns.destroy', $galeriDusun));

        $response->assertRedirect(route('galeri-dusuns.index'));

        $this->assertDeleted($galeriDusun);
    }
}
