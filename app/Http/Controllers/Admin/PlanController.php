<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function store(Request $request)
    {
        //dd($request->all());
        $data = $request->all();
        $data['url'] = Str::kebab($request->name);
        $this->repository->create($data);

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
        $plan = $this->repository->where('url', $id)->first();

        if(!$plan){
            return redirect()->back();
        }

        $plan->delete();

        return redirect()->route('plans.index');
    }

    public function search(Request $request){

        $filters = $request->except('_token');

        $plans = $this->repository->search($request->filter);

        return view('admin.pages.plans.index', compact('plans','filters'));
    }
}
