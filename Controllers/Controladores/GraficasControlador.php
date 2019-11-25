<?php
require_once '../../Models/Dao/Graficas.php';
class DatosGrafica{
        
        static function ObjetosPerdidos(){
            //Devuelve String de datos
            $año = date("Y");
            $mes = date("m");
            $dia = date("d");

            $mesini = $mes - 4;
            $fechaini = "$año"."-$mesini"."-$dia"; 
            $fechafin = "$año"."-$mes"."-$dia";

            return Graficas::getObjetosPerdidos( $fechaini, $fechafin);
        }

        static function ObjetosEntregados(){
            //Devuelve Array con datos
            $año = date("Y");
            $mes = date("m");
            $dia = date("d");

            $mesini = $mes - 4;
            $fechaini = "$año"."-$mesini"."-$dia"; 
            $fechafin = "$año"."-$mes"."-$dia";

            return Graficas::getObjetosEntregados( $fechaini, $fechafin);
        }
        
        static function RangoMeses(){
        //Devuelve Array Con rango en meses
            //$año = date("Y");
            $mes = date("m");
            //$dia = date("d");
        
            $mesini = $mes - 4;

            $meses=array();
            for($i = $mesini; $i<($mes+1); $i++){
                    if($i == -3){
                        $meses[] = "'Septiembre',";
                    }else if($i == -2){
                        $meses[] = "'Octubre',";
                    }else if($i==-1){
                        $meses[] = "'Noviembre',";
                    }else if($i==0){
                        $meses[] = "'Diciembre',";
                    }else if($i==1){
                        $meses[] = "'Enero',";
                    }else if($i==2){
                        $meses[] = "'Febrero',";
                    }else if($i==3){
                        $meses[] = "'Marzo',";
                    }else if($i==4){
                        $meses[] = "'Abril',";
                    }else if($i==5){
                        $meses[] = "'Mayo',";
                    }else if($i==6){
                        $meses[] = "'Junio',";
                    }else if($i==7){
                        $meses[] = "'Julio',";
                    }else if($i==8){
                        $meses[] = "'Agosto',";
                    }else if($i==9){
                        $meses[] = "'Septiembre',";
                    }else if($i==10){
                        $meses[] = "'Octubre',";
                    }else if($i==11){
                        $meses[] = "'Noviembre',";
                    }else if($i==12){
                        $meses[] = "'Diciembre',";
                    }else{
                        //$meses = $meses."Null ,";
                    }
            }
            return $meses;
        }
}
?>