import * as userMutations from './mutations.js'
import * as userActions from './actions.js'

const userModule = {
    namespaced: true,
    state:() => (
        {
            user: {
                token: sessionStorage.getItem('TOKEN'),
                data: {},
            },
            users: {
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
    mutations: userMutations,
    actions: userActions,
}

export default userModule
