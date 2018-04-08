<template>
    <div :class="[`alert alert-${level} alert-dismissible`, isImportant ? 'alert-important' : '']" v-show="show">
        <p class="mb-0" v-html="body"></p>

        <button type="button" class="close" aria-hidden="true" @click="show = false" v-if="isImportant">
            <span aria-hidden="true">&times; </span>
        </button>
    </div>
</template>

<script>
    export default {
        props: {
            message: {
                type: String,
                default: ''
            },

            type: {
                type: String,
                default: '',
            },
            important: {
                type: Boolean,
                default: false
            }
        },

        data() {
            return {
                body: '',
                level: '',
                isImportant: false,
                show: false,
            }
        },

        created() {
            if (this.message) {
                this.flash(this.message, this.type, this.important)
            }

            window.events.$on('flash', (message, type = '', important = false) => this.flash(message, type, important))
        },

        methods: {
            flash(message, type, important) {
                this.body = message;
                this.level = type ? type : 'info'
                this.isImportant = important

                this.show = true

                if (!important) {
                    this.hide()
                }
            },

            hide() {
                $(this.$el).not('.alert-important').delay(3000).fadeOut(350, () => {
                    this.show = false
                });
            }
        }
    }
</script>