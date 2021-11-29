@if (session()->has('success'))

<div style="padding:10px;">

    <div class="alert alert-dismissable alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"> &times; </span>
        </button>
        <!-- GET SESSION WITH NAME SUCCESS AND ITS VALUE -->
        {!! session()->get('success') !!}
    </div>
</div>
@endif
