<template>
    <div>
        <div class="row">
            <div class="p-3 bg-white shadow-sm" v-bind:class="showMessage ? 'col-md-4' : 'col-md-12'">

                <div class="p-3 mb-3 border-bottom" role="button" @click="toggleMessage(message)"  v-for="(message, index) in messages" :key="index">
                    <div>
                        <div class="media">
                            <img src="https://images.unsplash.com/photo-1551741568-53a19562313c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=50&h=50&q=60" class="mr-3 rounded" alt="...">
                            <div class="media-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="m-0">{{ message[0].sender.name }}</h5>
                                    <small class="text-muted">{{ message[0].created_formatted }}</small>
                                </div>
                                <small class="text-muted">{{ message[0].message_message }} </small>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div id="messageContainer" v-bind:class="showMessage ? 'col-md-8 vh-50 col-md-8 d-flex flex-column justify-content-between min-height-350 overflow-auto' : 'd-none'" class="">
                <div>
                    <div class="d-flex py-2" v-for="(conversation, index) in selectedMessage" v-bind:class="conversation.sender.id == userId ? 'flex-row-reverse' : 'flex-row'">
                        <div class="max-width-80-percent min-width-40-percent">
                            <div class="d-flex align-items-center">
                                <div>
                                    <img src="https://images.unsplash.com/photo-1551741568-53a19562313c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=40&h=40&q=60" class="rounded-circle" alt="...">
                                </div>
                                <h5 class="m-0 mx-1">{{ conversation.sender.name }}</h5>
                                <small class="text-muted">{{ conversation.created_formatted }}</small>
                            </div>
                            <div class="py-3 px-4 my-2 shadow-sm "  v-bind:class="conversation.sender.id == userId ? 'bg-dark text-white' : 'bg-white'">
                                {{ conversation.message_message }}
                            </div>

                        </div>
                    </div>
                </div>
                <div>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control"  placeholder="send a message" v-model="message">
                        <div class="input-group-append">
                            <div class="input-group-text" @click="sendMessage(message)" role="button">
                                <i data-feather="send"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Messages",
        props: ['messages', 'userId'],
        data() {
            return {
                showMessage: false,
                message: '',
                selectedMessage: {},
                items: [
                    { message: 'Foo' },
                    { message: 'Foo' },
                    { message: 'Foo' },
                    { message: 'Foo' },
                    { message: 'Foo' },
                    { message: 'Bar' }
                ]
            }
        },
        mounted() {
        },
        methods: {
            resetToBottom: function () {
                setTimeout(function () {
                    let container = document.querySelector("#messageContainer");
                    container.scrollTop = container.scrollHeight;
                }, 100);
            },
            toggleMessage: function (message) {
                this.selectedMessage = message;
                this.showMessage = true;
                this.resetToBottom();
            },
            sendMessage: function(message) {
                // console.log(this.selectedMessage[0].message_sender_id);
                axios.post(
                    '/api/messages',
                    {
                        message_message: message,
                        message_receiver_id: this.selectedMessage[0].message_sender_id,
                        message_sender_id: this.userId
                    })
                    .then(res => {
                        this.selectedMessage.push({
                            message_message: message,
                            created_formatted: 'now',
                            sender: {
                                name: 'You',
                                id: this.userId
                            }
                        });
                        this.message = '';

                        this.resetToBottom();

                    }).catch(err => {
                    console.log(err)
                })
            }
        }
    }
</script>

<style scoped>

</style>
