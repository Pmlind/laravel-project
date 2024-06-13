<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class ExportController extends Controller
{
    public function userExport(){
        $users = User::all();
        $csvFile = 'allUsers.csv';
        $headers = ['Content-Type' => 'text/csv', 'Content-Disposition' => 'attachment; filename="' . $csvFile . '"',];
        $handle = fopen('php://output', 'w');
        fputcsv($handle, ['id', 'name', 'email', 'password']);
        
        foreach($users as $user){
            fputcsv($handle, [$user->id, $user->name, $user->email, $user->password]);
        };
        fclose($handle);
        return Response::make('', 200, $headers);
    }
}
