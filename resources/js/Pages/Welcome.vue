<script setup>
import {onMounted, onUnmounted, reactive, ref} from 'vue';
import About from '@/Mycomponents/About.vue'
import HeaderPage from '@/Mycomponents/HeaderPage.vue'
import Services from '@/Mycomponents/Services.vue'
import Experiences from '@/Mycomponents/Experiences.vue'
import Skills from '@/Mycomponents/Skills.vue'
import Certifications from '@/Mycomponents/Certifications.vue'
import Contact from '@/Mycomponents/Contact.vue'
import Interests from '@/Mycomponents/Interests.vue'
import Educations from "@/Mycomponents/Educations.vue";
import Email from "@/Mycomponents/icons/Email.vue";
import Phone from "@/Mycomponents/icons/Phone.vue";
import MenuThreeLines from "@/Mycomponents/icons/MenuThreeLines.vue";
import CloseMenu from "@/Mycomponents/icons/CloseMenu.vue";
import { Head } from '@inertiajs/vue3'

const activeMenu = ref(null);
const navMenuTop = ref(100);
const isMenuMobileOpen = ref(false);

const menuItems = reactive([ // ref ?
    {name: "About"},
    {name: 'Services'},
    {name: 'Experiences'},
    {name: 'Educations'},
    {name: 'Skills'},
    {name: 'Certifications'},
    {name: 'Interests'},
    {name: 'Contact'},
])

let hash = window.location.hash;
hash = hash.replace("#", "").toLowerCase();
let navMenuContent = null;

// Set active item from query string
menuItems.forEach(function(value , index) {
    if(value.name.toLowerCase() == hash) {
        activeMenu.value = hash;
    }
});

if(hash.length == 0 || activeMenu.value == null) {
    activeMenu.value = "about";
}

function gotoContent(contentName) {

    isMenuMobileOpen.value = false;

    activeMenu.value = contentName;

    window.location.hash = contentName;

    let targetElement = document.getElementById(contentName);

    targetElement.scrollIntoView({ behavior: 'smooth'});
}

function gotoTop() {

    window.location.hash = '';
    window.scrollTo(0,0);

}


function handleScrollResize() {

    if(navMenuContent == null) {
        navMenuContent = document.getElementById('nav-menu-content');
    }

    navMenuTop.value = navMenuContent.getBoundingClientRect().top;

    let navMenu = document.getElementById('nav-menu');

    let navMenuWidth = navMenuContent.offsetWidth * (3/12);

    if(navMenuTop.value < 10) {
        navMenu.style.width = navMenuWidth + "px";
    } else {
        navMenu.style.width = null;
    }

    // Active menu item when scrolling
    let elm = null;
    let top = null;
    let height = null;

    menuItems.forEach((obj) => {

        elm = document.getElementById(obj.name.toLowerCase() + '-main-box');
        top = elm.getBoundingClientRect().top;
        height = elm.getBoundingClientRect().height;

        if((top > 0 && top < window.innerHeight / 2) ||  (top + height < window.innerHeight && top + height > window.innerHeight / 2)) {
            activeMenu.value = obj.name.toLowerCase();
        }
    })

}

function menuMobileIcon() {
    isMenuMobileOpen.value = !isMenuMobileOpen.value;

    console.log(isMenuMobileOpen.value);

}


onMounted(() => {
    window.addEventListener("scroll", handleScrollResize);
    window.addEventListener("resize", handleScrollResize);
})

onUnmounted(() => {
    window.removeEventListener("scroll", handleScrollResize);
    window.removeEventListener("resize", handleScrollResize);
})


</script>

<template>

    <Head title="Meysam Khodadadi"></Head>
    <div class="w-full bg-[url('/picture/back-01.jpg')] bg-contain bg-repeat">
        <div class=" bg-[url('/picture/header3.png')] bg-no-repeat bg-contain bg-top">

            <HeaderPage :goto-content="gotoContent"></HeaderPage>

            <div id="nav-menu-content" class="flex flex-wrap container mx-auto">

                <div id="nav-menu" class="hidden md:flex md:flex-col w-3/12 bg-gray-800 rounded-l-lg py-6 text-gray-300"
                     :class="navMenuTop < 10 ? 'md:fixed top-2.5 h-ful' : 'md:flex'">

                    <div @click="gotoTop" class="text-center text-white text-xl font-bold border-b-2 pb-6 cursor-pointer">Meysam Khodadadi</div>

                    <div class="menu-item" v-for="item in menuItems">
                        <li v-bind:data-name="item.name.toLowerCase()" @click="gotoContent(item.name.toLowerCase())" :class="[activeMenu==item.name.toLowerCase() ? 'li-active-menu-item' : 'li-menu-item']">
                            <a v-bind:data-name="item.name.toLowerCase()" @click.prevent="gotoContent(item.name.toLowerCase())" v-bind:href="'#'+item.name.toLowerCase()">{{ item.name }}</a>
                        </li>
                    </div>

                </div>

                <div id="content" class="w-full md:w-9/12 bg-white rounded-r-lg"
                     :class="navMenuTop < 10 ? 'md:ml-[25%]' : 'ml-0'"> <!-- content -->

                    <About></About>


                    <Services></Services>


                    <Experiences></Experiences>


                    <Educations></Educations>


                    <Skills></Skills>


                    <Certifications></Certifications>


                    <Interests></Interests>


                    <Contact></Contact>

                </div>

            </div>

        </div>

        <div class="px-6 bg-gray-700 text-white">
            <div class="flex flex-wrap container mx-auto">
                <div class="w-full md:w-2/4 flex my-4 text-center">
                    <Email class="mr-4"></Email>
                    meysamkhodadadi1982@gmail.com
                </div>
                <div class="w-full md:w-2/4 flex my-4 text-center">
                    <Phone class="mr-4"></Phone>
                    07464234381
                </div>

            </div>
<!--            <FooterPage></FooterPage>-->


        </div>


    </div>

<!--    menu for Mobile -->
    <div class="fixed md:hidden w-full h-10 bg-gray-800 top-0 left-0 text-white p-2">

        <div class="flex flex-wrap">
            <div class="w-1/2">
                <MenuThreeLines v-show="isMenuMobileOpen == false" @click="menuMobileIcon" class="cursor-pointer"> </MenuThreeLines>
                <CloseMenu v-show="isMenuMobileOpen" @click="menuMobileIcon" class="cursor-pointer"> </CloseMenu>
            </div>
            <div class="w-1/2">
                <img @click="gotoTop" class="w-6 h-6 float-right" src="/picture/favicon.ico" alt="Go to top">
            </div>
        </div>

    </div>

    <div v-show="isMenuMobileOpen" class="fixed md:hidden w-11/12 h-auto bg-gray-800 top-10 left-0  text-white p-2 shadow-md shadow-gray-700">
        <div class="menu-item" v-for="item in menuItems">
            <li v-bind:data-name="item.name.toLowerCase()" @click="gotoContent(item.name.toLowerCase())" :class="[activeMenu==item.name.toLowerCase() ? 'li-active-menu-item' : 'li-menu-item']">
                <a v-bind:data-name="item.name.toLowerCase()" @click.prevent="gotoContent(item.name.toLowerCase())" v-bind:href="'#'+item.name.toLowerCase()">{{ item.name }}</a>
            </li>
        </div>
    </div>
    <!--    menu for Mobile -->


</template>

<style>


</style>
