<template>
    <div>
        <div class="_flex_row justify-content-between align-items-center _mar_b20">
            <p class="_3title">Basic info</p>

            <div class>
                <button @click="setReadOnlyField" class="_3btn _pre_icon _btn_sm" type="button">
                    <i class="fas fa-pen"></i> Edit
                </button>
            </div>
        </div>
        <Form ref="userForm" :model="userForm" :rules="userFormRules" >
            <div class="row">
                <div class="col-sm-12">
        <FormItem label="First name" prop="first_name">
            <Input :readonly="setReadOnly" v-model="userForm.first_name"  placeholder="" ></Input>
        </FormItem>
                </div>
                <div class="col-sm-12">
        <FormItem label="Last name" prop="last_name">
            <Input v-model="userForm.last_name"  placeholder=""></Input>
        </FormItem>
                </div>
                <div class="col-sm-12">
        <FormItem label="Gender" prop="gender">
            <RadioGroup v-model="userForm.gender" >
                <Radio label="male">Male</Radio>
                <Radio label="female">Female</Radio>
            </RadioGroup>
        </FormItem>
                </div>
                <div class="col-sm-12">
        <FormItem >
            <vue-tel-input v-model="userForm.phone" validCharactersOnly mode="international"></vue-tel-input>
        </FormItem>

                </div>
                <div class="col-sm-12">
        <FormItem label="Email" prop="email">
            <Input v-model="userForm.email" type="email" placeholder=""></Input>
        </FormItem>
                </div>
                <div class="col-sm-12">
        <FormItem label="Password" prop="password">
            <Input v-model="userForm.password" password  type="password" placeholder=""></Input>
        </FormItem>

                </div>
        <div class="submit-button"> <Button @click="editBasicInfo" type="primary">Save</Button></div>

            </div>
        </Form>

    </div>
</template>

<script>
export default {
    data() {
        return {
            store_user: [],
            type:"password",
            setReadOnly: true,
            userForm:{
                first_name: "",
                last_name: "",
                email: "",
                gender: "",
                phone: "",
                password: "",
            },
                userFormRules: {
                    first_name: [
                        { required: true, message: 'This field is required', trigger: 'blur' }
                    ],
                    last_name: [
                        { required: true, message: 'This field is required', trigger: 'blur' }
                    ],
                    phone: [
                        { required: true, message: 'This field is required', trigger: 'blur' }
                    ],
                    gender: [
                        { required: true, message: 'Gender is required', trigger: 'change' }
                    ],
                     email: [
                        { required: true, message: 'Mailbox cannot be empty', trigger: 'blur' },
                        { type: 'email', message: 'Incorrect email format', trigger: 'blur' }
                    ],
                    password: [
                        { required: true, message: 'Please fill in the password.', trigger: 'blur' },
                        { type: 'string', min: 6, message: 'The password length cannot be less than 6 characters', trigger: 'blur' }
                    ]
            }

        }
    },
    methods: {
        setReadOnlyField(){
            this.setReadOnly = this.setReadOnly ? this.setReadOnly=false : this.setReadOnly=true
        },
        async editBasicInfo() {
            this.$refs['userForm'].validate( async valid => {
                if (valid) {
                const res =  await this.callApi(
                "post",
                "app/edit_basic_info",
                this.userForm
            );
            if (res.status === 200) {
                this.successMsg("Profile updated successfully");
            }} else {
                if (res.status === 422) {
                    this.isLoggingIn = false;
                    for (let i in res.data.errors) {
                        this.errorMsg(res.data.errors[i][0]);
                    }
                } else if (res.status === 500) {
                    this.isLoggingIn = false;
                    //alert(res.status)
                    console.log(res.data);
                    this.errorMsg(res.data.message);
                } else {
                    this.isLoggingIn = false;
                    this.swrMsg();
                }
                }
            })

        }
    },
    created() {
        let store_user = this.$store.state.user
        let userObj = {
            id: store_user.id,
            first_name : store_user.first_name,
            last_name : store_user.last_name,
            email : store_user.email,
            password : store_user.password,
            gender : store_user.gender,
            phone : store_user.phone,

        }
        this.userForm = userObj
    }
}
</script>