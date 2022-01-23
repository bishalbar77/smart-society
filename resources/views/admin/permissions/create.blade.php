{{-- Extends layout --}}
@extends('layout.default')
{{-- Styles Section --}}
@section('styles')

@endsection

{{-- Content --}}
@section('content')

<div class="card">
    <div class="card-header">
        Permissions
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('permissions.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="title">Name</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                   Save
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

{{-- Styles Section --}}
@section('styles')

@endsection

{{-- Scripts Section --}}
@section('scripts')
<script src="{{ asset('js/pages/crud/ktdatatable/base/html-table.js') }}" type="text/javascript"></script>
@endsection
