<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Database\Eloquent\Factories\Factory; 
use Tests\TestCase;
use App\Models\Service;
use App\Models\User; 

class ServicesTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * A basic feature test example.
     * 
     * INSERT INTO services (name, description, price) VALUES ('Masaż relaksacyjny', 'Pełen relaks dla ciała i umysłu.', 80.00);
     * INSERT INTO services (name, description, price) VALUES ('Manicure i pedicure luksusowy', 'Zadbaj o swoje dłonie i stopy.', 120.00);
     * INSERT INTO services (name, description, price) VALUES ('Trening personalny', 'Osobisty trener pomoże Ci osiągnąć cele fitness.', 150.00);
     * INSERT INTO services (name, description, price) VALUES ('Konsultacja dietetyczna', 'Profesjonalny dietetyk pomoże stworzyć zdrowy plan żywieniowy.', 90.00);
     * INSERT INTO services (name, description, price) VALUES ('Sesja fotograficzna portretowa', 'Profesjonalna sesja fotograficzna, podkreśl swoją naturalną urodę.', 200.00);
     * INSERT INTO services (name, description, price) VALUES ('Konsultacja biznesowa', 'Doradztwo biznesowe od doświadczonych konsultantów.', 180.00);
     */
    public function test_view_service(): void
    {
        Service::create([
            'name' => 'test',
            'description' => 'test',
            'price' => 100
        ]);

        $user = User::factory()->create(); // Użyj metody factory() dostępnej dla modelu User

        $response = $this->actingAs($user) // Loguj jako stworzony użytkownik
                         ->get('/services');

        $response->assertStatus(200); // Oczekiwany status odpowiedzi
    }
}