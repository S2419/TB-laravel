<?php

namespace Tests\Feature;

<<<<<<< HEAD
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
=======
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
<<<<<<< HEAD
    public function test_example()
=======
    public function testBasicTest()
>>>>>>> 1c1a40f38470702bb4ee55d074fd66a0766f56fb
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
