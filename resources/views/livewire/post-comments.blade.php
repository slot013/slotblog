<div class="mt-10 comments-box border-t border-gray-100 pt-10">
    <h2 class="text-2xl font-semibold text-gray-900 mb-5">Введите комментарий</h2>
    @auth()
        <textarea  wire:model="comment"
            class="w-full rounded-lg p-4 bg-gray-50 focus:outline-none text-sm text-gray-700 border-gray-200 placeholder:text-gray-400"
            cols="30" rows="7"></textarea>
        <button wire:click="postComment"
            class="mt-3 inline-flex items-center justify-center h-10 px-4 font-medium tracking-wide text-white transition duration-200 bg-gray-900 rounded-lg hover:bg-gray-800 focus:shadow-outline focus:outline-none">
            Опубликовать
        </button>
    @else
        <a wire:navigate class="text-red-500 underline py-1" href="{{route('login')}}"> Войдите в систсему, чтобы
            оставлять комментарии</a>

    @endauth

    <div class="px-3 py-2 mt-5 user-comments">
        @forelse($this->comments as $comment)
            <div class="comment [&:not(:last-child)]:border-b border-gray-100 py-5">
                <div class="flex items-center mb-4 text-sm user-meta">
                    <x-posts.author :author="$comment->user" size="sm" />
                    <span class="text-gray-500">. {{ $comment->created_at->diffForHumans() }}</span>
                </div>
                <div class="text-sm text-justify text-gray-700">
                    {{ $comment->comment }}
                </div>
            </div>
        @empty
            <div class="text-center text-gray-500">
                <span> Нет комментариев </span>
            </div>
        @endforelse
    </div>
    <div class="my-2">
        {{ $this->comments->links() }}
    </div>
</div>
