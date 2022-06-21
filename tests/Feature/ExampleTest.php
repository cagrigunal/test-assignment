<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Test creating a new subscriber, field and field value.
     *
     * @return void
     */
    public function test_subscribers_fields_values_can_be_created()
    {
        // Run the DatabaseSeeder...
        $this->seed();
        $this->assertDatabaseCount('subscribers', 10) && $this->assertDatabaseCount('fields', 10) && $this->assertDatabaseCount('field_values', 10);
    }


    
    public function test_the_application_returns_a_successful_api_subscribers_response()
    {
        $response = $this->get('/api/subscribers');

        $response->assertStatus(200);
    }

    public function test_the_application_returns_an_error_api_subscriber_that_not_exist_response()
    {
        $this->expectException(\Exception::class);

        $response = $this->get('/api/subscribers/9999999');

        $this->assertTrue($response['error']);
    }

    public function test_the_application_returns_an_error_api_invalid_domain_response()
    {
        $this->expectException(\Exception::class);

        $response = $this->post('/api/subscribers',['name'=>'Alex','email'=>'deSouza@dededededededede.com','state'=>'1']);

        $this->assertTrue($response['error']);
    }

    public function test_the_application_returns_an_error_api_invalid_domain_format_response()
    {
        $this->expectException(\Exception::class);

        $response = $this->post('/api/subscribers',['name'=>'Alex','email'=>'deSouza@dededededededede','state'=>'1']);

        $this->assertTrue($response['error']);
    }


}
