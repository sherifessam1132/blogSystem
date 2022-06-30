<template>

  <transition name="fade">
            <div v-if="showReply" :id="'reply-'+this.id" class="card mt-5 ">
                <div class="card-header">
                    <div class="level">
                        <h5 class="flex">
                            <a :href="'/profiles/' +attributes.owner.name" v-text="attributes.owner.name">   </a>
                            Said
                            <span class="float-right" v-text="ago">

                                ... </span>
                        </h5>
<!--                        @if(auth()->check())-->
                        <div v-if="signIn">
                            <favorite :reply="attributes"></favorite>
                        </div>
<!--                        @endif-->
                    </div>
                </div>


                <div  class="card-body">
                    <div v-if="editing">
                        <div class="form-group">
                            <textarea name="body" class="form-control" v-model="body"></textarea>
                        </div>
                        <button class="btn btn-xs btn-primary" @click="update()">update</button>
                        <button class="btn btn-xs btn-link" @click="editing=false">cancel</button>
                    </div>

                    <div v-if="showReply && !editing" v-text="body"> </div>
                </div>



<!--                @can('update',$reply)-->
                <div class="card-footer level" v-if="canUpdates">

                    <button class="btn btn-secondary btn-xs mr-2" @click=" editing = true"><i class="fa fa-edit" style="color: #0a58ca"></i></button>
                    <button  class="btn btn-danger btn-xs" @click="destroy()"><i class="fa fa-window-close"></i></button>



                </div>

<!--                @endcan-->
<!--                {!! $replies->links()!!}-->
            </div>
        </transition>

</template>
<script>
import favorite from "./Favorite";
import moment from "moment";
export default {
    name: "reply",

    components:{
        favorite
    },
    props:['attributes'],
    computed:{
        ago(){
          return moment(this.attributes.created_at).fromNow() + " ...."
        },
        signIn(){
            return window.App.signedIn
        },
        canUpdates(){
            return this.authorize(user=> {

                return   this.attributes.user_id == user.id
            })

        }
    },
    data(){
        return{
            editing: false,
            id:this.attributes.id,
            body:this.attributes.body,
            showReply: true,
            testAction:false
        }
    },
    methods:{
        update(){
            axios.put('/replies/' + this.attributes.id,{
                body:this.body
            })
            this.editing=false
            flash('updated successfully')
        },
        destroy(){
            axios.delete('/replies/' + this.attributes.id)
                .then(response => {

                    this.$emit('deleted',this.id)
                    flash(response.data.message)

                })
                .catch(error => {
                    console.log(error)
                })


        }
    }
}

</script>

<style >
.fade-enter,
.fade-leave-to {
    opacity: 0;
    transform: scale(0);
}
.fade-enter-active,
.fade-leave-active {
    transition: all 300ms ease-in-out;
}
</style>
