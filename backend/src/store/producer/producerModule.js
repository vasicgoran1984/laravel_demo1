import * as producerMutations from './mutations.js'
import * as producerActions from './actions.js'

const producerModule = {
    namespaced: true,
    state: () => (
        {
            producer: {
                loading: false,
                data: [],
            }
        }
    ),
    mutations: producerMutations,
    actions: producerActions,

}

export default producerModule
