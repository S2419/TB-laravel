<template>
    <div class="card card-default chat box">

        <input id="btn-input" type="text" name="message" class="form-control input-sm" placeholder="start typing.." v-model="message" @keyup.enter="sendMessage">

        <span class="input-group-btn">
        <button class="btn btn-primary btn-sm" id="btn-chat" @click="sendMessage">
            Send
        </button>
    </span>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                message: null,
                activeFollowing: null,

            };
        },

        methods: {
            sendMessage() {
                axios.post('/privateMessages/' +  this.activeFollowing, {message: this.message}).then(response => {
                    this.message = null;
                    this.allMessages.push(response.data.message);
                    this.activeFollowing = e.message.user_id;
                    console.log(this.activeFollowing);
                    setTimeout(this.scrollToEnd, 100);
                    console.log(this.message)
                });

            }


        }


    }

</script>