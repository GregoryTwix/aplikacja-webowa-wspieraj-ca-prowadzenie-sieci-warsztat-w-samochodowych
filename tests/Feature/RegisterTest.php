<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegisterTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Wyświetlanie formularza
     *
     * @return void
     */
    public function testRegisterFormDisplay()
    {
        $response = $this->get('/registerd');

        $response->assertStatus(200);
    }
}
