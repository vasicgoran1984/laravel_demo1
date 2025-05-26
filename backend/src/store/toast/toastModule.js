import * as toastMutations from './mutations.js'

const toastModule = {
    namespaced: true,
    state: () => (
        {
            toast: {
                show: false,
                message: '',
                delay: 4000,
            }
        }
    ),
    mutations: toastMutations,

}

export default toastModule
