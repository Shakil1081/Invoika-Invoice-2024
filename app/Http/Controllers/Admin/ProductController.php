<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\BrandList;
use App\Models\CategoryList;
use App\Models\Color;
use App\Models\Product;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::with(['brand', 'categories', 'product_color', 'media'])->get();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        abort_if(Gate::denies('product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $brands = BrandList::pluck('brand_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = CategoryList::pluck('category_name', 'id');

        $product_colors = Color::pluck('color_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.products.create', compact('brands', 'categories', 'product_colors'));
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->all());
        $product->categories()->sync($request->input('categories', []));
        if ($request->input('photo', false)) {
            $product->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($request->input('product_thumbnail_image', false)) {
            $product->addMedia(storage_path('tmp/uploads/' . basename($request->input('product_thumbnail_image'))))->toMediaCollection('product_thumbnail_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $product->id]);
        }

        return redirect()->route('admin.products.index');
    }

    public function edit(Product $product)
    {
        abort_if(Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $brands = BrandList::pluck('brand_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = CategoryList::pluck('category_name', 'id');

        $product_colors = Color::pluck('color_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $product->load('brand', 'categories', 'product_color');

        return view('admin.products.edit', compact('brands', 'categories', 'product', 'product_colors'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());
        $product->categories()->sync($request->input('categories', []));
        if ($request->input('photo', false)) {
            if (! $product->photo || $request->input('photo') !== $product->photo->file_name) {
                if ($product->photo) {
                    $product->photo->delete();
                }
                $product->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($product->photo) {
            $product->photo->delete();
        }

        if ($request->input('product_thumbnail_image', false)) {
            if (! $product->product_thumbnail_image || $request->input('product_thumbnail_image') !== $product->product_thumbnail_image->file_name) {
                if ($product->product_thumbnail_image) {
                    $product->product_thumbnail_image->delete();
                }
                $product->addMedia(storage_path('tmp/uploads/' . basename($request->input('product_thumbnail_image'))))->toMediaCollection('product_thumbnail_image');
            }
        } elseif ($product->product_thumbnail_image) {
            $product->product_thumbnail_image->delete();
        }

        return redirect()->route('admin.products.index');
    }

    public function show(Product $product)
    {
        abort_if(Gate::denies('product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->load('brand', 'categories', 'product_color');

        return view('admin.products.show', compact('product'));
    }

    public function destroy(Product $product)
    {
        abort_if(Gate::denies('product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductRequest $request)
    {
        $products = Product::find(request('ids'));

        foreach ($products as $product) {
            $product->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('product_create') && Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Product();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
