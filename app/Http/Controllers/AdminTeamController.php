<?php

namespace App\Http\Controllers;

use App\Models\Season;
use Illuminate\Http\Request;
use App\Http\Requests\CreateTeamRequest;
use App\Models\Division;
use App\Models\Player;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminTeamController extends Controller
{
    private $seasonsPerPage;
    private $teamsPerPage;
    private $divisionsPerPage;
    private $anchoLogos;
    public function __construct()
    {
        $this->seasonsPerPage = 5;
        $this->teamsPerPage = 5;
        $this->divisionsPerPage = 5;
        $this->anchoLogos = 600; // en px
    }

    public function getTeams()
    {
        // para mostrar en las tablas
        $teams = Team::paginate($this->teamsPerPage);
        $divisions = Division::paginate($this->divisionsPerPage);
        $seasons = Season::orderByDesc('id')->paginate($this->seasonsPerPage);


        // para mostar en formulario de team
        $usersInTeams = Team::pluck('user_id')->toArray();
        $users = User::where('status', true)
            ->whereNotIn('id', $usersInTeams)
            ->get();

        // para mostrar en el formulario de division
        $tiposJuego = ['FUTBOL', 'BOLI'];
        $rangos = ['A', 'B', 'C'];
        $generos = ['MASCULINO', 'FEMENINO'];

        // Para mostrar en los inputs de nueva division
        $activeSeasons = Season::where('status', true)
            ->whereDate('fecha_inicio', '>=', now())->get();


        return view(
            'admin.teams',
            array_merge(
                compact(
                    'teams',
                    'divisions',
                    'seasons',
                    //------
                    'users',
                    'activeSeasons',
                    'tiposJuego',
                    'rangos',
                    'generos'
                ),
                [
                    'startNumberSeasons' => ($seasons->currentPage() - 1) * $seasons->perPage() + 1,
                    'startNumberTeams' => ($teams->currentPage() - 1) * $teams->perPage() + 1,
                    'startNumberDivisions' => ($divisions->currentPage() - 1) * $divisions->perPage() + 1
                ]
            )
        );
    }

    public function newSeason(Request $request)
    {
        // control para una unica season a la vez, sostenible a cambios
        // Verificar si hay una temporada activa
        $temporadaActiva = Season::where('status', 1)->first();

        // Si hay una temporada activa y el estado de la nueva temporada es 1
        if ($temporadaActiva && $request->status == 1) {
            Session::flash('errorMessage', 'Ya existe una temporada activa');
            return redirect()->back();
        }

        // Si la fecha de inicio de la nueva temporada es anterior a la fecha de finalización de la última temporada
        if ($temporadaActiva && $request->fecha_inicio <= $temporadaActiva->fecha_fin) {
            Session::flash('errorMessage', 'Una temporada no puede iniciar antes de que acabe la actual');
            return redirect()->back();
        }

        // Crear la nueva temporada con el estado proporcionado
        Season::create([
            'nombre' => $request->nombre,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'status' => $request->status // Asegúrate de que este valor venga del formulario
        ]);

        // Redireccionar con un mensaje de éxito
        Session::flash('successMessage', 'Temporada creada con éxito');
        return redirect()->route('admin_teams');
    }

    public function newTeam(CreateTeamRequest $request)
    {
        $imageSize = $request->file('imagen')->getSize();
        $fileName = $request->nombre_equipo . '_' . date('YmdHis') . '.png';

        if ($imageSize <= 0.5 * 1024 * 1024) { // Menor o igual a 0.5 MB
            $request->file('imagen')->storeAs('public/images/teams', $fileName);
        } else {
            $rutaDestinoRedimensionada = 'public/images/teams/' . $fileName;

            list($anchoOriginal, $altoOriginal) = getimagesize($request->file('imagen')->getPathName());
            $altoNuevo = intval($altoOriginal * ($this->anchoLogos / $anchoOriginal));

            $this->redimensionarImagen(
                $request->file('imagen')->getPathName(),
                $this->anchoLogos,
                $altoNuevo,
                storage_path('app/' . $rutaDestinoRedimensionada)
            );
        }
        Team::create([
            'nombre' => $request->nombre_equipo,
            'url_foto' => $fileName,
            'user_id' => $request->user_id
        ]);
        Session::flash('successMessage', 'Equipo creado con exito');
        return redirect()->route('admin_teams');
    }

    public function newDivision(Request $request)
    {
        // Verificar si ya existe una división con los mismos datos
        $existingDivision = Division::where('rango', $request->rango)
            ->where('tipo', $request->tipo)
            ->where('genero', $request->genero)
            ->where('team_id', $request->team_id)
            ->where('season_id', $request->season_id)
            ->first();

        if ($existingDivision) {
            // Si existe una división con los mismos datos, mostrar un mensaje de error
            Session::flash('errorMessage', 'Ya existe una división con estos datos.');
            return redirect()->back();
        }

        // Si no existe una división con los mismos datos, crear la nueva división
        Division::create([
            'rango' => $request->rango,
            'tipo' => $request->tipo,
            'genero' => $request->genero,
            'team_id' => $request->team_id,
            'season_id' => $request->season_id
        ]);

        // Redireccionar con un mensaje de éxito
        Session::flash('successMessage', 'División creada con éxito');
        return redirect()->route('admin_teams');
    }

    public function updateSeason(Request $request, $id)
    {
        $seasonEdit = Season::find($id);

        $seasonEdit->nombre = $request->nombre;
        $seasonEdit->fecha_inicio = $request->fecha_inicio;
        $seasonEdit->fecha_fin = $request->fecha_fin;
        $seasonEdit->status = $request->status;

        if ($request->status == 0) {
            $divisiones = Division::where('season_id', $id)->get();

            // Establecer el estado de todas las divisiones a 0
            foreach ($divisiones as $division) {
                $division->status = 0;
                $division->save();
                $jugadores = Player::where('division_id', $division->id)->get();

                // Desactivar los partidos de la división
                $partidos = $division->games;
                foreach ($partidos as $partido) {
                    $partido->status = 0;
                    $partido->save();
                }
                // Eliminar la referencia de la división para cada jugador
                foreach ($jugadores as $jugador) {
                    $jugador->division_id = null;
                    $jugador->save();
                }
            }
        } else {
            $divisiones = Division::where('season_id', $id)->get();

            // Establecer el estado de todas las divisiones a 0
            foreach ($divisiones as $division) {
                $division->status = 1;
                $division->save();
            }
        }

        $seasonEdit->save();

        Session::flash('successMessage', 'Temporada actualizada con exito');
        return back();
    }

    public function updateTeam(Request $request, $id)
    {
        $teamEdit = Team::find($id);
        if ($request->hasFile('imagen')) {
            $imageSize = $request->file('imagen')->getSize();
            $fileName = $request->nombre_equipo . '_' . date('YmdHis') . '.png';

            if ($imageSize <= 0.5 * 1024 * 1024) { // Menor o igual a 0.5 MB
                $request->file('imagen')->storeAs('public/images/teams', $fileName);
            } else {
                $rutaDestinoRedimensionada = 'public/images/teams/' . $fileName;

                list($anchoOriginal, $altoOriginal) = getimagesize($request->file('imagen')->getPathName());
                $altoNuevo = intval($altoOriginal * ($this->anchoLogos / $anchoOriginal));

                $this->redimensionarImagen(
                    $request->file('imagen')->getPathName(),
                    $this->anchoLogos,
                    $altoNuevo,
                    storage_path('app/' . $rutaDestinoRedimensionada)
                );
            }

            Storage::delete('public/images/teams/' . $teamEdit->url_foto);

            $teamEdit->url_foto = $fileName;
        }
        $teamEdit->nombre = $request->nombre_equipo;
        $teamEdit->user_id = $request->user_id;
        $teamEdit->save();
        Session::flash('successMessage', 'Equipo actualizado con exito');
        return back();
    }

    public function updateDivision(Request $request, $id)
    {
        $divisionEdit = Division::find($id);

        $divisionEdit->team_id = $request->team_id;
        $divisionEdit->season_id = $request->season_id;
        $divisionEdit->tipo = $request->tipo;
        $divisionEdit->rango = $request->rango;
        $divisionEdit->genero = $request->genero;
        $divisionEdit->status = $request->status;

        $divisionEdit->save();

        if ($request->status == 0) {
            // Liberar todos los jugadores asociados a esta división
            $jugadores = Player::where('division_id', $divisionEdit->id)->get();

            foreach ($jugadores as $jugador) {
                $jugador->division_id = null;
                $jugador->save();
            }
        }

        Session::flash('successMessage', 'Division actualizada con exito');
        return back();
    }

    public function redimensionarImagen($rutaOriginal, $anchoNuevo, $altoNuevo, $rutaDestino)
    {
        // Obtener las dimensiones originales de la imagen
        list($anchoOriginal, $altoOriginal, $tipo) = getimagesize($rutaOriginal);

        // Crear una nueva imagen con el tamaño especificado
        $imagen = imagecreatetruecolor($anchoNuevo, $altoNuevo);

        // Desactivar mezcla de alfa
        imagealphablending($imagen, false);

        // Mantener la información de transparencia
        imagesavealpha($imagen, true);

        // Cargar la imagen original
        switch ($tipo) {
            case IMAGETYPE_JPEG:
                $imagenOriginal = imagecreatefromjpeg($rutaOriginal);
                break;
            case IMAGETYPE_PNG:
                $imagenOriginal = imagecreatefrompng($rutaOriginal);
                break;
            default:
                echo 'Tipo de imagen no compatible';
        }

        // Redimensionar la imagen original a la nueva imagen
        imagecopyresampled($imagen, $imagenOriginal, 0, 0, 0, 0, $anchoNuevo, $altoNuevo, $anchoOriginal, $altoOriginal);

        // Guardar la imagen redimensionada en la ruta de destino como PNG
        imagepng($imagen, $rutaDestino);

        // Liberar memoria
        imagedestroy($imagen);
        imagedestroy($imagenOriginal);
    }
}
