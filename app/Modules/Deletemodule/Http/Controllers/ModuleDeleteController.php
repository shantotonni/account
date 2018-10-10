<?php

namespace App\Modules\Deletemodule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\ModuleDelete\ModuleDelete;
use App\Models\AccessLevel\Modules;

class ModuleDeleteController extends Controller
{
    public function index()
    {
        return view('deletemodule::delete_module.index');
    }
 
    public function create()
    {
        //
    }
  
    public function store(Request $request)
    {
        //
    }
 
    public function show($id)
    {
        //
    }
    
    public function edit($id)
    {
        //
    }
    
    public function update(Request $request)
    {
        if($request->ticketing == 1)
        {
            $module = Modules::whereBetween('id' , [24,29])->delete();

            $update = ModuleDelete::find(1);

            $update->status = 0;
            $update->update();

            $directory1 = app_path('Modules/Settings/Http/Controllers/Order');
            $directory2 = app_path('Modules/Settings/Http/Controllers/ticket');
            $directory3 = app_path('Modules/Settings/Resources/Views/dashboard');
            $directory4 = app_path('Modules/Settings/Resources/Views/order');
            $directory5 = app_path('Modules/Settings/Resources/Views/ticket');
            $directory6 = app_path('Modules/Settings/Resources/Views/ticket_bill');
            
            File::deleteDirectory($directory1);
            File::deleteDirectory($directory2);
            File::deleteDirectory($directory3);
            File::deleteDirectory($directory4);
            File::deleteDirectory($directory5);
            File::deleteDirectory($directory6);

        }

        if($request->manpower == 1)
        {
            $update = ModuleDelete::find(2);

            $update->status = 0;
            $update->update();

            $directory1 = app_path('Modules/Manpowerservice');
            
            File::deleteDirectory($directory1);

        }

        if($request->recruit == 1)
        {
            $module = Modules::whereBetween('id' , [30,61])->delete();

            $update = ModuleDelete::find(3);

            $update->status = 0;
            $update->update();

            $directory1 = app_path('Modules/Recruitdashboard');
            $directory2 = app_path('Modules/Company');
            $directory3 = app_path('Modules/Visa');
            $directory4 = app_path('Modules/Visastamp');
            $directory5 = app_path('Modules/Order');
            $directory6 = app_path('Modules/Customer');
            $directory7 = app_path('Modules/Okala');
            $directory8 = app_path('Modules/Medicalslip');
            $directory9 = app_path('Modules/Mofa');
            $directory10 = app_path('Modules/Musaned');
            $directory11 = app_path('Modules/Fingerprint');
            $directory12 = app_path('Modules/Flight');
            $directory13 = app_path('Modules/Document');
            $directory14 = app_path('Modules/Recruitment');
            $directory15 = app_path('Modules/Recrutereport');
            $directory16 = app_path('Modules/Manpower');

            
            File::deleteDirectory($directory1);
            File::deleteDirectory($directory2);
            File::deleteDirectory($directory3);
            File::deleteDirectory($directory4);
            File::deleteDirectory($directory5);
            File::deleteDirectory($directory6);
            File::deleteDirectory($directory7);
            File::deleteDirectory($directory8);
            File::deleteDirectory($directory9);
            File::deleteDirectory($directory10);
            File::deleteDirectory($directory11);
            File::deleteDirectory($directory12);
            File::deleteDirectory($directory13);
            File::deleteDirectory($directory14);
            File::deleteDirectory($directory15);
            File::deleteDirectory($directory16);

        }

        return back()->with('message' , 'Module Deleted Successfully');
        
    }

    public function destroy($id)
    {
        //
    }
}
