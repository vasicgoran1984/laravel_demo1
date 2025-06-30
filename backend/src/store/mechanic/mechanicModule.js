import * as mechanicMutations from './mutations.js'
import * as mechanicActions from './actions.js'

const mechanicModule = {
    namespaced: true,
    state: () => (
        {
            mechanic: {
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
    mutations: mechanicMutations,
    actions: mechanicActions,

}

export default mechanicModule
