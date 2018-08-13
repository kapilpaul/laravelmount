<div class="tab-pane" id="application">
    <div class="row">
        <h5 class="info-text">Setup your application details</h5>
        <div class="col-sm-10 col-sm-offset-1">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne" role="button" data-toggle="collapse"
                         data-parent="#accordion" href="#broadcast_cache_session_queue" aria-expanded="true"
                         aria-controls="collapseOne">
                        <h4 class="panel-title">
                            broadcast / cache / session / queue
                        </h4>
                    </div>
                    <div id="broadcast_cache_session_queue" class="panel-collapse collapse in" role="tabpanel"
                         aria-labelledby="headingOne">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="broadcast_driver">Broadcast Driver</label>
                                        <input class="form-control" type="text" name="broadcast_driver" id="broadcast_driver" value="log" placeholder="log"/>

                                        @if ($errors->has('broadcast_driver'))
                                            <span class="help-block">
                                                <p class="text-danger">{{ $errors->first('broadcast_driver') }}</p>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="cache_driver">Cache Driver</label>
                                        <input class="form-control" type="text" name="cache_driver" id="cache_driver" value="file" placeholder="file"/>

                                        @if ($errors->has('cache_driver'))
                                            <span class="help-block">
                                                <p class="text-danger">{{ $errors->first('cache_driver') }}</p>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="session_driver">Session Driver</label>
                                        <input class="form-control" type="text" name="session_driver" id="session_driver" value="file" placeholder="file"/>

                                        @if ($errors->has('session_driver'))
                                            <span class="help-block">
                                                <p class="text-danger">{{ $errors->first('session_driver') }}</p>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="session_lifetime">Session Lifetime</label>
                                        <input class="form-control" type="text" name="session_lifetime" id="session_lifetime" value="120" placeholder="120"/>

                                        @if ($errors->has('session_lifetime'))
                                            <span class="help-block">
                                                <p class="text-danger">{{ $errors->first('session_lifetime') }}</p>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="queue_driver">Queue Driver</label>
                                        <input class="form-control" type="text" name="queue_driver" id="queue_driver" value="sync" placeholder="sync"/>

                                        @if ($errors->has('queue_driver'))
                                            <span class="help-block">
                                                <p class="text-danger">{{ $errors->first('queue_driver') }}</p>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse"
                         data-parent="#accordion"
                         href="#redis_driver" aria-expanded="false" aria-controls="collapseTwo">
                        <h4 class="panel-title">
                            Redis Driver
                        </h4>
                    </div>
                    <div id="redis_driver" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="redis_host">Redis Host</label>
                                        <input class="form-control" type="text" name="redis_host" id="redis_host" value="127.0.0.1" placeholder="127.0.0.1"/>

                                        @if ($errors->has('redis_host'))
                                            <span class="help-block">
                                                <p class="text-danger">{{ $errors->first('redis_host') }}</p>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="redis_password">Redis Password</label>
                                        <input class="form-control" type="text" name="redis_password" id="redis_password" value="" placeholder=""/>

                                        @if ($errors->has('redis_password'))
                                            <span class="help-block">
                                                <p class="text-danger">{{ $errors->first('redis_password') }}</p>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="redis_port">Redis Port</label>
                                        <input class="form-control" type="text" name="redis_port" id="redis_port" value="6379" placeholder="6379"/>

                                        @if ($errors->has('redis_port'))
                                            <span class="help-block">
                                                <p class="text-danger">{{ $errors->first('redis_port') }}</p>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse"
                         data-parent="#accordion"
                         href="#mail" aria-expanded="false" aria-controls="mail">
                        <h4 class="panel-title">
                            Mail
                        </h4>
                    </div>
                    <div id="mail" class="panel-collapse collapse" role="tabpanel"
                         aria-labelledby="headingThree">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="mail_driver">Mail Driver</label>
                                        <input class="form-control" type="text" name="mail_driver" id="mail_driver" value="smtp" placeholder="smtp"/>

                                        @if ($errors->has('mail_driver'))
                                            <span class="help-block">
                                                <p class="text-danger">{{ $errors->first('mail_driver') }}</p>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="mail_host">Mail Host</label>
                                        <input class="form-control" type="text" name="mail_host" id="mail_host" value="smtp.mailtrap.io" placeholder="smtp.mailtrap.io"/>

                                        @if ($errors->has('mail_host'))
                                            <span class="help-block">
                                                <p class="text-danger">{{ $errors->first('mail_host') }}</p>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="mail_port">Mail Port</label>
                                        <input class="form-control" type="text" name="mail_port" id="mail_port" value="2525" placeholder="2525"/>

                                        @if ($errors->has('mail_port'))
                                            <span class="help-block">
                                                <p class="text-danger">{{ $errors->first('mail_port') }}</p>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="mail_username">Mail Username</label>
                                        <input class="form-control" type="text" name="mail_username" id="mail_username" value="" placeholder="Mail Username"/>

                                        @if ($errors->has('mail_username'))
                                            <span class="help-block">
                                                <p class="text-danger">{{ $errors->first('mail_username') }}</p>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="mail_password">Mail Password</label>
                                        <input class="form-control" type="text" name="mail_password" id="mail_password" value="" placeholder="Mail Password"/>

                                        @if ($errors->has('mail_password'))
                                            <span class="help-block">
                                                <p class="text-danger">{{ $errors->first('mail_password') }}</p>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="mail_encryption">Mail Encryption</label>
                                        <input class="form-control" type="text" name="mail_encryption" id="mail_encryption" value="" placeholder="Mail Password"/>

                                        @if ($errors->has('mail_encryption'))
                                            <span class="help-block">
                                                <p class="text-danger">{{ $errors->first('mail_encryption') }}</p>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading collapsed" role="tab" id="headingFour" data-toggle="collapse"
                         data-parent="#accordion"
                         href="#pusher" aria-expanded="false" aria-controls="pusher">
                        <h4 class="panel-title">
                            Pusher
                        </h4>
                    </div>
                    <div id="pusher" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="pusher_app_id">Pusher App ID</label>
                                        <input class="form-control" type="text" name="pusher_app_id" id="pusher_app_id" value="" placeholder=""/>

                                        @if ($errors->has('pusher_app_id'))
                                            <span class="help-block">
                                                <p class="text-danger">{{ $errors->first('pusher_app_id') }}</p>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="pusher_app_key">Pusher App Key</label>
                                        <input class="form-control" type="text" name="pusher_app_key"
                                               id="pusher_app_key" value="" placeholder=""/>

                                        @if ($errors->has('pusher_app_key'))
                                            <span class="help-block">
                                                <p class="text-danger">{{ $errors->first('pusher_app_key') }}</p>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="pusher_app_secret">Pusher App Secret/label
                                            <input class="form-control" type="text" name="pusher_app_secret" id="pusher_app_secret"/>

                                            @if ($errors->has('pusher_app_secret'))
                                                <span class="help-block">
                                                    <p class="text-danger">{{ $errors->first('pusher_app_secret') }}</p>
                                                </span>
                                            @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="pusher_app_cluster">Pusher App Cluster</label>
                                        <input class="form-control" type="text" name="pusher_app_cluster" id="pusher_app_cluster"/>

                                        @if ($errors->has('pusher_app_cluster'))
                                            <span class="help-block">
                                                <p class="text-danger">{{ $errors->first('pusher_app_cluster') }}</p>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>