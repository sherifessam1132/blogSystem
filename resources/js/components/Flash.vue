<template>
    <div class="alert alert-flash" :class="'alert-'+level" role="alert" v-show="show" v-text="body">

    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return{
                body:this.message,
                level:'success',
                show:false
            }
        },
        props:['message'],
        created() {

            if (this.message) {
                this.flash(this.message)
            }
            window.events.$on('flash',message=>{

            'flash',  data=>  this.flash(data)
            })
        },
        methods:{
            flash(data){
                this.body=data.message
                this.level=data.level
                this.show=true
                this.hide();
            },
            hide(){
                setTimeout(()=> {
                    this.show = false
                },3000)
            }
        }

    }
</script>
<style>
.alert-flash {
    position: fixed;
    right:0;
    bottom: 0;
}
</style>
