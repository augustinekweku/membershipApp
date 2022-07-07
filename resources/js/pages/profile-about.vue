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
                                <div class="_1profile_right">
                                    <div class="_1profile_right_menu _mar_b20">
                                        <ul class="_1profile_menu_list">
                                            <li>
                                                <router-link to="/profile">
                                                    <Icon type="md-trending-up" />
                                                    <p class="_1profile_menu_text">Timeline</p>
                                                </router-link>
                                            </li>
                                            <li class="_active">
                                                <router-link to="/about">
                                                    <Icon type="md-information-circle" />
                                                    <p class="_1profile_menu_text">About</p>
                                                </router-link>
                                            </li>
                                            <li>
                                                <router-link to="/friend">
                                                    <Icon type="ios-people" />
                                                    <p class="_1profile_menu_text">Friends</p>
                                                </router-link>
                                            </li>
                                            <li>
                                                <router-link to="/photo">
                                                    <Icon type="md-image" />
                                                    <p class="_1profile_menu_text">Photos</p>
                                                </router-link>
                                            </li>
                                            <li>
                                                <a>
                                                    <Dropdown  trigger="click" placement="bottom-end">
                                                        <a href="javascript:void(0)">
                                                            <Icon style="transform: rotate(90deg);" type="md-more" />
                                                        </a>
                                                        <DropdownMenu slot="list">
                                                            <DropdownItem>Follow</DropdownItem>
                                                            <DropdownItem>Add more</DropdownItem>
                                                            <DropdownItem>Unfriend</DropdownItem>
                                                            <DropdownItem>Send request</DropdownItem>
                                                        </DropdownMenu>
                                                    </Dropdown>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="_1profile_right_main">
                                        <!-- About -->
                                        <div class="_2profile_feed">
                                            <div class="_2profile_feed_main">
                                                <div class="row">
                                                    <div class="col-12 col-md-12 col-lg-12">
                                                    <div class="_2profile_feed_card">
                                                        <!-- Card -->
                                                        <div class="_1card _mar_b20">
                                                            <div class="_about_main _1card_body">
                                                                <div class="_about_menu _1border_color">
                                                                    <ul class="_about_menu_list">
                                                                        <li @click="selectTab('basic-info')" :class="(tab == 'basic-info') ? '_active' : ''">Contact and Basic info</li>
                                                                        <li @click="selectTab('work')"  :class="(tab == 'work') ? '_active' : ''">Work and Education</li>
                                                                        <li @click="selectTab('places')" :class="(tab == 'places') ? '_active' : ''">Places You've Lived</li>
                                                                    </ul>
                                                                </div>
                                                                <div class="_about_details">
                                                                    <!-- Overview -->
                                                                    <div class="_overview"  v-if="tab == 'basic-info'">
                                                                        <BasicInfo/>
                                                                    </div>
                                                                    <!-- Overview -->
                                                                    
                                                                    <!-- Work -->
                                                                    <div v-if="tab == 'work'">
                                                                        <Work/>
                                                                    </div>
                                                                    <!-- Work -->
                                                                    
                                                                    <!-- Places -->
                                                                    <div v-if="tab == 'places'">
                                                                        <Places/>
                                                                    </div>
                                                                    <!-- Places -->

                                                                    <!-- Contact -->
                                                                    <div v-if="tab == 'contact'">
                                                                        <Contact/>
                                                                    </div>
                                                                    <!-- Contact -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Card -->
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- About -->
                                    </div>
                                </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Banner from '../components/profile/banner.vue'
import ProfileCard from '../components/profile/ProfileCard.vue'
import Work from '../components/profile/profile-about/work.vue'
import BasicInfo from '../components/profile/profile-about/basic-info.vue'
import Places from '../components/profile/profile-about/places.vue'

export default {
    props:['user'],
    components: {
        Banner,
        ProfileCard,
        Work,
        BasicInfo,
        Places,
    },

    data(){
        return {
            tab: 'basic-info',
           state_user: []
        }
    },

    methods: {
        selectTab(tab){
            if(tab != 'basic-info' && tab != 'work' && tab != 'places' && tab != 'contact'){
                this.tab="basic-info"
            }
            return this.tab = tab
        }
    },
    created(){
        this.state_user = this.$store.state.user;
    }

}
</script>