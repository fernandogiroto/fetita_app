<template>
    <div>
        <div v-for="(message, index) in messages" :key="index">
            <MessageItem :message="message"></MessageItem>
        </div>
    </div>
</template>

<script setup>

    import { defineProps } from 'vue';
    import MessageItem from './MessageItem.vue';

    const props = defineProps(['messages']);

    </script>