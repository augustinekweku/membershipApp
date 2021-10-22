export default {
    data() {
        return{

        }
    },
    methods: {
    async callApi(method, url, dataObj) {
            // Send a POST request
            try {
                return await axios({
                    method: method,
                    url: url,
                    data: dataObj
                });               
            } catch (e) {
                return e.response
            }

        },
    
        iMsg (desc, title= 'Hey') {
            this.$Notice.info({
                title: title,
                desc: desc
            });
        },

        successMsg (desc, title='Great!') {
            this.$Notice.success({
                title: title,
                desc: desc
            });
        },
        warningMsgMsg (desc, title='Oops! ') {
            this.$Notice.warning({
                title: title,
                desc: desc
            });
        },
        errorMsg (desc, title='Oops!') {
            this.$Notice.error({
                title: title,
                desc: desc
            });
        },
        swrMsg (desc='Something went wrong Please try again', title='Hey') {
            this.$Notice.error({
                title: title,
                desc: desc
            });
        },

    },
    computed: {

    }
}