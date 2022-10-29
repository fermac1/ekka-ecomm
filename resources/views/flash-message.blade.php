<style>
    .msg-overlay
    {
        text-align: center;
        z-index: 1;
        margin: auto;
        transform: translate(auto, 50%);
        width: fit-content;
        opacity: 4;
    }
</style>

@if (Session::has('success'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">
        <div class="alert alert-success msg-overlay">
            {{Session::get('success')}}
        </div>
    </div>
@endif

@if (Session::has('warning'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">
        <div class="alert alert-warning msg-overlay">
            {{Session::get('warning')}}
        </div>
    </div>
@endif


@if (Session::has('danger'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">
        <div class="alert alert-danger msg-overlay">
            {{Session::get('danger')}}
        </div>
    </div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
    Check the following errors :(
</div>
@endif