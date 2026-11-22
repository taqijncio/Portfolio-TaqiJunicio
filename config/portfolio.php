<?php

return [
    // Akun admin awal (dipakai oleh AdminSeeder). Atur di file .env:
    // ADMIN_EMAIL=emailkamu@gmail.com
    // ADMIN_PASSWORD=passwordkamu
    'admin_email'    => env('ADMIN_EMAIL', 'admin@example.com'),
    'admin_password' => env('ADMIN_PASSWORD', 'admin123'),
];
