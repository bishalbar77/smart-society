{{-- Extends layout --}}
@extends('layout.default')
{{-- Styles Section --}}
@section('styles')

@endsection

{{-- Content --}}
@section('content')
<div class="card">
    <div class="card-header">
        Edit Role
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('roles.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="title">Role Name</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="name" name="name" id="name" value="{{ $role->name }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="permissions">Permissions</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">Select all</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">Deselect all</span>
                </div>
                <select class="form-control select2 {{ $errors->has('permissions') ? 'is-invalid' : '' }}" name="permissions[]" id="permissions" >
                    @foreach($permissions as $id => $permissions)
                        <option value="{{ $id }}" {{ in_array($id, old('permissions', [])) ? 'selected' : '' }}>{{ $permissions }}</option>
                    @endforeach
                </select>
                @if($errors->has('permissions'))
                    <div class="invalid-feedback">
                        {{ $errors->first('permissions') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.role.fields.permissions_helper') }}</span>
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
