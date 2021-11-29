<div id="tree" style="padding-left:0px;">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" style="padding:0px;">
        <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link treeElement" openState="closed" element="{{ $title }}"
                elementID="{{ $id }}">

                @if($title === 'Creator')
                <i class="far fa-user nav-icon"></i>
                @elseif ($title === 'Fond')
                <i class="fas fa-inbox nav-icon"></i>
                @elseif ($title === 'Anaweri')
                <i class="fas fa-layer-group nav-icon"></i>
                @elseif ($title === 'Sakme')
                <i class="far fa-folder nav-icon"></i>
                @elseif ($title === 'File')
                <i class="far fa-file nav-icon"></i>
                @endif
                <p>
                    {{ $name }}
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
            </ul>
        </li>
    </ul>
</div>
