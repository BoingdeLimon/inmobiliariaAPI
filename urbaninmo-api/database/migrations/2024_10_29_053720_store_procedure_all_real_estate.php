<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // DB::unprepared('
        //     CREATE OR REPLACE VIEW realestate_view AS
        //     SELECT 
        //         re.id,
        //         re.title,
        //         re.description,
        //         re.size,
        //         re.rooms,
        //         re.bathrooms,
        //         re.type,
        //         re.has_garage AS garage,
        //         re.has_garden AS garden,
        //         re.has_patio AS patio,
        //         re.price,
        //         re.is_occupied AS isOccupied,
        //         re.pdf,
        //         a.address,
        //         a.zipcode,
        //         a.city,
        //         a.state,
        //         a.country,
        //         a.x,
        //         a.y,
        //         ARRAY_AGG(DISTINCT p.photo) AS photos
        //     FROM 
        //         real_estate re
        //     LEFT JOIN 
        //         address a ON re.id_address = a.id
        //     LEFT JOIN 
        //         photos p ON p.id_real_estate = re.id
        //     GROUP BY 
        //         re.id, a.id;
        // ');

        // DB::unprepared('
        //     CREATE OR REPLACE FUNCTION get_all_realestate_details()
        //     RETURNS TABLE(
        //         id BIGINT,
        //         title VARCHAR,
        //         description TEXT,
        //         size DOUBLE PRECISION,
        //         rooms INT,
        //         bathrooms INT,
        //         type VARCHAR,
        //         garage BOOLEAN,
        //         garden BOOLEAN,
        //         patio BOOLEAN,
        //         price NUMERIC,
        //         isOccupied BOOLEAN,
        //         pdf VARCHAR,
        //         address VARCHAR,
        //         zipcode VARCHAR,
        //         city VARCHAR,
        //         state VARCHAR,
        //         country VARCHAR,
        //         x NUMERIC,
        //         y NUMERIC,
        //         photos VARCHAR[]
        //     ) AS $$
        //     BEGIN
        //         RETURN QUERY SELECT * FROM realestate_view;
        //     END;
        //     $$ LANGUAGE plpgsql;
        // ');
    }

    public function down(): void
    {
        DB::unprepared('DROP FUNCTION IF EXISTS get_all_realestate_details');
        DB::unprepared('DROP VIEW IF EXISTS realestate_view');
    }
};
