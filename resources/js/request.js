import axios from 'axios';

const axiosRequest = axios.create({});

axiosRequest.interceptors.request.use(
    (config) => {
      if(config.url != 'api/login') {
          config.headers.common = {
              'Accept': 'application/json',
              'Content-Type': 'application/json',
              'Authorization': `Bearer ${localStorage.getItem('access_token')}`
          }
      }

      return config;
  },
  (error) => {
      return Promise.reject(error);
  }
);

export default axiosRequest;