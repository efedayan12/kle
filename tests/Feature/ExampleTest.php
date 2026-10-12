<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
public function test_misafir_kullanici_giris_sayfasina_yonlendirilir(): void
{
    $response = $this->get('/');

    $response->assertRedirect('/giris');
}
}
