<template>
    <div>
        <button :class="classes" @click="subscribe">Subscribe</button>
    </div>
</template>

<script>
export default {
    name: "subscribe-button",
    props:['active'],
    computed:{
      classes(){
          console.log(this.active)
          return ['btn',this.active ?'btn-danger':'btn-primary']
      }
    },
    methods:{
        subscribe(){
            let requestType=this.active ? 'delete': 'post';
            axios[requestType](location.pathname +'/subscriptions')
                 .then((response)=>{
                     flash('subscribed')
                     this.active=! this.active
                 })
        }
    }
}
</script>

<style scoped>

</style>
