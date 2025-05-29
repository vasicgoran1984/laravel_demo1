import * as carServiceMutations from './mutations.js'
import * as carServiceActions from './actions.js'

const carServiceModule = {
    namespaced: true,
    state: () => (
        {
            carService: {
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
    mutations: carServiceMutations,
    actions: carServiceActions,

}

export default carServiceModule
