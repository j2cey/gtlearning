import axios from 'axios';

export async function getCoursItem(id){
    let response;
    response = await axios.get(`/cours.byid/${id}`);
    return response.data;
};
