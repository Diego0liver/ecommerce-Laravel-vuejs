import axios from "axios";
const token = localStorage.getItem('authToken')
export default axios.create({
    baseURL: 'http://127.0.0.1:8000/api',
    headers: {
        Authorization: `Bearer ${token}`,
        'Cache-Control': 'no-cache'
      }
})