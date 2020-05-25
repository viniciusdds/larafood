<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlan;

class PlanController extends Controller
{
    private $repository;

    public function __construct(Plan $plan)
    {
        $this->repository = $plan;
    }

    public function index(){
        $plans = $this->repository->latest()->paginate();

        return view('admin.pages.plans.index', compact('plans'));
    }

    public function create()
    {
        return view('admin.pages.plans.create');
    }

    public function store(StoreUpdatePlan $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('plans.index');
    }

    public function show($id){
        $plan = $this->repository->where('url', $id)->first();

        if(!$plan){
            return redirect()->back();
        }else{
            return view('admin.pages.plans.show', compact('plan'));
        }
    }

    public function destroy($id){
        $plan = $this->repository
                            ->with('details')
                            ->where('url', $id)
                            ->first();

        if(!$plan){
            return redirect()->back();
        }

        if($plan->details->count() > 0){
            return redirect()
                        ->back()
                        ->with('error', 'Existem detalhes vinculados a esse plano, portanto não pode deletar');
        }

        $plan->delete();

        return redirect()->route('plans.index');
    }

    public function search(Request $request){

        $filters = $request->except('_token');

        $plans = $this->repository->search($request->filter);

        return view('admin.pages.plans.index', compact('plans','filters'));
    }

    public function edit($id){
        $plan = $this->repository->where('url', $id)->first();

        if(!$plan){
            return redirect()->back();
        }

    
        return view('admin.pages.plans.edit', compact('plan'));
    }
    
    public function update(StoreUpdatePlan $request, $id){
        $plan = $this->repository->where('url', $id)->first();

        if(!$plan){
            return redirect()->back();
        }

        //dd($request->all());

        $plan->update($request->all());

        return redirect()->route('plans.index');
    }
}
