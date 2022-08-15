<template>
    <div v-if="signedIn">

                <div class="form-group mt-5">
                    <textarea name="body"
                              v-model="body"
                              id="body"
                              class="form-control"
                              rows="3"
                              required
                              placeholder="Have something to say?"></textarea>
                </div>

                <button type="submit"
                        class="btn btn-primary"
                @click="addReply">Post</button>

<!--            <p class="text-center">Please <a href="{{route('login')}}">Sign in </a> to participate in this discusion</p>-->
    </div>
</template>

<script>
export default {
    name: "NewReply",
    // props:['endpoint'],
    data(){
        return{
            body:'',

        }
    },
    computed:{
        signedIn(){
            return window.App.signedIn
        }
    },
    methods:{
        addReply(){
            axios.post(location.pathname + '/replies',
                // this.endpoint,
                {body:this.body })
                .then(response=>{
                    this.body=''
                    flash(response.data.message)
                    this.$emit('created',response.data)

                })
                .catch((error)=>{
                    console.log(error)
                    flash(error.response.data,'danger')
                })
        }
    }
}
</script>

<style scoped>

</style>
