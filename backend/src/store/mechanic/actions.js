import axiosClient from "../../axios.js";

// Create New Mechanic
export function addNewMechanic({commit}, mechanic) {
    return axiosClient.post(`/mechanic`, mechanic)
}

// Get All Mechanic
export function getMechanics({commit}, {url = null} = {}) {

    commit('setMechanic', [true])

    url = url || '/mechanic';

    return axiosClient.get(url)
        .then(res => {
            commit('setMechanic', [false, res.data])
        })
        .catch(() => {
            commit('setMechanic', [false])
        })
}

// Get Mechanic By Id
export function getMechanic({commit}, id) {
    return axiosClient.get(`/mechanic/${id}`)
}

// Update Mechanic
export function updateMechanic({commit}, mechanic) {
    return axiosClient.put(`/mechanic/${mechanic.id}`, mechanic)
}

// Get All Mechanics
export function getAllMechanics({commit}) {
    return axiosClient.get(`/get-all-mechanics`)
}
