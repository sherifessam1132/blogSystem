<template>
  <div>
      <h1>
          {{profile.name}}
          <small>since  {{formatDate(profile.created_at)}}</small>
      </h1>
      <form v-if="canUpdate"  method="post" enctype="multipart/form-data">
          <input type="file" name="avatar" accept="image/png,jpeg,jpg" @change="onchange" multiple>

          <span class="alert alert-success" v-show="message" > success</span>
      </form>
      <img :src=" avatar" width="50" height="50" alt="">
  </div>
</template>

<script>
export default {
    name: "AvatarForm",
    props:['profile'],
    data(){
        return{
            avatar:this.profile.avatar_paths,
            message:false
        }
    },
    computed:{
        canUpdate(){
            return    this.authorize(user=> user.id == this.profile.id)
        }
    },
    methods:{
        formatDate(date) {
            return moment(date).format('MMM Do YY')
        },
        onchange(e){
            if (! e.target.files.length) return;
            let avatar= e.target.files[0];
            let reader=new FileReader();

            reader.readAsDataURL(avatar)

            reader.onload = e =>{
                this.avatar=e.target.result
            }
            this.persist(avatar)
        },
        persist(avatar){
            let data=new FormData();

            data.append('avatar',avatar);
            axios.post(`/api/users/${this.profile.name}/avatar`,data)
                     .then(()=>{
                         flash('Avatar Uploaded')
                        this.message=true
                     })

        }
    }
}
</script>

<style scoped>

</style>
