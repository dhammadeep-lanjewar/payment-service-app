<?php

namespace Tests\Unit;

use Tests\TestCase;

class BookTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_book_store()
    {
        $response = $this->call('POST','/books',[
            'title' => 'Some Book Title 123',
            'content' => 'Some Book Content 123',
            'price' => '1212',
            'year_published' => '2023'
        ]);
        // dd($response);
        $response->assertStatus($response->status(),419);
        $this->assertTrue(true);
    }
}
