<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Create Users') }}
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
          <x-splade-form class="space-y-4" action="{{ route('users.store') }}" method="post">
            <x-splade-input name="name" label="Name" />
            <x-splade-select name="gender" label="gender" :options="$genders" />
            <x-splade-input name="email" label="Email" />
            <x-splade-input name="password" label="Password" />
            <x-splade-submit label="Submit" :spinner="true" />
          </x-splade-form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
