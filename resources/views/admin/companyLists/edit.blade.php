@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.companyList.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.company-lists.update", [$companyList->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="company_name">{{ trans('cruds.companyList.fields.company_name') }}</label>
                <input class="form-control {{ $errors->has('company_name') ? 'is-invalid' : '' }}" type="text" name="company_name" id="company_name" value="{{ old('company_name', $companyList->company_name) }}" required>
                @if($errors->has('company_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.companyList.fields.company_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="logo">{{ trans('cruds.companyList.fields.logo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}" id="logo-dropzone">
                </div>
                @if($errors->has('logo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('logo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.companyList.fields.logo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="website_url">{{ trans('cruds.companyList.fields.website_url') }}</label>
                <input class="form-control {{ $errors->has('website_url') ? 'is-invalid' : '' }}" type="text" name="website_url" id="website_url" value="{{ old('website_url', $companyList->website_url) }}">
                @if($errors->has('website_url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('website_url') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.companyList.fields.website_url_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.companyList.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $companyList->email) }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.companyList.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="contact_no">{{ trans('cruds.companyList.fields.contact_no') }}</label>
                <input class="form-control {{ $errors->has('contact_no') ? 'is-invalid' : '' }}" type="text" name="contact_no" id="contact_no" value="{{ old('contact_no', $companyList->contact_no) }}" required>
                @if($errors->has('contact_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contact_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.companyList.fields.contact_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="postalcode">{{ trans('cruds.companyList.fields.postalcode') }}</label>
                <input class="form-control {{ $errors->has('postalcode') ? 'is-invalid' : '' }}" type="text" name="postalcode" id="postalcode" value="{{ old('postalcode', $companyList->postalcode) }}" required>
                @if($errors->has('postalcode'))
                    <div class="invalid-feedback">
                        {{ $errors->first('postalcode') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.companyList.fields.postalcode_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="invoice_number_slug">{{ trans('cruds.companyList.fields.invoice_number_slug') }}</label>
                <input class="form-control {{ $errors->has('invoice_number_slug') ? 'is-invalid' : '' }}" type="text" name="invoice_number_slug" id="invoice_number_slug" value="{{ old('invoice_number_slug', $companyList->invoice_number_slug) }}" required>
                @if($errors->has('invoice_number_slug'))
                    <div class="invalid-feedback">
                        {{ $errors->first('invoice_number_slug') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.companyList.fields.invoice_number_slug_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="address">{{ trans('cruds.companyList.fields.address') }}</label>
                <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" id="address" required>{{ old('address', $companyList->address) }}</textarea>
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.companyList.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="approved_signature">{{ trans('cruds.companyList.fields.approved_signature') }}</label>
                <div class="needsclick dropzone {{ $errors->has('approved_signature') ? 'is-invalid' : '' }}" id="approved_signature-dropzone">
                </div>
                @if($errors->has('approved_signature'))
                    <div class="invalid-feedback">
                        {{ $errors->first('approved_signature') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.companyList.fields.approved_signature_helper') }}</span>
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
    Dropzone.options.logoDropzone = {
    url: '{{ route('admin.company-lists.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
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
      $('form').find('input[name="logo"]').remove()
      $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($companyList) && $companyList->logo)
      var file = {!! json_encode($companyList->logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
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
    var uploadedApprovedSignatureMap = {}
Dropzone.options.approvedSignatureDropzone = {
    url: '{{ route('admin.company-lists.storeMedia') }}',
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
      $('form').append('<input type="hidden" name="approved_signature[]" value="' + response.name + '">')
      uploadedApprovedSignatureMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedApprovedSignatureMap[file.name]
      }
      $('form').find('input[name="approved_signature[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($companyList) && $companyList->approved_signature)
      var files = {!! json_encode($companyList->approved_signature) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="approved_signature[]" value="' + file.file_name + '">')
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