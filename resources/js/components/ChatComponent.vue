<template>
    <div class="row">
        <div class="col-md-8">
            <div class="card card-defualt">
                <div class="card-header">Messages</div>
                <div class="card-body p-0">
                    <ul class="list-unstyled" style="height: 300px; overflow-y:scroll">
                        <li class="p-2" v-for="(item, index) in messages" :key="index">
                            <strong>{{ item.user.name }}</strong>
                            {{ item.message }}
                        </li>
                    </ul>
                </div>

                <input
                    @keyup.enter="sendMessage"
                    v-model="newMessage"
                    type="text" 
                    class="form-control" 
                    name="message" placeholder="Enter your message...">
            </div>
            <span class="text-muted">user is typing...</span>
        </div>
        <div class="col-md-4">
            <div class="card card-defualt">
                <div class="card-header">Active Users</div>
                <div class="card-body">
                    <ul>
                        <li class="py-2" v-for="(user, index) in users" :key="index">
                            {{ user.name }}
                        </li> 
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['user'],
        created() {
            this.fetchMessages()

            Echo.join('chat')
                .here(user => {
                    this.users = user
                })
                .joining(user => {
                    this.users.push(user)
                })
                .leaving(user => {
                    this.users = this.users.filter(u => u.id != user.id)
                })
                .listen('MessageSent', (e) => {
                    // console.log(e)
                    this.messages.push(e.message)
                })

        },
        data() {
            return {
                users: [],
                messages: [],
                newMessage: ''
            }
        },
        methods: {
            fetchMessages() {            
                axios.get('messages').then((response) => {
                    this.messages = response.data
                })
            },
            sendMessage() {

                this.messages.push({
                    user: this.user,
                    message: this.newMessage
                })

                axios.post('messages', { 'message': this.newMessage})

                this.newMessage = ''

            },
        },
    }
</script>
