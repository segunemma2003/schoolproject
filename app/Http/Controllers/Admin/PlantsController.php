<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Plants;
use Illuminate\Http\Request;
use App\Http\Requests\PlantsRequest;
use App\Http\Controllers\Controller;
use App\Contracts\PlantsRepositoryInterface;

class PlantsController extends Controller
{
    protected $plantsRepositoryInterface;

    public function __construct(PlantsRepositoryInterface $plantsRepositoryInterface)
    {
        $this->plantsRepositoryInterface = $plantsRepositoryInterface;
        $this->authorizeResource(Plants::class, 'plants');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.plants.index', $this->plantsRepositoryInterface->indexPlants());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.plants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PlantsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlantsRequest $request)
    {
        $this->plantsRepositoryInterface->storePlants($request);
        return redirect(adminRedirectRoute('plants'))->withSuccess('Plants Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Plants  $plants
     * @return \Illuminate\Http\Response
     */
    public function show(Plants $plants)
    {
        return view('admin.plants.show', $this->plantsRepositoryInterface->showPlants($plants));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Plants  $plants
     * @return \Illuminate\Http\Response
     */
    public function edit(Plants $plants)
    {
        return view('admin.plants.edit', $this->plantsRepositoryInterface->editPlants($plants));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PlantsRequest  $request
     * @param  \App\Models\Admin\Plants  $plants
     * @return \Illuminate\Http\Response
     */
    public function update(PlantsRequest $request, Plants $plants)
    {
        $this->plantsRepositoryInterface->updatePlants($request, $plants);
        return redirect(adminRedirectRoute('plants'))->withInfo('Plants Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Plants  $plants
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plants $plants)
    {
        $this->plantsRepositoryInterface->destroyPlants($plants);
        return redirect(adminRedirectRoute('plants'))->withFail('Plants Deleted Successfully.');
    }
}
