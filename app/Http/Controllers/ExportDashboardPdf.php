<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Illuminate\Http\Request;

class ExportDashboardPdf extends Controller
{
    public $request_summary;
    public function __construct($request_summary){

        $this->request_summary = $request_summary;
    }
    public function exportDashboard(){
        $dompdf = new Dompdf();
        $dompdf->loadHtml($this->request_summary);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

      
    }
}
