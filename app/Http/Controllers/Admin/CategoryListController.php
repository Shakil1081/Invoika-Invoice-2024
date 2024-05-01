<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCategoryListRequest;
use App\Http\Requests\StoreCategoryListRequest;
use App\Http\Requests\UpdateCategoryListRequest;
use App\Models\CategoryList;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryListController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('category_list_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categoryLists = CategoryList::all();

        return view('admin.categoryLists.index', compact('categoryLists'));
    }

    public function create()
    {
        abort_if(Gate::denies('category_list_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.categoryLists.create');
    }

    public function store(StoreCategoryListRequest $request)
    {
        $categoryList = CategoryList::create($request->all());

        return redirect()->route('admin.category-lists.index');
    }

    public function edit(CategoryList $categoryList)
    {
        abort_if(Gate::denies('category_list_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.categoryLists.edit', compact('categoryList'));
    }

    public function update(UpdateCategoryListRequest $request, CategoryList $categoryList)
    {
        $categoryList->update($request->all());

        return redirect()->route('admin.category-lists.index');
    }

    public function show(CategoryList $categoryList)
    {
        abort_if(Gate::denies('category_list_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.categoryLists.show', compact('categoryList'));
    }

    public function destroy(CategoryList $categoryList)
    {
        abort_if(Gate::denies('category_list_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categoryList->delete();

        return back();
    }

    public function massDestroy(MassDestroyCategoryListRequest $request)
    {
        $categoryLists = CategoryList::find(request('ids'));

        foreach ($categoryLists as $categoryList) {
            $categoryList->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
