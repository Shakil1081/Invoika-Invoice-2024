<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInvoiceDerailRequest;
use App\Http\Requests\UpdateInvoiceDerailRequest;
use App\Http\Resources\Admin\InvoiceDerailResource;
use App\Models\InvoiceDerail;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InvoiceDerailApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('invoice_derail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InvoiceDerailResource(InvoiceDerail::with(['product'])->get());
    }

    public function store(StoreInvoiceDerailRequest $request)
    {
        $invoiceDerail = InvoiceDerail::create($request->all());

        return (new InvoiceDerailResource($invoiceDerail))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(InvoiceDerail $invoiceDerail)
    {
        abort_if(Gate::denies('invoice_derail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InvoiceDerailResource($invoiceDerail->load(['product']));
    }

    public function update(UpdateInvoiceDerailRequest $request, InvoiceDerail $invoiceDerail)
    {
        $invoiceDerail->update($request->all());

        return (new InvoiceDerailResource($invoiceDerail))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(InvoiceDerail $invoiceDerail)
    {
        abort_if(Gate::denies('invoice_derail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoiceDerail->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
