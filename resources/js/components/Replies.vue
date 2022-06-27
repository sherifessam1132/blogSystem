<template>

    <div>
        <div v-for="(reply,index) in items">
            <reply :attributes="reply" @deleted="remove(index)"></reply>
        </div>
    </div>
</template>

<script>
import reply from "./Reply";
export default {
    name: "Replies",
    components:{
        reply
    },
    props:['data'],
    data(){
        return{
            items:this.data
        }
    },
    methods:{
        remove(index){
            this.items.splice(index,1)
            this.$emit('removed')
            flash('replies was deleted')
        }
    }
}
</script>

<style scoped>

</style>
