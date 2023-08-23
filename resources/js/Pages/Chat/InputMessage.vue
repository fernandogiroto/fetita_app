<template>
    <div>Input Message</div>
    <input type="text" v-model="message" @keyup.enter="sendMessage()" placeholder="ENviar Mensagem">
    {{ room }}

</template>
<script setup>
    import axios from 'axios';
    import { ref, defineProps, defineEmits } from 'vue';

    // Define the 'room' prop
    const props = defineProps(['room']);

    const message = ref('');
    const emit = defineEmits(['messagesent']);

    function sendMessage() {
        if (message.value.trim() === '') {
            return;
        }

        axios.post(`/chat/room/${props.room.id}/message`, {
            message: message.value
        })
        .then(response => {
            if (response.status === 201) {
                message.value = '';
                emit('messagesent');
            }
        })
        .catch(error => {
            console.log(error);
        });
    }
</script>

