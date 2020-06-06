@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.slide.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.slides.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="slide_types">{{ trans('cruds.slide.fields.slide_type') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('slide_types') ? 'is-invalid' : '' }}" name="slide_types[]" id="slide_types" multiple required>
                    @foreach($slide_types as $id => $slide_type)
                        <option value="{{ $id }}" {{ in_array($id, old('slide_types', [])) ? 'selected' : '' }}>{{ $slide_type }}</option>
                    @endforeach
                </select>
                @if($errors->has('slide_types'))
                    <div class="invalid-feedback">
                        {{ $errors->first('slide_types') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.slide.fields.slide_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="name">{{ trans('cruds.slide.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.slide.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="title">{{ trans('cruds.slide.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}">
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.slide.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.slide.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', '') }}">
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.slide.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description_1">{{ trans('cruds.slide.fields.description_1') }}</label>
                <input class="form-control {{ $errors->has('description_1') ? 'is-invalid' : '' }}" type="text" name="description_1" id="description_1" value="{{ old('description_1', '') }}">
                @if($errors->has('description_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.slide.fields.description_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="button_name">{{ trans('cruds.slide.fields.button_name') }}</label>
                <input class="form-control {{ $errors->has('button_name') ? 'is-invalid' : '' }}" type="text" name="button_name" id="button_name" value="{{ old('button_name', '') }}">
                @if($errors->has('button_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('button_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.slide.fields.button_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="link">{{ trans('cruds.slide.fields.link') }}</label>
                <input class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" type="text" name="link" id="link" value="{{ old('link', '') }}">
                @if($errors->has('link'))
                    <div class="invalid-feedback">
                        {{ $errors->first('link') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.slide.fields.link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="image">{{ trans('cruds.slide.fields.image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                </div>
                @if($errors->has('image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.slide.fields.image_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('active') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="active" value="0">
                    <input class="form-check-input" type="checkbox" name="active" id="active" value="1" {{ old('active', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="active">{{ trans('cruds.slide.fields.active') }}</label>
                </div>
                @if($errors->has('active'))
                    <div class="invalid-feedback">
                        {{ $errors->first('active') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.slide.fields.active_helper') }}</span>
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
    var uploadedImageMap = {}
Dropzone.options.imageDropzone = {
    url: '{{ route('admin.slides.storeMedia') }}',
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
      $('form').append('<input type="hidden" name="image[]" value="' + response.name + '">')
      uploadedImageMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedImageMap[file.name]
      }
      $('form').find('input[name="image[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($slide) && $slide->image)
      var files =
        {!! json_encode($slide->image) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="image[]" value="' + file.file_name + '">')
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