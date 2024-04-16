<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class BooksController
 * @package App\Http\Controllers
 */
class PeminjamanController extends Controller
{
    /**
     * GET /books
     * @return array
     */
    public function index()
    {
        return response()->json([
            'data' => Peminjaman::all()
        ], 200);
    }

    /**
     * GET /books/{id}
     * @param integer $id
     * @return mixed
     */
    public function show($id)
    {
        try {
            return response()->json([
                'data' => Peminjaman::findOrFail($id)
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => [
                    'message' => 'Peminjaman not found'
                ]
            ], 404);
        }
    }

     /**
     * POST /books
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(Request $request)
    {
        $idAnggota = $request->input('id_anggota');

        if (!Anggota::find($idAnggota)) {
            return response()->json([
                'error' => [
                    'message' => 'Anggota dengan ID ' . $idAnggota . ' tidak ditemukan'
                ]
            ], 404);
        }

        try {
            $peminjaman = Peminjaman::create($request->all());

            return response()->json([
                "message" => "Data peminjaman berhasil ditambahkan",
                "data" => $peminjaman
            ], 201);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => [
                    'message' => 'Peminjaman not found'
                ]
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try{
            $peminjaman = Peminjaman::findOrFail($id);
            $peminjaman->fill($request->all());
            $peminjaman->save();

            return response()->json([
                "message" => "Data peminjaman berhasil diperbarui",
                "data" => $peminjaman
            ], 201);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => [
                    'message' => 'Peminjaman not found'
                ]
            ], 404);
        }
    }

    /**
     * DELETE /books/{id}
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try{
            $peminjaman = Peminjaman::findOrFail($id);
            $peminjaman->delete();

            return response()->json([
                "message" => "Data Peminjaman Berhasil Dihapus!",
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => [
                    'message' => 'Peminjaman not found'
                ]
            ], 404);
        }
    }
}
