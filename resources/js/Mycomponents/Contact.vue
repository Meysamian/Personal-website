<script setup>
// import { Head, Link, useForm } from '@inertiajs/vue3';
import {ref} from 'vue';
import axios from 'axios'
import Email from "@/Mycomponents/icons/Email.vue";
import Phone from "@/Mycomponents/icons/Phone.vue";


const isNameErr = ref(false);
const isEmailErr = ref(false);
const isMessageErr = ref(false);
const isSuccess = ref(false);
const isSuccessShow = ref(false);

const name = ref('')
const email = ref('')
const message = ref('')

function resetErrors() {
    isNameErr.value = false;
    isEmailErr.value = false;
    isMessageErr.value = false;
}

function resetForm() {
    name.value = "";
    email.value = "";
    message.value = "";
}

const validateEmail = (email) => {
    return String(email)
        .toLowerCase()
        .match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
};

function loginKey(event)  {

    resetErrors();

    if(name.value.length < 3) {
        isNameErr.value = true;
    }

    if(!validateEmail(email.value)) {
        isEmailErr.value = true;
    }

    if(message.value.length < 30) {
        isMessageErr.value = true;
    }
    if(isNameErr.value || isEmailErr.value || isMessageErr.value) {
        return;
    }

    let data = {
        name: name.value,
        email: email.value,
        message: message.value
    }

     console.log(data)
    axios.post(route('saveMessage'), data)
        .then(res => {
            if(res.data.code == 200) {
                isSuccess.value = true;
                isSuccessShow.value = true;
                resetForm();
            }
        })
        .catch(err => console.log(err))
}

</script>

<template>

    <div id="contact" class="put-a-space-in-mobile">
        <!-- Just for a space between title and menu in mobile-->
    </div>
    <div id="contact-main-box" class="sky-box">

        <div class="sky-title">
            Contact
        </div>

        <div class=" p-6 text-white text-justify">

            <div class="p-4">
                You can reach me via email and mobile. There may be times when I cannot answer my phone, but I will definitely respond to your email
            </div>

            <div class="text-md mx-2 md:mx-16 text-gray-800 font-bold text-white">
                <div class="w-full text-center flex mb-4">
                    <Email class="mr-4"></Email>
                    meysamkhodadadi1982@gmail.com
                </div>
                <div class="w-full text-center ">
                    <div class="flex">
<!--                        <svg class="h-6 w-6 mr-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">  <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" /></svg>-->
                        <Phone class="mr-4"></Phone>

                        07464234381
                    </div>
                </div>
            </div>

            <div class="p-4 border-t-2 mt-10">
                You can also send your message via the form below. I will respond as soon as possible.
            </div>

            <div class="w-full">
                <form class="w-full flex flex-wrap" @submit.prevent="loginKey" action="">

                    <div class="form-row ">
                        <div class="form-label"> Your Name:
                            <span v-if="isNameErr"  class="text-orange-500 text-md md:hidden">
                                * Required
                            </span>
                        </div>
                        <div class="w-full md:w-2/4 text-left">
                            <input class="text-input" type="text" v-model="name">
                        </div>
                        <div class="w-1/4 p-2">
                            <span v-if="isNameErr"  class="text-orange-500 text-sm hidden md:flex">
                                * At least 3 characters
                            </span>
                        </div>
                    </div>

                    <div class="form-row ">
                        <div class="form-label"> Your Email:
                            <span v-if="isEmailErr"  class="text-orange-500 text-md md:hidden">
                               * Required
                            </span>
                        </div>
                        <div class="w-full md:w-2/4 text-left">
                            <input class="text-input" type="email" v-model="email">
                        </div>
                        <div class="w-1/4 p-2">
                            <span v-if="isEmailErr"  class="text-orange-500 text-sm hidden md:flex">
                                * Email address is not correct!
                            </span>
                        </div>
                    </div>

                    <div class="form-row ">
                        <div class="form-label"> Your Message:
                            <span v-if="isMessageErr"  class="text-orange-500 text-md md:hidden">
                               * Required (At least 30 chars)
                            </span>
                        </div>
                        <div class="w-full md:w-2/4 text-left">
                            <textarea class="text-input min-h-32" type="text" rows="5" v-model="message"></textarea>
                        </div>
                        <div class="w-1/4 p-2">
                            <span v-if="isMessageErr"  class="text-orange-500 text-sm hidden md:flex">
                                * Please complete your message! <br> Your message needs to be minimum 30 characters.
                            </span>
                        </div>
                    </div>


                    <div class="form-row ">
                        <div class="w-full md:w-1/4 text-right pr-6 pt-2 align-middle"> </div>
                        <div class="w-full md:w-2/4 text-right">
                            <button class="p-2 px-16 border-2 border-sky-200 bg-sky-500 hover:bg-sky-400 duration-100 text-gray-700 text-lg font-bold rounded-lg" type="submit">Send</button>
                        </div>
                    </div>

                </form>
            </div>

        </div>

        <div class="w-5/6 md:w-3/6 h-auto top-1/3 left-1/6 md:left-2/6
        shadow-2xl shadow-black fixed align-middle
        text-green-700 font-bold bg-gray-300 p-8 text-center
        border-2 border-gray-600 rounded-xl"
        v-if="isSuccessShow">
            Thank you for your message.  I will get back to you as soon as possible.
            <div class="text-center mt-6 pt-2">
                <span class="mt-6 border-2 p-2 px-16 max-w-full
                border-2 border-green-800 rounded-lg
                bg-green-700 hover:bg-green-600 cursor-pointer
                text-green-100 duration-100"
                @click="isSuccessShow = false">
                    Ok
                </span>

            </div>
        </div>

    </div>

</template>
