
export default {
    name: "Collection",
    data(){
        return{
            items:[],
        }
    },
    methods:{
        remove(index){
            console.log(index)
            this.items.splice(index,1)
            this.$emit('removed')
            flash('replies was deleted')
        },
        add(item){
            this.items.push(item)
            this.$emit('added')
        }
    }

}

