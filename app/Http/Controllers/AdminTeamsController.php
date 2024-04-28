<?php

namespace App\Http\Controllers;

use App\Models\Season;
use Illuminate\Http\Request;
use App\Http\Requests\CreateTeamRequest;
use App\Models\Division;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class AdminTeamsController extends Controller
{
    private $teamsPerPage;
    private $anchoLogos;
    public function __construct()
    {
        $this->teamsPerPage = 10;
        $this->anchoLogos = 600; // pixeles
    }

    public function getTeams()
    {
        $teams = Team::paginate($this->teamsPerPage);
        $startNumber = ($teams->currentPage() - 1) * $teams->perPage() + 1;

        $usersInTeams = Team::pluck('user_id')->toArray();

        // Obtener solo los usuarios que tienen status 1 y no están en equipos
        $users = User::where('status', 1)
            ->whereNotIn('id', $usersInTeams)
            ->get();

        // para mostrar en el formulario de divisiones
        $tiposJuego = ['FUTBOL', 'BOLI'];
        $rangos = ['A', 'B', 'C'];
        $generos = ['HOMBRES', 'MUJERES'];

        // Para mostrar en los inputs de nueva division
        $allTeams = Team::all();
        $activeSeason = Season::where('status', true)->latest()->first();

        return view('admin.teams', compact('teams', 'startNumber', 'users', 'allTeams', 'activeSeason','tiposJuego', 'rangos', 'generos'));
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

    public function newDivision(Request $request){
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
