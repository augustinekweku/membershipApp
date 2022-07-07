<template>
    <div>
        <div class="_flex_row justify-content-between align-items-center _mar_b20">
            <p class="_3title">Work and Education</p>

            <div class>
                <button @click="setReadOnlyField" class="_3btn _pre_icon _btn_sm" type="button">
                    <i class="fas fa-pen"></i> Edit
                </button>
            </div>
        </div>
        <Form>
        <FormItem label="Department">
            <Input  placeholder=""></Input>
        </FormItem>
        <FormItem label="Facility">
            <Input  placeholder=""></Input>
        </FormItem>
        </Form>
    </div>
</template>

<script>
export default {
    data(){
        return {

        }
    },

    methods: {

    }
}
</script>