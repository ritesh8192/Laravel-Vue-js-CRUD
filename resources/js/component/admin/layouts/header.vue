<template>
    <!--==================== HEADER ====================-->
    <!-- Header -->
    <header class="header" id="header">
        <div class="header_logo ">
            <i class="header_collapse-btn fas fa-align-left"></i>
            <img :src="getPhoto()" class="logo_img"   />
        </div>
        <div class="header_search">
            <!-- <i class="header_search-icon fas fa-search"></i>
            <input class="header_search-input" type="text" placeholder="Search" /> -->
        </div>
        <div class="header_profile" @click="openNavHeader">
            <div class="header_profile-imgWrapper ">
                <img class="header_profile-img"  alt="" />
            </div>
            <p class="header_profile-name">
                Zander Ford
            </p>

        </div>
        <div class="nav__btns">
            <!--====== THEME CHANGE BUTTON ======-->
            <i class="uil uil-moon change-theme" id="theme-button" @click="toggleTheme"></i>

            <div class="nav__toggle" id="nav-toggle">
                <i class="uil uil-apps "></i>
            </div>
        </div>
    </header>
    <!-- End Header -->

    <!-- Header Profile -->
    <div>
        <span class="header_profile-name--nav" v-bind:class="{ show: showNavHeader }">
            <span class="header_profile-name--nav--pointer">
                <i class="fas fa-sort-up"></i>
            </span>
            <ul class="header_profile-name--nav--list">
                <li class="header_profile-name--nav--item">
                    <a class="header_profile-name--nav--link" href="#">
                        Profile
                    </a>
                </li>
                <li class="header_profile-name--nav--item">
                    <a class="header_profile-name--nav--link" href="#">
                        Message
                    </a>
                </li>
                <li class="header_profile-name--nav--item">
                    <a class="header_profile-name--nav--link" href="#" @click="logout">
                        Logout
                    </a>
                </li>
            </ul>
        </span>
    </div>
    <!-- End Profile Header -->
</template>

<script setup>
import {ref} from 'vue'
import {useRouter} from 'vue-router';

const showNavHeader = ref(false)
const router = useRouter()

const openNavHeader = () => {
    showNavHeader.value = !showNavHeader.value
}
const logout = () => {
    localStorage.removeItem('token')
    router.push('/')
}

const getPhoto = () => {
        let photo = '/img/upload/logo.png'

        return photo
    }

    const toggleBtn = document.querySelector(".change-theme")
    const body = document.body;

    const toggleTheme = () => {
    if(body.classList.contains("dark-theme")){
        console.log(123);
        body.classList.remove("dark-theme");
        toggleBtn.classList.remove("uil uil-moon");
        toggleBtn.classList.add("uil uil-sun");

    }else{
        console.log(456);
        body.classList.add("dark-theme");
        toggleBtn.classList.add("uil uil-sun");

    }
}



</script>

