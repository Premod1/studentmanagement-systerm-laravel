<?php

namespace App\Http\Controllers;
use App\Models\Enrollment;
use App\Models\Payment;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller

{
    public function report1($pid)
    {
        $payment = Payment::find($pid);
        $pdf = App::make('dompdf.wrapper');

        $print = "<div style='margin-20px;padding:20px;'>";
        $print.= "<h1 align='center'> Payment Reciept</h1>";
        $print.="<hr/>";
        $print.= "<p> Reciept No : <b>" . $pid ."</b></p>";
        $print.="<p> Date : <b> ". $payment->enrollment->enroll_no ." </b></p>";
        $print.="<p> Date : <b> ". $payment->enrollment->student->name ." </b></p>";

        $print.= "<hr/>";
        $print.="<table style='width:100%;' >";

        $print.="<tr>";
        $print.= "<td>Description</td>";
        $print.="<td>Amount</td>";

        $print.="</tr>";

        $print.="</tr>";
        $print.= "<td> <h3>".$payment->enrollment->batch->name."</h3> </td>";
        $print.= "<td> <h3>".$payment->amount."</h3> </td>";
        $print.="</tr>";

        $print.= "</table>";
        $print.= "<hr/>";

        // $print.="<span> printed by: <b>".Auth::user()->name."</b></span>";
        $print.="<span> printed by: <b>".date('y-m-d')."</b></span>";

        $print.= "<div/>";
        $pdf->loadHTML($print);
        return $pdf->stream();
    }
}


?>