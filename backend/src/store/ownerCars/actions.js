import axiosClient from "../../axios.js";

// Create New Owner Cars
export function createOwnerAndCar({commit}, ownerCar) {
    // to do remove func
    return axiosClient.post('/ownerCars', ownerCar)
}

