<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UasMobile;


class UasController extends Controller

{

    public function index()
    {
        return response()->json(UasMobile::all());
    }


    public function show($id)
    {
        $uas = UasMobile::find($id);
        if (!$uas) return response()->json(['message' => 'Data tidak ditemukan'], 404);
        return response()->json($uas);
    }


    public function store(Request $request)

    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'tipe' => 'required',
            'lat' => 'required',
            'lng' => 'required',
        ]);
        $uas = UasMobile::create($request->all());
        return response()->json($uas, 201);
    }


    public function update(Request $request, $id)
    {
        $uas = UasMobile::find($id);
        if (!$uas) return response()->json(['message' => 'Data tidak ditemukan'], 404);

        $uas->update($request->all());
        return response()->json($uas);
    }


    public function destroy($id)
    {
        $uas = UasMobile::find($id);

        if (!$uas) return response()->json(['message' => 'Data tidak ditemukan'], 404);

        $uas->delete();
        return response()->json(['message' => 'Data berhasil dihapus']);
    }

}