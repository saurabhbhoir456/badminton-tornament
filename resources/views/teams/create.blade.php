<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Team</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Add Team</h1>

        <form action="{{ route('teams.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Team Name</label>
                <input type="text" id="name" name="name" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                @error('name')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create Team</button>
                <a href="{{ route('teams.index') }}" class="ml-4 text-gray-500">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
