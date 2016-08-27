<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <label for="password" class="control-label">Password</label>

    <input id="password" 
        type="password" 
        class="form-control" 
        name="password" 
        value="">

    @if ($errors->has('password'))
        <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
    <label for="password-confirm" class="control-label">Repeat Password</label>

    <input id="password-confirm" 
        type="password" 
        class="form-control" 
        name="password_confirmation" 
        value="">

    @if ($errors->has('password_confirmation'))
        <span class="help-block">
            <strong>{{ $errors->first('password_confirmation') }}</strong>
        </span>
    @endif
</div>