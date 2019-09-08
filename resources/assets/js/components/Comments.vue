<template>
    <div id="main" class="container">
    <ul class="comments" v-for="comment in comments">
        <li class="comment-list">
          <div class="title">
              {{comment.user.name}}
          </div>
            <p>
                {{comment.comment}}
            </p>
        </li>
    </ul>
    </div>
</template>

<script>
    export default {
        props: ['comments']
    };

</script>

<style scoped>

</style>