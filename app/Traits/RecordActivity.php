<?php
 namespace App\Traits;

 use App\Models\Activity;
 use App\Models\User;

 trait RecordActivity
 {
     public static function bootRecordActivity(){
         foreach (static::getRecordEvents() as $event) {
             static::$event(function ($model) use ($event) {
                 $model->recordActivity($event);
             });

         }
         static::deleting(function ($model){
             $model->activites()->delete();
         });
     }
     public static function getRecordEvents(){
         return ['created','deleting'];
     }
     protected function recordActivity($event){
         $this->activites()->create(['user_id'=>optional(auth()->user())->id ?: User::get()->random()->id,'type'=>$this->getActivityType($event)]);

     }
     protected function getActivityType($event){
        $type= strtolower((new \ReflectionClass($this))->getShortName());
        return "{$event}_{$type}";
     }
     public function activites(){
         return $this->morphMany(Activity::class,'subject');
     }
 }
