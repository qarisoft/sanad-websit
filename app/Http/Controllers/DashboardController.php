<?php

namespace App\Http\Controllers;

use App\Enums\UserType;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $t = $request->user()->type;
        switch ($t) {
            case UserType::Viewer:
                return redirect()->intended(route('tasks.index', absolute: false));
//                return redirect('/tasks/index');
//                return Inertia::render('Dashboard', []);
            case UserType::Employee:
                return redirect()->intended(route('tasks.index', absolute: false));
//                return Inertia::render('Company/Tasks/Index');
            case UserType::Admin:
                throw new \Exception('To be implemented');
                break;
            case UserType::SuperAdmin:
                throw new \Exception('To be implemented');
                break;
            case UserType::Customer:
                throw new \Exception('To be implemented');
                break;
            case UserType::CompanyOwner:
                throw new \Exception('To be implemented');

        }
        return Inertia::render('Dashboard');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
