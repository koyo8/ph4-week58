<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\BigQuestion;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class IndexTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use DatabaseTransactions;
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('東京の難読地名クイズ');

        $fake = factory(BigQuestion::class)->create();
        $this->assertDatabaseHas('big_questions', ['name' => $fake["name"],]);
    }
}
