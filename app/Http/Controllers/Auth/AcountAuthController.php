<?php

namespace App\Http\Controllers\Auth;

use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\{Hash,DB};
use App\Models\{Role, User, ProgramStudi};
use App\Http\Requests\{CreateAcountRequest, UpdateAcountRequest};

class AcountAuthController extends Controller
{
    use UploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageActive = "Data Pengguna";
        $pageName = "Data Pengguna";
        $dataUser = User::with('programstudi','roles')->get()->map(function($item){
            return(object)[
                'id' => $item->id,
                'name' => $item->name,
                'email' => $item->email,
                'roles' => $item->roles->implode('name',','),
                'image' =>$item->image,
                'nim' => $item->nim,
                'programstudi' => $item->programstudi,
            ];
        });
        return view('admin.user.index',compact('pageActive','pageName','dataUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createUser()
    {
        $programstudi = ProgramStudi::all(); # get relasi programstudi

        $pageActive = "Tambah Data Pengguna User";

        return view('admin.user.createUser',compact('programstudi','pageActive'));
    }

    /**
     * Store a newly created resource in storage.
     * @return \Illuminate\Http\Response
     */
    public function storeUser(CreateAcountRequest $request)
    {
        # create account
        $check = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request['password']),
            'nim' => $request->nim,
            'programstudi_id' => $request->programstudi_id,
        ]);
        # default role = user
        $check->roles()->attach(Role::where('name', 'user')->first());
        return redirect()->route('account.index')->with('success','pengguna baru berhasil ditambahkan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAdmin()
    {
        $programstudi = ProgramStudi::all(); # get relasi programstudi

        $pageActive = "Tambah Data Pengguna Admin";

        return view('admin.user.createAdmin',compact('programstudi','pageActive'));
    }

    /**
     * Store a newly created resource in storage.
     * @return \Illuminate\Http\Response
     */
    public function storeAdmin(CreateAcountRequest $request)
    {
        # create account
        $check = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request['password']),
            'nim' => $request->nim,
            'programstudi_id' => $request->programstudi_id,
        ]);
        # default role = admin
        $check->roles()->attach(Role::where('name', 'admin')->first());
        return redirect()->route('account.index')->with('success','pengguna baru berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $acount = User::find($id);
        $programstudi = ProgramStudi::all(); # get data programstudi

        // $prodi_select = DB::table('program_studis')->find($acount->programstudi_id);
        return view('admin.user.edit',compact('acount','programstudi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAcountRequest $request, $id)
    {
        # mendapatkan user id
        $profile = User::findOrFail($request->id);
        # Tetapkan nama,nim,program,dll pengguna
        $profile->name = $request->input('name');
        $profile->nim = $request->input('nim');
        $profile->programstudi_id = $request->input('programstudi_id');
        $profile->email = $request->input('email');
        
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
            if ($profile->image != null) {
                $this->deleteOne($profile->image);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $acount = User::findOrFail($id);
        $acount->delete();
        return redirect()->route('account.index')->with('success','Data pengguna berhasil dihapus');
    }
}