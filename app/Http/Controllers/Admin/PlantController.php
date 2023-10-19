<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Plant;
use Illuminate\Http\Request;
use App\Http\Requests\PlantRequest;
use App\Http\Controllers\Controller;
use App\Contracts\PlantRepositoryInterface;

class PlantController extends Controller
{
    protected $plantRepositoryInterface;

    public function __construct(PlantRepositoryInterface $plantRepositoryInterface)
    {
        $this->plantRepositoryInterface = $plantRepositoryInterface;
        $this->authorizeResource(Plant::class, 'plant');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.plant.index', $this->plantRepositoryInterface->indexPlant());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.plant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PlantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlantRequest $request)
    {
        $this->plantRepositoryInterface->storePlant($request);
        return redirect(adminRedirectRoute('plant'))->withSuccess('Plant Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function show(Plant $plant)
    {
        return view('admin.plant.show', $this->plantRepositoryInterface->showPlant($plant));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function edit(Plant $plant)
    {
        return view('admin.plant.edit', $this->plantRepositoryInterface->editPlant($plant));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PlantRequest  $request
     * @param  \App\Models\Admin\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function update(PlantRequest $request, Plant $plant)
    {
        $this->plantRepositoryInterface->updatePlant($request, $plant);
        return redirect(adminRedirectRoute('plant'))->withInfo('Plant Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plant $plant)
    {
        $this->plantRepositoryInterface->destroyPlant($plant);
        return redirect(adminRedirectRoute('plant'))->withFail('Plant Deleted Successfully.');
    }
}
