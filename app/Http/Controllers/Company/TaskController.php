<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Task;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class TaskController extends Controller
{
    public function upload(Request $request, Task $task)
    {
        $task->addMedia($request->files->get('img'))->toMediaCollection();

        return back()->with('status', 'good');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): Response
    {
        $v = $request->user()->employee;
        $search = $request->query('search');
        $sort = $request->query('sort');
        $tasks = Task::with([
            'company:id,name',
            'customer.user:id,name,email',
            'city:id,name',
            'status:id,name,color',
        ])
            ->where('company_id', $v?->company_id);

        if ($search) {
            $ss = fn ($query) => $query->where('name', 'like', '%'.$search.'%');

            $tasks = $tasks->where('code', 'like', '%'.$search.'%')
                ->orWhereHas('customer', $ss)
                ->orWhereHas('status', $ss)
                ->orWhereHas('city', $ss);
        }
        if ($sort) {

            [$v1, $v2] = explode(':', $sort);
            if ($v1) {

                if ($v2 == 'asc' || $v2 == 'desc') {
                    if ($v1 == 'code') {
                        $tasks->orderBy($v1, $v2);
                    }
                    if ($v1 == 'customer') {
                        $tasks->orderBy(
                            Customer::with('user.name')->addSelect('name')
                                ->whereColumn('customers.id', 'tasks.customer_id')
                                ->orderBy('name', $v2), $v2
                        );
                    }
                }
            }
        }
        $tasks = $tasks->paginate();

        return Inertia::render('Company/Tasks/Index', [
            'tasks' => $tasks,
            'user' => $request->user(),
            'q' => $request->query('sort'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
