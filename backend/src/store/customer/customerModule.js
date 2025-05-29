import * as customerMutations from './mutations.js'
import * as customerActions from './actions.js'

const customerModule = {
    namespaced: true,
    state: () => (
        {
            customers: {
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
    mutations: customerMutations,
    actions: customerActions,

}

export default customerModule
