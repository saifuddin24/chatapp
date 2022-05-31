<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                    <div>{{ message }}</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                message: ''
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        created() {
            Echo.channel('notification')
                .listen('MessageNotification', (e) => {
                    // alert('I am refreshed myself!');
                    this.message = "Message by PUSHER";
                });
        }
    }
</script>
