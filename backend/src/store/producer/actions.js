import axiosClient from "../../axios.js";

// Create Service
export function createService({commit}, service) {
    return axiosClient.post('/service', service)
}

// Update Service
export function updateService({commit}, service) {
    return axiosClient.put(`/service/${service.id}`, service)
}

// Get Service By User ID
export function getService({commit}, id) {
    return axiosClient.get(`service/${id}`)
}

// Get Service By service ID
export function getServiceByServiceId({commit}, id) {
    commit('setService', [true])
    if (id) {
        return axiosClient.get(`/service/service-id/${id}`)
            .then(res => {
                commit('setService', [false, res.data])
            })
    }

}
