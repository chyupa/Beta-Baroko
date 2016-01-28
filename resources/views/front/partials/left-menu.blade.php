<h3 class="text-center">Menu</h3>
@if(count($categories) > 0)
    <div class="list-group">
        @foreach($categories as $category)
            <a class="list-group-item active" href="/category/{{ $category->slug }}">{{ $category->name }}</a>
            @if($category->subcategories()->count() > 0)
                <div class="list-group">
                    @foreach($category->subcategories as $subcategory)
                        <a class="list-group-item"
                           href="/subcategory/{{ $subcategory->slug }}">{{ $subcategory->name }}</a>
                    @endforeach
                </div>
            @endif
        @endforeach
    </div>
@endif