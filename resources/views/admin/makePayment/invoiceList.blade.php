@extends('layouts.admin')
@section('content')
    @can('payment_status_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">

            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            Invoice List
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-PaymentStatus">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.makePayment.fields.invoice_id') }}
                        </th>
                        <th>
                            {{ trans('cruds.makePayment.fields.inv_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.makePayment.fields.total_amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.makePayment.fields.amount_paid') }}
                        </th>
                        <th>
                            {{ trans('cruds.makePayment.fields.due_amount') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($invoiceList as $key => $invoice)
                        <tr data-entry-id="{{ $invoice->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $invoice->invoice_number ?? '' }}
                            </td>
                            <td>
                                {{ $invoice->inv_date ?? '' }}
                            </td>
                            <td>{{ $invoice->total_amount }}</td>
                            <td>{{ $invoice->payments->sum('amount_paid') ?? 0 }}</td>
                            <td>{{ $invoice->total_amount - $invoice->payments->sum('amount_paid') ?? 0 }}</td>
                            <td>
                                @if($invoice->total_amount - $invoice->payments->sum('amount_paid') > 0)
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.invoice.payment', $invoice->id) }}">
                                        Make Payment
                                    </a>
                                @else
                                    <span class="badge badge-info">Paid</span>
                                @endif
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
        {{--$(function () {--}}
        {{--    let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)--}}
        {{--    @can('payment_status_delete')--}}
        {{--    let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'--}}
        {{--    let deleteButton = {--}}
        {{--        text: deleteButtonTrans,--}}
        {{--        url: "{{ route('admin.payment-statuses.massDestroy') }}",--}}
        {{--        className: 'btn-danger',--}}
        {{--        action: function (e, dt, node, config) {--}}
        {{--            var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {--}}
        {{--                return $(entry).data('entry-id')--}}
        {{--            });--}}

        {{--            if (ids.length === 0) {--}}
        {{--                alert('{{ trans('global.datatables.zero_selected') }}')--}}

        {{--                return--}}
        {{--            }--}}

        {{--            if (confirm('{{ trans('global.areYouSure') }}')) {--}}
        {{--                $.ajax({--}}
        {{--                    headers: {'x-csrf-token': _token},--}}
        {{--                    method: 'POST',--}}
        {{--                    url: config.url,--}}
        {{--                    data: { ids: ids, _method: 'DELETE' }})--}}
        {{--                    .done(function () { location.reload() })--}}
        {{--            }--}}
        {{--        }--}}
        {{--    }--}}
        {{--    dtButtons.push(deleteButton)--}}
        {{--    @endcan--}}

        {{--    $.extend(true, $.fn.dataTable.defaults, {--}}
        {{--        orderCellsTop: true,--}}
        {{--        order: [[ 1, 'desc' ]],--}}
        {{--        pageLength: 100,--}}
        {{--    });--}}
        {{--    let table = $('.datatable-PaymentStatus:not(.ajaxTable)').DataTable({ buttons: dtButtons })--}}
        {{--    $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){--}}
        {{--        $($.fn.dataTable.tables(true)).DataTable()--}}
        {{--            .columns.adjust();--}}
        {{--    });--}}

        {{--})--}}

    </script>
@endsection
