<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class BackendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userCounts = DB::table('users')
                        ->select(DB::raw('count(*) as count, role_id'))
                        ->groupBy('role_id')
                        ->get();
    
        return view('backend.admin.access_system.index', compact('userCounts'));
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
    public function show(Backend $backend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Backend $backend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Backend $backend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Backend $backend)
    {
        //
    }
}
