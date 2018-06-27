<?php

namespace Modules\Attributes\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Attributes\Entities\AttributeLabel;
use Modules\Attributes\Entities\MasterCategory;
use Session;
use Closure;

class MasterCategoriesController extends Controller
{

    protected $masterCategories;
    protected $attributeLabelList;
//    protected $mc;

    public function __construct()
    {


//        $this->middleware(function($request, Closure $next) {
            $this->masterCategories = MasterCategory::where('status', 0)->get();
            $this->attributeLabelList = AttributeLabel::where('status', 0)->get();
//            $this->mc = MasterCategory::where('parent_id', 1)->get();
//            return $next($request);
//        });
//        if ($request->has('master_category')){
//            $this->mc = MasterCategory::where('parent_id', 1)->get();
//        }else{
//            $this->mc = MasterCategory::where('parent_id', 1)->get();
//        }
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
    public function create(Request $request)
    {
        return view('attributes::masterCategories.create')
            ->withAttributeLabelList($this->attributeLabelList->pluck('name', 'id'))
            ->withMasterCategories($this->masterCategories->pluck('name', 'id'));
//            ->withMc($this->mc->pluck('name', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $list = $request->attribute_label_list;
        $strings_array = [];
        $id_array = [];
        for ($x = 0; $x < sizeof($list); $x++) {
            if (is_numeric($list[$x])) {
                $id_array[] = $list[$x];
            } else {
                $strings_array[] = $list[$x];
            }
        }
        $input = $request->all();
        if ($request->hasFile('image')) {
            $name = $input['name'];
            $formtedName = str_replace([' ', '%'], '-', $name);

            $imageName = $formtedName . '-' . (string)rand(00000, 99999) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path() . '/images/masterCategory', $imageName);
            $input['image'] = $imageName;
        }
        $masterCategory = MasterCategory::create($input);
        if ($strings_array == null) {
            $masterCategory->attributeLabels()->sync((array)$request->input('attribute_label_list'));
        }else
        {
            foreach ($strings_array as $sa) {
                $string_labels[] = AttributeLabel::create(['name' => $sa]);
            }

            for ($y = 0; $y < sizeof($string_labels); $y++) {
                $string_labels_ids[] = $string_labels[$y]->id;
            }
            $masterCategory->attributeLabels()->sync(array_merge((array)$id_array, (array)$string_labels_ids));
        }

        Session::flash('success', 'Master Category has been added !');
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
//            ->withMc($this->mc->pluck('name', 'id'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, MasterCategory $masterCategory)
    {
        $list = $request->attribute_label_list;
        $strings_array = [];
        $id_array = [];
        for ($x = 0; $x < sizeof($list); $x++) {
            if (is_numeric($list[$x])) {
                $id_array[] = $list[$x];
            } else {
                $strings_array[] = $list[$x];
            }
        }
        $input = $request->all();
        if ($request->hasFile('image')) {
            $name = $input['name'];
            $formtedName = str_replace([' ', '%'], '-', $name);

            $imageName = $formtedName . '-' . (string)rand(00000, 99999) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path() . '/images/masterCategory', $imageName);
            $input['image'] = $imageName;
        }
        $masterCategory->update($input);
        if ($strings_array == null) {
            $masterCategory->attributeLabels()->sync((array)$request->input('attribute_label_list'));
        }else
        {
            foreach ($strings_array as $sa) {
                $string_labels[] = AttributeLabel::create(['name' => $sa]);
            }

            for ($y = 0; $y < sizeof($string_labels); $y++) {
                $string_labels_ids[] = $string_labels[$y]->id;
            }
            $masterCategory->attributeLabels()->sync(array_merge((array)$id_array, (array)$string_labels_ids));
        }

        Session::flash('success', 'Master Category has been Updated !');
        return redirect()->route('master_category.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(MasterCategory $masterCategory)
    {
//        $masterCategory->delete();
        $masterCategory->update(['status' => 1]);
        Session::flash('success', 'Master Category has been Deleted !');
        return redirect()->route('master_category.index');
    }
}
