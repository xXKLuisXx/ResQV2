<?php

use App\Etiqueta;
use Illuminate\Database\Seeder;

class EtiquetaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $etiqueta = new Etiqueta();
        $etiqueta->nombre = 'Cero violencia';
        $etiqueta->save();

        $etiqueta = new Etiqueta();
        $etiqueta->nombre = 'Maltrato';
        $etiqueta->save();

        $etiqueta = new Etiqueta();
        $etiqueta->nombre = 'Abuso';
        $etiqueta->save();

        $etiqueta = new Etiqueta();
        $etiqueta->nombre = 'Violacion';
        $etiqueta->save();

        $etiqueta = new Etiqueta();
        $etiqueta->nombre = 'Mujer';
        $etiqueta->save();

        $etiqueta = new Etiqueta();
        $etiqueta->nombre = 'Odio';
        $etiqueta->save();
    }
}
