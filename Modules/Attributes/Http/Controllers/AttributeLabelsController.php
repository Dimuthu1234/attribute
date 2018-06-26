<?php

namespace Modules\Attributes\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Attributes\Entities\AttributeLabel;
use Modules\Attributes\Entities\MasterCategory;
use Modules\Attributes\Entities\Type;
use Session;

class AttributeLabelsController extends Controller
{
    protected $attributeLabels;
    protected $typeList;
    protected $masterCategoryList;

    public function __construct()
    {
        $this->attributeLabels = AttributeLabel::where('status', 0)->get();
        $this->typeList = Type::get()->pluck('name', 'id');
        $this->masterCategoryList = MasterCategory::get()->pluck('name', 'id');
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('attributes::attributeLabels.index')
            ->withAttributeLabels($this->attributeLabels);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('attributes::attributeLabels.create')
            ->withTypeList($this->typeList)
            ->withMasterCategoryList($this->masterCategoryList);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $attributeLabel = AttributeLabel::create($request->input());
        $attributeLabel->types()->sync((array) $request->input('type_list'));
        $attributeLabel->masterCategories()->sync((array) $request->input('master_category_list'));
        Session::flash('success','Attribute Label has been added !');
        return redirect()->route('attribute_label.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(AttributeLabel $attributeLabel)
    {
        return view('attributes::attributeLabels.show')
            ->withAttributeLabel($attributeLabel);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(AttributeLabel $attributeLabel)
    {
        return view('attributes::attributeLabels.edit')
            ->withAttributeLabel($attributeLabel)
            ->withMasterCategoryList($this->masterCategoryList)
            ->withTypeList($this->typeList);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, AttributeLabel $attributeLabel)
    {
        $attributeLabel->update($request->input());
        $attributeLabel->types()->sync((array) $request->input('type_list'));
        $attributeLabel->masterCategories()->sync((array) $request->input('master_category_list'));
        Session::flash('success','Attribute Label has been Updated !');
        return redirect()->route('attribute_label.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(AttributeLabel $attributeLabel)
    {
//        $attributeLabel->delete();
        $attributeLabel->update(['status' => 1]);
        Session::flash('success','Attribute Label has been Deleted !');
        return redirect()->route('attribute_label.index');
    }
}
