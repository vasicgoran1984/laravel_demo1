import * as countryMutations from './mutations.js'
import * as countryActions from './actions.js'

const countryModule = {
    namespaced: true,
    state: () => (
        {
            countries: [],
        }
    ),
    mutations: countryMutations,
    actions: countryActions,

}

export default countryModule
