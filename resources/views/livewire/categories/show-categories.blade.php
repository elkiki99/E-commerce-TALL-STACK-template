<div class="flex flex-col flex-wrap justify-between p-10">
    @foreach ($categories as $category)
        <p>{{$category->category}}</p>
    @endforeach 

    <div class="justify-end w-full px-20 py-10">
        {{ $categories->links() }}
    </div>
</div>
