<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-bold">Task Management</h2>
                    <a href="{{ route('admin.tasks.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Create Task
                    </a>
                </div>
                <table class="table-auto w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="border-b border-gray-400 px-4 py-2">Task Name</th>
                            <th class="border-b border-gray-400 px-4 py-2">Status</th>
                            <th class="border-b border-gray-400 px-4 py-2">Assigned To</th>
                            <th class="border-b border-gray-400 px-4 py-2">Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tasks as $task)
                            <tr>
                                <td class="border-b border-gray-300 px-4 py-2 text-center">{{ $task->title }}</td>
                                <td class="border-b border-gray-300 px-4 py-2 text-center">{{ $task->status }}</td>
                                <td class="border-b border-gray-300 px-4 py-2 text-center">{{ $task->assignedTo->name }}</td>
                                <td class="border-b border-gray-300 px-4 py-2 text-center">{{ $task->created_at->format('d-m-Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="border-b border-gray-300 px-4 py-2 text-center">No tasks found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
