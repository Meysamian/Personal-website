<script setup>
import Email from "@/Mycomponents/icons/Email.vue";
import Phone from "@/Mycomponents/icons/Phone.vue";

const props = defineProps({
    gotoContent: Function,
})

</script>


<template>

    <div class="flex flex-wrap container mx-auto md:flex-row">

        <div class="w-1/2 md:w-1/6 mx-auto mt-16 md:mt-32 text-center bg- sky-700">
            <img class="mr-4 ml-2 md:mt-10 rounded-full border border-gray-200 drop-shadow" src="/picture/meysam-khodadadi.png" alt="Meysam Khodadadi">
        </div>

        <div class="w-full md:w-5/6 mt-2 md:mt-32 p-8 ">

            <div class="px-8 mb-8 text-center font-bold text-gray-700 md:text-left text-5xl">
                Meysam Khodadadi
            </div>

            <div class="px-8 md:ml-8 text-lg text-gray-800 font-bold bg-gray-300 ">
                Experienced Web Developer |
                Project Scheduling Specialist |
                Development Process Optimisation Expert
            </div>

            <div class="text-md mt-8 mx-2 md:mx-16 text-gray-800 font-bold ">

                <div class="w-full text-center flex mb-3 ">
                    <Email class="mr-4"></Email>
                    meysamkhodadadi1982@gmail.com
                </div>
                <div class="w-full text-center ">
                    <div class="flex">
                        <Phone class="mr-4"></Phone>
                        07464234381
                    </div>
                </div>
                <div class="w-full text-center flex mt-3 ">
                    <Email class="mr-4"></Email>
                    <a target="_blank" href="https://www.linkedin.com/in/meysam-khodadadi/">LinkedIn</a>
                </div>

            </div>

            <div class="w-full mt-8 p-6 flex flex-wrap text-center ">

                <div class="w-full md:w-1/3 mx-auto  m b-12">
                    <a class="key" data-name="about" @click.prevent="props.gotoContent('about')" href="#about">More about me</a>
                </div>

                <div class="w-full md:w-1/3 mx-auto mt-16 md:mt-0">
                    <a class="key" data-name="contact" @click.prevent="props.gotoContent('contact')" href="#contact">Get in touch</a>
                </div>

            </div>

        </div>

    </div>

</template>



<style scoped>

</style>
