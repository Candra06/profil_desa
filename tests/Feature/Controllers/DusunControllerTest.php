<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Dusun;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DusunControllerTest extends TestCase
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
    public function it_displays_index_view_with_dusuns()
    {
        $dusuns = Dusun::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('dusuns.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.dusuns.index')
            ->assertViewHas('dusuns');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_dusun()
    {
        $response = $this->get(route('dusuns.create'));

        $response->assertOk()->assertViewIs('app.dusuns.create');
    }

    /**
     * @test
     */
    public function it_stores_the_dusun()
    {
        $data = Dusun::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('dusuns.store'), $data);

        $this->assertDatabaseHas('dusuns', $data);

        $dusun = Dusun::latest('id')->first();

        $response->assertRedirect(route('dusuns.edit', $dusun));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_dusun()
    {
        $dusun = Dusun::factory()->create();

        $response = $this->get(route('dusuns.show', $dusun));

        $response
            ->assertOk()
            ->assertViewIs('app.dusuns.show')
            ->assertViewHas('dusun');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_dusun()
    {
        $dusun = Dusun::factory()->create();

        $response = $this->get(route('dusuns.edit', $dusun));

        $response
            ->assertOk()
            ->assertViewIs('app.dusuns.edit')
            ->assertViewHas('dusun');
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

        $response = $this->put(route('dusuns.update', $dusun), $data);

        $data['id'] = $dusun->id;

        $this->assertDatabaseHas('dusuns', $data);

        $response->assertRedirect(route('dusuns.edit', $dusun));
    }

    /**
     * @test
     */
    public function it_deletes_the_dusun()
    {
        $dusun = Dusun::factory()->create();

        $response = $this->delete(route('dusuns.destroy', $dusun));

        $response->assertRedirect(route('dusuns.index'));

        $this->assertDeleted($dusun);
    }
}
