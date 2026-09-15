<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Service extends Model{
    protected $guarded = [];
    public function submit($validatedData, $images ){
        DB::transaction(function() use($validatedData, $images){
            $services = $this->submitToService($validatedData);
            $this->submitToServiceGallery($services, $images);
        });
    }

    public function submitToService($validatedData){
        return $this->query()->updateOrCreate([ //هتما باید ریترن کرد دالر دیس اشاره ب همین مدلی ک توش هستیم داره!
            'service_category_id' => $validatedData['serviceCategory'],
        ]);
    }
    public function submitToServiceGallery($services, $images){
        foreach ($images as $image){
            $imagesPath = $image->store('service/gallery', 'public');

            ServiceGallery::query()->create([
                'service_id' => $services->id,
                'path' => $imagesPath,
            ]);
        }
    }
    public function serviceCategory(){
        return $this->belongsTo(ServiceCategory::class);
    }
    public function Galleries(){
        return $this->hasMany(ServiceGallery::class);  //کالکشن بر میگردونه نه ی ریکورد
    }
}
