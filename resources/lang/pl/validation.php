<?php

return [
    'required' => 'Pole :attribute jest wymagane.',
    'email' => 'Pole :attribute musi być adresem email.',
    'numeric' => 'Pole :attribute musi być liczbą.',
    'size' => [
        'numeric' => 'Pole :attribute musi mieć :size.',
        'file' => 'Plik :attribute musi mieć :size kilobajtów.',
        'string' => 'Pole :attribute musi mieć :size znaków.',
        'array' => 'Pole :attribute musi zawierać :size elementów.',
    ],
    'custom' => [
        'cardNumber' => [
            'required_if' => 'Pole numer karty jest wymagane, gdy metoda płatności to karta.',
        ],
        'ccv' => [
            'required_if' => 'Pole ccv jest wymagane, gdy metoda płatności to karta.',
        ],
        'expirationDate' => [
            'required_if' => 'Pole data wazności jest wymagane, gdy metoda płatności to karta.',
        ],
        'surname' => [
            'required_if' => 'Pole nazwisko jest wymagane, gdy metoda płatności to karta.',
        ],
        'blikCode' => [
            'required_if' => 'Pole kod blik jest wymagane, gdy metoda płatności to blik.',
        ]
    ],
    'unique' => 'Podany :attribute został już zajęty.',
    'attributes' => [
        'email' => 'adres email',
        'password' => 'hasło',
        'name' => 'nick',
        'voievodeship' => 'województwo',
        'shoe_number' => 'numer buta',
        'fullName' => 'imię i nazwisko',
        'city' => 'miasto',
        'street' => 'ulica',
        'houseNumber' => 'numer domu',
        'apartment_number' => 'numer mieszkania',
        'postalCode' => 'kod pocztowy',
        'phone' => 'numer telefonu',
        'postOffice' => 'poczta',
        'deliveryMethod' => 'metoda dostawy',
        'paymentMethod' => 'metoda płatności',
        'password_confirmation' => 'powtórz hasło',
        'old_password' => 'stare hasło',
        'new_password' => 'nowe hasło',
        'new_password_confirmation' => 'powtórz nowe hasło',
        'current_password' => 'bieżące hasło',
        'cardNumber' => 'numer karty',
        'expirationDate' => 'data wazności',
        'ccv' => 'ccv',
        'blikCode' => 'kod blik',
    ],
];
?>