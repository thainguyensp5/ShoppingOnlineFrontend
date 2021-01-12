@if($categoryParent->categoryChildrent->count())
<ul role="menu" class="sub-menu">
    @foreach($categoryParent->categoryChildrent as $categoryChildrentItem)
    <li>
    <a href="shop.html">{{$categoryChildrentItem->name}}</a>
    @if($categoryChildrentItem->count())
    @include('components.childrent_menu', ['categoryParent' => $categoryChildrentItem])
    </li>
    @endif
    @endforeach
</ul>
@endif