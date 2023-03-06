<template>
    <Base />
    <main class="main">
        <div class="main__sideNav"></div>
        <!-- Main Content -->
        <div class="main__content">
            <div>
                <form @submit.prevent="submitForm">
                    <input v-model="formInput" />
                    <!-- Form validation error message -->
                    <div v-if="formInput.length < 5">
                        Input must be at least 5 characters.
                    </div>
                    <my-button :button-text="'Submit'" :form-invalid="formInput.length < 5" />
                </form>
            </div>
        </div>
    </main>
</template>

<script>
import Base from '../layouts/base.vue'
import MyButton from './MyButton.vue';

export default {
  components: {
    MyButton,
  },
  data() {
    return {
      formInput: '',
    };
  },
  methods: {
    submitForm() {
      if (this.formInput.length < 5) {
        alert('Form validation failed!');
        return;
      }
      // Submit form logic
    },
  },
};


</script>
