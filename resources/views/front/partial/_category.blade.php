<li><a href="{{ route('category', ['slug' => $category->slug]) }}">{{ $category->name }}</a></li>
@if (count($category['children']) > 0)
    <ul>
        @each('front.partial._category', $category['children'], 'category')
    </ul>
@endif