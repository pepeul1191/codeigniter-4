import axios from 'axios';

export const getUser = () => {
  return new Promise((resolve, reject) => {
    axios.get('user', {
      params: {}
    }).then(function (response) {
      resolve(response);
    }).catch(function (error) {
      if(error.response.status == 404){
        console.error('Dentista no encontrado')
      }else{
        console.error(error.response.data);
      }
      reject(error.response);
    })
    .then(function () {
      // todo?
    });
  });
}
