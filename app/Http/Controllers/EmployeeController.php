<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\JsonResponse;

class EmployeeController extends Controller
{
    public function index(): JsonResponse
    {
        $employees = Employee::orderBy('name')->get();

        return response()->json([
            'success' => true,
            'data'    => $employees,
            'total'   => $employees->count(),
        ]);
    }

    public function show(Employee $employee): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data'    => $employee,
        ]);
    }
}