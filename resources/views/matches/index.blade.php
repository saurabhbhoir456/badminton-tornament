<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match Management</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Matches</h1>

        @if (session('success'))
            <div class="mb-4 text-green-600">{{ session('success') }}</div>
        @endif

        <a href="{{ route('matches.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Match</a>

        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="border-b border-gray-300 px-4 py-2">ID</th>
                    <th class="border-b border-gray-300 px-4 py-2">Team 1</th>
                    <th class="border-b border-gray-300 px-4 py-2">Team 2</th>
                    <th class="border-b border-gray-300 px-4 py-2">Match Date</th>
                    <th class="border-b border-gray-300 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($matches as $match)
                    <tr>
                        <td class="border-b border-gray-300 px-4 py-2">{{ $match->id }}</td>
                        <td class="border-b border-gray-300 px-4 py-2">{{ $match->team1_id }}</td>
                        <td class="border-b border-gray-300 px-4 py-2">{{ $match->team2_id }}</td>
                        <td class="border-b border-gray-300 px-4 py-2">{{ $match->match_date }}</td>
                        <td class="border-b border-gray-300 px-4 py-2">
                            <a href="{{ route('matches.edit', $match->id) }}" class="text-blue-500">Edit</a>
                            <form action="{{ route('matches.destroy', $match->id) }}" method="POST" style="display:inline;">
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
