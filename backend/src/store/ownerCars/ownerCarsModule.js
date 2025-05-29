import * as ownerCarsMutations from './mutations.js'
import * as ownerCarsActions from './actions.js'

const ownerCarsModule = {
    namespaced: true,
    state: () => (
        {
            ownerCars: {
                loading: false,
                data: [],
                // links: [],
                // from: null,
                // to: null,
                // page: 1,
                // limit: null,
                // total: null,
            }
        }
    ),
    mutations: ownerCarsMutations,
    actions: ownerCarsActions,

}

export default ownerCarsModule
