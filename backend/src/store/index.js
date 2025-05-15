import {createStore} from "vuex";
import user from './user/userModule.js'
import product from './product/productModule.js'
import order from './order/orderModule.js'
import toast from './toast/toastModule.js'
import customer from './customer/customerModule.js'
import country from './country/countryModule.js'
import date from './date/dateModule.js'
import service from './service/serviceModule.js'
import producer from './producer/producerModule.js'
import type from './type/typeModule.js'
import volume from './volume/volumeModule.js'
import car from './car/carModule.js'
import owner from './owner/ownerModule.js'
import ownerCars from "./ownerCars/ownerCarsModule.js";

const store = createStore({
    modules: {
        user,
        product,
        order,
        toast,
        customer,
        country,
        date,
        service,
        producer,
        type,
        volume,
        car,
        owner,
        ownerCars,
    }
})

export default store
