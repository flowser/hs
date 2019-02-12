
//permission

const state = {
    extraservice:[],
    extraservices:[],
    singleextraservice:[],
  },
  getters = {
    ExtraService(state){
      return state.extraservice;
    },
    ExtraServices(state){
      return state.extraservices;
    },
    SingleExtraService(state){
        return state.singleextraservice;
    },
  }
const actions = {
    extraservice(context){
        axios.get('/extraservice/get')//based on authethicated id
        .then((response)=>{
          console.log(response.data);
          context.commit('extraservice', response.data.extraservice); //based on authethicated id
        });
    },
    extraservices(context){
        axios.get('/extraservices/get')
        .then((response)=>{
        //   console.log(response.data.extraservices);
          context.commit('extraservices', response.data.extraservices);
        });
    },
    ExtraServiceById(context, payload){
        axios.get('/extraservice/show/'+payload)
              .then((response)=>{
                  console.log(response.data.singleextraservice);
                  context.commit('singleextraservice', response.data.singleextraservice);
              });
    },
  }

const mutations = {
    extraservice(state, data){
      return state.extraservice = data;
    },
    extraservices(state, data){
      return state.extraservices = data;
    },
    singleextraservice(state, data){
      return state.singleextraservice = data;
    }
  }

export default {
  // namespaced: true,
  state,
  getters,
  actions,
  mutations
}




