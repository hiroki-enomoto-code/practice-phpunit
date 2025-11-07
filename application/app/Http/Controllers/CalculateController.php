<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Calculator;

class CalculateController extends Controller
{
    protected Calculator $calculator;

    public function __construct(Calculator $calculator)
    {
        $this->calculator = $calculator;
    }

    public function sum(Request $request)
    {
        $validated = $request->validate([
            'a' => 'required|integer',
            'b' => 'required|integer',
        ]);

        $result = $this->calculator->sum($validated['a'], $validated['b']);

        return response()->json([
            'result' => $result,
        ]);
    }

    public function subtract(Request $request)
    {
        $validated = $request->validate([
            'a' => 'required|integer',
            'b' => 'required|integer',
        ]);

        $result = $this->calculator->subtract($validated['a'], $validated['b']);

        return response()->json([
            'result' => $result,
        ]);
    }
}
