<template>
    <div class="card">
        <div class="card-header">
            <i class="fas fa-list fa-fw"></i> Manage Application Menu
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <menu-list :menus="menus" @nodeClick="fillForm"></menu-list>
                </div>
                <div class="col-md-6">
                    <div class="alert alert-danger alert-dismissible fade show" v-if="error">
                        <strong><i class="icon fa fa-ban"></i> {{ error.message }}</strong>
                        <ul class="mb-0">
                            <li v-for="value in error.lists" v-text="value"></li>
                        </ul>

                        <button type="button" class="close" @click="error = false">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="form-group">
                        <label for="name">Menu Name</label>
                        <input type="text" class="form-control" id="name" v-model="form.name">
                    </div>
                    <div class="form-group">
                        <label>Parent Menu</label>
                        <multiselect v-model="form.parent"
                                     label="name"
                                     track-by="id"
                                     :options="menuOptions"
                        ></multiselect>
                    </div>
                    <div class="form-group">
                        <label for="icon">Icon</label>
                        <input type="text" class="form-control" id="icon" v-model="form.icon">
                    </div>
                    <div class="form-group">
                        <label for="url">URL</label>
                        <input type="text" class="form-control" id="url" v-model="form.url">
                    </div>
                    <div class="form-group">
                        <label for="order">Order</label>
                        <input type="number" class="form-control" id="order" v-model="form.order">
                    </div>
                    <div class="form-group">
                        <label>Permissions</label>
                        <multiselect v-model="form.permissions"
                                     label="name"
                                     track-by="id"
                                     :options="permissionOptions"
                                     :multiple="true"
                        ></multiselect>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" v-model="form.active" id="active">
                            <label class="form-check-label" for="active">Active</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" @click="save">Save</button>
                    <button type="submit" class="btn btn-secondary" @click="clearForm">Clear</button>
                    <button type="button"
                            class="btn btn-warning"
                            @click="update"
                            :disabled="!form.id"
                    >Update
                    </button>
                    <button type="submit" class="btn btn-danger float-md-right" @click="destroy" :disabled="!form.id">
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import MenuList from './List'
    import Multiselect from 'vue-multiselect'

    export default {
        components: {
            MenuList, Multiselect
        },
        props: {
            menus: {
                type: Array,
                required: true
            },
        },

        data() {
            return {
                permissionOptions: [],
                menuOptions: [],
                form: {
                    name: '',
                    parent: '',
                    url: '',
                    icon: '',
                    order: '',
                    permissions: []
                },
                error: false,
            }
        },

        mounted() {
            this.fetchPermissions();
            this.fetchMenus();
        },

        methods: {
            save() {
                let preset = {
                    method: 'post',
                    url: '/settings/menus',
                    data: this.form,
                }
                this.submit(preset)
            },

            update() {
                let preset = {
                    method: 'patch',
                    url: `/settings/menus/${this.form.id}`,
                    data: this.form,
                }
                this.submit(preset)
            },

            destroy() {
                this.$store.dispatch('destroy', {
                    url: `/settings/menus/${this.form.id}`
                }).then(({dismiss, value}) => {
                    if (!dismiss && value.path) {
                        window.location.replace(value.path)
                    }
                })
            },

            clearForm() {
                return this.form = {
                    name: '',
                    parent: '',
                    url: '',
                    icon: '',
                    order: '',
                    permissions: []
                }
            },

            fetchPermissions() {
                window.axios.get('/api/permissions').then(res => {
                    this.permissionOptions = res.data
                })
            },

            fetchMenus() {
                window.axios.get('/api/menus').then(res => {
                    this.menuOptions = res.data
                })
            },

            fillForm({model}) {
                this.form = {
                    ...model.menu
                }
            },

            submit(preset) {
                this.$store.dispatch('submit', preset).then(({dismiss, value}) => {
                    if (!dismiss && value.path) {
                        window.location.replace(value.path)
                    }
                }).catch(({response}) => {
                    if (response && response.status === 422) {
                        window.scroll(0, 0)
                        this.displayError(err.response.data)
                    }
                })
            },
            displayError({errors, message}) {
                this.error = {
                    message,
                    lists: _.flatten(_.toArray(errors))
                }
            },
        }
    }
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>