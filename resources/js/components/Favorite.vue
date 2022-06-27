<template>
    <div>
       <button :class="classes" @click="toggle">
           <span>
                 <i class="fas fa-heart" ></i>
           </span>
           <span v-text="favorites_count"></span>

<!--         {{$reply->favorites_count}}-->
       </button>


    </div>
</template>

<script>
export default {
    name: "Favorite",
    props:["reply"],
    data(){
        return{
            favorites_count:this.reply.favoritesCount,
            isFavorited:this.reply.isFavorited
        }
    },
    computed:{
      classes(){
          return ['btn',this.isFavorited?'btn-primary':'btn-secondary']
      },
        endpoint(){
          return `/replies/${this.reply.id}/favorites`;
        }
    },
    methods:{
        toggle(){
        return this.isFavorited?this.destroy():this.create();

        },
        create(){
            axios.post(this.endpoint)
            this.isFavorited=true
            this.favorites_count++
        },
        destroy(){
            axios.delete(this.endpoint)
            this.isFavorited=false
            this.favorites_count--
        }
    }
}
</script>

<style scoped>

</style>
