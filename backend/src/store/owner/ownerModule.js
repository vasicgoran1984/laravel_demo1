import * as ownerMutations from './mutations.js'
import * as ownerActions from './actions.js'

const ownerModule = {
    namespaced: true,
    state: () => (
        {
            owner: {
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
    mutations: ownerMutations,
    actions: ownerActions,

}

export default ownerModule
