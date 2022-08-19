<div class="card mx-2 bg-info bg-opacity-10 mb-5" style="width: 18rem;">
    <div class="card-header " style="text-align: center">
        Categories
    </div>
    <ul class="list-group list-group-flush">
        @foreach(\App\Models\Category::all() as $category)
            <li class="list-group-item" style="text-align: center;">
                <a class="x" href="{{ route('getItemsByCat',['id'=>$category->id]) }}">{{$category->name}}</a>
            </li>
        @endforeach
    </ul>
</div>
