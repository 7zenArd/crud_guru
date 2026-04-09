<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        $gurus = Guru::all();
        $edit = null;

        if ($request->has('edit')) {
            $edit = Guru::find($request->edit);
        }

        return view('guru.index', compact('gurus', 'edit'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nip' => 'required|string|max:20|unique:gurus,nip',
            'nama_guru' => 'required|string|max:50',
            'tgl_lahir' => 'required|date',
            'jabatan' => 'required|string|max:50',
            'mata_pelajaran' => 'required|string|max:50',
            'sosmed' => 'nullable|string|max:50',
        ]);

        Guru::create($validated);

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil ditambahkan!');
    }

    public function update(Request $request, string $nip)
    {
        $guru = Guru::findOrFail($nip);

        $validated = $request->validate([
            'nama_guru' => 'required|string|max:50',
            'tgl_lahir' => 'required|date',
            'jabatan' => 'required|string|max:50',
            'mata_pelajaran' => 'required|string|max:50',
            'sosmed' => 'nullable|string|max:50',
        ]);

        $guru->update($validated);

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil diperbarui!');
    }

    public function destroy(string $nip)
    {
        $guru = Guru::findOrFail($nip);
        $guru->delete();

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil dihapus!');
    }
}
