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
        $this->types = Type::get();
        $this->attributeLabelList = AttributeLabel::get();
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
        $input = $request->all();
        if ($request->hasFile('image')){
            $name = $input['name'];
            $formtedName = str_replace([' ','%'], '-', $name);

            $imageName = $formtedName . '-' . (string) rand(00000, 99999)  . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path().'/images/type', $imageName);
            $input['image'] = $imageName;
        }
        $type = Type::create($input);
        $type->attributeLabels()->sync((array) $request->input('attribute_label_list'));


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
        $input = $request->all();
        if ($request->hasFile('image')){
            $name = $input['name'];
            $formtedName = str_replace([' ','%'], '-', $name);

            $imageName = $formtedName . '-' . (string) rand(00000, 99999)  . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path().'/images/type', $imageName);
            $input['image'] = $imageName;
        }
        $type->update($input);
        $type->attributeLabels()->sync((array) $request->input('attribute_label_list'));
        Session::flash('success','Type has been Updated !');
        return redirect()->route('type.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Type $type)
    {
        $type->delete();
        Session::flash('success','Type has been Deleted !');
        return redirect()->route('type.index');
    }
}