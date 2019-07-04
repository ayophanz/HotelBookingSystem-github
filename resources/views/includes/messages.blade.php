@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif

@if ($error = Session::get('error'))
<div class="alert alert-danger custom-alert-error">
    <button type="button" class="close" data-dismiss="alert">×</button>	
    {{ $error }}
</div>
@endif