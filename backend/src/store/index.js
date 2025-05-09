import {createStore} from "vuex";
import user from './user/userModule.js'
import product from './product/productModule.js'
import order from './order/orderModule.js'
import toast from './toast/toastModule.js'
import customer from './customer/customerModule.js'
import country from './country/countryModule.js'
import date from './date/dateModule.js'

const store = createStore({
    modules: {
        user,
        product,
        order,
        toast,
        customer,
        country,
        date,
    }
})

export default store
