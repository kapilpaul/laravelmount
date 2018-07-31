@if(session('success'))
    <div class="alert alert-success fade in alert-dismissible mt-15">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <i class="zmdi zmdi-check pr-15 pull-left"></i><p class="pull-left">{{ session('success') }}</p>
        <div class="clearfix"></div>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger fade in alert-dismissible mt-15">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <i class="zmdi zmdi-block pr-15 pull-left"></i><p class="pull-left">{{ session('error') }}</p>
        <div class="clearfix"></div>
    </div>
@endif