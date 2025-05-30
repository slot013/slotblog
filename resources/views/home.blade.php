<x-app-layout title="Главная страница">
    @section('hero')
        <div class="w-full text-center py-32">
            <h1 class="text-2xl md:text-3xl font-bold text-center lg:text-5xl text-gray-700">
                Тестовый сайт <span class="text-red-500">&lt;SLOT_013&gt;</span> <span class="text-gray-900"></span>
            </h1>
            <p class="text-gray-500 text-lg mt-1">Блог "на коленке"</p>
            <a class="px-3 py-2 text-lg text-white bg-gray-800 rounded mt-5 inline-block"
               href="http://127.0.0.1:8000/blog"> Погнали! </a>
        </div>
    @endsection
    <div class="mb-10">
        <div class="mb-16">
            <h2 class="mt-16 mb-5 text-3xl text-red-500 font-bold">Рекомендуемые публикации</h2>
            <div class="w-full">
                <div class="grid grid-cols-3 gap-10 w-full">
                    @foreach($featuredPosts as $post)
                        <div>
                            <x-posts.post-card :post="$post" class="col-span-3 md:col-span-1"/>
                        </div>
                    @endforeach

                </div>
            </div>
            <a class="mt-10 block text-center text-lg text-red-500 font-semibold"
               href="http://127.0.0.1:8000/blog"> Больше постов</a>
        </div>
        <hr>

        <h2 class="mt-16 mb-5 text-3xl text-red-500 font-bold">Последние публикации</h2>
        <div class="w-full mb-5">
            <div class="grid w-full grid-cols-3 gap-10">
                @foreach ($latestPosts as $post)
                    <div>
                        <x-posts.post-card :post="$post" class="col-span-3 md:col-span-1"/>
                    </div>
                @endforeach
            </div>
        </div>
        <a class="mt-10 block text-center text-lg text-red-500 font-semibold"
           href="http://127.0.0.1:8000/blog">Больше постов</a>
    </div>
</x-app-layout>
