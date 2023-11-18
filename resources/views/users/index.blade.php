<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Users') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <div class="mb-4">
            <Link href="{{ route('users.create') }}" class="px-3 py-1 text-white bg-indigo-400 rounded-md">
            Create
            </Link>
          </div>
          <x-splade-table :for="$users" pagination-scroll="preserve" search-debounce="500">
            <x-splade-cell actions as="$user"">
              <x-slot:empty-state>
                <p>Whoops!</p>
              </x-slot>

              <div class="space-x-2">
                <Link href="{{ route('users.show', $user) }}" class="px-3 py-1 rounded-md text-slate-700 bg-slate-200">
                Detail
                </Link>
                <Link href="{{ route('users.edit', $user) }}" class="px-3 py-1 text-white bg-indigo-400 rounded-md">
                Edit
                </Link>
                <Link href="{{ route('users.destroy', $user) }}" method="delete"
                  class="px-3 py-1 text-white bg-red-400 rounded-md" confirm="Delete User"
                  confirm-text="Are you sure delete this user?" confirm-button="Yes, delete this user!"
                  cancel-button="No, keep me save!" confirm>
                Delete</Link>
              </div>
            </x-splade-cell>
          </x-splade-table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
