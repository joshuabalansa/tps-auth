@extends('layouts.menu')

@section('content')
{{--Style Animation--}}
<style>
  .swing-in-top-fwd{-webkit-animation:.5s cubic-bezier(.175,.885,.32,1.275) both swing-in-top-fwd;animation:.5s cubic-bezier(.175,.885,.32,1.275) both swing-in-top-fwd}@-webkit-keyframes swing-in-top-fwd{0%{-webkit-transform:rotateX(-100deg);transform:rotateX(-100deg);-webkit-transform-origin:top;transform-origin:top;opacity:0}100%{-webkit-transform:rotateX(0);transform:rotateX(0);-webkit-transform-origin:top;transform-origin:top;opacity:1}}@keyframes swing-in-top-fwd{0%{-webkit-transform:rotateX(-100deg);transform:rotateX(-100deg);-webkit-transform-origin:top;transform-origin:top;opacity:0}100%{-webkit-transform:rotateX(0);transform:rotateX(0);-webkit-transform-origin:top;transform-origin:top;opacity:1}}
</style>
    <div class="flex justify-evenly w-full items-center p-2">
        <div class="flex justify-around items-center w-full">
            <img src="{{ asset('logo/logo.png') }}" class="h-12 mr-3" alt="Logo" />
            <h1 class="mb-4 text-2xl font-extrabold text-gray-900 dark:text-white md:text-4xl lg:text-5xl"><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">The Rabbit Hole</span> Cafe</h1>
        
            @if($cart_items_count != 0)
                <a href="{{ route('cart.index') }}" class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">My Orders
                        <span class="inline-flex items-center justify-center w-4 h-4 ml-2 text-s font-semibold text-black-800 rounded-full">
                        {{-- {{ count(session('cart')) }} --}}
                    </span>
                </a>
            @else
                <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800" type="button">
                    My Orders
                </button>
            @endif

        </div>
    </div>

        <div class="flex items-center justify-center py-3 md:py-3 flex-wrap">
            <a href="{{ route('customer.index') }}" class="text-blue-700 hover:text-white border border-blue-600 bg-white hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center mr-3 mb-3 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:bg-gray-900 dark:focus:ring-blue-800">All categories</a>
            @foreach($categories as $category)
                <a href="{{ route('menu.selectedCategory', $category->category_id) }}" class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center mr-3 mb-3 dark:text-white dark:focus:ring-gray-800">{{ $category->getCategoryName() }}</a>
            @endforeach
        </div>  

    <div>
        @if($isEmpty)
            <div style="display: flex; width: 100%; justify-content: center; align-items: center;z">
                <p class="text-center font-bold">Temporarily no menus available.</p>
            </div>
        @else
        <div class="flex flex-wrap gap-4 px-4 sm:px-6 md:px-8 lg:px-20 justify-center">
            @foreach($menus as $menu)
                <a href="{{ route('menu.show', $menu->id) }}" class="card-link hover:shadow-lg swing-in-top-fwd w-full sm:w-1/2  md:w-1/3 lg:w-1/4">
                    <div class="relative bg-white rounded-lg shadow-md flex flex-col justify-center	items-center">
                        <img loading="eager" class="object-contain object-center w-48 h-48 object-cover rounded-t-lg" src="{{ asset('uploads/'.$menu->image) }}" alt="Category 1">
                        <div class="p-4 flex-1">
                            <h2 class="text-xl font-semibold mb-2">{{ $menu->getName() }}</h2>
                            {{-- <p class="text-gray-700">{{ $menu->getDescription() }}</p> --}}
                        </div>
                        <h1 class="mb-3 bottom-4 right-4 text-lg ">{{ $menu->getPrice() }}</h1>
                    </div>
                </a>
            @endforeach
        </div>
        
        @endif
  <div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative w-full max-w-md max-h-full">
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                  </svg>
                  <span class="sr-only">Close modal</span>
              </button>
              <div class="p-6 text-center">
                  <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                  </svg>
                  <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">There is no orders yet</h3>
                  <button data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Order a menu</button>
              </div>
          </div>
      </div>
  </div>
@endsection