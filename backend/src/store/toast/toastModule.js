import * as toastMutations from './mutations.js'

const toastModule = {
    namespaced: true,
    state: () => (
        {
            toast: {
                show: false,
                message: '',
                delay: 3000,
            }
        }
    ),
    mutations: toastMutations,

}

export default toastModule
