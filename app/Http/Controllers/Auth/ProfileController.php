<?php

namespace App\Http\Controllers\Auth;

use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\{Auth, DB};
use App\Models\{User, ProgramStudi, DimensiPasangan, TestKepribadian, Tahun};

class ProfileController extends Controller
{
    use UploadTrait;

    /**
     * Sdisplay user data and also recap test results.
     */
    public function showProfile()
    {
        return view('accounts.profile.show',[
            'latest' => User::with(['resultIndex.tipe',
                                    'resultIndex.presentases',
                                    'recapHasil.tipe', 
                                    ])->find(Auth::id()),
                                    // dikasih function untuk mendapatkan has dari dimensi id jika ada maka apa jika tidak maka apa..
            'dimensis' => DimensiPasangan::with('dimA', 'dimB')->get(),
        ]);
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function editProfile(User $profile)
    {
        return view('accounts.profile.editprofile',[
            'profile' => Auth::user(),
            'programstudi' => ProgramStudi::all(),
            'angkatan' => Tahun::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateProfile(Request $request, User $profile)
    {
        # form validasi
        $request->validate([
            'name' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|email|string|max:250',
            'nim' => 'required|string|max:40',
            'programstudi_id' =>'required',
            'profile_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'phone' => 'min:10',
            'tahun_id' => 'required'
        ]);

        # Dapatkan pengguna saat ini
        $profile = User::findOrFail(auth()->user()->id);
        # Tetapkan nama,nim,program,dll pengguna
        $profile->name = $request->input('name');
        $profile->username = $request->input('username');
        $profile->slug = Str::slug($request->input('name'));
        $profile->nim = $request->input('nim');
        $profile->programstudi_id = $request->input('programstudi_id');
        $profile->email = $request->input('email');
        $profile->phone = $request->input('phone');
        $profile->tahun_id = $request->input('tahun_id');

        # Periksa apakah gambar profil telah diunggah
        if ($request->has('profile_image')) {
            # Dapatkan file gambar
            $image = $request->file('profile_image');
            # Buat nama gambar berdasarkan nama pengguna dan stempel waktu saat ini
            $name = Str::slug($request->input('name')).'_'.time();
            # Menetapkan folder path
            $folder = '/uploads/images/';
            # Buat jalur file tempat gambar akan disimpan[ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            # menghapus foto yang sudah ada dan menganti dengan yang baru
            if (auth()->user()->image != null) {
                $this->deleteOne(auth()->user()->image);
            }
            # Unggah gambar + memperbarui gambar
            $this->uploadOne($image, $folder, 'public', $name);
            # Setel jalur gambar profil pengguna di database ke filePath
            $profile->profile_image = $filePath;
        }
        // simpan data User pada Database
        $profile->save();
        return redirect()->back()->with(['success' => 'Profile berhasil diperbarui']);

    }
}
