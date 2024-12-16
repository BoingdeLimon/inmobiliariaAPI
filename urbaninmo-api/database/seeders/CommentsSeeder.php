<?php

namespace Database\Seeders;

use App\Models\Comments;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //1
        Comments::create([
            'id_user' => 1,
            'id_real_estate' => 1,
            'comment' => 'Me gustó mucho esta casa',
            'rating' => 5
        ]);
        Comments::create([
            'id_user' => 2,
            'id_real_estate' => 1,
            'comment' => 'Buena casa, pero muy cara',
            'rating' => 3
        ]);
        Comments::create([
            'id_user' => 3,
            'id_real_estate' => 1,
            'comment' => 'Excelente lugar, muy erca de la playa',
            'rating' => 4
        ]);
        //2
        Comments::create([
            'id_user' => 2,
            'id_real_estate' => 2,
            'comment' => 'La ubicación es excelente, aunque el vecindario es ruidoso.',
            'rating' => 4
        ]);
        
        Comments::create([
            'id_user' => 3,
            'id_real_estate' => 2,
            'comment' => 'La casa es espaciosa, pero necesita algunas reparaciones.',
            'rating' => 3
        ]);
        
        Comments::create([
            'id_user' => 4,
            'id_real_estate' => 2,
            'comment' => 'No me gustó el servicio de mantenimiento ofrecido.',
            'rating' => 2
        ]);
        //3
        Comments::create([
            'id_user' => 5,
            'id_real_estate' => 3,
            'comment' => 'Muy buena opción para una familia grande.',
            'rating' => 5
        ]);
        
        Comments::create([
            'id_user' => 6,
            'id_real_estate' => 3,
            'comment' => 'El precio es alto para lo que ofrece.',
            'rating' => 3
        ]);
        //4
        Comments::create([
            'id_user' => 2,
            'id_real_estate' => 4,
            'comment' => 'El vecindario es tranquilo y seguro.',
            'rating' => 5
        ]);
        
        Comments::create([
            'id_user' => 3,
            'id_real_estate' => 4,
            'comment' => 'No tiene jardín ni areas para fumadores.',
            'rating' => 2
        ]);
        
        Comments::create([
            'id_user' => 4,
            'id_real_estate' => 4,
            'comment' => 'Buena distribución de los espacios interiores.',
            'rating' => 4
        ]);
        
        Comments::create([
            'id_user' => 5,
            'id_real_estate' => 4,
            'comment' => 'Las instalaciones eléctricas necesitan una actualización.',
            'rating' => 3
        ]);
        
        Comments::create([
            'id_user' => 6,
            'id_real_estate' => 4,
            'comment' => 'Ideal para una familia pequeña, con habitaciones espaciosas.',
            'rating' => 5
        ]);
        //5
        Comments::create([
            'id_user' => 2,
            'id_real_estate' => 5,
            'comment' => 'La casa está bien ubicada y es muy cómoda.',
            'rating' => 5
        ]);
        
        Comments::create([
            'id_user' => 3,
            'id_real_estate' => 5,
            'comment' => 'El mobiliario es viejo y necesita renovación.',
            'rating' => 2
        ]);
        
        Comments::create([
            'id_user' => 4,
            'id_real_estate' => 5,
            'comment' => 'Ambiente agradable y buena ventilación.',
            'rating' => 4
        ]);
        
        Comments::create([
            'id_user' => 5,
            'id_real_estate' => 5,
            'comment' => 'La conexión a internet es muy lenta en esta zona.',
            'rating' => 3
        ]);
        
        Comments::create([
            'id_user' => 6,
            'id_real_estate' => 5,
            'comment' => 'Gran inversión, volvería a vivir aquí.',
            'rating' => 5
        ]);
        
        
        
    }
}
