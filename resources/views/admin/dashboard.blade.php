<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div style="max-width: 1200px; margin: 0 auto; padding: 0 15px;">
            <div style="background-color: #fff; border: 1px solid #ccc; border-radius: 5px; padding: 20px;">
                <div style="margin-bottom: 20px;">
                    <h3 style="font-size: 18px; font-weight: bold; margin-bottom: 10px;">User Management</h3>
                    <div style="overflow-x: auto;">
                        <table style="width: 100%; border-collapse: collapse;">
                            <thead>
                                <tr>
                                    <th style="padding: 10px; border-bottom: 1px solid #ccc; background-color: #f5f5f5;">ID</th>
                                    <th style="padding: 10px; border-bottom: 1px solid #ccc; background-color: #f5f5f5;">Name</th>
                                    <th style="padding: 10px; border-bottom: 1px solid #ccc; background-color: #f5f5f5;">Email</th>
                                    <th style="padding: 10px; border-bottom: 1px solid #ccc; background-color: #f5f5f5;">Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr style="background-color: #fff;">
                                        <td style="padding: 10px; border-bottom: 1px solid #ccc; text-align: center;">{{ $user->id }}</td>
                                        <td style="padding: 10px; border-bottom: 1px solid #ccc; text-align: center;">{{ $user->name }}</td>
                                        <td style="padding: 10px; border-bottom: 1px solid #ccc; text-align: center;">{{ $user->email }}</td>
                                        <td style="padding: 10px; border-bottom: 1px solid #ccc;">
                                            <form action="{{ route('admin.update.role', $user->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('PATCH')
                                                <select name="role" style="width: 105px;padding: 5px; border: 1px solid #ccc;" onchange="this.form.submit()">
                                                    <option value="user" @if($user->getRoleNames()->contains('user')) selected @endif>User</option>
                                                    <option value="manager" @if($user->getRoleNames()->contains('manager')) selected @endif>Manager</option>
                                                    <option value="admin" @if($user->getRoleNames()->contains('admin')) selected @endif>Admin</option>
                                                </select>
                                            </form>
                                        </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
