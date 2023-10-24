<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     * recivo el parametro -videoId- desde el body 
     * para traer los videos ejp de body
     * {
     *   "videoId": 3
     * }
     */
    public function index()
    {
        //traigo los comentarios del video 
        $videoid = request()->videoId;
        //traer los comentarios del video
        $comentarios = Comentario::where('idVideo', $videoid)->get();

        return response()->json($comentarios);
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
        //
        $this->validate($request, [
            'comentario' => 'required|min:10'
        ]);

        $comentario = new Comentario();
        $comentario->idVideo = $request->idVideo;
        $comentario->comentario = $request->comentario;
        $comentario->fecha = $request->fecha;
        $comentario->save();

        $data = [
            'mensaje' => 'Comentario Agredado correctamente',
            'comentario' => $comentario
        ];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     * aca traigo los comentarios del video actual
     */
    public function show(Comentario $comentario)
    {
        //traer un solo comentario
        return response()->json($comentario);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comentario $comentario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $idVideo, int $idComentario, Comentario $comentario)
    {
        // Actualizar los datos del comentario con los datos del request.
        $comentario = Comentario::where('id', $idComentario)->where('idVideo', $idVideo)->firstOrFail();

        if(!$comentario) {
            $data = [
                'mensaje' => 'comentario no existe'
            ];
            return response()->json($data);
        }

        $comentario->comentario = $request->input('comentario');
        $comentario->fecha = $request->input('fecha');

        // Guardar los cambios en la base de datos.
        $comentario->save();

        $data = [
            'mensaje' => 'actualizacion correcta',
            'comentario' => $comentario
        ];

        // Retornar el comentario actualizado.
        return response()->json($data);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $idVideo, int $idComentario)
    {
        // buscar el comentario
        $comentario = Comentario::where('id', $idComentario)->where('idVideo', $idVideo)->firstOrFail();

        if(!$comentario) {
            $data = [
                'mensaje' => 'comentario no existe'
            ];
            return response()->json($data);
        }

        // Guardar los cambios en la base de datos.
        $comentario->delete();

        $data = [
            'mensaje' => 'eliminacion correcta',
            'comentario' => $comentario
        ];

        // Retornar el comentario actualizado.
        return response()->json($data);
    }
}
