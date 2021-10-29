<template>
    <div>
        <div class="_main_content">
            <div class="_1profile">
                <!-- Banner -->
                <Banner/>
                <!-- Banner -->

                <div class="row mx-2">
                    <div class="col-sm-4">
                        <ProfileCard/>
                    </div>
                    <div class="col-sm-8">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Banner from '../components/profile/banner.vue'
import ProfileCard from '../components/profile/ProfileCard.vue'
export default {
    props:['user'],
    components: {
        Banner,
        ProfileCard
    },

    data(){
        return {
           state_user: []
        }
    },

    methods: {
        
    },
    created(){
        this.state_user = this.$store.state.user;
    }

}
</script>