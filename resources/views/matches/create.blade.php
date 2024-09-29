<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Match</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Create Match</h1>

        <form action="{{ route('matches.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="team1_id" class="block text-sm font-medium text-gray-700">Team 1 ID</label>
                <input type="number" name="team1_id" id="team1_id" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md" />
            </div>

            <div class="mb-4">
                <label for="team2_id" class="block text-sm font-medium text-gray-700">Team 2 ID</label>
                <input type="number" name="team2_id" id="team2_id" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md" />
            </div>

            <div class="mb-4">
                <label for="match_date" class="block text-sm font-medium text-gray-700">Match Date</label>
                <input type="datetime-local" name="match_date" id="match_date" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md" />
            </div>

            <div class="mb-4">
                <label for="venue" class="block text-sm font-medium text-gray-700">Venue</label>
                <input type="text" name="venue" id="venue" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md" />
            </div>

            <h2 class="text-xl font-bold mb-2">Singles Matches</h2>
            <div class="mb-4">
                <label for="singles_player1_team1" class="block text-sm font-medium text-gray-700">Team 1 Singles Player 1</label>
                <select id="singles_player1_team1" name="singles_player1_team1" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                    @foreach ($players as $player)
                        <option value="{{ $player->id }}">{{ $player->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="singles_player2_team1" class="block text-sm font-medium text-gray-700">Team 1 Singles Player 2</label>
                <select id="singles_player2_team1" name="singles_player2_team1" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                    @foreach ($players as $player)
                        <option value="{{ $player->id }}">{{ $player->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="singles_player1_team2" class="block text-sm font-medium text-gray-700">Team 2 Singles Player 1</label>
                <select id="singles_player1_team2" name="singles_player1_team2" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                    @foreach ($players as $player)
                        <option value="{{ $player->id }}">{{ $player->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="singles_player2_team2" class="block text-sm font-medium text-gray-700">Team 2 Singles Player 2</label>
                <select id="singles_player2_team2" name="singles_player2_team2" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                    @foreach ($players as $player)
                        <option value="{{ $player->id }}">{{ $player->name }}</option>
                    @endforeach
                </select>
            </div>

            <h2 class="text-xl font-bold mb-2">Doubles Matches</h2>
            <div class="mb-4">
                <label for="doubles_player1_team1" class="block text-sm font-medium text-gray-700">Team 1 Doubles Player 1</label>
                <select id="doubles_player1_team1" name="doubles_player1_team1" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                    @foreach ($players as $player)
                        <option value="{{ $player->id }}">{{ $player->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="doubles_player2_team1" class="block text-sm font-medium text-gray-700">Team 1 Doubles Player 2</label>
                <select id="doubles_player2_team1" name="doubles_player2_team1" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                    @foreach ($players as $player)
                        <option value="{{ $player->id }}">{{ $player->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="doubles_player3_team1" class="block text-sm font-medium text-gray-700">Team 1 Doubles Player 3</label>
                <select id="doubles_player3_team1" name="doubles_player3_team1" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                    @foreach ($players as $player)
                        <option value="{{ $player->id }}">{{ $player->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="doubles_player4_team1" class="block text-sm font-medium text-gray-700">Team 1 Doubles Player 4</label>
                <select id="doubles_player4_team1" name="doubles_player4_team1" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                    @foreach ($players as $player)
                        <option value="{{ $player->id }}">{{ $player->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="doubles_player1_team2" class="block text-sm font-medium text-gray-700">Team 2 Doubles Player 1</label>
                <select id="doubles_player1_team2" name="doubles_player1_team2" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                    @foreach ($players as $player)
                        <option value="{{ $player->id }}">{{ $player->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="doubles_player2_team2" class="block text-sm font-medium text-gray-700">Team 2 Doubles Player 2</label>
                <select id="doubles_player2_team2" name="doubles_player2_team2" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                    @foreach ($players as $player)
                        <option value="{{ $player->id }}">{{ $player->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="doubles_player3_team2" class="block text-sm font-medium text-gray-700">Team 2 Doubles Player 3</label>
                <select id="doubles_player3_team2" name="doubles_player3_team2" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                    @foreach ($players as $player)
                        <option value="{{ $player->id }}">{{ $player->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="doubles_player4_team2" class="block text-sm font-medium text-gray-700">Team 2 Doubles Player 4</label>
                <select id="doubles_player4_team2" name="doubles_player4_team2" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                    @foreach ($players as $player)
                        <option value="{{ $player->id }}">{{ $player->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create Match</button>
        </form>
    </div>
</body>
</html>
