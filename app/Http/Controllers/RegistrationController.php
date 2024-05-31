<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateRegistrationRequest;
use App\Http\Requests\StoreRegistrationRequest;
use Illuminate\Support\Facades\Gate;
class RegistrationController extends Controller
{
    
   
    public function index()
    {
        // Pobierz wszystkie rejestracje z powiązanymi modelami studentów i kursów
        $registrations = Registration::with(['student', 'course'])->get();

        return view('registrations.index', compact('registrations'));
    }

    public function create()
    {
        return view('registrations.create');
    }
    public function store(StoreRegistrationRequest $request)
    {
        $input = $request->all();
        Registration::create($input);

        return redirect()->route('registrations.index');
    }

    public function show(Registration  $registration)
    {
        return view('registration.show', [
            'registration' => $registration
        ]);
    }

    public function edit(Registration $registration)
    {
        return view('registrations.edit', ['registration' => $registration]);
    }
  

    public function update(UpdateRegistrationRequest $request, Registration $registration)
    {
        Gate::authorize('update', $registration);

        $input = $request->all();
        $registration->update($input);
        return redirect()->route('registrations.index');
      
    }

    public function destroy(Registration $registration)
    {
        $registration->delete();
        return redirect()->route('registrations.index');
    }







}