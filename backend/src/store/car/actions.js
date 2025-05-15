import axiosClient from "../../axios.js";

// Get Producer By ID
export function getProducers({commit}) {
    commit('setProducer', [true])

    return axiosClient.get(`producer`)
        .then(res => {
            commit('setProducer', [false, res.data])
        })
}

// Get Producer By ID
export function getProducerType({commit}, id) {
    return axiosClient.get(`producer-type/${id}`)
}

