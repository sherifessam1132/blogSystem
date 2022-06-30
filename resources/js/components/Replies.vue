<template>

    <div>
        <div v-for="(reply,index) in items" :key="reply.id">
            <reply :attributes="reply" @deleted="remove(index)"></reply>
        </div>
        <paginator :dataSet="dataSet" @changed="fetch"></paginator>
        <new-reply

                   @created="add"></new-reply>
        <!--            :endpoint="endpoint"-->
    </div>
</template>

<script>
import reply from "./Reply";
import newReply from "./NewReply";
import collection from "../mixins/Collection";
export default {
    name: "Replies",
    components:{
        reply,
        newReply
    },
    mixins:[collection],
    data(){
        return{
            dataSet:false,
            // endpoint:location.pathname +'/replies'
        }
    },
    created() {

        this.fetch()
    },
    methods:{
        fetch(page){
            axios.get(this.url(page))
                 .then(this.refresh)
                .catch((error)=>
                console.log(error))
        },
        url(page){
            if (!page){
              let query= location.search ? location.search.match(/page=(\d+)/)[1]:1
                // location.search.match(/page=(\d+)/)[1]
                page =query
            }

            return `${location.pathname}/replies?page=${page}`
        },
        refresh(response){

            this.dataSet=response.data;
            this.items=response.data.data
        },

    }
}
</script>

<style scoped>

</style>
