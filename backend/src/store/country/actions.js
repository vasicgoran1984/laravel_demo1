import axiosClient from "../../axios.js";

// Get all Countries
export function getCountries({commit}) {
    return axiosClient.get('/countries')
        .then(({data}) => {
            commit('setCountries', data)
        })
}
