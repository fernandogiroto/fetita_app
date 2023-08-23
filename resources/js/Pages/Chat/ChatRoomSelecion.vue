<template>
    <div>
        <p>{{selected.name}} Chat</p>
        <div>
            <select v-model="selected" @change="$emit('roomchanged',selected)">
                <option v-for="(room, index) in rooms" :key="index" :value="room">
                    {{ room.name }}
                </option>
            </select>
        </div>
    </div>
</template>

<script setup>
    import { defineProps, ref , onMounted} from 'vue';
    const props = defineProps(['rooms', 'currentRoom']);
    const selected = ref('');

    onMounted(() => {
        selected.value = props.currentRoom
    })

 </script>