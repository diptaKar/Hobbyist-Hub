<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\User;
use App\Models\Product;
use Carbon\Carbon;

use App\Models\order;
class ReportController extends Controller
{
    public function downloadPdf()
{
    // Customize this logic to generate the content of your PDF report
    $data = [
        'title' => 'Your Report Title',
        'newCustomersToday' => $this->getNewCustomersToday(),
        'productsAddedToday' => $this->getProductsAddedToday(),
        'ordersToday' => $this->getOrdersToday(),
    ];

    $pdf = PDF::loadView('pdf.report', $data);

    // Customize the PDF file name as needed
    $fileName = 'report_' . now()->format('Ymd_His') . '.pdf';

    return $pdf->download($fileName);
}
    private function getNewCustomersToday()
    {
        // Customize this logic to retrieve the count of new customers today
        return User::whereDate('created_at', today())->count();
    }

    private function getProductsAddedToday()
    {
        // Customize this logic to retrieve the names and quantities of products added today
        return Product::whereDate('created_at', today())->select('title', 'qty')->get();
    }

    private function getOrdersToday()
    {
        // Customize this logic to retrieve orders created today
        return order::whereDate('created_at', today())->get();
    }
}
