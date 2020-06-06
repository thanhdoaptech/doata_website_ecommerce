@extends('layouts.admin')
@section('content')
@can('top_menu_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.top-menus.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.topMenu.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.topMenu.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TopMenu">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.topMenu.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.topMenu.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.topMenu.fields.link') }}
                        </th>
                        <th>
                            {{ trans('cruds.topMenu.fields.icon') }}
                        </th>
                        <th>
                            {{ trans('cruds.topMenu.fields.active') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($topMenus as $key => $topMenu)
                        <tr data-entry-id="{{ $topMenu->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $topMenu->id ?? '' }}
                            </td>
                            <td>
                                {{ $topMenu->name ?? '' }}
                            </td>
                            <td>
                                {{ $topMenu->link ?? '' }}
                            </td>
                            <td>
                                @if($topMenu->icon)
                                    <a href="{{ $topMenu->icon->getUrl() }}" target="_blank">
                                        <img src="{{ $topMenu->icon->getUrl('thumb') }}" width="50px" height="50px">
                                    </a>
                                @endif
                            </td>
                            <td>
                                <span style="display:none">{{ $topMenu->active ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $topMenu->active ? 'checked' : '' }}>
                            </td>
                            <td>
                                @can('top_menu_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.top-menus.show', $topMenu->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('top_menu_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.top-menus.edit', $topMenu->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('top_menu_delete')
                                    <form action="{{ route('admin.top-menus.destroy', $topMenu->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('top_menu_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.top-menus.massDestroy') }}",
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
  let table = $('.datatable-TopMenu:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection