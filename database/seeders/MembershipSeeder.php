<?php

namespace Database\Seeders;

use App\Models\Membership;
use Illuminate\Database\Seeder;

class MembershipSeeder extends Seeder
{
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Básico',
                'description' => 'Acceso al gimnasio en horario estándar.',
                'price' => 1500.00,
                'duration_days' => 30,
                'features' => ['Acceso al área de pesas', 'Horario 6am - 8pm', 'Casillero incluido'],
                'is_active' => true,
            ],
            [
                'name' => 'Pro',
                'description' => 'Acceso completo + clases grupales.',
                'price' => 2500.00,
                'duration_days' => 30,
                'features' => ['Todo lo del plan Básico', 'Clases grupales ilimitadas', 'Acceso extendido 5am - 10pm', 'Evaluación física mensual'],
                'is_active' => true,
            ],
            [
                'name' => 'Elite',
                'description' => 'Acceso total + entrenador personal.',
                'price' => 4500.00,
                'duration_days' => 30,
                'features' => ['Todo lo del plan Pro', '4 sesiones con entrenador personal', 'Plan nutricional básico', 'Acceso 24/7', 'Descuento 10% en cafetería'],
                'is_active' => true,
            ],
        ];

        foreach ($plans as $plan) {
            Membership::firstOrCreate(['name' => $plan['name']], $plan);
        }
    }
}
