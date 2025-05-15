import * as typeMutations from './mutations.js'
import * as typeActions from './actions.js'

const typeModule = {
    namespaced: true,
    state: () => (
        {
            type: {
                loading: false,
                data: [],
            }
        }
    ),
    mutations: typeMutations,
    actions: typeActions,

}

export default typeModule
