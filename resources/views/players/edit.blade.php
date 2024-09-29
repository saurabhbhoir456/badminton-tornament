<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Player</title>
    @vite('resources/css/app.css') <!-- Ensure you're using the vite directive -->
</head>
<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Edit Player</h1>

        @if (session('success'))
            <div class="mb-4 text-green-600">{{ session('success') }}</div>
        @endif

        <form action="{{ route('players.update', $player->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Use PUT for updating the resource -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $player->name) }}" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                @error('name')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="mobile_number" class="block text-sm font-medium text-gray-700">Mobile Number</label>
                <input type="text" id="mobile_number" name="mobile_number" value="{{ old('mobile_number', $player->mobile_number) }}" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                @error('mobile_number')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Player</button>
                <a href="{{ route('players.index') }}" class="ml-4 text-gray-500">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
