<div class="tab-pane" id="home">
    <div class="row">
        <div class="col-sm-12 text-center">
            <h5 class="info-text">System Requirements</h5>
        </div>

        <div class="col-sm-offset-1 col-sm-10">
            <table class="table requirements">
                <tbody>
                    @foreach($requirements['requirementsCheck'] as $key => $requirement)
                    <tr>
                        <td>
                            {{ $requirement }}

                            @if(array_key_exists($key, $requirements['requirements']))
                                <p class="text-danger fz13">
                                    {{ $requirements['requirements'][$key] }}
                                </p>
                            @endif
                        </td>
                        <td style="width: 100px;text-align: center">
                            <div class="icon">
                                @if(array_key_exists($key, $requirements['requirements']))
                                    <i class="fa fa-times-circle-o text-danger"></i>
                                @else
                                    <i class="fa fa-check-square-o text-success"></i>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>