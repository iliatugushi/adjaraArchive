@foreach($data as $item)
<li class="nav-item">
    <a href="javascript:void(0)" class="nav-link treeElement" openState="closed" element="{{ $element }}"
        elementID="{{ $item->id }}">
        <i class="{{ $icon }} nav-icon"></i>
        <p>
            <p>{{ $item->name }}</p>
            @if($element != 'File')
            <i class="right fas fa-angle-left"></i>
            @endif
        </p>
    </a>
    <ul class="nav nav-treeview">
    </ul>
</li>
@endforeach
