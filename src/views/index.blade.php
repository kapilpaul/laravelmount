@extends('laravelmount::layouts.default')

@section('content')
    <form action="{{ route('install.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="wizard-header">
            <h3 class="wizard-title">Laravel Mount</h3>
            <p class="category">Easy Installation Wizard</p>
        </div>
        <div class="wizard-navigation">
            <div class="progress-with-circle">
                <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="4" style="width: 15%;"></div>
            </div>
            <ul>
                <li>
                    <a href="#home" data-toggle="tab">
                        <div class="icon-circle">
                            <i class="ti-menu-alt"></i>
                        </div>
                    </a>
                </li>
                @if(empty($requirements['requirements']))
                    <li>
                        <a href="#environmentSettings" data-toggle="tab">
                            <div class="icon-circle">
                                <i class="ti-settings"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#database" data-toggle="tab">
                            <div class="icon-circle">
                                <i class="ti-server"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#application" data-toggle="tab">
                            <div class="icon-circle">
                                <i class="ti-cloud-up"></i>
                            </div>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
        <div class="tab-content">
            @include('laravelmount::layouts.sessionMessages')

            @include('laravelmount::requirements.show', ['requirements' => $requirements])

            @if(empty($requirements['requirements']))

                @include('laravelmount::environment.create')
                @include('laravelmount::database.create')
                @include('laravelmount::application.create')

            @endif
        </div>
        <div class="wizard-footer">
            <div class="pull-right">
                <input type='button' class='btn btn-next btn-fill btn-success btn-wd' name='next' value='Next' />
                @if(empty($requirements['requirements']))
                    <button type='submit' class='btn btn-finish btn-fill btn-success btn-wd'>Finish</button>
                @else
                    <a href="{{ route('requirement.show') }}" class="btn btn-finish btn-fill btn-success btn-wd">Refresh</a>
                @endif
            </div>

            <div class="pull-left">
                <input type='button' class='btn btn-previous btn-default btn-wd' name='previous' value='Previous' />
            </div>
            <div class="clearfix"></div>
        </div>
    </form>
@stop