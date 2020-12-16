<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use App\Models\Products;
use Illuminate\Support\Facades\Hash;
class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::create([
           'name' => 'Admin',
           'cod'  => 'adm',
           'type' => 'admin' 
        ]);

        Profile::create([
            'name' => 'Client',
            'cod'  => 'cl',
            'type' => 'client' 
         ]);

        $searchAmdinProfile = Profile::where('cod','adm')->first();
        $searchAmdinProfileCl = Profile::where('cod','cl')->first();

        User::create([
            'name' => 'Admin',
            'email'  => 'admin@desafiopixarron.com',
            'password' => Hash::make('123456'),
            'user_type_id' => $searchAmdinProfile->id
        ]);

        for ($i=0; $i < 100; $i++) { 
            User::create([
                'name' => 'Cliente'.$i,
                'email'  => 'cliente'.$i.'@desafiopixarron.com',
                'password' => Hash::make('123456'),
                'user_type_id' => $searchAmdinProfileCl->id
            ]);
        }

        for ($i=0; $i < 100; $i++) { 
            Products::create([
                'name' => 'Producto'.$i,
                'description'  => 'Producto'.$i,
                'price' => 50
            ]);
        }
    }
}
