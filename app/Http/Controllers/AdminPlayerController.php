<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePlayerRequest;
use App\Models\Division;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminPlayerController extends Controller
{
    private $playersPerPage;
    private $anchoImgPlayers;

    public function __construct()
    {
        $this->playersPerPage = 10;
        $this->anchoImgPlayers = 350; // en px
    }
    public function getPlayers()
    {
        $players = Player::paginate($this->playersPerPage);
        $activeDivisions = Division::where('status', true)->get();
        return view(
            'admin.players',
            array_merge(
                compact(
                    'players',
                    'activeDivisions'
                ),
                [
                    'startNumberPlayers' => ($players->currentPage() - 1) * $players->perPage() + 1
                ]
            )
        );
    }

    public function newPlayer(CreatePlayerRequest $request)
    {
        if (Player::where('cedula', $request->cedula)->exists()) {
            Session::flash('errorMessage', 'Jugador ya existente, puedes editarlo en el registro');
            return redirect()->route('admin_players');
        }

        $imageSize = $request->file('imagen')->getSize();
        $fileName = $request->cedula . '_' . date('YmdHis') . '.png';

        if ($imageSize <= 0.5 * 1024 * 1024) { // Menor o igual a 0.5 MB
            $request->file('imagen')->storeAs('public/images/players', $fileName);
        } else {
            $rutaDestinoRedimensionada = 'public/images/players/' . $fileName;

            list($anchoOriginal, $altoOriginal) = getimagesize($request->file('imagen')->getPathName());
            $altoNuevo = intval($altoOriginal * ($this->anchoImgPlayers / $anchoOriginal));

            $this->redimensionarImagen(
                $request->file('imagen')->getPathName(),
                $this->anchoImgPlayers,
                $altoNuevo,
                storage_path('app/' . $rutaDestinoRedimensionada)
            );
        }

        Player::create([
            'cedula' => $request->cedula,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'division_id' => $request->division_id == -99 ? null : $request->division_id,
            'url_foto' => $fileName,
            'numero_camiseta' => $request->numero_camiseta
        ]);
        Session::flash('successMessage', 'Jugador creado con exito');
        return redirect()->route('admin_players');
    }

    public function updatePlayer(Request $request, $id)
    {
        $playerEdit = Player::find($id);


        if ($request->hasFile('imagen')) {
            Storage::delete('public/images/players/' . $playerEdit->url_foto);
            $imageSize = $request->file('imagen')->getSize();
            $fileName = $playerEdit->url_foto;

            if ($imageSize <= 0.5 * 1024 * 1024) { // Menor o igual a 0.5 MB
                $request->file('imagen')->storeAs('public/images/players', $fileName);
            } else {
                $rutaDestinoRedimensionada = 'public/images/players/' . $fileName;

                list($anchoOriginal, $altoOriginal) = getimagesize($request->file('imagen')->getPathName());
                $altoNuevo = intval($altoOriginal * ($this->anchoImgPlayers / $anchoOriginal));

                $this->redimensionarImagen(
                    $request->file('imagen')->getPathName(),
                    $this->anchoImgPlayers,
                    $altoNuevo,
                    storage_path('app/' . $rutaDestinoRedimensionada)
                );
            }
        }
        $playerEdit->fecha_nacimiento = $request->fecha_nacimiento;
        $playerEdit->nombres = $request->nombres;
        $playerEdit->apellidos = $request->apellidos;
        $playerEdit->division_id = $request->division_id == -99 ? null : $request->division_id;
        $playerEdit->numero_camiseta = $request->numero_camiseta;
        $playerEdit->save();

        Session::flash('successMessage', 'Jugador actualizado con exito');
        return redirect()->route('admin_players');
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
