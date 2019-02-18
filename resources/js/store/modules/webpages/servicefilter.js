
//permission

const state = {
    servicefilter:[],
    servicefilters:[],
    singleservicefilter:[],
  },
  getters = {
    ServiceFilter(state){
      return state.servicefilter;
    },
    ServiceFilters(state){
      return state.servicefilters;
    },
    SingleServiceFilter(state){
        return state.singleservicefilter;
    },
  }
const actions = {
    servicefilter(context){
        axios.get('/servicefilter/get')//based on authethicated id
        .then((response)=>{
          console.log(response.data);
          context.commit('servicefilter', response.data.servicefilter); //based on authethicated id
        });
    },
    servicefilters(context){
        axios.get('/servicefilters/get')
        .then((response)=>{
        //   console.log(response.data.servicefilters);
          context.commit('servicefilters', response.data.servicefilters);
        });
    },
    ServiceFilterById(context, payload){
        axios.get('/servicefilter/show/'+payload)
              .then((response)=>{
                  console.log(response.data.singleservicefilter);
                  context.commit('singleservicefilter', response.data.singleservicefilter);
              });
    },
  }

const mutations = {
    servicefilter(state, data){
      return state.servicefilter = data;
    },
    servicefilters(state, data){
      return state.servicefilters = data;
    },
    singleservicefilter(state, data){
      return state.singleservicefilter = data;
    }
  }

export default {
  // namespaced: true,
  state,
  getters,
  actions,
  mutations
}





