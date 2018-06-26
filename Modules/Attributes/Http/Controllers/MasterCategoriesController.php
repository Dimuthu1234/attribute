<?php

namespace Modules\Attributes\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Attributes\Entities\AttributeLabel;
use Modules\Attributes\Entities\MasterCategory;
use Session;

class MasterCategoriesController extends Controller
{

    protected $masterCategories;
    protected $attributeLabelList;

    public function __construct()
    {
        $this->masterCategories = MasterCategory::get();
        $this->attributeLabelList = AttributeLabel::get();
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('attributes::masterCategories.index')
            ->withMasterCategories($this->masterCategories);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('attributes::masterCategories.create')
            ->withAttributeLabelList($this->attributeLabelList->pluck('name', 'id'))
            ->withMasterCategories($this->masterCategories->pluck('name', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        if ($request->hasFile('image')){
            $name = $input['name'];
            $formtedName = str_replace([' ','%'], '-', $name);

            $imageName = $formtedName . '-' . (string) rand(00000, 99999)  . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path().'/images/masterCategory', $imageName);
            $input['image'] = $imageName;
        }
        $masterCategory = MasterCategory::create($input);
        $masterCategory->attributeLabels()->sync((array) $request->input('attribute_label_list'));

        Session::flash('success','Master Category has been added !');
        return redirect()->route('master_category.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(MasterCategory $masterCategory)
    {
        return view('attributes::masterCategories.show')
            ->withMasterCategory($masterCategory);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(MasterCategory $masterCategory)
    {
        return view('attributes::masterCategories.edit')
            ->withMasterCategory($masterCategory)
            ->withAttributeLabelList($this->attributeLabelList->pluck('name', 'id'))
            ->withMasterCategories($this->masterCategories->pluck('name', 'id'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, MasterCategory $masterCategory)
    {
        $input = $request->all();
        if ($request->hasFile('image')){
            $name = $input['name'];
            $formtedName = str_replace([' ','%'], '-', $name);

            $imageName = $formtedName . '-' . (string) rand(00000, 99999)  . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path().'/images/masterCategory', $imageName);
            $input['image'] = $imageName;
        }
        $masterCategory->update($input);
        $masterCategory->attributeLabels()->sync((array) $request->input('attribute_label_list'));
        Session::flash('success','Master Category has been Updated !');
        return redirect()->route('master_category.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(MasterCategory $masterCategory)
    {
        $masterCategory->delete();
        Session::flash('success','Master Category has been Deleted !');
        return redirect()->route('master_category.index');
    }
}
