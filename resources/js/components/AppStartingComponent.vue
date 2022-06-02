<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body bg-green-500" :class="mclass">
                        I'm an example component.<div>{{ message }}</div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                message: '',
                mclass :''
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        created() {
            Echo.channel('notification')
                .listen('MessageNotification', (e ,r) => {
                    console.log( 'MESSAGE: ',e ,r);
                    this.message = "Message by PUSHER " + e.message;
                    this.mclass = ' bg-red-600'
                });
        }
    }
</script>
