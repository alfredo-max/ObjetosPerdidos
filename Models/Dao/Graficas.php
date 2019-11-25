<?php
require_once (__DIR__.'/Conexion.php');
    class Graficas{
        
        public static function getObjetosPerdidos( $fini, $ffin){
            $cnx = Conexion::Conectar();
            $sql = "SELECT COUNT(objetos.fecha_reporte), Month(objetos.fecha_reporte) 
            FROM 'objetos'
            WHERE (objetos.fecha_reporte BETWEEN '$fini' and '$ffin')  AND estado = 1
            GROUP BY MONTH(objetos.fecha_reporte)";

            $resultado = $cnx->prepare($sql);
            return $resultado->execute();
        }

        public static function getObjetosEntregados( $fini, $ffin){
            $cnx = Conexion::Conectar();
            $sql = "SELECT COUNT(objetos.fecha_reporte), Month(objetos.fecha_reporte) 
            FROM 'objetos'
            WHERE (objetos.fecha_reporte BETWEEN '$fini' and '$ffin')  AND estado = 3
            GROUP BY MONTH(objetos.fecha_reporte)";

            $resultado = $cnx->prepare($sql);
            return $resultado->execute();
        }
    }
?>