<template>
    <!-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- CREATED A NEW VIEW COMPONENT -->
    <div>
        <button :type="type" class="my-button" v-text="test.name"></button>
    </div>

</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')

            //EXAMPLE OF HOW TO FETCH DATA FROM THE BACKEND
            axios.post('api/vue', {})
                .then(response => {
                    this.test = response.data;
                });
        },

        data: function(){
            return {
                test: null,
            }
        },



        // accepts the text as a property
        props: [
            'text',
            'type'
        ]
    }
</script>

<style>
    .my-button {
        background-color: #333;
        color: #fff;
        padding: 10px 15px;
        font-weight: bold;
    }
</style>