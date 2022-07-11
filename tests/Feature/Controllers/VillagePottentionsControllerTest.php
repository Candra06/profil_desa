<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\VillagePottentions;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VillagePottentionsControllerTest extends TestCase
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
    public function it_displays_index_view_with_all_village_pottentions()
    {
        $allVillagePottentions = VillagePottentions::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('all-village-pottentions.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.all_village_pottentions.index')
            ->assertViewHas('allVillagePottentions');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_village_pottentions()
    {
        $response = $this->get(route('all-village-pottentions.create'));

        $response
            ->assertOk()
            ->assertViewIs('app.all_village_pottentions.create');
    }

    /**
     * @test
     */
    public function it_stores_the_village_pottentions()
    {
        $data = VillagePottentions::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('all-village-pottentions.store'), $data);

        $this->assertDatabaseHas('village_pottentions', $data);

        $villagePottentions = VillagePottentions::latest('id')->first();

        $response->assertRedirect(
            route('all-village-pottentions.edit', $villagePottentions)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_village_pottentions()
    {
        $villagePottentions = VillagePottentions::factory()->create();

        $response = $this->get(
            route('all-village-pottentions.show', $villagePottentions)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.all_village_pottentions.show')
            ->assertViewHas('villagePottentions');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_village_pottentions()
    {
        $villagePottentions = VillagePottentions::factory()->create();

        $response = $this->get(
            route('all-village-pottentions.edit', $villagePottentions)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.all_village_pottentions.edit')
            ->assertViewHas('villagePottentions');
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

        $response = $this->put(
            route('all-village-pottentions.update', $villagePottentions),
            $data
        );

        $data['id'] = $villagePottentions->id;

        $this->assertDatabaseHas('village_pottentions', $data);

        $response->assertRedirect(
            route('all-village-pottentions.edit', $villagePottentions)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_village_pottentions()
    {
        $villagePottentions = VillagePottentions::factory()->create();

        $response = $this->delete(
            route('all-village-pottentions.destroy', $villagePottentions)
        );

        $response->assertRedirect(route('all-village-pottentions.index'));

        $this->assertDeleted($villagePottentions);
    }
}
