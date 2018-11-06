<?php

namespace uvm\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;
use Log;
use uvm\Asiento;

class MesasSillasController extends Controller
{
    //
    function registrarMesaSilla(Request $request){
        
        $idsMesasArr = [];
        $idsSillasArr = [];
        $qryParamsArr = [];
        $idsMesas = $request->input('idsMesas');
        $idsSillas = $request->input('idsSillas');
        $idsMesasArr = explode(',',$idsMesas);
        $idsSillasArr = explode(',', $idsSillas);
        $idReservacion = $request->input('idReservacion');
        array_push($qryParamsArr, $idReservacion);
        array_push($qryParamsArr, $idsMesasArr);
        array_push($qryParamsArr, $idsSillasArr);


        /* Log::info("ids de las mesas_ " . $idsMesas);
        Log::info("ds de las sillas_ " . $idsSillas);
        Log::info("ids de las sillas_ " . $idReservacion); */

        //DB::beginTransaction();

        /* try {
            DB::insert(...);
            DB::insert(...);
            DB::insert(...);

            DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
        } */

        DB::transaction(function($qryParamsArr) use ($qryParamsArr) {
            Log::info("dentro de la transaccion  " . $qryParamsArr[0][0]);
            $idReservacion = "";
            $idsMesasArr = [];
            $idsSillasArr = [];
            $i=0;

            foreach($qryParamsArr as $param){
                if($i==0){
                    $idReservacion = $param;
                    $i=1;
                }else if($i==1){
                    $idsMesasArr = $param;
                    $i=2;
                }else if($i==2){
                    $idsSillasArr = $param;
                    $i=0;
                }
            }

            foreach($idsSillasArr as $idSilla){
                $asiento = new Asiento;
                $asiento->id_reservacion = $idReservacion;
                $asiento->id_mesa = $idsMesasArr[$i];
                $asiento->id_silla = $idSilla;
                
                $asiento->save();

                $i++;
            }

            
        });

        return "exito";
    }

    function getMesasSillas(){
        $reservaciones = DB::table('reservacion')
            ->join('asiento', 'asiento.id_reservacion', '=', 'reservacion.id')
            ->select('asiento.*', 'reservacion.*')
            ->orderBy('id_mesa', 'asc')
            ->orderBy('id_silla', 'asc')
            ->get();

        //echo $reservacion;

        return View::make('mesas', ['reservaciones' => $reservaciones]);
    }
}
