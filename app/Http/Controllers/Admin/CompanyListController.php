<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCompanyListRequest;
use App\Http\Requests\StoreCompanyListRequest;
use App\Http\Requests\UpdateCompanyListRequest;
use App\Models\CompanyList;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CompanyListController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('company_list_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companyLists = CompanyList::with(['media'])->get();

        return view('admin.companyLists.index', compact('companyLists'));
    }

    public function create()
    {
        abort_if(Gate::denies('company_list_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.companyLists.create');
    }

    public function store(StoreCompanyListRequest $request)
    {
        $companyList = CompanyList::create($request->all());

        if ($request->input('logo', false)) {
            $companyList->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }

        foreach ($request->input('approved_signature', []) as $file) {
            $companyList->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('approved_signature');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $companyList->id]);
        }

        return redirect()->route('admin.company-lists.index');
    }

    public function edit(CompanyList $companyList)
    {
        abort_if(Gate::denies('company_list_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.companyLists.edit', compact('companyList'));
    }

    public function update(UpdateCompanyListRequest $request, CompanyList $companyList)
    {
        $companyList->update($request->all());

        if ($request->input('logo', false)) {
            if (! $companyList->logo || $request->input('logo') !== $companyList->logo->file_name) {
                if ($companyList->logo) {
                    $companyList->logo->delete();
                }
                $companyList->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($companyList->logo) {
            $companyList->logo->delete();
        }

        if (count($companyList->approved_signature) > 0) {
            foreach ($companyList->approved_signature as $media) {
                if (! in_array($media->file_name, $request->input('approved_signature', []))) {
                    $media->delete();
                }
            }
        }
        $media = $companyList->approved_signature->pluck('file_name')->toArray();
        foreach ($request->input('approved_signature', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $companyList->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('approved_signature');
            }
        }

        return redirect()->route('admin.company-lists.index');
    }

    public function show(CompanyList $companyList)
    {
        abort_if(Gate::denies('company_list_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.companyLists.show', compact('companyList'));
    }

    public function destroy(CompanyList $companyList)
    {
        abort_if(Gate::denies('company_list_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companyList->delete();

        return back();
    }

    public function massDestroy(MassDestroyCompanyListRequest $request)
    {
        $companyLists = CompanyList::find(request('ids'));

        foreach ($companyLists as $companyList) {
            $companyList->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('company_list_create') && Gate::denies('company_list_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new CompanyList();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
