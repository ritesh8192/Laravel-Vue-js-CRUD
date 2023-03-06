<template>
    <Base />
        <!--==================== MAIN ====================-->
        <main class="main">
            <!-- Side Nav Dummy-->
            <div class="main__sideNav"></div>
            <!-- End Side Nav -->
            <!-- Main Content -->
            <div class="main__content">
                <!-- ==================-->
                <!-- Overview Page -->
                <section class="overview" id="overview">
                    <div class="overview_left">
                        <div class="overview_analyse">
                            <img  style="height:250px;width:410px;" :src="chartimg()" />
                            <canvas id="chart" width="1228" height="614" style="display: block; box-sizing: border-box; height: 614px; width: 100%;"></canvas>

                        </div>
                        <div class="titlebar">
                            <div class="titlebar_item">
                                <h1>Skills</h1>
                            </div>
                            <div class="titlebar_item">

                            </div>
                        </div>
                        <div class="overview_skills">
                            <div class="overview_skills-title">
                                <!-- <h3>Frontend developer</h3> -->
                            </div>
                            <div class="skills_data" v-for="item in skills" :key="item.id" v-if="skills.length > 0">
                                <div class="skills_titles" >
                                    <h3 class="skills_name">{{ item.name }}</h3>
                                    <span class="skills_number">{{ item.proficiency }}%</span>
                                </div>
                                <div class="skills_bar">
                                    <span class="skills_percentage skills_html" :style="{ 'width': `${item.proficiency}%` }" ></span>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="overview_right">
                        <div class="titlebar">
                            <div class="titlebar_item">
                                <h1>Overview Dashboard</h1>
                            </div>
                            <div class="titlebar_item">

                            </div>
                        </div>

                        <!-- TOP CARDS -->
                        <div class="overview_cards">
                            <div class="overview_cards-item">
                                <div class="overview_data">
                                    <p>Skills</p>
                                    <!-- <span>16</span> -->
                                </div>
                                <div class="overview_link">
                                    <span></span>
                                    <router-link  to="/admin/skills">View Reports</router-link >
                                </div>
                            </div>
                            <div class="overview_cards-item">
                                <div class="overview_data">
                                    <p>Educations</p>
                                    <!-- <span>16</span> -->
                                </div>
                                <div class="overview_link">
                                    <span></span>
                                    <router-link  to="/admin/education">View Reports</router-link >
                                </div>
                            </div>
                            <div class="overview_cards-item">
                                <div class="overview_data">
                                    <p>Experience</p>
                                    <!-- <span>16</span> -->
                                </div>
                                <div class="overview_link">
                                    <span></span>
                                    <router-link  to="/admin/experiences">View Reports</router-link >
                                </div>
                            </div>
                            <div class="overview_cards-item">
                                <div class="overview_data">
                                    <p>Services</p>
                                    <!-- <span>16</span> -->
                                </div>
                                <div class="overview_link">
                                    <span></span>
                                    <router-link  to="/admin/services">View Reports</router-link >
                                </div>
                            </div>
                            <div class="overview_cards-item">
                                <div class="overview_data">
                                    <p>Projects</p>
                                    <!-- <span>9</span> -->
                                </div>
                                <div class="overview_link">
                                    <span></span>
                                    <router-link  to="/admin/project">View Reports</router-link >
                                </div>
                            </div>
                            <div class="overview_cards-item">
                                <div class="overview_data">
                                    <p>Testimonials</p>
                                    <!-- <span>9</span> -->
                                </div>
                                <div class="overview_link">
                                    <span></span>
                                    <router-link  to="/admin/testimonial">View Reports</router-link >
                                </div>
                            </div>
                            <!-- <div class="overview_cards-item">
                                <div class="overview_data">
                                    <p>Messages</p>
                                    <span>9</span>
                                </div>
                                <div class="overview_link">
                                    <span></span>
                                    <a href="#">View Reports</a>
                                </div>
                            </div> -->
                            <!-- <div class="overview_cards-item">
                                <div class="overview_data">
                                    <p>Users</p>
                                    <span>9</span>
                                </div>
                                <div class="overview_link">
                                    <span></span>
                                    <a href="#">View Reports</a>
                                </div>
                            </div> -->


                        </div>
                        <!-- MEDIUM CARDS -->
                        <div class="overview_table">
                            <div class="overview_table-title">
                                <div class="titlebar">
                                    <div class="titlebar_item">
                                        <h1>Latest Projects</h1>
                                    </div>
                                    <div class="titlebar_item">

                                    </div>
                                </div>
                                <div class="table">
                                    <div class="overview_table-header">
                                       <p>Image</p>
                                       <p>Product</p>
                                    </div>
                                    <div class="overview_table-items"  v-for="item in projects" :key="item.id"  v-if="projects.length > 0" >
                                        <img  style="height:50px;width:50px;" :src="ourImage(item.photo)" />
                                        <a>{{ item.title }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="overview_table-title">
                                <div class="titlebar">
                                    <div class="titlebar_item">
                                        <h1>Latest Testimonials</h1>
                                    </div>
                                    <div class="titlebar_item">

                                    </div>
                                </div>
                                <div class="table">
                                    <div class="overview_table-header">
                                       <p>Image</p>
                                       <p>Product</p>
                                    </div>
                                    <div class="overview_table-items"  v-for="item in testimonial" :key="item.id"  v-if="testimonial.length > 0">
                                        <img  style="height:50px;width:50px;" :src="ourImageTestimonial(item.photo)" />
                                        <a>{{ item.name }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </section>


            <!--==================== ABOUT ====================-->


            <!--==================== SKILLS ====================-->
            <section class="skills section" id="skills">

            </section>

            <!--==================== QUALIFICATION ====================-->
            <section class="qualification section">

            </section>

            <!--==================== SERVICES ====================-->
            <section class="services section" id="services">

            </section>

            <!--==================== PORTFOLIO ====================-->
            <section class="portfolio section" id="portfolio">

            </section>

            <!--==================== PROJECT IN MIND ====================-->
            <section class="project section">

            </section>

            <!--==================== TESTIMONIAL ====================-->
            <section class="testimonial section">

            </section>

            <!--==================== CONTACT ME ====================-->
            <section class="contact section" id="contact">

            </section>
            </div>
        </main>

        <!--==================== FOOTER ====================-->
        <footer class="footer">

        </footer>
</template>

<script setup>
import { useRouter } from 'vue-router';
import Base from '../layouts/base.vue'
import {onMounted, ref} from 'vue';
import axios from 'axios';


let projects = ref([])
let testimonial = ref([])
let skills = ref([])
let services = ref([])

onMounted(async () => {
        getProjects()
    })

onMounted(async () => {
        getTestimonial()
    })

onMounted(async () => {
    getSkills()
    getServices()
    })

const getProjects = async () => {
        let response = await axios.get('/api/get_all_project')
        console.log('response',response)
        projects.value = response.data.project
    }

const ourImage = (img) => {
    return "/img/upload/"+img
}

const getTestimonial = async () => {
            let response = await axios.get('/api/get_all_testimonial')
            console.log('response',response)
            testimonial.value = response.data.testimonial
        }

    const ourImageTestimonial = (img) => {
        return "/img/upload/"+img
    }

const getSkills = async () => {
        let response = await axios.get('/api/get_all_skill')
        console.log('renis',response)
        skills.value = response.data.skills
    }

const getServices = async () => {
        let response = await axios.get('/api/get_all_service')
        services.value = response.data.services
    }
 const chartimg = () => {
    return "/img/chart.jpg"
 }
const router = useRouter()

const logout = () =>{
    localStorage.removeItem('token')
    router.push('/')
}




</script>
