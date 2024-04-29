<?php

namespace App\Http\Controllers;

use App\Models\Season;
use Illuminate\Http\Request;
use App\Http\Requests\CreateTeamRequest;
use App\Models\Division;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminTeamsController extends Controller
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
        $this->anchoLogos = 600; // pixeles
    }

    public function getTeams()
    {
        // para mostrar en las tablas
        $teams = Team::orderBy('nombre')->paginate($this->teamsPerPage);
        $divisions = Division::orderByDesc('id')->paginate($this->divisionsPerPage);
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
        $activeTeams = Team::where('status', true)->get();
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
                    'activeTeams',
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
        $ultimaTemporada = Season::latest('fecha_fin')->first();
        if ($ultimaTemporada && $request->fecha_inicio <= $ultimaTemporada->fecha_fin) {
            Session::flash('errorMessage', 'Una temporada no puede iniciar antes de que acabe la actual');
            return redirect()->back();
        }

        Season::create([
            'nombre' => $request->nombre,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin
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
        Division::create([
            'rango' => $request->rango,
            'tipo' => $request->tipo,
            'genero' => $request->genero,
            'team_id' => $request->team_id,
            'season_id' => $request->season_id
        ]);
        Session::flash('successMessage', 'Division creada con éxito');
        return redirect()->route('admin_teams');
    }

    public function updateSeason(Request $request, $id)
    {
        $seasonEdit = Season::find($id);

        $seasonEdit->nombre = $request->nombre;
        $seasonEdit->fecha_inicio = $request->fecha_inicio;
        $seasonEdit->fecha_fin = $request->fecha_fin;
        $seasonEdit->status = $request->status;

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

            $teamEdit->nombre = $request->nombre_equipo;
            $teamEdit->url_foto = $fileName;
            $teamEdit->status = $request->status;
            $teamEdit->save();
        } else {
            $teamEdit->nombre = $request->nombre_equipo;
            $teamEdit->status = $request->status;
            $teamEdit->save();
        }
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
