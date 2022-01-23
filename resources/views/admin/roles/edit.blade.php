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
        <form method="POST" action="{{ route('roles.update', $role) }}" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT')}}
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
            <select id="kt_dual_listbox" class="dual-listbox" name="permissions[]" multiple>
            @foreach($permissions as $id => $permissions)
                        <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || $role->permissions->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>
                    @endforeach
                </select>
                @if($errors->has('permissions'))
                    <div class="invalid-feedback">
                        {{ $errors->first('permissions') }}
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
<!-- <script>
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script> -->
@endsection

{{-- Styles Section --}}
@section('styles')

@endsection

{{-- Scripts Section --}}
@section('scripts')
<script>
// Class definition
var KTDualListbox = function() {
    // Private functions
    var initDualListbox = function() {
        // Dual Listbox
        var listBoxes = $(".dual-listbox");

        listBoxes.each(function() {
            var $this = $(this);
            // get titles
            var availableTitle = ($this.attr("data-available-title") != null) ? $this.attr("data-available-title") : "Available options";
            var selectedTitle = ($this.attr("data-selected-title") != null) ? $this.attr("data-selected-title") : "Selected options";

            // get button labels
            var addLabel = ($this.attr("data-add") != null) ? $this.attr("data-add") : "Add";
            var removeLabel = ($this.attr("data-remove") != null) ? $this.attr("data-remove") : "Remove";
            var addAllLabel = ($this.attr("data-add-all") != null) ? $this.attr("data-add-all") : "Add All";
            var removeAllLabel = ($this.attr("data-remove-all") != null) ? $this.attr("data-remove-all") : "Remove All";

            // get options
            var options = [];
            $this.children("option").each(function() {
                var value = $(this).val();
                var label = $(this).text();
                options.push({
                    text: label,
                    value: value
                });
            });

            // get search option
            var search = ($this.attr("data-search") != null) ? $this.attr("data-search") : "";

            // init dual listbox
            var dualListBox = new DualListbox($this.get(0), {
                addEvent: function(value) {
                    console.log(value);
                },
                removeEvent: function(value) {
                    console.log(value);
                },
                availableTitle: availableTitle,
                selectedTitle: selectedTitle,
                addButtonText: addLabel,
                removeButtonText: removeLabel,
                addAllButtonText: addAllLabel,
                removeAllButtonText: removeAllLabel,
                options: options,
            });

            if (search == "false") {
                dualListBox.search.classList.add("dual-listbox__search--hidden");
            }
        });
    };

    return {
        // public functions
        init: function() {
            initDualListbox();
        },
    };
}();

jQuery(document).ready(function() {
    KTDualListbox.init();
});
</script>
<script src="{{ asset('js/pages/crud/ktdatatable/base/html-table.js') }}" type="text/javascript"></script>
@endsection
