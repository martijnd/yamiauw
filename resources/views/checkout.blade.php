<x-app-layout>
    <x-slot name="header">
        <h2 class="flex justify-center">
            <a href="{{ route('dashboard') }}">
                <img class="h-20 object-cover" src="/logo.png" alt="logo">
            </a>
        </h2>
    </x-slot>

    <div class="py-12 relative pb-20 object-cover">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow sm:rounded-lg max-w-screen-md mx-auto">
                <h1 class="font-bold px-4 text-white text-2xl">Menu</h1>
                <div class="p-4 border-b border-gray-200 grid grid-cols-1">
                    @csrf
                    @foreach ($order->menuItems as $menuItem)
                        <div class="flex justify-between">
                            <div>{{ $menuItem->name }} </div>
                            <div> &euro; {{ $menuItem->price }}</div>
                        </div>
                    @endforeach

                    <hr class="my-2">
                    <div class="flex justify-between">
                        <div>Total</div>
                        <div> &euro; {{ $order->totalPrice }}</div>
                    </div>
                    <a
                    target="_blank"
                    href="mailto:cliff@mytaxflow.dev?subject=Yamiyami bestelling&body=Hoi Cliff, mag ik van jou: %0D%0A {{ $order->menuItems->pluck('name')->join(', %0D%0A', ', %0D%0Aen een ') }}. %0D%0A Bedankt! %0D%0A%0D%0A- {{Auth::user()->name}}"
                        class="px-4 text-center py-2 font-bold bg-orange-400 rounded border border-orange-400 my-2">Mail
                        to Cliff</a>
                </div>
            </div>
        </div>
</x-app-layout>
