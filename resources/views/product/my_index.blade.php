<x-app-layout>
    <div
        class="grid gap-8 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 p-5"
    >
        @foreach($products as $product)
            <!-- Product Item -->
            <div class="border border-1 border-gray-200 rounded-md hover:border-gray-600 transition-colors bg-white">
                <div class="p-4">
                    <a href="{{route('product.view', $product->slug)}}" class="aspect-w-3 aspect-h-2 block overflow-hidden">
                        <img src="{{ url($product->image) ? url($product->image) : ''  }}" class="w-auto mx-auto" />
                    </a>
                    <a href="{{route('product.view', $product->slug)}}" class="">
                        <h3 class="text-lg">
                            <span>Title: </span>{{$product->title}}
                        </h3>
                    </a>
                    <h5 class="font-bold mt-3">${{$product->price}}</h5>
                </div>
                <div class="flex justify-between py-3 px-4">
                    <button
{{--                        @click="addToWatchlist()"--}}
                        class="w-10 h-10 rounded-full border border-1 border-gray-600 flex items-center justify-center hover:bg-gray-600 hover:text-white active:bg-gray-800 transition-colors"
                        :class="isInWatchlist(id) ? 'bg-gray-600 text-white' : 'text-gray-600'"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
                            />
                        </svg>
                    </button>
                    <button class="btn-primary">
                        Add to Cart
                    </button>
                </div>
            </div>
            <!--/ Product Item -->
        @endforeach
    </div>
    <div class="pagination">
    {{$products->links()}}
    </div>
</x-app-layout>
