<template>
     <Base />
    <main class="main">
        <div class="main__sideNav"></div>
        <!-- Main Content -->
        <div class="main__content">
            <button :class="{ 'disabled': formInvalid }" @mouseover="cursorStyle = 'not-allowed'"
                @mouseleave="cursorStyle = 'pointer'" :style="{ cursor: cursorStyle }" @click="submitForm">
                {{ buttonText }}
            </button>
        </div>
    </main>
</template>

<script>
import Base from '../layouts/base.vue'

export default {
    props: {
        buttonText: {
            type: String,
            required: true,
        },
        formInvalid: {
            type: Boolean,
            required: true,
        },
    },
    data() {
        return {
            cursorStyle: 'pointer',
        };
    },
    methods: {
        submitForm() {
            if (this.formInvalid) {
                alert('Form validation failed!');
                return;
            }
            // Submit form logic
        },
    },
};
</script>

<style scoped>
button.disabled {
    opacity: 0.5;
    cursor: not-allowed;
}
</style>
