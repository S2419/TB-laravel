<style scoped>

    .card-header{
        outline-color: #a71d2a;
        outline-style: solid;
    }

    .card-header:hover {
        outline-color: #800080;
        box-shadow: 12px 10px 16px 0 rgba(0,2,0,2.2);
    }
    .messages{
        float:left;
    }

    .chat {
        float: right;
    }

    #privateMessageBox{

    }

    .messages{

    }

</style>
<template>
    <main>

        <div class="card text-black"
             v-for="following in followings"
             :key="following.id"
             :color="(following.id==activeFollowing)?'blue':''"
             @click="activeFollowing=following.id"
        >
            <ul class="card-header text-black" v-if="following.name">
                {{following.name}}
            </ul>
        </div>
        <!-- v-if="message.message" class="text-message-container">
        <v-chip :color="(user.id===message.user_id)?'green':'red'" text-color="white">
         {{message.message}}
        </v-chip> -->


        <!-- <v-list-tile-avatar>
          <img :src="item.avatar">
        </v-list-tile-avatar> -->






        <!-- <div class="main-panel">
         <ul class="list-group">
             <li class="list-group-item"
                 @click="activeFollowing = following.id"
                 :key="following.id"
                 v-for="following in followings">

                     {{following.name}}

           </li>
       </ul> -->
        <div class="chat-form">
            <div id="PrivateChatBox" class="messages">  <!--v-if="message.user"-->
                <!-- v-for="(message) in allMessages"
                 users="user" :all-messages="allMessages"
                 >-->
                <div id="privateMessageBox" class="messages mb-5" >
                    <message-list :user="user" :all-messages="allMessages"></message-list>
                </div>
            </div>
        </div>


        <div class="card card-default chat box">

            <input id="btn-input" type="text" name="message" class="form-control input-sm" placeholder="start typing.." v-model="message" @keyup.enter="sendMessage">

            <span class="input-group-btn">
        <button class="btn btn-primary btn-sm" id="btn-chat" @click="sendMessage">
            Send
        </button>
    </span>
        </div>
        <!--

            <!-- <div class="message-input">
                    <span v-for="following in followings" :key="following.id"></span>
                    <message-form
                        :following="following"
                    ></message-form>
                </div> -->

    </main>
</template>

<script>
    import MessageForm from './MessageForm'
    import MessageList from './MessageList'
    export default {
        props:['user'],
        components:{
            MessageForm,
            MessageList,
        },
        data() {
            return {
                activeFollowing: null,
                allMessages: [],
                followings: [],
                following: [],
                message: null,
                users: [],

            };
        },

        watch: {
            activeFollowing(val) {
                this.fetchMessages();
            }
        },



        methods: {
            fetchUsers() {
                axios.get('/followings').then(res => {
                    this.followings = res.data;
                    console.log(this.followings)
                });
            },


            sendMessage() {
                axios.post('/privateMessages/' +  this.activeFollowing, {message: this.message}).then(response => {
                    this.message = null;
                    this.allMessages.push(response.data.message);
                    this.activeFollowing = e.message.user_id;
                    console.log(this.activeFollowing);
                    setTimeout(this.scrollToEnd, 100);
                    console.log(this.message)
                });

            },


            fetchMessages() {
                axios.get('/privateMessages/' + this.activeFollowing).then(response => {
                    this.allMessages = response.data;
                    setTimeout(this.scrollToEnd, 100);
                    console.log(this.allMessages)
                });
            },
        },




        created() {
            this.fetchUsers();
            this.fetchMessages();


            Echo.join('privateChat')
                .here((users) => {
                    this.followings = users;
                    console.log(followings);
                })

                .joining((user) => {
                    this.followings.push(user);
                    console.log('joining', user.name);
                })
                .leaving((user) => {
                    this.followings.splice(this.followings.indexOf(user), 1);
                    console.log('leaving', user.name);
                });

            Echo.private('privateChat'+this.user.id)
                .listen('PrivateMessageSent',(e) => {
                    console.log('message sent');
                    this.activeFollowing = e.message.user_id;
                    console.log(activeFollowing);
                    this.allMessages.push(e.message);
                    setTimeout(this.scrollToEnd,100);
                });

        }


    }

</script>

