
//permission

const state = {
    service:[],
    services:[],
  },
  getters = {
    Sservice(state){
      return state.service;
    },
    Services(state){
      return state.services;
    }
  }
const actions = {
    service(context){
        axios.get('/service/get')//based on authethicated id
        .then((response)=>{
        //   console.log(response.data.service);
          context.commit('service', response.data.service); //based on authethicated id
        })
    },
    services(context){
        axios.get('/services/get')
        .then((response)=>{
        //   console.log(response.data.services);
          context.commit('services', response.data.services);
        })
    }
  }
const mutations = {
    service(state, data){
      return state.service = data;
    },
    services(state, data){
      return state.services = data;
    }
  }

export default {
  // namespaced: true,
  state,
  getters,
  actions,
  mutations
}
