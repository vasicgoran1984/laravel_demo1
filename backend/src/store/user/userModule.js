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
        }
    ),
    mutations: userMutations,
    actions: userActions,
}

export default userModule
