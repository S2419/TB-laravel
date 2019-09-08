<template>
    <div id="main" class="row">
        <div class="col-sm-12">

            <div class="form-group">
        <textarea
                name="comment"
                class="form-control"
                v-model="newComment"
                placeholder="Comment">
        </textarea>
                <button class="btn btn-primary" @click="sendComment">Send</button>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        props: ['user'],
        data() {
            return {
                newComment: ''
            }
        },
        methods: {
            sendComment() {
            this.$emit('commentsevent',{
                user: this.user,
                //post: this.post,
                comment: this.newComment
            });

            this.newComment=''
            }
        }
    }
</script>

<style scoped>

</style>