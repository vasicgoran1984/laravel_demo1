import axiosClient from "../../axios.js";

// Get Type By Producer ID
export function getTypeByProducerId({commit}, id) {
    commit('setType', [true])

    return axiosClient.get(`type/${id}`)
        .then(res => {
            commit('setType', [false, res.data])
        })
}

