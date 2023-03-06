<template>
    <div class="nav">

        <router-link to="/admin/home">Admin Dashboard</router-link>

        <router-link to="/login">Login</router-link>

        <router-link to="/register">Register</router-link>

    </div>
    <h1> Welcome to home page</h1>
</template>

<style scoped>
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
