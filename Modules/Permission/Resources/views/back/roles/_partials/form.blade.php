{{ csrf_field() }}

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="control-label">Name</label>

    <input id="name" 
        type="text" 
        class="form-control" 
        name="name" 
        value="{{ $role->name or old('name') }}">

    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

<hr>

<div class="form-group">
    <button type="submit" class="btn btn-primary btn-uppercase">
        <i class="fa fa-btn fa-floppy-o"></i> 
        Save
    </button>
</div>