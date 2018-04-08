<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <p>{{ text.id }}</p>
                        <slot name="slot" :props="text">
                            {{ text }}
                        </slot>
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
                text: {
                    id: 1,
                    label: 'I\'m an example component.'
                }
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
