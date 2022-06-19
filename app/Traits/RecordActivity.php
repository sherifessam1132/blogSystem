<?php
 namespace App\Traits;

 use App\Models\Activity;

 trait RecordActivity
 {
     public static function bootRecordActivity(){
         foreach (static::getRecordEvents() as $event) {
             static::$event(function ($model) use ($event) {
                 $model->recordActivity($event);
             });
         }
     }
     public static function getRecordEvents(){
         return ['created'];
     }
     protected function recordActivity($event){
         $this->activites()->create(['user_id'=>auth()->user()->id,'type'=>$this->getActivityType($event)]);

     }
     protected function getActivityType($event){
        $type= strtolower((new \ReflectionClass($this))->getShortName());
        return "{$event}_{$type}";
     }
     public function activites(){
         return $this->morphMany(Activity::class,'subject');
     }
 }
