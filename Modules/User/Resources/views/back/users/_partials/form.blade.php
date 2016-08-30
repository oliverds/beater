{{ csrf_field() }}

<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
    <label for="username" class="control-label">Username</label>

    <input id="username" 
        type="text" 
        class="form-control" 
        name="username" 
        value="{{ $user->username or old('username') }}" 
        autofocus>

    @if ($errors->has('username'))
        <span class="help-block">
            <strong>{{ $errors->first('username') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('roles') ? ' has-error' : '' }}">
    <label for="roles" class="control-label">Roles</label>

    @foreach ($roles as $role)
        <div class="checkbox">
            <label>
                <input id="role-{{ $role->name }}"
                    type="checkbox" 
                    name="roles[]" 
                    value="{{ $role->name }}" 
                    {{ $user->hasRole($role->name) ? 'checked' : '' }}>
                    {{ $role->name }}
            </label>
        </div>
    @endforeach

    @if ($errors->has('roles'))
        <span class="help-block">
            <strong>{{ $errors->first('roles') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email" class="control-label">E-Mail Address</label>

    <input id="email" 
        type="email" 
        class="form-control" 
        name="email" 
        value="{{ $user->email or old('email') }}">

    @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="control-label">Name</label>

    <input id="name" 
        type="text" 
        class="form-control" 
        name="name" 
        value="{{ $user->name or old('name') }}">

    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>