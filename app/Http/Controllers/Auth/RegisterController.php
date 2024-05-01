<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    public function cari_sekolah()
    {
        $query = request('term');
        $data = User::where('asal_sekolah', 'like', '%' . $query . '%')
            ->take(10)
            ->get();
        $result = [];
        foreach ($data as $row) {
            $result[] = ['value' => $row->asal_sekolah,];
        }
        return response()->json($result);
    }

    use RegistersUsers;


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email'             => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'          => ['required', 'string', 'min:8', 'confirmed'],
            'nama'              => ['required', 'string', 'max:255'],
            'sex'               => ['required', 'string', 'max:255'],
            'keahlian'          => ['required', 'string', 'max:50'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'nisn' => $data['nisn'],
            'no_kk' => $data['no_kk'],
            'no_nik' => $data['no_nik'],
            'nama' => $data['nama'],
            'sex' => $data['sex'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'asal_sekolah' => $data['asal_sekolah'],
            'no_siswa' => $data['no_siswa'],
            'no_wali' => $data['no_wali'],
            'nama_ayah' => $data['nama_ayah'],
            'pekerjaan_ayah' => $data['pekerjaan_ayah'],
            'nama_ibu' => $data['nama_ibu'],
            'pekerjaan_ibu' => $data['pekerjaan_ibu'],
            'status_orang_tua' => $data['status_orang_tua'],
            'blok' => $data['blok'],
            'rt' => $data['rw'],
            'rw' => $data['rt'],
            'desa' => $data['desa'],
            'kecamatan' => $data['kecamatan'],
            'kabupaten' => $data['kabupaten'],
            'keahlian' => $data['keahlian'],
            'referensi' => $data['referensi'],
        ]);
    }
}
