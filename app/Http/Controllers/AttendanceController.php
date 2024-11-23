<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index(Request $request){

        $query = Guest::query();
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('firstName', 'LIKE', "%{$search}%")
                ->orWhere('lastName', 'LIKE', "%{$search}%")
                ->orWhere('code', 'LIKE', "%{$search}%");
            });
        }

        if ($request->filled('relationship')) {
            $query->where('relationship', $request->relationship);
        }

        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        if ($request->filled('is_coming')) {
            $query->where('is_coming', $request->is_coming);
        }

        // Get the filtered or all guests
        $guests = $query->get();

        

        return view('attendance.index', compact('guests'));
    }
}
