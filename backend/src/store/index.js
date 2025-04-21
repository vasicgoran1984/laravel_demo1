import {createStore} from "vuex";
import user from './user/userModule.js'
import product from './product/productModule.js'
import order from './order/orderModule.js'
import toast from './toast/toastModule.js'

const store = createStore({
    modules: {
        user,
        product,
        order,
        toast,
    }
})

export default store
