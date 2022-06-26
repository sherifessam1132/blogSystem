<template>
    <div class="alert alert-primary alert-flash" role="alert" v-show="show">
       <strong>Success</strong> {{body}}
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
                show:false
            }
        },
        props:['message'],
        created() {

            if (this.message) {
                this.flash(this.message)
            }
            window.events.$on('flash',message=>{
                this.flash(message)
            })
        },
        methods:{
            flash(message){
                this.body=message
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
