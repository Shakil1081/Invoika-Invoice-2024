<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyClientListRequest;
use App\Http\Requests\StoreClientListRequest;
use App\Http\Requests\UpdateClientListRequest;
use App\Models\ClientList;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ClientListController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('client_list_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ClientList::query()->select(sprintf('%s.*', (new ClientList)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'client_list_show';
                $editGate      = 'client_list_edit';
                $deleteGate    = 'client_list_delete';
                $crudRoutePart = 'client-lists';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('first_name', function ($row) {
                return $row->first_name ? $row->first_name : '';
            });
            $table->editColumn('last_name', function ($row) {
                return $row->last_name ? $row->last_name : '';
            });
            $table->editColumn('username', function ($row) {
                return $row->username ? $row->username : '';
            });
            $table->editColumn('mobile_number', function ($row) {
                return $row->mobile_number ? $row->mobile_number : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('country', function ($row) {
                return $row->country ? $row->country : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.clientLists.index');
    }

    public function create()
    {
        abort_if(Gate::denies('client_list_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.clientLists.create');
    }

    public function store(StoreClientListRequest $request)
    {
        $clientList = ClientList::create($request->all());

        return redirect()->route('admin.client-lists.index');
    }

    public function edit(ClientList $clientList)
    {
        abort_if(Gate::denies('client_list_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.clientLists.edit', compact('clientList'));
    }

    public function update(UpdateClientListRequest $request, ClientList $clientList)
    {
        $clientList->update($request->all());

        return redirect()->route('admin.client-lists.index');
    }

    public function show(ClientList $clientList)
    {
        abort_if(Gate::denies('client_list_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.clientLists.show', compact('clientList'));
    }

    public function destroy(ClientList $clientList)
    {
        abort_if(Gate::denies('client_list_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientList->delete();

        return back();
    }

    public function massDestroy(MassDestroyClientListRequest $request)
    {
        $clientLists = ClientList::find(request('ids'));

        foreach ($clientLists as $clientList) {
            $clientList->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
