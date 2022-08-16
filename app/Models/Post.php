<?php

namespace App\Models;

use App\Events\PostReceivedNewReply;
use App\Traits\RecordActivity;
use App\Traits\Visits;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;

class Post extends Model
{
    use HasFactory,RecordActivity,Visits;
    protected $guarded=[];
    protected $with=['channel','creator'];
    protected $appends=['isSubscribed'];
    public static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        static::addGlobalScope('replyCount',function (Builder $builder){
            return $builder->withCount('replies');
        });
        static::deleting(function ($post){
            $post->replies->each(function ($reply){
                $reply->delete();
            });
        });

    }


    public function ScopeFilter(Builder $query,$filters){
        return $filters->apply($query);
    }

    public function path(){
        return "posts/{$this->channel->slug}/{$this->id}";
    }
    /*
     *add reply to post
     * @return array $reply
     *
     *@return $reply
     */
    public function addReply($reply)
    {

        $reply= $this->replies()->create($reply);
        event(new PostReceivedNewReply($reply));


        return $reply;
    }
    public function subscribe($userId=null){
        $this->subscriptions()->create([
            'user_id'=>$userId?:auth()->id()
        ]);
    }
    public function unsubscribe(){
        $this->subscriptions()->where('user_id',auth()->id())->delete();

    }
    public function getIsSubscribedAttribute(){
        return  $this->subscriptions()->where('user_id',auth()->id())->exists();
    }
    public function hasUpdatesFor($user){

        $key=sprintf('users.%s.visted.%s',auth()->id(),$this->id);
        return $this->updated_at > cache($key);
    }

    public function replies(){
        return $this->hasMany(Reply::class);
    }
    public function creator(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function channel(){
        return $this->belongsTo(Channel::class);
    }
    public function subscriptions(){
        return $this->hasMany(PostSubscription::class);
    }


}
