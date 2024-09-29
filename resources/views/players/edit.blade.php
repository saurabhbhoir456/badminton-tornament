<!-- resources/views/players/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Player</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Edit Player</h1>

        <form action="{{ route('players.update', $player->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $player->name) }}" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="mobile_number" class="block text-sm font-medium text-gray-700">Mobile Number</label>
                <input type="text" name="mobile_number" id="mobile_number" value="{{ old('mobile_number', $player->mobile_number) }}" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="team_id" class="block text-sm font-medium text-gray-700">Team</label>
                <select id="team_id" name="team_id" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                    <option value="">Select a team</option>
                    @foreach ($teams as $team)
                        <option value="{{ $team->id }}" {{ $team->id == $player->team_id ? 'selected' : '' }}>
                            {{ $team->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Player</button>
        </form>

        <a href="{{ route('players.index') }}" class="text-blue-500 mt-4 inline-block">Back to Players List</a>
    </div>
</body>
</html>
