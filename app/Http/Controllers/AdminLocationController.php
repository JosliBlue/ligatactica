<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminLocationController extends Controller
{
    private $locationsPerPage;
    private $anchoImgLocations;

    public function __construct()
    {
        $this->locationsPerPage = 4;
        $this->anchoImgLocations = 700; // en px
    }

    public function getLocations()
    {
        $locations = Location::orderByDesc('created_at')->paginate($this->locationsPerPage);



        return view(
            'admin.location',
            array_merge(
                compact(
                    'locations'
                ),
                [
                    'startNumberLocations' => ($locations->currentPage() - 1) * $locations->perPage() + 1
                ]
            )
        );
    }

    public function newLocation(Request $request)
    {
        $fileName = '';
        if ($request->hasFile('imagen')) {
            $imageSize = $request->file('imagen')->getSize();
            $fileName = $request->barrio . '_' . date('YmdHis') . '.png';

            if ($imageSize <= 0.5 * 1024 * 1024) { // Menor o igual a 0.5 MB
                $request->file('imagen')->storeAs('public/images/locations', $fileName);
            } else {
                $rutaDestinoRedimensionada = 'public/images/locations/' . $fileName;

                list($anchoOriginal, $altoOriginal) = getimagesize($request->file('imagen')->getPathName());
                $altoNuevo = intval($altoOriginal * ($this->anchoImgLocations / $anchoOriginal));

                $this->redimensionarImagen(
                    $request->file('imagen')->getPathName(),
                    $this->anchoImgLocations,
                    $altoNuevo,
                    storage_path('app/' . $rutaDestinoRedimensionada)
                );
            }
        }

        Location::create([
            'barrio' => $request->barrio,
            'calle_1' => $request->calle_1,
            'calle_2' => $request->calle_2,
            'url_foto' => $fileName
        ]);

        Session::flash('successMessage', 'Estadio creado con exito');
        return redirect()->route('admin_locations');
    }

    public function updateLocation(Request $request, $id)
    {
        $locationEdit = Location::find($id);

        if ($request->hasFile('imagen')) {
            Storage::delete('public/images/locations/' . $locationEdit->url_foto);
            $imageSize = $request->file('imagen')->getSize();
            $fileName = $request->barrio . '_' . date('YmdHis') . '.png';

            if ($imageSize <= 0.5 * 1024 * 1024) { // Menor o igual a 0.5 MB
                $request->file('imagen')->storeAs('public/images/locations', $fileName);
            } else {
                $rutaDestinoRedimensionada = 'public/images/locations/' . $fileName;

                list($anchoOriginal, $altoOriginal) = getimagesize($request->file('imagen')->getPathName());
                $altoNuevo = intval($altoOriginal * ($this->anchoImgLocations / $anchoOriginal));

                $this->redimensionarImagen(
                    $request->file('imagen')->getPathName(),
                    $this->anchoImgLocations,
                    $altoNuevo,
                    storage_path('app/' . $rutaDestinoRedimensionada)
                );
            }
            $locationEdit->url_foto = $fileName;
        }
        $locationEdit->barrio = $request->barrio;
        $locationEdit->calle_1 = $request->calle_1;
        $locationEdit->calle_2 = $request->calle_2;

        $locationEdit->save();

        Session::flash('successMessage', 'Estadio actualizado con exito');
        return redirect()->route('admin_locations');
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
