@extends('layouts.admin')
@section('content')
@can('footer_menu_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.footer-menus.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.footerMenu.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.footerMenu.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-FooterMenu">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.footerMenu.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.footerMenu.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.footerMenu.fields.parent') }}
                        </th>
                        <th>
                            {{ trans('cruds.footerMenu.fields.image') }}
                        </th>
                        <th>
                            {{ trans('cruds.footerMenu.fields.sort') }}
                        </th>
                        <th>
                            {{ trans('cruds.footerMenu.fields.active') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($footerMenus as $key => $footerMenu)
                        <tr data-entry-id="{{ $footerMenu->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $footerMenu->id ?? '' }}
                            </td>
                            <td>
                                {{ $footerMenu->name ?? '' }}
                            </td>
                            <td>
                                {{ $footerMenu->parent ?? '' }}
                            </td>
                            <td>
                                @foreach($footerMenu->image as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                        <img src="{{ $media->getUrl('thumb') }}" width="50px" height="50px">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $footerMenu->sort ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $footerMenu->active ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $footerMenu->active ? 'checked' : '' }}>
                            </td>
                            <td>
                                @can('footer_menu_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.footer-menus.show', $footerMenu->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('footer_menu_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.footer-menus.edit', $footerMenu->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('footer_menu_delete')
                                    <form action="{{ route('admin.footer-menus.destroy', $footerMenu->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('footer_menu_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.footer-menus.massDestroy') }}",
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
  let table = $('.datatable-FooterMenu:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection