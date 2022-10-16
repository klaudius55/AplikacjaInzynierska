<x-app-layout xmlns:livewire="">
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <x-input icon="user" label="Name" placeholder="Imię" />

        <x-input icon="user" label="Name" placeholder="Nazwisko" />
    </div>
    <form method="GET" action="{{ route('workers.index') }}">
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <x-primary-button class="mt-4">{{('Anuluj') }}</x-primary-button>
    </div>
    </form>
    <form method="POST" action="{{ route('workers.index') }}">
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <x-primary-button class="mt-4">{{('Zatwierdź') }}</x-primary-button>
        </div>
    </form>
</x-app-layout>
