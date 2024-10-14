@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Upload File and Place Watermark
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('upload-logo-pdf') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="file">Choose A PDF File to upload</label>
                            <input class="form-control" type="file" name="file" id="file" accept=".pdf" required>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 mt-4">
                        <button class="btn btn-success" name="action" value="approve" type="submit">
                            Approve and Preview
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
