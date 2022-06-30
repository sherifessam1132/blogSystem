<template>
    <div>
        <li class="nav-item dropdown" v-show="notifications">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <span><i class="fa-solid fa-bell"></i></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                <li v-for="notification in notifications">
                    <a :href="notification.data.link" v-text="notification.data.message" @click.prevent="markAsRead(notification.id)"></a>
                </li>


            </ul>
        </li>
    </div>
</template>

<script>
export default {
    name: "UserNotifications",
    // props:['notifications']
    data(){
        return{
          notifications:false
        }
    },
    created() {
        axios.get('/profiles/' + window.App.user.name + '/notifications')
            .then((response)=>{
                this.notifications=response.data
            })
    },
    methods:{
        markAsRead(notification){
            axios.delete('/profiles/' + window.App.user.name + '/notifications/' + notification)
        }
    }
}
</script>

<style scoped>

</style>
