import axiosClient from "../../axios.js";

// Login User
export function login({commit}, data) {
    return axiosClient.post('/login', data)
        .then(({data}) => {
            commit('setUser', data.user);
            commit('setToken', data.token);
            return data;
        })
}

// Logout User
export function logout({commit}) {
    return axiosClient.post('/logout')
        .then((response) => {
            commit('setToken', null)
            return response;
        })
}

// Get User
export function getCurrentUser({commit}) {
    return axiosClient.get('/user')
        .then(({data}) => {
            commit('setUser', data)
            return data;
        })
}
