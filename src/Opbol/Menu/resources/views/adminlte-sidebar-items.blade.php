@foreach($items as $item)
    <li@lm-attrs($item) @if($item->hasChildren())class="treeview"@endif @lm-endattrs>
    @if($item->link || $item->hasChildren())<a@lm-attrs($item->link) @lm-endattrs href="{!! $item->url() !!}">@endif
    @if($item->icon)<i class='{!! $item->icon !!}'></i>@endif
    <span>{!! $item->title !!}</span>
    @if($item->hasChildren())<i class="fa fa-angle-left pull-right"></i>@endif
    @if($item->link || $item->hasChildren())</a>@endif
    @if($item->hasChildren())
        <ul class="treeview-menu">
            @include('layouts.partials.sidebar-menu', array('items' => $item->children()))
        </ul>
    @endif
    </li>
    @if($item->divider)
        <li{!! Opbol\Menu\Builder::attributes($item->divider) !!}></li>
    @endif
@endforeach