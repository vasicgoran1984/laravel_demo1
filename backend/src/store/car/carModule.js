import * as carMutations from './mutations.js'
import * as carActions from './actions.js'

const carModule = {
    namespaced: true,
    state: () => (
        {
            car: {
                loading: false,
                data: [],
                links: [],
                from: null,
                to: null,
                page: 1,
                limit: null,
                total: null,
            }
        }
    ),
    mutations: carMutations,
    actions: carActions,

}

export default carModule
