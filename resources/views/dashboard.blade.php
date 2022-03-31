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
            <div class="overflow-hidden shadow-sm sm:rounded-lg max-w-screen-lg mx-auto">
                <h1 class="font-bold px-4 text-white text-2xl">Menu</h1>
                <div class="p-4 border-b border-gray-200 grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach ($menuItems as $menuItem)
                        <form
                            action="{{ route('add-item', [
                                'order' => $order,
                                'menuItem' => $menuItem,
                            ]) }}"
                            method="POST">
                            @csrf
                            <div class="flex flex-col h-full justify-between space-y-4 shadow rounded p-6 border bg-white">
                                <img class="h-24 overflow-hidden rounded object-cover"
                                    src="https://images.unsplash.com/photo-1503764654157-72d979d9af2f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1174&q=80"
                                    alt="">
                                <h2 class="uppercase font-black text-xl">{{ $menuItem->name }}</h2>
                                <div>
                                    <span
                                        class="bg-[#ECF8FF] px-4 py-2 rounded-full">{{ $menuItem->subject->name }}</span>
                                </div>
                                <p class="text-[#757575]">
                                    {{ $menuItem->description }}
                                </p>
                                <div class="flex justify-end space-x-2 items-center">
                                    <span class="font-extrabold">&euro; {{ $menuItem->price }}</span>
                                    <button type="submit" class="px-2 bg-orange-300 rounded shadow text-4xl">+</button>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
        <div
            class="fixed flex justify-between items-center bottom-2 left-2 right-2 rounded-lg p-4 border-2 bg-[#1b1b1b] text-white">
            <h2 class="uppercase font-extrabold text-lg">Hoe duur?</h2>
            <div class="flex items-center space-x-2">
                <span class="font-bold">&euro; {{ $order->totalPrice }}</span>
                <a href="{{ route('checkout', ['order' => $order]) }}" class="p-2 bg-orange-300 rounded shadow text-xl text-black">
                    <span>+</span>
                    Let's eat!
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
