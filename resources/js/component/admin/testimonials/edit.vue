<template>
    <Base />
    <main class="main">
        <div class="main__sideNav"></div>
        <!-- Main Content -->
        <div class="main__content">
             <!--===================EDIT TESTIMONIAL ====================-->
             <section class="about section" id="testimonial">
                <div class="about_container">
                    <div class="titlebar">
                        <div class="titlebar_item">
                            <h1>Edit Testimonial</h1>
                        </div>
                        <div class="titlebar_item">
                            <div class="btn btn-secondary" @click="updateTestimonial()">
                                Update Testimonial
                            </div>
                        </div>
                    </div>
                    <div class="card_wrapper">
                        <div class="wrapper_left">
                            <div class="card">

                                <p>Name</p>
                                <input type="text" class="input" v-model="form.name" />
                                <small style="color: red;" v-if="errors.name">{{ errors.name }}</small>
                                <p>Function</p>
                                <input type="text" class="input" v-model="form.function" />

                                <p>Testimony</p>
                                <textarea cols="10" rows="5" v-model="form.testinomy"  ></textarea>

                            </div>
                        </div>

                        <div class="wrapper_right ">
                            <div class="card">
                                <p>Photo</p>
                                <div class="testimonial_img-container">
                                 <img :src="getPhoto()" alt="" class="testimonial_img">
                                </div>
                                <input type="file" id="fileimg"  @change="changePhoto" />
                                <br>
                                <p>Rating ?/5</p>
                                <input type="text" class="input"  v-model="form.rating" />
                            </div>
                        </div>

                    </div>
                    <div class="titlebar">
                        <div class="titlebar_item">

                        </div>
                        <div class="titlebar_item">
                            <div class="btn btn-secondary" @click="updateTestimonial()">
                                Update Testimonial
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</template>

<script setup>

    import Base from '../layouts/base.vue'
    import { onMounted, ref } from 'vue';
    import axios from 'axios';
    import { useRouter } from 'vue-router';

    const router = useRouter()

    let form = ref({
        name:'',
        function :'',
        rating: '',
        testinomy: '',
        photo : ''
    })
    let errors = ref({})

    onMounted(async()=>{
        getsingleTestimonial()
     })

    const props = defineProps({
        id:{
            type: String,
            default: ''
        }
     })

    const getsingleTestimonial = async() => {
        let response = await axios.get(`/api/get_edit_testimonial/${props.id}`)
        console.log('renis',response)
        form.value = response.data.testimonial
     }

    const getPhoto = () => {
        let photo = '/img/upload/avtar.png'
        if(form.value.photo){
            if(form.value.photo.indexOf('base64') != -1){
                photo = form.value.photo
             }else{
                photo = '/img/upload/' + form.value.photo
            }
        }
            return photo
    }

    const changePhoto = (e) => {
        let file = e.target.files[0];
        let reader = new FileReader();
        let limit = 1024*1024*2
        if(file['size'] > limit){
            Swal.fire({
                icon:'error',
                title: 'Ooops...',
                text:'You are uploading a large file'
            })
            return false
        }
        reader.onloadend = (file) => {
            form.value.photo = reader.result
        }
        reader.readAsDataURL(file)
    }

    const updateTestimonial = async() => {
        await axios.post(`/api/update_testimonial/${form.value.id}`,form.value)
        .then(response =>{
            router.push('/admin/testimonial')
            toast.fire({
                icon: 'success',
                title : 'Testimonial update successfully'
            })
        })
        .catch((error) => {
            if(error.response.status === 422){
                errors.value = error.response.data.errors
            }
        })
    }

</script>
