<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Pelayanan;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PelayananControllerTest extends TestCase
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
    public function it_displays_index_view_with_pelayanans()
    {
        $pelayanans = Pelayanan::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('pelayanans.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.pelayanans.index')
            ->assertViewHas('pelayanans');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_pelayanan()
    {
        $response = $this->get(route('pelayanans.create'));

        $response->assertOk()->assertViewIs('app.pelayanans.create');
    }

    /**
     * @test
     */
    public function it_stores_the_pelayanan()
    {
        $data = Pelayanan::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('pelayanans.store'), $data);

        $this->assertDatabaseHas('pelayanans', $data);

        $pelayanan = Pelayanan::latest('id')->first();

        $response->assertRedirect(route('pelayanans.edit', $pelayanan));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_pelayanan()
    {
        $pelayanan = Pelayanan::factory()->create();

        $response = $this->get(route('pelayanans.show', $pelayanan));

        $response
            ->assertOk()
            ->assertViewIs('app.pelayanans.show')
            ->assertViewHas('pelayanan');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_pelayanan()
    {
        $pelayanan = Pelayanan::factory()->create();

        $response = $this->get(route('pelayanans.edit', $pelayanan));

        $response
            ->assertOk()
            ->assertViewIs('app.pelayanans.edit')
            ->assertViewHas('pelayanan');
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

        $response = $this->put(route('pelayanans.update', $pelayanan), $data);

        $data['id'] = $pelayanan->id;

        $this->assertDatabaseHas('pelayanans', $data);

        $response->assertRedirect(route('pelayanans.edit', $pelayanan));
    }

    /**
     * @test
     */
    public function it_deletes_the_pelayanan()
    {
        $pelayanan = Pelayanan::factory()->create();

        $response = $this->delete(route('pelayanans.destroy', $pelayanan));

        $response->assertRedirect(route('pelayanans.index'));

        $this->assertDeleted($pelayanan);
    }
}
