<div class="tab-pane" id="database">
    <h5 class="info-text">Setup your Database</h5>
    <div class="row">
        <div class="col-sm-5 col-sm-offset-1">
            <div class="form-group">
                <label>Database Connection</label>
                <select class="form-control" name="database_connection" id="database_connection">
                    <option value="mysql" selected>mysql</option>
                    <option value="sqlite">sqlite</option>
                    <option value="pgsql">postgresql</option>
                    <option value="sqlsrv">sqlsrv</option>
                </select>

                @if ($errors->has('database_connection'))
                    <span class="help-block">
                        <p class="text-danger">{{ $errors->first('database_connection') }}</p>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group">
                <label for="database_hostname">Database Host</label>
                <input class="form-control" type="text" name="database_hostname" id="database_hostname"
                       value="127.0.0.1" placeholder="127.0.0.1"/>

                @if ($errors->has('database_hostname'))
                    <span class="help-block">
	            <p class="text-danger">{{ $errors->first('database_hostname') }}</p>
	        </span>
                @endif
            </div>
        </div>
        <div class="col-sm-5 col-sm-offset-1">
            <div class="form-group">
                <label for="database_port">Database Port</label>
                <input class="form-control" type="text" name="database_port" id="database_port" value="3306"
                       placeholder="3306"/>

                @if ($errors->has('database_port'))
                    <span class="help-block">
	            <p class="text-danger">{{ $errors->first('database_port') }}</p>
	        </span>
                @endif
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group">
                <label for="database_name">Database Name</label>
                <input class="form-control" type="text" name="database_name" id="database_name"
                       placeholder="homestead"/>

                @if ($errors->has('database_name'))
                    <span class="help-block">
	            <p class="text-danger">{{ $errors->first('database_name') }}</p>
	        </span>
                @endif
            </div>
        </div>
        <div class="col-sm-5 col-sm-offset-1">
            <div class="form-group">
                <label for="database_username">Database Username</label>
                <input class="form-control" type="text" name="database_username" id="database_username"
                       placeholder=""/>

                @if ($errors->has('database_username'))
                    <span class="help-block">
	            <p class="text-danger">{{ $errors->first('database_username') }}</p>
	        </span>
                @endif
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group">
                <label for="database_password">Database Password</label>
                <input class="form-control" type="password" name="database_password" id="database_password"
                       placeholder=""/>

                @if ($errors->has('database_password'))
                    <span class="help-block">
	            <p class="text-danger">{{ $errors->first('database_password') }}</p>
	        </span>
                @endif
            </div>
        </div>
    </div>
</div>