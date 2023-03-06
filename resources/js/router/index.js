import { createRouter, createWebHistory } from "vue-router";
//admin
import homeAdminIndex from '../component/admin/home/index.vue'
import adminAboutIndex from '../component/admin/about/index.vue'
import adminServiceIndex from '../component/admin/services/index.vue'
import adminSkillIndex from '../component/admin/skills/index.vue'
import adminEducationIndex from '../component/admin/education/index.vue'
import adminExperiencesIndex from '../component/admin/experiences/index.vue'
import adminProjectIndex from '../component/admin/projects/index.vue'
import adminProjectNew from '../component/admin/projects/new.vue'
import adminProjectEdit from '../component/admin/projects/edit.vue'
import adminTestimonialIndex from '../component/admin/testimonials/index.vue'
import adminTestimonialNew from '../component/admin/testimonials/new.vue'
import adminTestimonialEdit from '../component/admin/testimonials/edit.vue'
import adminCalculatorIndex from '../component/admin/calculator/index.vue'

//pages
import homePageIndex from '../component/pages/home/index.vue'
import notFound from '../component/notFound.vue'
//login
import login from '../component/auth/login.vue'
import register from '../component/auth/register.vue'

const routes = [
    //admin
    {
        name: 'Admin',
        path: '/admin/home',
        component: homeAdminIndex,
        meta:{
            requiresAuth:true
        }
    },
    {
        name: 'adminAbout',
        path: '/admin/about',
        component: adminAboutIndex,
        meta:{
            requiresAuth:true
        }
    },
    {
        name: 'adminService',
        path: '/admin/services',
        component: adminServiceIndex,
        meta:{
            requiresAuth:true
        }
    },
    {
        name: 'adminSkill',
        path: '/admin/skills',
        component: adminSkillIndex,
        meta:{
            requiresAuth:true
        }
    },
    {
        name: 'adminEducation',
        path: '/admin/education',
        component: adminEducationIndex,
        meta:{
            requiresAuth:true
        }
    },
    {
        name: 'adminExperiences',
        path: '/admin/experiences',
        component: adminExperiencesIndex,
        meta:{
            requiresAuth:true
        }
    },
    {
        name: 'adminProject',
        path: '/admin/project',
        component: adminProjectIndex,
        meta:{
            requiresAuth:true
        }
    },
    {
        name: 'adminProjectNew',
        path: '/admin/project/new',
        component: adminProjectNew,
        meta:{
            requiresAuth:true
        }
    },
    {
        name: 'adminProjectEdit',
        path: '/admin/projects/edit/:id',
        component: adminProjectEdit,
        meta:{
            requiresAuth:true
        },
        props: true
    },
    {
        name: 'adminTestimonial',
        path: '/admin/testimonial',
        component: adminTestimonialIndex,
        meta:{
            requiresAuth:true
        },
    },
    {
        name: 'adminTestimonialNew',
        path: '/admin/testimonial/new',
        component: adminTestimonialNew,
        meta:{
            requiresAuth:true
        }
    },
    {
        name: 'adminTestimonialEdit',
        path: '/admin/testimonial/edit/:id',
        component: adminTestimonialEdit,
        meta:{
            requiresAuth:true
        },
        props: true
    },
    {
        name: 'adminCalculatorIndex',
        path: '/admin/calculator',
        component: adminCalculatorIndex,
        meta:{
            requiresAuth:true
        }
    },


    //page
    {
        name: 'HomePage',
        path: '/',
        component: homePageIndex,
        meta:{
            requiresAuth:false
        }
    },


    //login
    {
        name: 'Login',
        path: '/login',
        component: login,
        meta:{
            requiresAuth:false
        }
    },
    //register
    {
        name: 'Register',
        path: '/register',
        component: register,
        meta:{
            requiresAuth:false
        }
    },


    //not Found page
    {
        name: 'PagenotFound',
        path: '/:pathMatch(.*)*',
        component: notFound,
        meta:{
            requiresAuth:false
        }
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

router.beforeEach((to,from) => {
    if(to.meta.requiresAuth && !localStorage.getItem('token')){
        return{ name:'Login'}
    }

    if(to.meta.requiresAuth == false && localStorage.getItem('token')){
        return{ name:'Admin'}
    }
})


export default router
