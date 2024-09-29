<!-- resources/views/players/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Players List</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Players List</h1>

        @if (session('success'))
            <div class="mb-4 text-green-600">{{ session('success') }}</div>
        @endif

        <a href="{{ route('players.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Player</a>

        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="border-b border-gray-300 px-4 py-2">ID</th>
                    <th class="border-b border-gray-300 px-4 py-2">Name</th>
                    <th class="border-b border-gray-300 px-4 py-2">Mobile Number</th>
                    <th class="border-b border-gray-300 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($players as $player)
                    <tr>
                        <td class="border-b border-gray-300 px-4 py-2">{{ $player->id }}</td>
                        <td class="border-b border-gray-300 px-4 py-2">{{ $player->name }}</td>
                        <td class="border-b border-gray-300 px-4 py-2">{{ $player->mobile_number }}</td>
                        <td class="border-b border-gray-300 px-4 py-2">
                            <a href="{{ route('players.edit', $player->id) }}" class="text-blue-500">Edit</a>
                            <form action="{{ route('players.destroy', $player->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 ml-2">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
