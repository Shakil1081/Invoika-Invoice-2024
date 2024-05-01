@extends('layouts.admin')
@section('content')
@can('add_invoice_master_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.add-invoice-masters.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.addInvoiceMaster.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.addInvoiceMaster.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-AddInvoiceMaster">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.addInvoiceMaster.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.addInvoiceMaster.fields.select_client') }}
                        </th>
                        <th>
                            {{ trans('cruds.addInvoiceMaster.fields.invoice_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.addInvoiceMaster.fields.inv_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.addInvoiceMaster.fields.payment_status') }}
                        </th>
                        <th>
                            {{ trans('cruds.addInvoiceMaster.fields.billing_address') }}
                        </th>
                        <th>
                            {{ trans('cruds.addInvoiceMaster.fields.shipping_address') }}
                        </th>
                        <th>
                            {{ trans('cruds.addInvoiceMaster.fields.sub_total') }}
                        </th>
                        <th>
                            {{ trans('cruds.addInvoiceMaster.fields.discount') }}
                        </th>
                        <th>
                            {{ trans('cruds.addInvoiceMaster.fields.tax') }}
                        </th>
                        <th>
                            {{ trans('cruds.addInvoiceMaster.fields.shipping_charge') }}
                        </th>
                        <th>
                            {{ trans('cruds.addInvoiceMaster.fields.total_amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.addInvoiceMaster.fields.notes') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($addInvoiceMasters as $key => $addInvoiceMaster)
                        <tr data-entry-id="{{ $addInvoiceMaster->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $addInvoiceMaster->id ?? '' }}
                            </td>
                            <td>
                                {{ $addInvoiceMaster->select_client->company_name ?? '' }}
                            </td>
                            <td>
                                {{ $addInvoiceMaster->invoice_number ?? '' }}
                            </td>
                            <td>
                                {{ $addInvoiceMaster->inv_date ?? '' }}
                            </td>
                            <td>
                                {{ $addInvoiceMaster->payment_status->payment_status ?? '' }}
                            </td>
                            <td>
                                {{ $addInvoiceMaster->billing_address->full_name ?? '' }}
                            </td>
                            <td>
                                {{ $addInvoiceMaster->shipping_address->shipping_name ?? '' }}
                            </td>
                            <td>
                                {{ $addInvoiceMaster->sub_total ?? '' }}
                            </td>
                            <td>
                                {{ $addInvoiceMaster->discount ?? '' }}
                            </td>
                            <td>
                                {{ $addInvoiceMaster->tax ?? '' }}
                            </td>
                            <td>
                                {{ $addInvoiceMaster->shipping_charge ?? '' }}
                            </td>
                            <td>
                                {{ $addInvoiceMaster->total_amount ?? '' }}
                            </td>
                            <td>
                                {{ $addInvoiceMaster->notes ?? '' }}
                            </td>
                            <td>
                                @can('add_invoice_master_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.add-invoice-masters.show', $addInvoiceMaster->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('add_invoice_master_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.add-invoice-masters.edit', $addInvoiceMaster->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('add_invoice_master_delete')
                                    <form action="{{ route('admin.add-invoice-masters.destroy', $addInvoiceMaster->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('add_invoice_master_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.add-invoice-masters.massDestroy') }}",
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
    pageLength: 100,
  });
  let table = $('.datatable-AddInvoiceMaster:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection