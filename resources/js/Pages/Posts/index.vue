<template>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Forum threads</div>

                <div class="card-body">


                    <article v-for="post in posts">
                        <h4 v-text="post.title"></h4>
                        <div class="body" v-text="post.body"></div>
                    </article>


                </div>
            </div>
        </div>
    </div>
</div>

</template>
<script>
    export default{
         data(){
            
         },

    }
    </script>
