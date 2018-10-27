<div class="tab-pane" id="environmentSettings">
    <h5 class="info-text">Set up your environment</h5>
    <div class="row">
        <div class="col-sm-5 col-sm-offset-1">
            <div class="form-group">
                <label>App Name</label>
                <input name="app_name" type="text" class="form-control">

                @if ($errors->has('app_name'))
                    <span class="help-block">
	            <p class="text-danger">{{ $errors->first('app_name') }}</p>
	        </span>
                @endif
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group">
                <label>App Environment</label>
                <select name="app_env" class="form-control">
                    <option disabled="" selected="">- Select -</option>
                    <option value="local">Local</option>
                    <option value="development">Development</option>
                    <option value="qa">QA</option>
                    <option value="production">Production</option>
                    <option value="other">Other</option>
                </select>

                @if ($errors->has('app_env'))
                    <span class="help-block">
	            <p class="text-danger">{{ $errors->first('app_env') }}</p>
	        </span>
                @endif
            </div>
        </div>
        <div class="col-sm-5 col-sm-offset-1">
            <div class="form-group">
                <label>App URL</label>
                <input name="app_url" type="text" class="form-control">

                @if ($errors->has('app_url'))
                    <span class="help-block">
	            <p class="text-danger">{{ $errors->first('app_url') }}</p>
	        </span>
                @endif
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group">
                <label>App Log Level</label>
                <select name="app_log_level" class="form-control">
                    <option value="debug">debug</option>
                    <option value="info">info</option>
                    <option value="notice">notice</option>
                    <option value="warning">warning</option>
                    <option value="error">error</option>
                    <option value="critical">critical</option>
                    <option value="alert">alert</option>
                    <option value="emergency">emergency</option>
                </select>

                @if ($errors->has('app_log_level'))
                    <span class="help-block">
	            <p class="text-danger">{{ $errors->first('app_log_level') }}</p>
	        </span>
                @endif
            </div>
        </div>
        <div class="col-sm-12 col-sm-offset-1">
            <div class="form-group">
                <label>App Debug</label>
                <div class="radio">
                    <label class="radio-inline" for="app_debug_true">
                        <input type="radio" name="app_debug" id="app_debug_true" value=true/>
                        True
                    </label>
                    <label class="radio-inline" for="app_debug_false">
                        <input type="radio" name="app_debug" id="app_debug_false" value=false checked/>
                        False
                    </label>
                </div>

                @if ($errors->has('app_debug'))
                    <span class="help-block">
                        <p class="text-danger">{{ $errors->first('app_debug') }}</p>
                    </span>
                @endif
            </div>
        </div>
    </div>
</div>