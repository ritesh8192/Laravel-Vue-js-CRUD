<template>
    <div class="nav">

        <router-link to="/admin/home">Admin Dashboard</router-link>

        <router-link to="/login">Login</router-link>

        <router-link to="/register">Register</router-link>

    </div>
    <div class="card">
        <img class="logo" src="../images/logo.jpg" />
        <h1>Login</h1>
        <div class="register">
            <p class="text-danger" v-if="error">{{ error }}</p>
            <form @submit.prevent="register">
                <input type="text" placeholder="Enter your Name" v-model="form.name" />
                <input type="email" placeholder="Enter your email" v-model="form.email" />
                <input type="password" placeholder="Enter your password" v-model="form.password" />
                <input type="password" placeholder="Enter your Confirm password" v-model="form.c_password" />
                <input type="submit" value="Register" class="submit" />

            </form>
        </div>
    </div>
</template>

<script setup>
import axios from 'axios';
import {reactive, ref} from 'vue'
import {useRouter} from 'vue-router'

const router = useRouter()
let form = reactive({
    name:'',
    email: '',
    password: '',
    c_password:''
})

let error = ref('')

const register = async () => {
    await axios.post('/api/register', form)
        .then(response => {

            if (response.data.success) {
                console.log(123);
                localStorage.setItem('token', response.data.data.token)
                router.push('/admin/home')
                toast.fire({
                icon: 'success',
                title: 'Register Successfully'
            })
            }

            if (response.data) {
                error.value = response.data.data;
                setTimeout(() => error.value = false, 4000);
            }
        })
}

</script>

<style scoped>
.logo {
    width: 80px;
    margin-left: 191px;
}

.body {
    margin: 0;
    padding: 0;
}

.register input {
    width: 300px;
    height: 30px;
    display: block;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 20px;
    border-radius: 13px;
    border: 1px solid #271d1d;
    text-align: center;
}

.card {
    margin-top: 250px;
    width: 500px;
    margin-left: auto;
    margin-right: auto;
    border: 1px solid #271d1d;
    padding-bottom: 20px;
    padding-top: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);

}

h1 {
    text-align: center;
}

input {
    background: rgba(228, 232, 243, 0.8);
    background-position: 0.5em 0.6em;
    color: rgb(80, 80, 80, 1);
    margin: 0 0 1em 0;
    outline: none;
    transition: background-color 0.4s;

}

input:hover {
    background-color: rgba(255, 255, 255, 255);
}

input:focus {
    background-color: rgba(255, 255, 255, 255);
}

.submit {
    color: rgba(35, 35, 35, 0.8);
    background-color: rgba(250, 250, 250, 1);
    padding: 0;
    margin: 2.5em 0 0 5em;
    width: 10em;
    text-transform: uppercase;
    cursor: pointer;
    transition: background-color 0.4s;
}

.submit:hover {
    background: #43467f;
    color: #ffffff;
}

.submit:focus {
    background: #43467f;
    color: #ffffff;
}

.text-danger {
    color: red;
    display: flex;
    justify-content: center;
}
.nav {
    background-color: #000000;
    overflow: hidden;
    height: 50px
}

.nav a {
    float: left;
    color: #fff;
    text-align: center;
    padding: 10px 14px;
    text-decoration: none;
    font-size: 17px;
    margin-right: 4px;
    margin-top: 4px;
}

.nav a:hover {
    background-color: #ddd;
    color: #000;
    border-radius: 20px;
}

</style>
