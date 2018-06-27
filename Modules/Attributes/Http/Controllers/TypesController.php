<?php

namespace Modules\Attributes\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Attributes\Entities\AttributeLabel;
use Modules\Attributes\Entities\Type;
use Session;

class TypesController extends Controller
{
    protected $types;
    protected $attributeLabelList;

    public function __construct()
    {
        $this->types = Type::where('status', 0)->get();
        $this->attributeLabelList = AttributeLabel::where('status', 0)->get();
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('attributes::types.index')
            ->withTypes($this->types);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('attributes::types.create')
            ->withAttributeLabelList($this->attributeLabelList->pluck('name', 'id'));
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
            $request->file('image')->move(public_path() . '/images/type', $imageName);
            $input['image'] = $imageName;
        }
        $type = Type::create($input);
        if ($strings_array == null) {
            $type->attributeLabels()->sync((array) $request->input('attribute_label_list'));
        }else
        {
            foreach ($strings_array as $sa) {
                $string_labels[] = AttributeLabel::create(['name' => $sa]);
            }

            for ($y = 0; $y < sizeof($string_labels); $y++) {
                $string_labels_ids[] = $string_labels[$y]->id;
            }
            $type->attributeLabels()->sync(array_merge((array)$id_array, (array)$string_labels_ids));
        }
        Session::flash('success','Type has been added !');
        return redirect()->route('type.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(Type $type)
    {
        return view('attributes::types.show')
            ->withType($type);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(Type $type)
    {
        return view('attributes::types.edit')
            ->withType($type)
            ->withAttributeLabelList($this->attributeLabelList->pluck('name', 'id'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, Type $type)
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
            $request->file('image')->move(public_path() . '/images/type', $imageName);
            $input['image'] = $imageName;
        }
        $type->update($input);
        if ($strings_array == null) {
            $type->attributeLabels()->sync((array) $request->input('attribute_label_list'));
        }else
        {
            foreach ($strings_array as $sa) {
                $string_labels[] = AttributeLabel::create(['name' => $sa]);
            }

            for ($y = 0; $y < sizeof($string_labels); $y++) {
                $string_labels_ids[] = $string_labels[$y]->id;
            }
            $type->attributeLabels()->sync(array_merge((array)$id_array, (array)$string_labels_ids));
        }
        Session::flash('success','Type has been Updated !');
        return redirect()->route('type.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Type $type)
    {
//        $type->delete();
        $type->update(['status' => 1]);
        Session::flash('success','Type has been Deleted !');
        return redirect()->route('type.index');
    }
}