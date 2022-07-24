<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des posts') }}
        </h2>
    </x-slot>
    <div x-data="{activeCategory: 1}" class=" container mx-auto mt-10">
        {{-- START Categories Sections --}}
        
        <h2 class="text-2xl mb-3 font-bold">Catégories</h2>
        <div  class="my-5 mx-auto w-full flexCenter justify-between">
            @foreach ($categories as $category)
                <div 
                class="select-none categories"
                :class="{'before:bg-indigo-700 before:block' : activeCategory == {{ $category->id }}  }"
                @click="activeCategory = {{ $category->id }}"
                >
                    <p 
                    class="capitalize text-gray-600 text-sm">
                        {{ $category->name }}
                    </p>    
                </div>
                
            @endforeach
        </div>
        {{-- END Categories Sections --}}
        
        {{-- START Posts Sections --}}
        <div class="flex items-center mb-3 justify-between">
            <h2 class="text-2xl font-bold underlineEffect">Tout les posts</h2>
            <a class="cursor-pointer text-xl py-2 px-3 bg-indigo-600 text-white rounded font-bold transition-colors hover:bg-gray-400 hover:text-black">Créer un post</a>
        </div>
        
        <div x-cloak class="grid grid-rows-4">
            {{-- <div 
            :class="{'hidden' : activeCategory !== {{ $post->category->id }} }"
            class="w-24 flex items-center justify-center bg-blue-500 py-8">aa</div> --}}
            @foreach ($posts as $post)
            <!-- post card -->
            <div 
            :class="{'hidden' : activeCategory !== {{ $post->category->id }} }"
            class="cursor-pointer flex bg-white shadow-lg rounded-lg my-5 max-w-full">
                <div class="flex items-start w-full px-4 py-6">
                <img class="w-12 h-12 rounded-full object-cover mr-4 shadow" src="https://images.unsplash.com/photo-1542156822-6924d1a71ace?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="avatar">
                <div class="w-full">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-semibold text-gray-900 -mt-1">{{ $post->user->name }}</h2>
                        <small class="text-sm text-gray-700">22h ago</small>
                    </div>
                    <p class="mt-3 text-gray-700 text-sm">
                        {{ $post->content }}
                    </p>
                    <div class="mt-4 flex items-center">
                        <div class="flex text-gray-700 text-sm mr-3">
                            <svg fill="none" viewBox="0 0 24 24"  class="w-4 h-4 mr-1" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                            <span>12</span>
                        </div>
                        <div class="flex text-gray-700 text-sm mr-8">
                            <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-1" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
                            </svg>
                            <span>8</span>
                        </div>
                        <div class="flex text-gray-700 text-sm mr-4">
                            <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-1" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                            </svg>
                            <span>share</span>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
        {{-- END Posts Sections --}}
</x-app-layout>