<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBrandListRequest;
use App\Http\Requests\StoreBrandListRequest;
use App\Http\Requests\UpdateBrandListRequest;
use App\Models\BrandList;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BrandListController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('brand_list_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $brandLists = BrandList::all();

        return view('admin.brandLists.index', compact('brandLists'));
    }

    public function create()
    {
        abort_if(Gate::denies('brand_list_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.brandLists.create');
    }

    public function store(StoreBrandListRequest $request)
    {
        $brandList = BrandList::create($request->all());

        return redirect()->route('admin.brand-lists.index');
    }

    public function edit(BrandList $brandList)
    {
        abort_if(Gate::denies('brand_list_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.brandLists.edit', compact('brandList'));
    }

    public function update(UpdateBrandListRequest $request, BrandList $brandList)
    {
        $brandList->update($request->all());

        return redirect()->route('admin.brand-lists.index');
    }

    public function show(BrandList $brandList)
    {
        abort_if(Gate::denies('brand_list_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.brandLists.show', compact('brandList'));
    }

    public function destroy(BrandList $brandList)
    {
        abort_if(Gate::denies('brand_list_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $brandList->delete();

        return back();
    }

    public function massDestroy(MassDestroyBrandListRequest $request)
    {
        $brandLists = BrandList::find(request('ids'));

        foreach ($brandLists as $brandList) {
            $brandList->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
