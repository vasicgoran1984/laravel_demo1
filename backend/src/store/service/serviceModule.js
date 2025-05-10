import * as serviceMutations from './mutations.js'
import * as serviceActions from './actions.js'

const serviceModule = {
    namespaced: true,
    state: () => (
        {
            service: {
                loading: false,
                data: [],
            }
        }
    ),
    mutations: serviceMutations,
    actions: serviceActions,

}

export default serviceModule
