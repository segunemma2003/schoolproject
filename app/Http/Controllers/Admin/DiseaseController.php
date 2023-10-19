<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Disease;
use Illuminate\Http\Request;
use App\Http\Requests\DiseaseRequest;
use App\Http\Controllers\Controller;
use App\Contracts\DiseaseRepositoryInterface;

class DiseaseController extends Controller
{
    protected $diseaseRepositoryInterface;

    public function __construct(DiseaseRepositoryInterface $diseaseRepositoryInterface)
    {
        $this->diseaseRepositoryInterface = $diseaseRepositoryInterface;
        $this->authorizeResource(Disease::class, 'disease');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.disease.index', $this->diseaseRepositoryInterface->indexDisease());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.disease.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\DiseaseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiseaseRequest $request)
    {
        $this->diseaseRepositoryInterface->storeDisease($request);
        return redirect(adminRedirectRoute('disease'))->withSuccess('Disease Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function show(Disease $disease)
    {
        return view('admin.disease.show', $this->diseaseRepositoryInterface->showDisease($disease));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function edit(Disease $disease)
    {
        return view('admin.disease.edit', $this->diseaseRepositoryInterface->editDisease($disease));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\DiseaseRequest  $request
     * @param  \App\Models\Admin\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function update(DiseaseRequest $request, Disease $disease)
    {
        $this->diseaseRepositoryInterface->updateDisease($request, $disease);
        return redirect(adminRedirectRoute('disease'))->withInfo('Disease Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disease $disease)
    {
        $this->diseaseRepositoryInterface->destroyDisease($disease);
        return redirect(adminRedirectRoute('disease'))->withFail('Disease Deleted Successfully.');
    }
}
