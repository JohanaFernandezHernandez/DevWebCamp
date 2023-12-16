<?php

namespace Controllers;

use MVC\Router;
use Model\Evento;
use Model\Usuario;
use Model\Registro;

class DashboardController {

    public static function index(Router $router){

        //Obtener Ultimos Registros
        $registros = Registro::get(5);
        foreach($registros as $registro) {
            $registro->usuario = Usuario::find($registro->usuario_id);
        }

        //Calcular los ingresos
        $virtuales = Registro::total('paquete_id', 2);
        $presenciales = Registro::total('paquete_id', 1);

        $ingresos_virtual = $virtuales * 46.41;
        $ingresos_presencial = $presenciales * 189.54;
        $total = ($ingresos_virtual + $ingresos_presencial);

        //Obtener elementos con mas y menos lugares Disponibles
        $menos_lugares = Evento::ordenarLimite('disponibles', 'ASC', 5);
        $mas_lugares = Evento::ordenarLimite('disponibles', 'DESC', 5);

        
        $router->render('admin/dashboard/index',[
            'titulo' =>'Panel de Administracion',
            'registros' => $registros,
            'ingresos_virtual' => $ingresos_virtual,
            'ingresos_presencial' => $ingresos_presencial,
            'total' => $total,
            'menos_lugares' => $menos_lugares,
            'mas_lugares' => $mas_lugares
        ]);
    }

}

?>