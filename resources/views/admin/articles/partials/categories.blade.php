@foreach ($categories as $category)

    <option value="{{$category_list->id or ""}}"
        
        @isset ($article->id)
            @foreach ($article->categories as $category_article)
                @if ($category->id == $category_article->id)
                    selected="selected"
                @endif    
            @endforeach
        @endisset
        
        >
        {!! $delimiter or "" !!}{{$category->title or ""}}
    </option>
    
    @if (count($category->children) > 0)
    
        @include('admin.articles.partials.categories', [
            'categories' => $category_list->children,
            'delimiter' => ' - ' . $delimiter
            ])
    
    @endif

@endforeach