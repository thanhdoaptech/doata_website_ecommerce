@extends('layouts.admin')
@section('content')
@can('order_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.orders.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.order.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Order', 'route' => 'admin.orders.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.order.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Order">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.order.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.user') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.amount') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.ship_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.ship_address') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.ship_address_2') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.country') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.city') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.zip') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.phone') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.fax') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.shipping_status') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.tax') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.email') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.tracking_number') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.date_shipped') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('order_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.orders.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.orders.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'user_name', name: 'user.name' },
{ data: 'amount', name: 'amount' },
{ data: 'ship_name', name: 'ship_name' },
{ data: 'ship_address', name: 'ship_address' },
{ data: 'ship_address_2', name: 'ship_address_2' },
{ data: 'country', name: 'country' },
{ data: 'city', name: 'city' },
{ data: 'zip', name: 'zip' },
{ data: 'phone', name: 'phone' },
{ data: 'fax', name: 'fax' },
{ data: 'shipping_status', name: 'shipping_status' },
{ data: 'tax', name: 'tax' },
{ data: 'email', name: 'email' },
{ data: 'tracking_number', name: 'tracking_number' },
{ data: 'date_shipped', name: 'date_shipped' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Order').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection