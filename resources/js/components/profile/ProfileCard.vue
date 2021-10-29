<template>
    <div class="profile-card">
                                <div class="_1profile_left">
                                    <div class="_1profile_left_all _1card _mar_b20">
                                        <div class="_1card_body">
                                            <div class="_intro_card_main_pic _load_div"><img alt="" title="" class="_intro_card_main_img" data-src="/static/img/pic.jpg" src="/static/img/pic.jpg" lazy="loaded">
                                                <div class="_intro_card_main_edit"><Icon type="md-camera" /> Change profile pic
                                                </div>
                                            </div>
                                            <h2 class="_2title _text_center">
                                                {{state_user.first_name}} {{state_user.last_name}}
                                                <span>({{state_user.first_name}})</span></h2>

                                            <div class="_intro_card_main_button d-none">
                                                <Button type="primary"><i class="fas fa-pen"></i> Edit Profile </Button>
                                            </div>

                                            <div class="_intro_card">
                                                <div class="_intro_card_icon"><Icon type="md-briefcase" /></div>
                                                <div class="_intro_card_details">
                                                    <p class="_intro_card_details_text">Department <strong>{{state_user.department || "Not set"}}</strong></p>
                                                </div>
                                            </div>
                                            <div class="_intro_card">
                                                <div class="_intro_card_icon"><Icon type="md-school" /></div>
                                                <div class="_intro_card_details">
                                                    <p class="_intro_card_details_text">Studied at <strong>Border guard school and college</strong></p>
                                                </div>
                                            </div>
                                            <div class="_intro_card">
                                                <div class="_intro_card_icon"><Icon type="md-school" /></div>
                                                <div class="_intro_card_details">
                                                    <p class="_intro_card_details_text">Studied at <strong>Mathergoan high school</strong></p>
                                                </div>
                                            </div>
                                            <div class="_intro_card">
                                                <div class="_intro_card_icon"><Icon type="md-pin" /></div>
                                                <div class="_intro_card_details">
                                                    <p class="_intro_card_details_text">Lives in <strong>Sylhet</strong></p>
                                                </div>
                                            </div>
                                            <div class="_intro_card">
                                                <div class="_intro_card_icon"><Icon type="md-pin" /></div>
                                                <div class="_intro_card_details">
                                                    <p class="_intro_card_details_text">From <strong>Sunamgonj</strong></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            state_user: []
        }
    },
    created() {
        this.state_user = this.$store.state.user;
    }
}
</script>