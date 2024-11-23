<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function create( Request $request){
        // Build the query based on search and filters
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

        return view('guest.create', compact('guests'));
    }

    public function store(Request $request){
        request()->validate([
            'firstName' => ['required'],
            'lastName'  => ['required'],
        ]);

        $code = $this->generateUniqueCode();

        Guest::create([
            'firstName'     => $request->firstName,
            'lastName'      => $request->lastName,
            'relationship'  => $request->relationship,
            'role'          => $request->role,
            'code'          => $code,

        ]);
        return redirect()->back()->with('success', 'Guest added successfully!');
    }

    
    private function generateUniqueCode(){
        $maxAttempts = 5; // Set a limit to avoid infinite loops
        $attempt = 0;

        do {
            // Generate a random 6-character alphanumeric code
            $code = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'), 0, 6);
            
            // Check if the generated code already exists in the database
            $exists = Guest::where('code', $code)->exists();

            $attempt++;
        } while ($exists && $attempt < $maxAttempts);

        // If after 5 attempts a unique code is not found, throw an error
        if ($exists) {
            throw new \Exception('Failed to generate a unique code.');
        }

        return $code;
    }

    public function toggleAttendance(Request $request){
        $guest = Guest::find($request->guest_id);
    
        if ($guest) {
            $guest->did_come = $request->did_come;
            $guest->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }
}
