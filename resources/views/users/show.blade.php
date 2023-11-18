<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Detail Users') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <div class="mb-8">
            <Link href="{{ route('users.index') }}" class="px-3 py-1 text-white bg-indigo-400 rounded-md">
            Back
            </Link>
          </div>
          <x-splade-form class="space-y-4" :default="$user">
            <x-splade-input name="name" label="Name" disabled />
            <x-splade-input name="gender" label="gender" disabled />
            <x-splade-input name="email" label="Email" disabled />
          </x-splade-form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
