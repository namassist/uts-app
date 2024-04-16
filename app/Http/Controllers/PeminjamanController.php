<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
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
        return response()->json([
            'data' => Peminjaman::findOrFail($id)
        ], 200);
    }

     /**
     * POST /books
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(Request $request)
    {
        $peminjaman = Peminjaman::create($request->all());

        $response = [
            "message" => "Data peminjaman berhasil ditambahkan",
            "data" => [
                "id" => $peminjaman->id,
                "id_anggota" => $peminjaman->id_anggota,
                "tanggal_pinjam" => $peminjaman->tanggal_pinjam,
                "jumlah_pinjam" => $peminjaman->jumlah_pinjam,
                "status" => $peminjaman->status,
            ]
        ];

        return response()->json($response, 201, [
            'Location' => route('peminjaman.show', ['id' => $peminjaman->id])
        ]);
    }

    public function update(Request $request, $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $peminjaman->fill($request->all());
        $peminjaman->save();

        $response = [
            "message" => "Data peminjaman berhasil diperbarui",
            "data" => [
                "id" => $peminjaman->id,
                "id_anggota" => $peminjaman->id_anggota,
                "tanggal_pinjam" => $peminjaman->tanggal_pinjam,
                "jumlah_pinjam" => $peminjaman->jumlah_pinjam,
                "status" => $peminjaman->status,
            ]
        ];

        return response()->json($response, 201, [
            'Location' => route('peminjaman.show', ['id' => $peminjaman->id])
        ]);
    }

    /**
     * DELETE /books/{id}
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();
        $response = [
            "message" => "Data Peminjaman Berhasil Dihapus!",
        ];

        return response()->json($response, 200, [
            'Location' => route('peminjaman.show', ['id' => $peminjaman->id])
        ]);
    }
}
