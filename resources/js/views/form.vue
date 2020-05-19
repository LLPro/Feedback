<template>
    <div class="mt-4">
        <div class="col-sm-8 col-md-6 col-10 main">
            <validation_errors :data="response_data" :state="response_state"></validation_errors>
            <form>
                <div class="form-group">
                    <label for="name_field">Name</label>
                    <input type="text" class="form-control" id="name_field" v-model="values.name_value">
                </div>
                <div class="form-group">
                    <label for="phone_input">Phone</label>
                    <input type="text" class="form-control" id="phone_input" v-model="values.phone_value">
                </div>
                <div class="input-group">
                    <label for="text_area">Content</label>
                    <textarea class="form-control" id="text_area" v-model="values.text_area_value"> </textarea>
                </div>
                <button type="button" class="btn btn-primary mt-2" @click="saveForm">Send form</button>
            </form>
        </div>
    </div>
</template>

<script>
    import validation_errors from '../components/validation-error'

    export default {
        data(){
            return {
                values: {
                    name_value: null,
                    phone_value: null,
                    text_area_value: null,
                },
                response_data: null,
                response_state: null,
                name_error: null,
                phone_error: null,
                text_area_error: null,
            }
        },
        components:{
            validation_errors
        },
        methods:{
             saveForm() {
                 this.$store.dispatch('change', this.values)
                     .then(resp => {
                         this.response_state = this.response_data = null;
                         [this.response_data, this.response_state] = [resp.data.data, resp.data.state];
                         if (this.response_state === 'true') {
                             setTimeout(() => {
                                 this.response_state = this.response_data = null;
                                 this.values.text_area_value = this.values.phone_value = this.values.name_value = null;
                             }, 1000)
                         }
                     })
                     .catch(err => {
                         console.log(err.data);
                     });
             }
        },
    }
</script>

<style scoped>
    .main{
        margin: auto;
    }
    .form-group{
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    #text_area{
        width: 100%;
    }
</style>
