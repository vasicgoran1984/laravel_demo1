import axiosClient from "../../axios.js";

// Get All Customers
export function getCustomers({commit}, {url = null, search = '', perPage = 10, sort_field, sort_direction} = {}) {
    commit('setCustomers', [true])

    url = url || '/customers';

    return axiosClient.get(url, {
        params: {
            search,
            per_page: perPage,
            sort_field,
            sort_direction
        }

    })
        .then(res => {
            commit('setCustomers', [false, res.data])
        })
        .catch(() => {
            commit('setCustomers', [false])
        })
}

// Get Single Customer
export function getCustomer({commit}, id) {
    return axiosClient.get(`customers/${id}`)
}

// Create Customer
export function createCustomer({commit}, customer) {
    return axiosClient.post('/customers', customer)
}

// Update Customer
export function updateCustomer({commit}, customer) {
    return axiosClient.put(`/customers/${customer.id}`, customer)
}
