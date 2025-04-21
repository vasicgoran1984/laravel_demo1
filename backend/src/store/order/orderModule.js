import * as orderMutations from './mutations.js'
import * as orderActions from './actions.js'

const orderModule = {
    namespaced: true,
    state: () => (
        {
            orders: {
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
    mutations: orderMutations,
    actions: orderActions,

}

export default orderModule
