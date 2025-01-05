<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.ad.index', ['ads' => Ad::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ad.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $requestData = $request->all();

        if ($request->hasFile('image_1')) {
            $file1 = $request->file('image_1');
            $imageName1 = rand() . "." . $file1->getClientOriginalExtension();
            $file1->move(public_path('temp/ad'), $imageName1);
            $requestData['image_1'] = $imageName1;
        }

        if ($request->hasFile('image_2')) {
            $file2 = $request->file('image_2');
            $imageName2 = rand() . "." . $file2->getClientOriginalExtension();
            $file2->move(public_path('temp/ad'), $imageName2);
            $requestData['image_2'] = $imageName2;
        }

        Ad::create($requestData);

        return redirect()->route('admin.ads.index')->with('success', 'Successfully ;-)');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ad $ad)
    {
        return view('admin.ad.edit', compact('ad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ad $ad)
    {
        $requestData = $request->all();

        if ($request->hasFile('image_1')) {

            if ($ad->image_1 && file_exists(public_path('temp/ad/' . $ad->image_1))) {
                unlink(public_path('temp/ad/' . $ad->image_1));
            }

            $file1 = $request->file('image_1');
            $imageName1 = rand() . "." . $file1->getClientOriginalExtension();
            $file1->move(public_path('temp/ad'), $imageName1);
            $requestData['image_1'] = $imageName1;
        }

        if ($request->hasFile('image_2')) {

            if ($ad->image_2 && file_exists(public_path('temp/ad/' . $ad->image_2))) {
                unlink(public_path('temp/ad/' . $ad->image_2));
            }


            $file2 = $request->file('image_2');
            $imageName2 = rand() . "." . $file2->getClientOriginalExtension();
            $file2->move(public_path('temp/ad'), $imageName2);
            $requestData['image_2'] = $imageName2;
        }

        $ad->update($requestData);

        return redirect()->route('admin.ads.index')->with('success', 'Successfully ;-)');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ad $ad)
    {

        if ($ad->image_1 && file_exists(public_path('temp/ad/' . $ad->image_1))) {
            unlink(public_path('temp/ad/' . $ad->image_1));
        }

        if ($ad->image_2 && file_exists(public_path('temp/ad/' . $ad->image_2))) {
            unlink(public_path('temp/ad/' . $ad->image_2));
        }

        $ad->delete();

        return redirect()->back()->with('success', 'Successfully ;-)');
    }
}
