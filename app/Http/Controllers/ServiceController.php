<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Service;
use App\Exports\ServicesExport;
use Maatwebsite\Excel\Facades\Excel;



class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::paginate(6);
        return view('services.index', compact('services'));
    }

    public function store(Request $request)
    {
        
    }

    public function export(){
        return Excel::download(new ServicesExport, 'lista_usług.xlsx');
    }

}
