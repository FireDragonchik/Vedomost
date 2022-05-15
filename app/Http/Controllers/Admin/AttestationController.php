<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attestation;
use App\Models\Report;
use Illuminate\Http\Request;

class AttestationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \App\Models\Report $report
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Report $report)
    {
        return view('admin.attestation.create', ['report' => $report]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Attestation $attestation
     * @return \Illuminate\Http\Response
     */
    public function show(Attestation $attestation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Attestation $attestation
     * @return \Illuminate\Http\Response
     */
    public function edit(Attestation $attestation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Attestation $attestation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attestation $attestation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Attestation $attestation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attestation $attestation)
    {
        //
    }
}
