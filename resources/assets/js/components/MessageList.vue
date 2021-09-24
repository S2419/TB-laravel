<style scoped>


</style>
<template>
    <div>
        <v-list
                class="p-3"
                v-for="(message, index) in allMessages"
                :key="index"
        >
            <div class="message-wrapper">
                <v-flex>
                    <span class="small font-italic" >{{message.user.name}}</span>
                </v-flex>

                <div v-if="message.message" class="text-message">
                    <v-chips :color="(user.id===message.user_id)?'green':'red'" text-color="black">
                        {{message.message}}

                    </v-chips>
                </div>

            </div>
        </v-list>y
    </div>
</template>
<script>
    export default {

        props: ['user','allMessages'],

    }
</script>

<style scoped>

</style>