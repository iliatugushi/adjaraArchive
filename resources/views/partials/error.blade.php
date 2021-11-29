@if ($errors->any())
<div style="padding:10px;">
    <div class="alert alert-dismissable alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"> &times; </span>
        </button>
        <ul>
            @foreach ($errors->all() as $error)
            <li style="color:black;" class="text-left">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>

@endif
