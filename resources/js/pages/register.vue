<template>
    <div class="register-page">
        <div class="row ">
            <div class="left-side-wrapper col-sm-6">
                <div
                    class="left-side d-flex justify-content-center align-items-center"
                >
                    <div class="overlay text-center">
                        <h2 class="animate__animated animate__heartBeat animate__delay-1s">Welcome to the</h2>
                        <h1 class="animate__animated animate__fadeIn animate__delay-2s fs-1">NMSSG Membership Platform</h1>
                        <div  class="down-arrow text-center mt-5  d-md-none">
                            <a href="#main-content" style="color:white !important;">
                            <v-icon class="animate__animated animate__heartBeat animate__infinite" name="angle-double-down" scale="3"/> 
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="main-content" class="col-sm-6">
                <Form v-if="!loginForm" class="animate__animated animate__fadeIn" ref="register_form" :model="register_form" :rules="ruleInline" inline>
                    <div
                        class="right-side d-flex justify-content-center align-items-center"
                    >
                        <div class="row mx-5">
                            <Card shadow class="register-card">
                                <h4 class="text-center my-3">Register</h4>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-6 py-1">
                                            <FormItem
                                                class="form-input"
                                                prop="first_name"
                                            >
                                                <Input
                                                    type="text"
                                                    v-model="register_form.first_name"
                                                    placeholder="First name"
                                                >
                                                    <Icon
                                                        type="ios-person-outline"
                                                        slot="prepend"
                                                    ></Icon>
                                                </Input>
                                            </FormItem>
                                        </div>
                                        <div class="col-sm-12 col-lg-6 py-1">
                                            <FormItem
                                                class="form-input"
                                                prop="last_name"
                                            >
                                                <Input
                                                    type="text"
                                                    v-model="register_form.last_name"
                                                    placeholder="Last name"
                                                >
                                                    <Icon
                                                        type="ios-person-outline"
                                                        slot="prepend"
                                                    ></Icon>
                                                </Input>
                                            </FormItem>
                                        </div>
                                        <div class="col-sm-12 py-1">
                                            <FormItem
                                                class="form-input"
                                                prop="email"
                                            >
                                                <Input
                                                    v-model="register_form.email"
                                                    placeholder="Email"
                                                >
                                                    <Icon
                                                        type="ios-mail-outline"
                                                        slot="prepend"
                                                    ></Icon>
                                                </Input>
                                            </FormItem>
                                        </div>
                                        <div class="col-sm-12 col-lg-6 py-1">
                                            <FormItem class="form-input " prop="phone">
                                                <vue-tel-input validCharactersOnly mode="international" v-model="register_form.phone"></vue-tel-input>
                                            </FormItem>
                                        </div>
                                        <div class="col-sm-12 col-lg-6 pt-1 py-1">
                                            <FormItem class="form-input" label="Gender" prop="gender">
                                                <RadioGroup v-model="register_form.gender">
                                                    <Radio label="male">Male</Radio>
                                                    <Radio label="female">Female</Radio>
                                                </RadioGroup>
                                            </FormItem>
                                        </div>
                                        <div class="col-sm-12 col-lg-6 py-1">
                                            <FormItem
                                                class="form-input"
                                                prop="password"
                                            >
                                                <Input
                                                    type="password"
                                                    v-model="register_form.password"
                                                    placeholder="Password"
                                                >
                                                    <Icon
                                                        type="ios-lock-outline"
                                                        slot="prepend"
                                                    ></Icon>
                                                </Input>
                                            </FormItem>
                                        </div>
                                        <div class="col-sm-12 col-lg-6 py-1">
                                            <FormItem
                                                class="form-input"
                                                prop="password"
                                            >
                                                <Input
                                                    type="password"
                                                    v-model="register_form.password2"
                                                    placeholder="Confirm Password"
                                                >
                                                    <Icon
                                                        type="ios-lock-outline"
                                                        slot="prepend"
                                                    ></Icon>
                                                </Input>
                                            </FormItem>
                                        </div>
                                        <div class="footer-button d-flex justify-content-between">
                                            <div>
                                            <Button :loading="isRegistering" :disabled="isRegistering" type="primary" @click="register">Register</Button>
                                            </div>
                                            <div>
                                                <Button @click="showLoginForm" type="dashed"><span class="fst-italic">Already Registered? Login!</span></Button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </Card>
                        </div>
                    </div>
                </Form>           
                <Form v-if="loginForm" class="animate__animated animate__fadeIn" ref="login_form" :model="login_form" :rules="loginFormRules" inline>
                    <div
                        class="right-side d-flex justify-content-center align-items-center"
                    >
                        <div class="row mx-5">
                            <Card shadow class="login-card">
                                <h4 class="text-center my-3">Login</h4>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-12  py-1">
                                            <FormItem
                                                class="form-input"
                                                prop="loginEmail"
                                            >
                                                <Input
                                                    type="email"
                                                    v-model="login_form.loginEmail"
                                                    placeholder="Email"
                                                >
                                                    <Icon
                                                        type="ios-mail-outline"
                                                        slot="prepend"
                                                    ></Icon>
                                                </Input>
                                            </FormItem>
                                        </div>
                                        <div class="col-sm-12 py-1">
                                            <FormItem
                                                class="form-input"
                                                prop="loginPassword"
                                            >
                                                <Input
                                                    type="password"
                                                    v-model="login_form.loginPassword"
                                                    placeholder="Password"
                                                >
                                                    <Icon
                                                        type="ios-lock-outline"
                                                        slot="prepend"
                                                    ></Icon>
                                                </Input>
                                            </FormItem>
                                        </div>
                                        <div class="footer-button d-flex justify-content-between">
                                            <div>
                                            <Button :loading="isLoggingIn" :disabled="isLoggingIn" type="primary" @click="login">Login</Button>
                                            </div>
                                            <div>
                                                <Button @click="showRegisterForm" type="dashed"><span class="fst-italic">Not A Member? Register!</span></Button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </Card>
                        </div>
                    </div>
                </Form>                
            </div>
        </div>

    </div>
</template>
<script>
export default {
    data() {
        return {
            isLoggingIn: false,
            isRegistering: false,
            loginForm: false,
            register_form: {
                first_name: '',
                last_name: '',
                gender: '',
                email: '',
                phone: '',
                password: '',
                password2: ''
            },
            login_form: {
                loginEmail: '',
                loginPassword: '',
            },
                loginFormRules: {
                    loginEmail: [
                        { required: true, message: 'Mailbox cannot be empty', trigger: 'blur' },
                        { type: 'email', message: 'Incorrect email format', trigger: 'blur' }
                    ],
                    loginPassword: [
                        { required: true, message: 'Please fill in the password.', trigger: 'blur' },
                        { type: 'string', min: 6, message: 'The password length cannot be less than 6 characters', trigger: 'blur' }
                    ]

                },
                ruleInline: {
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
        };
    },
    methods: {
        showRegisterForm(){
            this.loginForm = false
        },
        showLoginForm(){
            this.loginForm = true
        },
        async login(){
            this.$refs['login_form'].validate( async valid => {
                if (valid) {
            this.isLoggingIn = true;
            const res =  await this.callApi(
                "post",
                "app/login_user",
                this.login_form
            );
            if (res.status === 200) {
                this.isLoggingIn = false;
                this.successMsg("Success");
                window.location = '/'
            } else {
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
                }
            } );
            
        },
        async register(){
            if (!this.register_form.phone) {
                return this.errorMsg('Please Enter your phone number!')
            }
            if (this.register_form.password !== this.register_form.password2) {
                return this.errorMsg('Passwords do not match!')
            }
                this.$refs['register_form'].validate( async valid => {
                    if (valid) {
            this.isRegistering = true;
            const res =  await this.callApi(
                "post",
                "app/register_user",
                this.register_form
            );
            if (res.status === 201) {
                this.isRegistering = false;
                this.successMsg("Success");
                window.location = '/'
            } else {
                if (res.status === 422) {
                    this.isRegistering = false;
                    for (let i in res.data.errors) {
                        this.errorMsg(res.data.errors[i][0]);
                    }
                } else if (res.status === 500) {
                    this.isRegistering = false;
                    //alert(res.status)
                    console.log(res.data);
                    this.errorMsg(res.data.message);
                } else {
                    this.isRegistering = false;
                    this.swrMsg();
                }
            }
                    } else {
                        return
                    }
                })

        }
    }
};
</script>
<style scoped>
.down-arrow{
    position: relative;
    color:white
}
.left-side {
    position: relative;
    background-image: url("/images/nmssg-photo.jpg");
    background-position: center center;
    height: 100vh;
}
.left-side::before {
    background-color: rgba(0, 0, 0, 0.7);
    content: "";
    top: 0px;
    right: 0px;
    bottom: 0px;
    left: 0px;
    position: absolute;
}
.overlay{
    color: white;
    position: relative;
}
.right-side {
    height: 100vh;
}
.register-card {
    border-radius: 7px;
}
.form-input {
    width: 100%;
}
</style>
