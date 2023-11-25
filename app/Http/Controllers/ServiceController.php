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
        $services = Service::all();
        return view('services.index', compact('services'));
    }

    public function store(Request $request)
    {
        // Walidacja danych przesłanych z formularza
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric',
        ]);

        // Zapis nowej usługi do bazy danych
        $service = new Service([
            'name'        => $request->input('name'),
            'description' => $request->input('description'),
            'price'       => $request->input('price'),
        ]);

        $service->save();

        // Przekierowanie do widoku z usługami po dodaniu nowej usługi
        return redirect()->route('services.index')->with('success', 'Usługa została dodana pomyślnie.');
    }

    public function export(){
        return Excel::download(new ServicesExport, 'users.xlsx');
    }

}
