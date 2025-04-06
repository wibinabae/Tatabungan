<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PreUser;
use App\Models\Location;

use Illuminate\Support\Str;

class UserController extends Controller
{
    protected $Location;


    public function __construct(Location $Location)
    {
        $this->Location = $Location;
    }

    public function register()
    {
        return view('user_registration/registration', [
            'title' => 'Pendaftaran',
        ]);
    }

    public function create()
    {
        $provinces = $this->Location->getProvinces();

        return view('user_registration/create_account', [
            'title' => 'Pendaftaran',
            'provinces' => $provinces['data'],
        ]);
    }

    public function activation($code){

        $preUser = PreUser::select('username', 'fullname', 'email')
        ->where('id', $code)
        ->first();


        if ($preUser) {
            // Kirimkan data ke view
            return view('user_registration/activation', [
                'title' => 'Aktivasi',
                'preUser' => $preUser,
            ]);
        } else {
            // Jika kode aktivasi tidak valid, redirect atau error message
            return redirect()->route('home')->with('error', 'Kode aktivasi tidak valid!');
        }
    }

    public function store_register(Request $request)
    {
        
        $validated = $request->validate([
            'username' => 'required|unique:users,username',
            'fullname' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'wa_number' => 'required|unique:users,wa_number|regex:/^\+?[1-9]\d{1,14}$/',
            'gender' => 'required',
            // 'birth_date' => 'required|date',
           
        ]);
        // if($validated){
        //     dd("Ga ke validasi jir");
        // }else{
        //     dd("Ke validasi");
        // }

        // Membuat user baru
        PreUser::create([
            'username' => $validated['username'],
            'fullname' => $validated['fullname'],
            'email' => $validated['email'],
            'wa_number' => $validated['wa_number'],
            'gender' => $validated['gender'],
            'activation_code' => Str::upper(Str::random(6)),
            'activation_code_expired_at' => now()->addMinutes(30),
           
        ]);
        // Redirect atau tampilkan pesan sukses
        return redirect('/register')->with('success', 'Pendaftaran berhasil! Silakan cek WhatsApp untuk aktivasi.');
    }

    public function store(Request $request)
    {
        $prov = $this->Location->getProvinces();
        $cities = $this->Location->getCities($request->province);
        $districts = $this->Location->getDistricts($request->city);
        $villages = $this->Location->getVillages($request->district);
        $desiredCityCode = $request->city;
        $desiredProvCode = $request->province;
        $filteredProvince = collect($prov['data'])->firstWhere('code', $desiredProvCode);
        if ($filteredProvince) {
            $provinceName = $filteredProvince['name'];
        }
        $filteredCity = collect($cities['data'])->firstWhere('code', $desiredCityCode);
        if ($filteredCity) {
            $cityName = $filteredCity['name'];
        }
        // dd($request->city,$provinceName, $cityName, $districts['data'][0]['name'], $villages['data'][0]['name']);
        // Validasi input
        $validated = $request->validate([
            'username' => 'required|unique:users,username',
            'fullname' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'wa_number' => 'required|unique:users,wa_number|regex:/^\+?[1-9]\d{1,14}$/',
            'gender' => 'required',
            'birth_date' => 'required|date',
            'city' => 'required',
            'province' => 'required',
            'district' => 'required',
            'village' => 'required',
            'address' => 'required',
            // 'password' => 'required|min:6|confirmed', // Jika kamu menggunakan password
        ]);
        // if($validated){
        //     dd("Ga ke validasi jir");
        // }else{
        //     dd("Ke validasi");
        // }

        // Membuat user baru
        $user = User::create([
            'username' => $validated['username'],
            'fullname' => $validated['fullname'],
            'email' => $validated['email'],
            'wa_number' => $validated['wa_number'],
            'gender' => $validated['gender'],
            'birth_date' => $validated['birth_date'],
            'city' => $cityName,
            'province' => $provinceName,
            'district' =>$districts['data'][0]['name'],
            'village' =>$villages['data'][0]['name'],
            'address' => $validated['address'],
            // 'password' => bcrypt($validated['password']), 
        ]);
        if ($user) {
            dd("User berhasil dibuat");
        }else{
            dd("Gagal Coooo") ;
        }
        // Redirect atau tampilkan pesan sukses
        return redirect('/register')->with('success', 'Pendaftaran berhasil! Silakan cek WhatsApp untuk aktivasi.');
    }
}
