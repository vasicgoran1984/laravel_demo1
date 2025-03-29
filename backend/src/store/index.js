import {createStore} from "vuex";
import user from './user/userModule.js'
import product from './product/productModule.js'
import state from './state.js'

const store = createStore({
    modules: {
        user,
        product,
    }
})

export default store
