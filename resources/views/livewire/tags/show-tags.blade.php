<div class="flex flex-col justify-between w-full p-10">
    @if (session()->has('message'))
        <div class="p-2 my-2 text-sm text-green-600 dark:text-green-400">
            {{ session('message') }}
        </div>
    @endif
    
    @foreach ($tags as $index => $tag)
        <p class="{{ $index % 2 == 0 ? 'bg-white text-black dark:bg-gray-300 dark:text-gray-900' : 'bg-gray-800 text-white dark:bg-gray-800' }} p-4 m-0.5 rounded flex w-full">
            
        <a href="{{route('tags.show', ['tag' => $tag->id])}}">{{$tag->tag}}</a>
            
            <a wire:navigate href="{{route('tags.edit', ['tag' => $tag->id])}}" class="ml-auto">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                </svg>              
            </a>
            
            <button class="ml-4" type="button" wire:click="$dispatch('showAlert', {{$tag->id}})">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                </svg>                  
            </button>
        </p>
    @endforeach 

    <div class="justify-end w-full px-5 py-10">
        {{ $tags->links() }}
    </div>
</div>

@script
    <script>    
        Livewire.on('showAlert', (tagId) => {
            Swal.fire({
                title: 'Delete this tag?',
                text: 'This action cannot be restored',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'The tag was deleted',
                        'Deleted succesfully',
                        'success'
                    );
                    window.setTimeout(() => {
                        @this.call('deleteTag', tagId);
                    }, 1500);
                }
            })
        });
    </script>
@endscript
