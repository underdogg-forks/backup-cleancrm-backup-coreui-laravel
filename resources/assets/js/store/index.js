import Vue from 'vue'
import Vuex from 'vuex'
import swal from 'sweetalert2'

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {},

    state: {},

    mutations: {},

    actions: {
        submit({commit}, preset) {
            let {url, method, data, config, message} = preset


            return new Promise((resolve, reject) => {
                swal({
                    text: message ? message : 'Are you sure you want to submit this data',
                    allowEscapeKey: false,
                    showCancelButton: true,
                    type: 'question',
                    confirmButtonText: 'Ok',
                    showLoaderOnConfirm: true,
                    allowOutsideClick: () => !swal.isLoading(),
                    preConfirm: () => {
                        return new Promise((resolve, reject) => {
                            window.axios[method](url, data, config).then(({data}) => {
                                resolve(data)
                            }).catch(error => {
                                reject(error)
                            })
                        })
                    },
                }).then(result => {
                    resolve(result)
                }).catch(err => {
                    reject(err)
                });
            })
        },

        destroy({commit}, preset) {
            let {url, message} = preset

            return new Promise((resolve, reject) => {
                swal({
                    text: message ? message : 'Are you sure you want to delete this data',
                    allowEscapeKey: false,
                    showCancelButton: true,
                    type: 'warning',
                    confirmButtonText: 'Ok',
                    showLoaderOnConfirm: true,
                    allowOutsideClick: () => !swal.isLoading(),
                    preConfirm: () => {
                        return new Promise((resolve, reject) => {
                            window.axios.delete(url).then(({data}) => {
                                resolve(data)
                            }).catch(error => {
                                reject(error)
                            })
                        })
                    },
                }).then(result => {
                    resolve(result)
                }).catch(err => {
                    reject(err)
                });
            })
        }
    }
})