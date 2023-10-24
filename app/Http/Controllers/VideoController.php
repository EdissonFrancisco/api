<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //traigo todos los videos
        $videos = Video::all();
        //return la respuesta $videos en json
        return response()->json($videos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //guarda un video
        $video = new Video;
        $video->nombreUnico = $request->nombreUnico;
        $video->titulo = $request->titulo;
        $video->descripcion = $request->descripcion;
        $video->fecha = $request->fecha;
        $video->save();

        $data = [
            'mensaje' => 'Video guardado con exito',
            'video' => $video
        ];

        return response()->json($data);

    }

    /**
     * Display the specified resource.
     * me va a traer un json con los datos del video y los comentarios
     */
    public function show(Video $video, Comentario $comentario)
    {
        // Obtener el video.
        $video = Video::where('id', $video->id)->firstOrFail();

        // Obtener los comentarios del video.
        $comentarios = Comentario::where('idVideo', $video->id)->get();

        //traer un solo video con sus comentarios
        $data = [
            'video' => $video,
            'comentarios' => $comentarios
        ];
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $videoId)
    {
        //buscar el video por id
        $video = Video::findOrFail($videoId);
        
        //actualizar el video
        $video->nombreUnico = $request->nombreUnico;
        $video->titulo = $request->titulo;
        $video->descripcion = $request->descripcion;
        $video->fecha = $request->fecha;
        $video->save();

        $data = [
            'mensaje' => 'Video actualizado con exito',
            'video' => $video
        ];

        return response()->json($data);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        //borrar un cliente
        $video->delete();
        $data = [
            'mensaje' => 'Video eliminado con exito',
            'video' => $video
        ];

        return response()->json($data);
    }
}
