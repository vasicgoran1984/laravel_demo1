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

// Register User
export function register({commit}, data) {
    return axiosClient.post('/register', data)
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

// Get All Users
export function getUsers({commit}, {url = null, search = '', perPage = 10, sort_field, sort_direction} = {}) {
    commit('setUsers', [true])

    url = url || '/users';

    return axiosClient.get(url, {
        params: {
            search,
            per_page: perPage,
            sort_field,
            sort_direction
        }
    })
        .then(res => {
            commit('setUsers', [false, res.data])
        })
        .catch(() => {
            commit('setUsers', [false])
        })
}

// Create User
export function createUser({commit}, user) {
    return axiosClient.post('/users', user)
}

export function getUser({}, id) {
    return axiosClient.get(`/users/${id}`)
}

export function updateUser({commit}, user) {
    const id = user.id;

    const form = new FormData();
    form.append('id', user.id);
    form.append('name', user.name);
    form.append('email', user.email);
    form.append('password', user.password);
    form.append('is_admin', user.is_admin ? 1 : 0);
    form.append('_method', 'PUT');
    user = form

    return axiosClient.post(`/users/${id}`, user)
}
