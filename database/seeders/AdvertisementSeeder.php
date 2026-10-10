<?php
namespace Database\Seeders;
use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class AdvertisementSeeder extends Seeder{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        $advertisements = [[
            'path'=> 'sliders/default/01.png',
            'link' => url('/our_service/پاکسازی-پوست'),
            'position' => 'bottom',
        ],[
            'path'=> 'sliders/default/02.png',
            'link' => url('/our_service/میکاپ'),
            'position' => 'bottom',
        ],[
            'path'=> 'sliders/default/03.png',
            'link' => url('/our_service/شنیون'),
            'position' => 'bottom',
        ],[
            'path'=> 'sliders/default/04.png',
            'link' => url('/our_service/پاکسازی-پوست'),
            'position' => 'bottom',
        ],[
            'path'=> 'sliders/default/05.png',
            'link' => url('/our_service/آرایشی'),
            'position' => 'bottom',
        ],[
            'path'=> 'sliders/default/06.png',
            'link' => url('/our_service'),
            'position' => 'bottom',
        ]];
        foreach ($advertisements as $advertisement) {
            Slider::updateOrCreate([
                    'path' => $advertisement['path'],
                    'position' => 'bottom',
                ],
                $advertisement
            );
        }
    }
}
