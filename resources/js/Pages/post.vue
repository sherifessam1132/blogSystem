
<script>
import replies from "../components/Replies";
import subscribeButton from "../components/SubscribeButton";
export default {
    name: "post",
    props:['initRepliesCount'],
    components:{replies,subscribeButton},
    data(){
        return{

            repliesCount:this.initRepliesCount
        }
    }
}
</script>

<style scoped>

</style>
