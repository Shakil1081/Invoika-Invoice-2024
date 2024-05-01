@extends('layouts.admin')
@section('content')
@can('company_list_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.company-lists.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.companyList.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.companyList.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-CompanyList">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.companyList.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.companyList.fields.company_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.companyList.fields.logo') }}
                        </th>
                        <th>
                            {{ trans('cruds.companyList.fields.website_url') }}
                        </th>
                        <th>
                            {{ trans('cruds.companyList.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.companyList.fields.contact_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.companyList.fields.postalcode') }}
                        </th>
                        <th>
                            {{ trans('cruds.companyList.fields.invoice_number_slug') }}
                        </th>
                        <th>
                            {{ trans('cruds.companyList.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.companyList.fields.approved_signature') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companyLists as $key => $companyList)
                        <tr data-entry-id="{{ $companyList->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $companyList->id ?? '' }}
                            </td>
                            <td>
                                {{ $companyList->company_name ?? '' }}
                            </td>
                            <td>
                                @if($companyList->logo)
                                    <a href="{{ $companyList->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $companyList->logo->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $companyList->website_url ?? '' }}
                            </td>
                            <td>
                                {{ $companyList->email ?? '' }}
                            </td>
                            <td>
                                {{ $companyList->contact_no ?? '' }}
                            </td>
                            <td>
                                {{ $companyList->postalcode ?? '' }}
                            </td>
                            <td>
                                {{ $companyList->invoice_number_slug ?? '' }}
                            </td>
                            <td>
                                {{ $companyList->address ?? '' }}
                            </td>
                            <td>
                                @foreach($companyList->approved_signature as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $media->getUrl('thumb') }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @can('company_list_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.company-lists.show', $companyList->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('company_list_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.company-lists.edit', $companyList->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('company_list_delete')
                                    <form action="{{ route('admin.company-lists.destroy', $companyList->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('company_list_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.company-lists.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 10,
  });
  let table = $('.datatable-CompanyList:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection