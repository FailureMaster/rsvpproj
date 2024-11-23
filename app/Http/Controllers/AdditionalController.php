<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class AdditionalController extends Controller
{
    public function index(Request $request)
    {
        $query = Guest::whereNotNull('added_by')->with('addedByGuest');
    
        // Search by firstName, lastName, addedBy, or code
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('firstName', 'LIKE', "%{$search}%")
                  ->orWhere('lastName', 'LIKE', "%{$search}%")
                  ->orWhere('code', 'LIKE', "%{$search}%")
                  ->orWhereHas('addedByGuest', function ($subQuery) use ($search) {
                      $subQuery->where('firstName', 'LIKE', "%{$search}%")
                               ->orWhere('lastName', 'LIKE', "%{$search}%");
                  });
            });
        }
    
        // Filter by is_coming
        if ($request->filled('is_coming')) {
            $query->where('is_coming', $request->is_coming);
        }
    
        $additionalGuests = $query->get();
    
        return view('plusone.index', compact('additionalGuests'));
    }
    
}
