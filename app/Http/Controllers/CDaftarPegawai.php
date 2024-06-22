<?php

namespace App\Http\Controllers;

use App\Models\MPegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CDaftarPegawai extends Controller
{
    /*
|--------------------------------------------------------------------------
| MENAMPILKAN DATA PEGAWAI
|--------------------------------------------------------------------------*/
    public function index()
    {
        $datapegawai = MPegawai::all();
        return view('menu.daftarpegawai', compact('datapegawai'));
    }


    /*
|--------------------------------------------------------------------------
| MENAMPILKAN FORM TAMBAH DATA PEGAWAI
|--------------------------------------------------------------------------*/
    public function tambah()
    {
        $datapegawai = MPegawai::all();
        return view('perubahan.tambah', compact('datapegawai'));
    }


    /*
|--------------------------------------------------------------------------
| PROSES TAMBAH DATA PEGAWAI
|--------------------------------------------------------------------------*/
    public function prosestambah(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => [
                'required',
                'numeric',
                'digits:16',
                function ($attribute, $value, $fail) {
                    $existingPegawai = MPegawai::where('nik', $value)->first();
                    if ($existingPegawai) {
                        $fail("NIK $value sudah digunakan oleh pegawai lain.");
                    }
                },
            ],
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'no_telepon' => [
                'required', 'numeric', 'digits_between:12,13',
                function ($attribute, $value, $fail) {
                    $existingPegawai = MPegawai::where('no_telepon', $value)->first();
                    if ($existingPegawai) {
                        $fail("no_telepon $value sudah digunakan oleh pegawai lain.");
                    }
                },
            ],
            'email' => [
                'required', 'email', 'max:255',
                function ($attribute, $value, $fail) {
                    $existingPegawai = MPegawai::where('email', $value)->first();
                    if ($existingPegawai) {
                        $fail("email $value sudah digunakan oleh pegawai lain.");
                    }
                },
            ],
            'status_pernikahan' => 'required|string|in:Sudah Menikah,Belum Menikah',
            'jabatan' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    if (in_array($value, ['Kepala Dinas', 'Sekretaris', 'Kabid IKP', 'Kabid TIP', 'Kabid Statistik'])) {

                        $existingPegawai = MPegawai::where('jabatan', $value)->first();

                        if ($existingPegawai) {
                            $fail("Jabatan $value sudah dijabat oleh pegawai lain.");
                        }
                    }
                },
            ],

            'status_kepegawaian' => 'required|string|in:PNS,Kontrak',
            'nip' => [
                'required', 'numeric', 'digits:18',
                function ($value, $fail) {
                    $existingPegawai = MPegawai::where('jabatan', $value)->first();
                    if ($existingPegawai) {
                        $fail("nip $value sudah terdaftar dengan pegawai lain.");
                    }
                }
            ],
            'pendidikan_terakhir' => 'required|string|in:SD/MI Sederajat,SMP/MTS Sederajat,SMA/SMK/MA Sederajat,Sarjana,Lainnya',
            'foto' => 'image|max:1024|required',
        ]);

        $this->simpandata($request);
        return redirect()->route('daftar-pegawai');
    }

    public function simpandata(Request $request)
    {
        if ($request->file('foto')) {
            $filename = $request->file('foto')->store('fotopegawai', 'public');
        }

        MPegawai::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'email' => $request->email,
            'status_pernikahan' => $request->status_pernikahan,
            'jabatan' => $request->jabatan,
            'status_kepegawaian' => $request->status_kepegawaian,
            'nip' => $request->nip,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'foto' => $filename
        ]);

        session()->flash('success_tambah', 'Data berhasil ditambahkan');
        return redirect()->route('daftar-pegawai');
    }


    /*
|--------------------------------------------------------------------------
| MENAMPILKAN DATA DETAIL DARI PEGAWAI
|--------------------------------------------------------------------------*/
    public function detail($id)
    {
        $datapegawai = MPegawai::findOrFail($id);
        return view('perubahan.detail', compact('datapegawai'));
    }


    /*
|--------------------------------------------------------------------------
| MENAMPILKAN FORM UBAH DATA PEGAWAI
|--------------------------------------------------------------------------*/
    public function ubah($id)
    {
        $datapegawai = MPegawai::findOrFail($id);
        return view('perubahan.ubah', compact('datapegawai'));
    }


    /*
|--------------------------------------------------------------------------
| PROSES UBAH DATA PEGAWAI
|--------------------------------------------------------------------------*/
    public function prosesubah(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => [
                'required',
                'numeric',
                'digits:16',
                function ($attribute, $value, $fail) use ($id) {
                    $existingPegawai = MPegawai::where('nik', $value)->where('id', '!=', $id)->first();
                    if ($existingPegawai) {
                        $fail("NIK $value sudah digunakan oleh pegawai lain.");
                    }
                },
            ],
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'no_telepon' => [
                'required',
                'numeric',
                'digits_between:12,13',
                function ($attribute, $value, $fail) use ($id) {
                    $existingPegawai = MPegawai::where('no_telepon', $value)->where('id', '!=', $id)->first();
                    if ($existingPegawai) {
                        $fail("Nomor telepon $value sudah digunakan oleh pegawai lain.");
                    }
                },
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                function ($attribute, $value, $fail) use ($id) {
                    $existingPegawai = MPegawai::where('email', $value)->where('id', '!=', $id)->first();
                    if ($existingPegawai) {
                        $fail("Email $value sudah digunakan oleh pegawai lain.");
                    }
                },
            ],
            'status_pernikahan' => 'required|string|in:Sudah Menikah,Belum Menikah',
            'jabatan' => [
                'required',
                'string',
                function ($attribute, $value, $fail) use ($id) {
                    if (in_array($value, ['Kepala Dinas', 'Sekretaris', 'Kabid IKP', 'Kabid TIP', 'Kabid Statistik'])) {
                        $existingPegawai = MPegawai::where('jabatan', $value)->where('id', '!=', $id)->first();
                        if ($existingPegawai) {
                            $fail("Jabatan $value sudah dijabat oleh pegawai lain.");
                        }
                    }
                },
            ],
            'status_kepegawaian' => 'required|string|in:PNS,Kontrak',
            'nip' => [
                'required',
                'numeric',
                'digits:18',
                function ($attribute, $value, $fail) use ($id) {
                    $existingPegawai = MPegawai::where('nip', $value)->where('id', '!=', $id)->first();
                    if ($existingPegawai) {
                        $fail("NIP $value sudah digunakan oleh pegawai lain.");
                    }
                },
            ],
            'pendidikan_terakhir' => 'required|string|in:SD/MI Sederajat,SMP/MTS Sederajat,SMA/SMK/MA Sederajat,Sarjana,Lainnya',
        ]);

        // Panggil metode update data
        $this->updateData($request, $id);

        // Set flash message dan redirect
        session()->flash('success_update', 'Data Berhasil di perbarui');
        return redirect()->route('daftar-pegawai');
    }


    private function updateData(Request $request, $id)
    {
        // Temukan pegawai berdasarkan ID
        $pegawai = MPegawai::findOrFail($id);

        // Cek apakah ada file foto yang diunggah
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($pegawai->foto) {
                Storage::disk('public')->delete($pegawai->foto);
            }

            // Simpan foto baru
            $filename = $request->file('foto')->store('fotopegawai', 'public');

            // Update data dengan foto baru
            $pegawai->update([
                'nama' => $request->nama,
                'nik' => $request->nik,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat' => $request->alamat,
                'no_telepon' => $request->no_telepon,
                'email' => $request->email,
                'status_pernikahan' => $request->status_pernikahan,
                'jabatan' => $request->jabatan,
                'status_kepegawaian' => $request->status_kepegawaian,
                'nip' => $request->nip,
                'pendidikan_terakhir' => $request->pendidikan_terakhir,
                'foto' => $filename,
            ]);
        } else {
            // Update data tanpa foto baru
            $pegawai->update([
                'nama' => $request->nama,
                'nik' => $request->nik,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat' => $request->alamat,
                'no_telepon' => $request->no_telepon,
                'email' => $request->email,
                'status_pernikahan' => $request->status_pernikahan,
                'jabatan' => $request->jabatan,
                'status_kepegawaian' => $request->status_kepegawaian,
                'nip' => $request->nip,
                'pendidikan_terakhir' => $request->pendidikan_terakhir,
            ]);
        }
    }





    /*
|--------------------------------------------------------------------------
| PROSES MENGHAPUS DATA PEGAWAI
|--------------------------------------------------------------------------*/
    public function hapus($id)
    {
        $hapus = MPegawai::where('id', $id)->delete();
        if ($hapus) {
            session()->flash('success_hapus', 'Data Berhasil Di hapus');
        }
        $datapegawai = MPegawai::all();
        return redirect()->route('daftar-pegawai', compact('datapegawai'));
    }
}
