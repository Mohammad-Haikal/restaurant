<x-template>
    <main class="row g-0">
        @include('partials._admin-sidebar')
        <div class="col p-3">
            <h1>Customers</h1>
            <div class="overflow-auto">
                <table class="table-striped mb-3 table">
                    <thead>
                        <tr>
                            <th scope="col">
                                <h4>ID</h4>
                            </th>
                            <th scope="col">
                                <h4>Name</h4>
                            </th>
                            <th scope="col">
                                <h4>Email</h4>
                            </th>
                            <th scope="col">
                                <h4>Joined At</h4>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="align-items-center">
                                <td class="align-middle">
                                    <p class="mb-0">{{ $user['id'] }}</p>
                                </td>
                                <td class="align-middle">
                                    <p class="mb-0">{{ $user['name'] }}</p>
                                </td>
                                <td class="align-middle">
                                    <p class="mb-0">{{ $user['email'] }}</p>
                                </td>
                                <td class="align-middle">
                                    <p class="mb-0">{{ $user['created_at']->format('Y-m-d') }}</p>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </main>

</x-template>
