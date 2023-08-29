<?php

namespace App\Http\Controllers;

use App\Http\Requests\InfoRequest;
use App\Models\Info;
use App\Transformers\InfoTransformer;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return DataTables::eloquent(Info::query())
            ->setTransformer(InfoTransformer::class)
            ->toJson();
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
    public function store(InfoRequest $request)
    {
        DB::beginTransaction();
        try {
            Info::create($request->validated());
            DB::commit();
            return successResponse('Info created successfully', 201);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Info $info)
    {
        return $info;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Info $info)
    {
        return $info;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InfoRequest $request, Info $info)
    {
        DB::beginTransaction();
        try {
            $info->update($request->validated());
            DB::commit();
            return successResponse('Info updated successfully', 200);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Info $info)
    {
        DB::beginTransaction();
        try {
            $info->delete();
            DB::commit();
            return successResponse('Info deleted successfully', 200);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
        }
    }

    public function restore(Info $info)
    {
        DB::beginTransaction();
        try {
            $info->restore();
            DB::commit();
            return successResponse('Info restored successfully', 200);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
        }
    }

    public function restoreAll()
    {
        DB::beginTransaction();
        try {
            Info::onlyTrashed()->restore();
            DB::commit();
            return successResponse('Info restored successfully', 200);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
        }
    }
}
