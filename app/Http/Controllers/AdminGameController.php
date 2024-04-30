<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Game;
use App\Models\Location;
use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminGameController extends Controller
{
    private $gamesPerPage;

    public function __construct()
    {
        $this->gamesPerPage = 4;
    }

    public function getGames()
    {
        $games = Game::orderByDesc('fecha')->orderByDesc('status')->paginate($this->gamesPerPage);

        // para mostrar en el formulario de creacion de partido
        $activeDivisions = Division::where('status', 1)->orderByDesc('season_id')->get();
        $activeSeason = Season::where('status', 1)->first();
        $locations = Location::all();

        return view(
            'admin.games',
            array_merge(
                compact(
                    'games',
                    'activeDivisions',
                    'activeSeason',
                    'locations'
                ),
                [
                    'startNumberGames' => ($games->currentPage() - 1) * $games->perPage() + 1
                ]
            )
        );
    }

    public function newGame(Request $request)
    {
        $existingGame = Game::where('location_id', $request->location_id)
            ->where('fecha', $request->fecha)
            ->exists();

        if ($existingGame) {
            Session::flash('errorMessage', 'Estadio ocupado para esa fecha');
            return redirect()->route('admin_games');
        }

        Game::create([
            'division_1_id' => $request->division_1_id,
            'division_2_id' => $request->division_2_id,
            'fecha' => $request->fecha,
            'location_id' => $request->location_id
        ]);
        Session::flash('successMessage', 'Partido creado con exito');
        return redirect()->route('admin_games');
    }

    public function updateGame(Request $request, $id)
    {
        $gameEdit = Game::find($id);
        if($request->division_1_id_update == $request->division_2_id_update){
            Session::flash('errorMessage', 'Equipo enfrentandose a si mismo');
            return redirect()->route('admin_games');
        }

        $existingGame = Game::where('location_id', $request->location_id)
            ->where('fecha', $request->fecha)
            ->where('status', 1)
            ->first();

        if ($existingGame && $gameEdit->id != $existingGame->id) {
            Session::flash('errorMessage', 'Estadio ocupado para esa fecha');
            return redirect()->route('admin_games');
        }

        $gameEdit->division_1_id = $request->division_1_id;
        $gameEdit->division_2_id = $request->division_2_id;
        $gameEdit->fecha = $request->fecha;
        $gameEdit->location_id = $request->location_id;
        if ($request->resultado_division_1 && $request->resultado_division_2) {
            $gameEdit->status = 0;
            $gameEdit->resultado_division_1 = $request->resultado_division_1;
            $gameEdit->resultado_division_2 = $request->resultado_division_2;
            $gameEdit->save();
            Session::flash('successMessage', 'Partido finalizado');
            return redirect()->route('admin_games');
        }
        $gameEdit->resultado_division_1 = null;
        $gameEdit->resultado_division_2 = null;
        $gameEdit->status = 1;
        $gameEdit->save();
        Session::flash('successMessage', 'Partido editado con exito');
        return redirect()->route('admin_games');
    }
}
