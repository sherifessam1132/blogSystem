
<script>
import replies from "../components/Replies";
export default {
    components:{replies},
    name: "post",
    props:['initRepliesCount'],
    data(){
        return{

            repliesCount:this.initRepliesCount
        }
    }
}
</script>

<style scoped>

</style>
