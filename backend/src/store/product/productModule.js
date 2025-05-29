import * as productMutations from './mutations.js'
import * as productActions from './actions.js'

const productModule = {
    namespaced: true,
    state: () => (
        {
            products: {
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
    mutations: productMutations,
    actions: productActions,

}

export default productModule
