import {createStore} from "vuex";
import * as userActions from './user/actions';
import * as userMutations from './user/mutations';
import * as userGetters from './user/getters';

const store = createStore({
    state: {
        user: {
            token: sessionStorage.getItem('TOKEN'),
            data: {},
        }
    },
    getters: userGetters,
    actions: userActions,
    mutations: userMutations,
})

export default store
