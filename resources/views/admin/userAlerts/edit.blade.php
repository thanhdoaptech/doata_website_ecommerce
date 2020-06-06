@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.userAlert.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.user-alerts.update", [$userAlert->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="alert_image">{{ trans('cruds.userAlert.fields.alert_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('alert_image') ? 'is-invalid' : '' }}" id="alert_image-dropzone">
                </div>
                @if($errors->has('alert_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('alert_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.userAlert.fields.alert_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="alert_file">{{ trans('cruds.userAlert.fields.alert_file') }}</label>
                <div class="needsclick dropzone {{ $errors->has('alert_file') ? 'is-invalid' : '' }}" id="alert_file-dropzone">
                </div>
                @if($errors->has('alert_file'))
                    <div class="invalid-feedback">
                        {{ $errors->first('alert_file') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.userAlert.fields.alert_file_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    var uploadedAlertImageMap = {}
Dropzone.options.alertImageDropzone = {
    url: '{{ route('admin.user-alerts.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="alert_image[]" value="' + response.name + '">')
      uploadedAlertImageMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedAlertImageMap[file.name]
      }
      $('form').find('input[name="alert_image[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($userAlert) && $userAlert->alert_image)
      var files =
        {!! json_encode($userAlert->alert_image) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="alert_image[]" value="' + file.file_name + '">')
        }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
<script>
    var uploadedAlertFileMap = {}
Dropzone.options.alertFileDropzone = {
    url: '{{ route('admin.user-alerts.storeMedia') }}',
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="alert_file[]" value="' + response.name + '">')
      uploadedAlertFileMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedAlertFileMap[file.name]
      }
      $('form').find('input[name="alert_file[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($userAlert) && $userAlert->alert_file)
          var files =
            {!! json_encode($userAlert->alert_file) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="alert_file[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection