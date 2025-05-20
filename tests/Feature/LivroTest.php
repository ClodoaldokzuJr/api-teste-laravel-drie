<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Livro;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LivroTest extends TestCase
{
    use RefreshDatabase;

    public function test_usuario_autenticado_pode_criar_livro()
    {
        $user = User::factory()->create([
            'api_token' => 'meutoken123'
        ]);

        $response = $this->withHeaders([
            'Authorization' => 'meutoken123'
        ])->postJson('/api/livros', [
            'titulo' => 'O Senhor dos Anéis',
            'autor' => 'J.R.R. Tolkien',
            'ano' => 1954
        ]);

        $response->assertStatus(200)
                 ->assertJsonFragment([
                    'titulo' => 'O Senhor dos Anéis',
                    'autor' => 'J.R.R. Tolkien',
                    'ano' => 1954
                 ]);

        $this->assertDatabaseHas('livros', [
            'titulo' => 'O Senhor dos Anéis',
            'autor' => 'J.R.R. Tolkien'
        ]);
    }
}