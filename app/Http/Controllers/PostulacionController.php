<?php

namespace App\Http\Controllers;

use App\Models\Postulacion;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PostulacionController extends Controller
{
    

    

    public function reportePostulantes($id_conv){

        $plazas = DB::table('t8_plazas')
            ->where('t7_convocatorias_t7_id','=',8)
            ->get();

        $reportes = Postulacion::select(
            DB::raw('t8_plazas.t8_plaza as plaza,t8_plazas.t8_id as t8_id, concat(t2_datos_personales.t2_apellido_pat," ",t2_datos_personales.t2_apellido_mat," ",t2_datos_personales.t2_nombres) as nombre , t13_postulacion.t13_minimo'))
                ->join('t8_plazas','t8_plazas.t8_id','=','t13_postulacion.t8_plazas_t8_id')
                ->join('t7_convocatorias','t7_convocatorias.t7_id','=','t8_plazas.t7_convocatorias_t7_id')
                ->join('t1_postulantes','t1_postulantes.t1_id','=','t13_postulacion.t1_postulantes_t1_id')
                ->join('t2_datos_personales','t2_datos_personales.t1_postulantes_t1_id','=','t1_postulantes.t1_id')
                ->where('t7_convocatorias.t7_id','=',$id_conv)
                ->orderBy('t8_id','asc')
                ->orderBy('t2_datos_personales.t2_apellido_pat','asc')
                ->get();
               
        $pdf = PDF::loadView('reportePostulantes',['reportes'=>$reportes,'plazas'=>$plazas]);
        return $pdf->stream();

    }

    public function reporteReqMinimos($id_conv){

        $plazas = DB::table('t8_plazas')
            ->where('t7_convocatorias_t7_id','=',8)
            ->get();

        $reportes = Postulacion::select(
            DB::raw('t8_plazas.t8_plaza as plaza,t8_plazas.t8_id as t8_id, concat(t2_datos_personales.t2_apellido_pat," ",t2_datos_personales.t2_apellido_mat," ",t2_datos_personales.t2_nombres) as nombre , t13_postulacion.t13_minimo'))
                ->join('t8_plazas','t8_plazas.t8_id','=','t13_postulacion.t8_plazas_t8_id')
                ->join('t7_convocatorias','t7_convocatorias.t7_id','=','t8_plazas.t7_convocatorias_t7_id')
                ->join('t1_postulantes','t1_postulantes.t1_id','=','t13_postulacion.t1_postulantes_t1_id')
                ->join('t2_datos_personales','t2_datos_personales.t1_postulantes_t1_id','=','t1_postulantes.t1_id')
                ->where('t7_convocatorias.t7_id','=',$id_conv)
                ->orderBy('t8_id','asc')
                ->orderBy('t13_postulacion.t13_minimo','desc')
                ->orderBy('t2_datos_personales.t2_apellido_pat','asc')
                ->get();
               
        $pdf = PDF::loadView('reporteReqMinimos',['reportes'=>$reportes,'plazas'=>$plazas]);
        return $pdf->stream();

    }

    public function reporteEvConocimientos($id_conv){
        $plazas = DB::table('t8_plazas')
            ->where('t7_convocatorias_t7_id','=',8)
            ->get();

        $reportes = Postulacion::select(
            DB::raw('t8_plazas.t8_plaza as plaza,t8_plazas.t8_id as t8_id, concat(t2_datos_personales.t2_apellido_pat," ",t2_datos_personales.t2_apellido_mat," ",t2_datos_personales.t2_nombres) as nombre , t13_postulacion.t13_conocimientos as nota'))
                ->join('t8_plazas','t8_plazas.t8_id','=','t13_postulacion.t8_plazas_t8_id')
                ->join('t7_convocatorias','t7_convocatorias.t7_id','=','t8_plazas.t7_convocatorias_t7_id')
                ->join('t1_postulantes','t1_postulantes.t1_id','=','t13_postulacion.t1_postulantes_t1_id')
                ->join('t2_datos_personales','t2_datos_personales.t1_postulantes_t1_id','=','t1_postulantes.t1_id')
                ->where('t7_convocatorias.t7_id','=',$id_conv)
                ->where('t13_postulacion.t13_minimo','=',1)
                ->orderBy('t8_id','asc')
                ->orderBy('t13_postulacion.t13_conocimientos','desc')
                ->orderBy('t2_datos_personales.t2_apellido_pat','asc')
                ->get();
        
        $pdf = PDF::loadView('reporteEvConocimientos',['reportes'=>$reportes,'plazas'=>$plazas]);
        
        return $pdf->stream();
    }

    public function reporteEvCurricular($id_conv){
        $plazas = DB::table('t8_plazas')
            ->where('t7_convocatorias_t7_id','=',8)
            ->get();

        $reportes = Postulacion::select(
            DB::raw('t8_plazas.t8_plaza as plaza,t8_plazas.t8_id as t8_id, concat(t2_datos_personales.t2_apellido_pat," ",t2_datos_personales.t2_apellido_mat," ",t2_datos_personales.t2_nombres) as nombre , t13_postulacion.t13_curricular as nota'))
                ->join('t8_plazas','t8_plazas.t8_id','=','t13_postulacion.t8_plazas_t8_id')
                ->join('t7_convocatorias','t7_convocatorias.t7_id','=','t8_plazas.t7_convocatorias_t7_id')
                ->join('t1_postulantes','t1_postulantes.t1_id','=','t13_postulacion.t1_postulantes_t1_id')
                ->join('t2_datos_personales','t2_datos_personales.t1_postulantes_t1_id','=','t1_postulantes.t1_id')
                ->where('t7_convocatorias.t7_id','=',$id_conv)
                ->where('t13_postulacion.t13_minimo','=',1)
                ->where('t13_postulacion.t13_conocimientos','>=',26)
                ->orderBy('t8_id','asc')
                ->orderBy('t13_postulacion.t13_curricular','desc')
                ->orderBy('t2_datos_personales.t2_apellido_pat','asc')
                ->get();
        
        $pdf = PDF::loadView('reporteEvCurricular',['reportes'=>$reportes,'plazas'=>$plazas]);
        
        return $pdf->stream();
    }

    public function reporteEntrevista($id_conv){
        $plazas = DB::table('t8_plazas')
            ->where('t7_convocatorias_t7_id','=',8)
            ->get();

        $reportes = Postulacion::select(
            DB::raw('t8_plazas.t8_plaza as plaza,t8_plazas.t8_id as t8_id, concat(t2_datos_personales.t2_apellido_pat," ",t2_datos_personales.t2_apellido_mat," ",t2_datos_personales.t2_nombres) as nombre , t13_postulacion.t13_conocimientos as n_eco,t13_postulacion.t13_curricular as n_ecu,t13_postulacion.t13_entrevista as n_en,t13_postulacion.t13_final as n_fin'))
                ->join('t8_plazas','t8_plazas.t8_id','=','t13_postulacion.t8_plazas_t8_id')
                ->join('t7_convocatorias','t7_convocatorias.t7_id','=','t8_plazas.t7_convocatorias_t7_id')
                ->join('t1_postulantes','t1_postulantes.t1_id','=','t13_postulacion.t1_postulantes_t1_id')
                ->join('t2_datos_personales','t2_datos_personales.t1_postulantes_t1_id','=','t1_postulantes.t1_id')
                ->where('t7_convocatorias.t7_id','=',$id_conv)
                ->where('t13_postulacion.t13_minimo','=',1)
                ->where('t13_postulacion.t13_conocimientos','>=',26)
                ->where('t13_postulacion.t13_curricular','>=',16)
                ->orderBy('t8_id','asc')
                ->orderBy('t13_postulacion.t13_final','desc')
                ->get();

        $pdf = PDF::loadView('reporteEntrevista',['reportes'=>$reportes,'plazas'=>$plazas]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream();

    }
}
