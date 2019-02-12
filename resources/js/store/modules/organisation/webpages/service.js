
//permission

const state = {
    service:[],
    services:[],
    singleservice:[],
  },
  getters = {
    Service(state){
      return state.service;
    },
    Services(state){
      return state.services;
    },
    SingleService(state){
        return state.singleservice;
    },
  }
const actions = {
    service(context){
        axios.get('/service/get')//based on authethicated id
        .then((response)=>{
          console.log(response.data);
          context.commit('service', response.data.service); //based on authethicated id
        });
    },
    services(context){
        axios.get('/services/get')
        .then((response)=>{
        //   console.log(response.data.services);
          context.commit('services', response.data.services);
        });
    },
    ServiceById(context, payload){
        axios.get('/service/show/'+payload)
              .then((response)=>{
                  console.log('ffffffffffff');
                  context.commit('singleservice', response.data.singleservice);
              });
    },
  }

const mutations = {
    service(state, data){
      return state.service = data;
    },
    services(state, data){
      return state.services = data;
    },
    singleservice(state, data){
      return state.singleservice = data;
    }
  }

export default {
  // namespaced: true,
  state,
  getters,
  actions,
  mutations
}



