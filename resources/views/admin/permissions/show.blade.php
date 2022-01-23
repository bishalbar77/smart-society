{{-- Extends layout --}}
@extends('layout.default')
{{-- Styles Section --}}
@section('styles')

@endsection

{{-- Content --}}
@section('content')
<div class="card">
    <div class="card-header">
        Show Role
    </div>

    <div class="card-body">
        <div class="form-group">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            ID
                        </th>
                        <td>
                            {{ $role->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Name
                        </th>
                        <td>
                            {{ $role->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Permissions
                        </th>
                        <td>
                            @foreach($role->permissions as $key => $permissions)
                                <span class="label label-info">{{ $permissions->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('roles.index') }}">
                    Back
                </a>
            </div>
        </div>
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
